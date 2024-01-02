<?php

// importa la la conexion
require 'includes/config/datbase.php';
$db = conectarDB();

//crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash') ";

// echo $query;

// agregar a la base de datos
mysqli_query($db, $query);
