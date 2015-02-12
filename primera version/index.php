<?php
require_once ('lib/initialize.php');
$alumno=new Alumno('Rocio', 'Bravo', 'Rojas', '21', 'rocio@hotmail.com', '2-13-11-25', NULL, 'Amozoc de mota', '1','2');
$alumno->guardar();
//$alumno = Alumno::buscar_por_id('19');
//$alumno->eliminar();
$registros = Alumno::buscar_todos();
foreach ($registros as $persona) {
    echo $persona->getId().'<br/>'.$persona->toString().'<br/><br/>';
}
?>

