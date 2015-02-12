<?php
require_once ('lib/initialize.php');
//$docente=new Docente('Ana', 'Perez', 'Rojas', '30', 'ana@hotmail.com', '2-13-23-45', NULL, 'Casa blanca 23 Los pinos', '1','1','0','me gusta superarme a diario y mejorar lo que se','1','1','2');
//$docente->guardar();
$registros = Administrador::buscar_todos();
foreach ($registros as $persona) {
    echo $persona->toString().'<br/><br/>';
}
?>

