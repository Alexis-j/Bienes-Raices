<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedada">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">3.000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono_wc">
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

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas sint neque molestias laboriosam iste reprehenderit excepturi odit architecto ex vitae itaque veniam, sapiente exercitationem praesentium ad eius quasi repudiandae sunt?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quibusdam autem,
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore omnis rem debitis, illo asperiores assumenda, animi nemo, neque saepe accusamus dolorem nostrum vero laboriosam doloremque temporibus voluptatum iure odio minus.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, commodi hic. Soluta voluptatibus reprehenderit, aliquam eum tempore dolore asperiores ducimus consequuntur mollitia ipsa quod minima quis porro vero delectus! Non!
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam perferendis, aliquam iusto aspernatur quisquam magni velit sunt saepe nisi ullam quae assumenda cupiditate qui, suscipit esse excepturi eveniet quod. Perferendis.</p>
        </div>
    </main>
    <?php
    incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>