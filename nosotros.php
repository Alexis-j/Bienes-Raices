<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros2.jpg" alt="imagen sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, inventore. Asperiores expedita illum ab sapiente a repellendus minus debitis eum, maxime cum quo excepturi doloribus suscipit ea obcaecati ducimus rerum!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum quod culpa ipsam non velit beatae veniam alias harum enim commodi. Amet iure est similique molestias quibusdam excepturi dignissimos, ad numquam.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates obcaecati modi placeat laborum esse dicta perferendis quos dolore earum ex nostrum atque iure qui, nihil excepturi cum necessitatibus quia! Ut?
                </p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas eos dolore blanditiis quibusdam repellat at rerum. Earum nihil quaerat voluptas est reiciendis, eaque doloribus neque placeat recusandae commodi, fugit dolore.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quibusdam autem, 
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más  Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas sint neque molestias laboriosam iste reprehenderit excepturi odit architecto ex vitae itaque veniam, sapiente exercitationem praesentium ad eius quasi repudiandae sunt?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas sint neque molestias laboriosam iste reprehenderit excepturi odit architecto ex vitae itaque veniam, sapiente exercitationem praesentium ad eius quasi repudiandae sunt?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono seguridad" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas sint neque molestias laboriosam iste reprehenderit excepturi odit architecto ex vitae itaque veniam, sapiente exercitationem praesentium ad eius quasi repudiandae sunt?</p>
            </div>
        </div>
    </section>
    <?php
    incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>