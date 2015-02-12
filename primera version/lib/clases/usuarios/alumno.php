<?php
require_once(LIB_DIR . SD . 'DB' . SD . 'database.php');

class Alumno extends Administrador {

    public function __construct($nombre = '', $apellido_paterno = '', $apellido_materno = '', $edad = '', $correo = '', $telefono = '', $celular = '', $direccion = '', $carrera_id = '', $tipo_id = '') {
        parent::__construct($nombre, $apellido_paterno, $apellido_materno, $edad, $correo, $telefono, $celular, $direccion, $carrera_id, $tipo_id);
    }
    /**
     * Busca a todos los objetos, nos regresa una matriz de objetos
     */
    public static function buscar_todos() {
        return static::buscar_por_sql('SELECT * FROM persona WHERE tipo_id = 2');
    }

}
?>

