<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if	(!$id) {
        header('Location: /bienesraices/admin/index.php');
    }
    
    //importa la la conexion  
    require 'includes/config/datbase.php';
    $db = conectarDB();
    //consultar la base de datos
    $query = "SELECT * FROM propiedades WHERE id = $id";

    //obtener los resultados
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>



    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono_wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono-estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono icono_dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p>
            <?php echo $propiedad['descripcion']; ?>
            </p>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>
    <?php
    mysqli_close($db);

    incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>