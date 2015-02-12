<?php

require_once(LIB_DIR . SD . 'DB' . SD . 'database.php');

/**
 * Clase persona
 */
class Persona extends Tabla {

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
    public $numero_hijos;
    public $razon;
    public $estado_civil_id;
    public $puesto_id;
    public $grado_estudio_id;
    protected static $nombre_tabla = 'persona';
    protected static $campos_tabla = array('nombre', 'apellido_paterno', 'apellido_materno', 'edad', 'correo', 'telefono', 'celular', 'direccion', 'carrera_id', 'tipo_id', 'numero_hijos', 'razon', 'estado_civil_id', 'puesto_id', 'grado_estudio_id');

    function __construct($nombre='', $apellido_paterno='', $apellido_materno='', $edad='', $correo='', $telefono='', $celular='', $direccion='', $carrera_id='', $tipo_id='', $numero_hijos='', $razon='', $estado_civil_id='', $puesto_id='', $grado_estudio_id='') {
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
        $this->numero_hijos = $numero_hijos;
        $this->razon = $razon;
        $this->estado_civil_id = $estado_civil_id;
        $this->puesto_id = $puesto_id;
        $this->grado_estudio_id = $grado_estudio_id;
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
        $datos .= 'Numero de hijos: '.$this->numero_hijos.'<br/>';
        $datos .= 'Razon para ser el mejor candidato: '.$this->razon.'<br/>';
        $datos .= 'Estado civil id: '.$this->estado_civil_id.'<br/>';
        $datos .= 'Puesto id: '.$this->puesto_id.'<br/>';
        $datos .= 'Grado de estudios terminados: '.$this->grado_estudio_id.'<br/>';
        return $datos;
    }
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

?>