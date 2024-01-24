<?php

namespace App;

class Propiedad {
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

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';  // Si no hay id, entonces es null.
        $this->titulo = $args['titulo'] ?? '';  // Si no hay titulo, entonces es un string vacio.
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public  function guardar(){
        echo "Guardando en la base de datos";
    }
}