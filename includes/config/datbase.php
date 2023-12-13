<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'llaves', 'bienesraices_crud');

    if(!$db) {
        // Muestra información detallada sobre el error en la conexión
        echo "Error en la conexión: " . mysqli_connect_error();
        exit;
    }

    return $db;
}
