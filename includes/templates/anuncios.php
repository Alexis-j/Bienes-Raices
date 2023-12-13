<?php  
    //importar la conexion
    require __DIR__ . '/../config/datbase.php';
    $db = conectarDB();
    //consultar la base de datos
    $query = "SELECT * FROM propiedades LIMIT $limite";

    //obtener los resultados
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <div class="anuncio">
                
                    <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio"><?php echo $propiedad['precio']; ?>"</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono"  loading="lazy" src="build/img/icono_wc.svg" alt="Icono_wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono-estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono icono_dormitorio">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--.contenido-anuncio-->
            </div><!--anuncio -->
    <?php endwhile; ?>
</div> <!--contenedor-anuncios-->

        <?php 
            //cerrar la conexion
        ?>