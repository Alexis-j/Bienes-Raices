<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <section class="seccion contenedor">
            <h2>Casas y Departamento en Ventas</h2>
            <?php   
            $limite = 12;
            include 'includes/templates/anuncios.php'
            ?>
            <div class="alinear-derecha">
                <a href="anuncio.php" class="boton-verde">
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