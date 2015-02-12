<?php

require_once(LIB_DIR . SD . 'DB' . SD . 'database.php');

/**
 * Clase persona
 */
class Administrador extends Tabla {

    public $id; 
    public $nombre; 
    public $apellido_paterno;
    public $apellido_materno;
    public $edad;
    public $correo;
    public $telefono;
    public $celular;
    public $direccion;
    public $carrera_id;
    public $tipo_id;
    protected static $nombre_tabla = 'persona';
    protected static $campos_tabla = array('nombre', 'apellido_paterno', 'apellido_materno', 'edad', 'correo', 'telefono', 'celular', 'direccion', 'carrera_id', 'tipo_id');

    function __construct($nombre='', $apellido_paterno='', $apellido_materno='', $edad='', $correo='', $telefono='', $celular='', $direccion='', $carrera_id='', $tipo_id='') {
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->edad = $edad;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->carrera_id = $carrera_id;
        $this->tipo_id = $tipo_id;
    }
    function toString() {
        $datos = 'Nombre Completo: '.$this->nombre.' '.$this->apellido_paterno.' '.$this->apellido_materno.'<br/>';
        $datos .= 'Edad: '.$this->edad.'<br/>';
        $datos .= 'Correo: '.$this->correo.'<br/>';
        $datos .= 'Telefono: '.$this->telefono.'<br/>';
        $datos .= 'Celular: '.$this->celular.'<br/>';
        $datos .= 'Dirección: '.$this->direccion.'<br/>';
        $datos .= 'Carrera id: '.$this->carrera_id.'<br/>';
        $datos .= '<strong>Tipo id: '.$this->tipo_id.'</strong><br/>';
        return $datos;
    }
    /**
     * Busca a todos los objetos, nos regresa una matriz de objetos
     */
    public static function buscar_todos() {
        return static::buscar_por_sql('SELECT * FROM persona WHERE tipo_id = 3');
    }
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

?>