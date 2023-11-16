<?php
    include'./includes/templates/header.php';
?>
    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamento en Ventas</h2>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3,000,000</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img  class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono_wc">
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
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa Terminados de lujo</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$2,000,000</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono_wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono"  loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono-estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono icono_dormitorio">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--.contenido-anuncio-->
            </div><!--anuncio -->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3,000,000</p>
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
        </div> <!--contenedor-anuncios-->
        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">
                Ver Todas
            </a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuetra la casa de tus sueñs</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.html" class="boton-amarillo">contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuevo Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu Casa</h4>
                        <p>Escrito el <span>20.10.2023</span> por <span>Admin</span></p>
                        <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para decoración de tu Hogar</h4>
                        <p>Escrito el <span>20.10.2023</span> por <span>Admin</span></p>
                        <p>
                        Maximiza le espacio en tu hogas con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="Testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Alexis Jiménez</p>
            </div>
        </section>
    </div>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos os Derechos Reservados 2023©</p>
    </footer>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>