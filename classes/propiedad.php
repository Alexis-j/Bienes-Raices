<?php

namespace App;

class Propiedad {

    // Base de datos
    protected static $db; 
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;


    public static function setDB($database){
        self::$db = $database;
    }

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';  // Si no hay id, entonces es null.
        $this->titulo = $args['titulo'] ?? '';  // Si no hay titulo, entonces es un string vacio.
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';    }

    public function guardar(){

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) 
        VALUES ('$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->creado', '$this->vendedorId')";
        
        $resultado = self::$db->query($query);

        debuguear($resultado);
    }


    public function Atributos(){
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
    $atributos = $this->Atributos();
    $sanitizado = [];

    foreach ($atributos as $key => $value) {
        $sanitizado[$key] = self::$db->escape_string($value);
    }

    return $sanitizado;
    }
}




