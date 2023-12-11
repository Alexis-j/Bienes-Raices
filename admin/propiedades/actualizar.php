<?php
    // validar que sea un id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if	(!$id) {
        header('Location: /bienesraices/admin/index.php');
    }

    //importa la la conexion
    require '../../includes/config/datbase.php';
    $db = conectarDB();

    // Obtener los datos de la propiedad
    $consultaPropiedad = "SELECT * FROM propiedades WHERE id = $id";
    $resultadoPropiedad = mysqli_query($db, $consultaPropiedad);
    $propiedad = mysqli_fetch_assoc($resultadoPropiedad);

    
    //consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //areglo con mensaje de errores
    $errores = [];

        $titulo = $propiedad['titulo'];
        $precio = $propiedad['precio'];
        $descripcion = $propiedad['descripcion'];
        $habitaciones = $propiedad['habitaciones'];
        $wc = $propiedad['wc'];
        $estacionamiento = $propiedad['estacionamiento'];
        $vendedores_id = $propiedad['vendedores_id'];
        $imagenPropiedad = $propiedad['imagen'];


    //ejectuar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] ===  'POST') {

        echo "<prev>";
        var_dump($_POST);
        echo "</prev>";

        // echo "<prev>";
        // var_dump($_FILES);
        // echo "</prev>";


        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedores_id'] );
        $creado = date('Y/m/d');

        //asignar files hacia una variable
        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        if( strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if(!$habitaciones) {
            $errores[] = "El numero de habitaciones es obligatorio";
        }
        if(!$wc) {
            $errores[] = "El numero de baños es obligatorio";
        }
        if(!$estacionamiento) {
            $errores[] = "El numero de estacionamientos es obligatorio";
        }
        if(!$vendedores_id) {
            $errores[] = "Elige un vendedor";
        }


        //validar por tamaño (1mb maximo)	
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }


        //revisar que el arreglo de errores este vacio
        if(empty($errores)) {

            //crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            //  Eliminar la imagen previa
            if($imagen['name']) {
                unlink($carpetaImagenes . $propiedad['imagen']);
    
                // generar un nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                //subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            }
            else {
                $nombreImagen = $propiedad['imagen'];
            }

            // Insertar en la base de datos
            $query = " UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen' ,descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedores_id WHERE id = $id";
            // echo $query;

            $resultado = mysqli_query($db, $query);
    
            if($resultado) {
                // redireccionar al usuario
                header('Location: /bienesraices/admin/index.php?resultado=2');
            }
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio?>">

                <label for="imagen">imagen</label>
                <input type="file" id="imagen"  accept="image.jpeg, image/png" name="imagen">

                <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad ?>" class="imagen-small">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" ><?php echo $descripcion ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion propiedada</legend>

                <label for="habitaciones">Habitacione</label>
                <input 
                type="number" 
                id="habitaciones" 
                name="habitaciones" 
                placeholder="Ej: 3" 
                min="1" max="9" 
                value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños</label>
                <input 
                type="number" 
                id="wc" 
                name="wc" 
                placeholder="Ej: 3" 
                min="1" max="9" 
                value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input 
                type="number" 
                id="estacionamiento" 
                name="estacionamiento" 
                placeholder="Ej: 3" 
                min="1" max="9" 
                value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                
                <select name="vendedores_id">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellidos']; ?></option>
                        <?php endwhile; ?>
                </select>
            </fieldset>
</select>


            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>
    </main>
<?php
incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>