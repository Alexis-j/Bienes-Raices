<?php
define('FUNCIONES_URL', __DIR__ . "funciones.php");
define('TEMPLATES_URL', __DIR__ . "/templates");


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() : bool {
    session_start();
    
    $auth = $_SESSION['login'];
    if($auth) {
        return true;
    }

    return false;
}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}