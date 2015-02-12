<?php
require_once(LIB_DIR.SD.'DB'.SD.'config.php');
/**
* clase de base de datos para MySql
*/
class MySqlBD
{
	private $con;
	private $ultima_consulta;
	private $mq_activado;
	private $mysqli_rescstr;
	private $mysql_rescstr;

	function __construct()
	{
		$this->abrir_conexion();
		$this->mq_activado    = get_magic_quotes_gpc();
		$this->mysqli_rescstr = function_exists("mysqli_real_escape_string");
		$this->mysql_rescstr  = function_exists("mysql_real_escape_string");
	}
	/**
	*Función que realiza la conexion con el servidor y la base de datos.
	*/
	public function abrir_conexion(){
		$this->con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
		if (!$this->con) {
			die('No hemos podido conectarnos a la base de datos: '.$this->error());
		}
	}
	/**
	*Función que realiza el cierre de la conexion a la base de datos 
	*/
	public function cerrar_conexion(){
		if (isset($this->con)) {
			mysqli_close($this->con);
			unset($this->con);
		}
	}
	/**
	 * Esta clase nos permite ver los errores cometidos
	 * @return error que hubo en Mysql
	 */
	public function error(){
		return mysqli_error($this->con);
	}
	/**
	*Función que nos permite ejecutar un query.
	*Para consultas como SELECT, SHOW, DESCRIBE, o EXPLAIN nos regresa un objeto mysqli_result y para otro tipo de 
	*consultas nos regresa TRUE en caso de exito o FALSE en caso de algun fallo. 
	*/
	public function query($query){
		$this->ultima_consulta = $query;
		$resultado             = mysqli_query($this->con,$query);
		$this->verificar_consulta($resultado);
		return $resultado;
	}
	/**
	 * Verifica si una consulta se ejecuto correctamente o no, en caso
	 * de no haberse ejecutado nos muestra el error que ocurrio y la 
	 * consulta que fallo
	 * @param  query $consulta 
	 */
	private function verificar_consulta($consulta){
		if(!$consulta){
			$salida = "No se ha podido realizar la consulta: ".$this->error().'<br/>';
			$salida .= 'Ultima consulta SQL: '.$this->ultima_consulta;
			die($salida);
		}
	}
	/**
	 * Escapa caracteres especiales de una cadena para su uso en una sentencia SQL.
	 * @param  cadena $consulta
	 * @return cadena $consulta
	 */
	public function preparar_consulta($consulta){
		if ($this->mysql_rescstr || $this->mysqli_rescstr) {
			if ($this->mq_activado) {
				$consulta =stripslashes($consulta);
			}
		}
		if ($this->mysqli_rescstr) {
			$consulta = mysqli_real_escape_string($this->con, $consulta);
		}else{
			if ($this->mysql_rescstr) {
				$consulta = mysql_real_escape_string($consulta);
			}else{
				if (!$this->mq_activado) {
					$consulta =addslashes($consulta);
				}
			}
		}
		return $consulta;
	}
	/**
	*Devuelve una matriz de cadenas que corresponde a la fila recuperada. 
	*NULL si no hay más filas en conjunto de resultados.
	*/
	public function fetch_array_assoc($consulta){
		return mysqli_fetch_array($consulta,MYSQLI_ASSOC);
	}
	/**
	*Devuelve una matriz de cadenas que corresponde a la fila recuperada. 
	*NULL si no hay más filas en conjunto de resultados.
	*/
	public function fetch_array_num($consulta){
		return mysqli_fetch_array($consulta,MYSQLI_NUM);
	}
	/**
	 * Devuelve el numero de filas afectadas en la previa consulta
	 * del tipo SELECT, INSERT, UPDATE, REPLACE, o DELETE
	 */
	public function affected_rows(){
		return mysqli_affected_rows($this->con);
	}
	/**
	*Devuelve el ultimo id insertado
	*/
	public function insert_id(){
		return mysqli_insert_id($this->con);
	}
	/**
	 * Funcion que devuelve el numero de filas del query insertado
	 */
	public function num_rows($consulta){
		return mysqli_num_rows($consulta);
	}
	/**
	 * Libera la memoria asociada con el resultado
	 */
	public function free_result($resultado){
		mysqli_free_result($resultado);
	}
}
$bd = new MySqlBD();
?>