<?php

    $resultado = $_GET['resultado'] ?? null;

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

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa de lujo en el lago</td>	
                    <td> <img src="/imagenes/cec496e0b7cd99a413b5604fd23369d1.jpg" alt="imagen-tabla"></td>
                    <td>$120000</td>
                    <td>
                        <a href="">eliminar</a>
                        <a href="">actualizar</a>	
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
<?php
incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>