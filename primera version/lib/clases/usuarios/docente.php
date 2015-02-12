<?php

require_once(LIB_DIR . SD . 'DB' . SD . 'database.php');

class Docente extends Persona {

    /**
     * Constructor principal de la clase docente
     * @param type $nombre
     * @param type $apellido_paterno
     * @param type $apellido_materno
     * @param type $edad
     * @param type $correo
     * @param type $telefono
     * @param type $celular
     * @param type $direccion
     * @param type $carrera_id
     * @param type $tipo_id
     * @param type $numero_hijos
     * @param type $razon
     * @param type $estado_civil_id
     * @param type $puesto_id
     * @param type $grado_estudio_id
     */
    public function __construct($nombre = '', $apellido_paterno = '', $apellido_materno = '', $edad = '', $correo = '', $telefono = '', $celular = '', $direccion = '', $carrera_id = '', $tipo_id = '', $numero_hijos = '', $razon = '', $estado_civil_id = '', $puesto_id = '', $grado_estudio_id = '') {
        parent::__construct($nombre, $apellido_paterno, $apellido_materno, $edad, $correo, $telefono, $celular, $direccion, $carrera_id, $tipo_id, $numero_hijos, $razon, $estado_civil_id, $puesto_id, $grado_estudio_id);
    }

    /**
     * Busca a todos los objetos, nos regresa una matriz de objetos
     */
    public static function buscar_todos() {
        return static::buscar_por_sql('SELECT * FROM persona WHERE tipo_id = 1');
    }

}

?>
