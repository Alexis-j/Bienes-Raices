<?php

require 'funciones.php';
require 'config/datbase.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectar a la base de datos
$db = conectarDb();

use App\Propiedad;

Propiedad::setDB($db);

