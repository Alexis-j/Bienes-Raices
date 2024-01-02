<?php
    require 'includes/config/datbase.php';
    $db = conectarDB();


    //autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "El email es obligatorio o no es valido";
        }
        if(!$password) {
            $errores[] = "El password es obligatorio";
        }
        if(empty($errores)) {
            
        }

    }
    //incluye el header
    require 'includes/funciones.php';

    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>  
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="login.php">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Tu Email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Tu Password" required>
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

    </main>
    <?php
    incluirTemplate('footer');
?>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>