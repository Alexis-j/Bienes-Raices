<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'llaves', 'bienesraices_crud');

    if(!$db) {
        echo "no se pudo conectar";
        exit;
    }

    return $db;
}
