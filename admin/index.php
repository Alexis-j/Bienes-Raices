<?php


    //importa la la conexion
    require '../includes/config/datbase.php';
    $db = conectarDB();
    //escribir el Query
    $query = "SELECT * FROM propiedades";

    //consultar la base de datos
    $resultadoConsulta = mysqli_query($db, $query);


    //muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    //incluye templates
    require '../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>

        <?php endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!--. mostrar los resultados-->
            <?php  while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>	
                    <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen-tabla" class="imagen-tabla"></td>
                    <td><?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a href="#" class="boton-rojo-block">eliminar</a>
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];  ?>" class="boton-amarillo-block">actualizar</a>	
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
<?php

// cerrar la conexion
mysqli_close($db);

incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>