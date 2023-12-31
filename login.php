<?php
    require 'includes/config/datbase.php';
    $db = conectarDB();


    //autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "El email es obligatorio o no es valido";
        }
        if(!$password) {
            $errores[] = "El password es obligatorio";
        }
        if(empty($errores)) {
            // revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);

            
            if( $resultado->num_rows){
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //el usuario esta autenticado
                    session_start();

                    //llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /bienesraices/admin/index.php');
                }
            }else {
                $errores[] = "El password es incorrecto";
            }
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