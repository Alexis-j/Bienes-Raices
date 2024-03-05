<?php
namespace App;

class Propiedad {

    // Base de datos
    protected static $db; 
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id']; // Aquí se corrigió el nombre de la columna


    // Errores
    protected static $errores = [];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;


    public static function setDB($database){
        self::$db = $database;
    }

    // Constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id= $args['vendedores_id'] ?? '1'; 
    }

    public function guardar(){
        if(isset($this->id)){
            $resultado = $this->actualizar();
        } else {
            $resultado = $this->crear();
        } 

    }

    // Almacenar la nueva propiedad
    public function crear(){
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        
        $resultado = self::$db->query($query);
        
        return $resultado;   
}
    public function actualizar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        // Insertar en la base de datos
        $query = " UPDATE propiedades SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        
        // Redireccionar al usuario
        if ($resultado) {
            header('location: /admin/index.php?mensaje=2');
        }
    }

    //identificar y unir los atributos de la clase con los valores de la base de datos
    public function atributos(){
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //sanitizar los Atributos
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }


    //subida de archivos
    public function setImagen($imagen){

        // Eliminar la imagen previa
        if (isset($this->id)) {
            //comprobar si la imagen existe
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
        //asifgnar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Valdacion
    public static function getErrores(){
        return self::$errores;
    }


    public function validar() {

        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un Titulo';
        }
        if (!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La Descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        if (!$this->habitaciones) {
            self::$errores[] = 'La Cantidad de Habitaciones es obligatoria';
        }
        if (!$this->wc) {
            self::$errores[] = 'La cantidad de WC es obligatoria';
        }
        if (!$this->estacionamiento) {
            self::$errores[] = 'La cantidad de lugares de estacionamiento es obligatoria';
        }
        if (!$this->vendedores_id) {
            self::$errores[] = 'Elige un vendedor';
        }
        if (!$this->imagen) {
            self::$errores[] = 'La Imagen es obligatoria';
        }
        
        return self::$errores;
    }

    //lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM propiedades";
        
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //encuentra una propiedad por su id
    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE id = ${id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }
    public static function consultarSQL($query){
        // consultar la base de datos
        $resultado = self::$db->query($query);

        // iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc() ){
            $array[] = self::crearObjeto($registro);
        }
        // liberar la memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key =>  $value){
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        
        return $objeto;
    }

    //sincrioniza el objeto en memoria con los datos de la base de datos

    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
?>
