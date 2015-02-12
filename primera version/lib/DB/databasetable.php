<?php

require_once (LIB_DIR . SD . 'DB' . SD . 'database.php');

/**
 * La clase generica para operaciones de tabla en base de datos
 */
class Tabla {

    protected static $nombre_tabla;
    protected static $campos_tabla;

    /**
     * Busca a un objeto por el identificador,
     * nos regresa una matriz de objetos
     */
    public static function buscar_por_id($id) {
        $matriz_objetos = static::buscar_por_sql('SELECT * FROM ' . static::$nombre_tabla . ' WHERE id = ' . $id);
        return (!empty($matriz_objetos)) ? array_shift($matriz_objetos) : false;
    }

    /**
     * Busca a todos los objetos, nos regresa una matriz de objetos
     */
    public static function buscar_todos() {
        return static::buscar_por_sql('SELECT * FROM ' . static::$nombre_tabla);
    }

    /**
     * Busca a los objetos de acuerdo a la sentencia introducida,
     * nos regresa una matriz de objetos
     */
    public static function buscar_por_sql($sql) {
        global $bd;
        $resultado = $bd->query($sql);
        $matriz_objetos = array();
        while ($registro = $bd->fetch_array_assoc($resultado)) {
            array_push($matriz_objetos, static::instanciar($registro));
        }
        $bd->free_result($resultado);
        return $matriz_objetos;
    }

    /**
     * Nos permite instanciar la clase,
     * nos regresa todos los datos publicos de una clase
     */
    public static function instanciar($registro) {
        $nombre_clase = get_called_class();
        $objeto = new $nombre_clase;
        foreach ($registro as $propiedad => $valor) {
            if ($objeto->propiedad_existe($propiedad)) {
                $objeto->$propiedad = $valor;
            }
        }
        return $objeto;
    }

    /**
     * Verifica si una propiedad existe dentro de la 
     * clase 
     * @param  [] $propiedad
     * @return Arreglo $propiedades 
     */
    public function propiedad_existe($propiedad) {
        $propiedades = get_object_vars($this);
        return array_key_exists($propiedad, $propiedades);
    }

    /**
     * Nos regresa los campos de una tabla y sus datos de ese campo
     */
    public function propiedades() {
        $campos_props = array();
        foreach (static::$campos_tabla as $campo) {
            $campos_props[$campo] = $this->$campo;
        }
        return $campos_props;
    }

    /**
     * nos ayuda a crear o actualizar los datos de un objeto,
     * nos evita la duplicacion de datos de un objeto
     */
    public function guardar() {
        if (!isset($this->id)) {
            $this->crear();
        } else {
            $this->actualizar();
        }
    }

    /**
     * nos permitira insertar un objeto en la base de datos
     */
    public function crear() {
        global $bd;
        $propiedades = $this->propiedades();
        $sql = 'INSERT INTO ' . static::$nombre_tabla . ' (';
        $sql .= implode(',', array_keys($propiedades));
        $sql .= ")VALUES ('";
        $sql .= implode("','", array_values($propiedades)) . "')";
        if ($bd->query($sql)) {
            $this->setId($bd->insert_id());
            return true;
        } else {
            return false;
        }
    }

    /**
     * nos permite actualizar los datos de un objeto
     */
    public function actualizar() {
        global $bd;
        $propiedades = $this->propiedades();
        $prop_format = array();
        foreach ($propiedades as $propiedad => $valor) {
            array_push($prop_format, "{$propiedad}='{$valor}'");
        }
        $sql = 'UPDATE ' . static::$nombre_tabla . ' SET ';
        $sql .= implode(",", $prop_format);
        $sql .= " WHERE id = " . $bd->preparar_consulta($this->getId());
        $bd->query($sql);
        if ($bd->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * nos permitira eliminar a un objeto de acuerdo al id
     * del objeto
     */
    public function eliminar() {
        global $bd;
        $sql = 'DELETE FROM ' . static::$nombre_tabla . ' ';
        $sql .= 'WHERE id = ' . $bd->preparar_consulta($this->getId());
        $sql .= ' LIMIT 1';
        $bd->query($sql);
        if ($bd->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

?>