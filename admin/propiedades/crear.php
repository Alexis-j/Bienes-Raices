<?php
    include '../../includes/app.php';

    use App\Propiedad;
    // Proteger esta ruta.
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $db = conectarDb();

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

// Ejecutar el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Crea una nueva instanca de la clase Propiedad
        $propiedad = new Propiedad($_POST);

        /*SUBIDA DE ARCHIVOS*/
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        
        // Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        // Setear la imagen
        // Realiza un resize a la imagen
        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        // Validar
        $errores = $propiedad->validar();

        // El array de errores esta vacio
        if (empty($errores)) {

            //crear la carpeta para subir imagenes

            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
        
            // Guardar la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //guardar en la base de datos
            $resultado = $propiedad->guardar();

            //mesaje de exito o error
            if ($resultado) {
                // Almacenar la imagen
                header('Location: /admin?resultado=1');
            }
        }
    }

    incluirTemplate('header');
?>

<?php
$nombrePagina = 'Crear Propiedad';
?>

<h1 class="fw-300 centrar-texto">Administración - Nueva Propiedad</h1>

<main class="contenedor seccion contenido-centrado">
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" ="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php

incluirTemplate('footer');

mysqli_close($db); ?>

</html>