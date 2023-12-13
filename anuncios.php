<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <section class="seccion contenedor">
            <h2>Casas y Departamento en Ventas</h2>
            <?php 
                include 'includes/templates/anunciado.php'
            ?>
            <div class="alinear-derecha">
                <a href="anuncio.html" class="boton-verde">
                    Ver Todas
                </a>
            </div>
        </section>
    </main>
    <?php
    incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>