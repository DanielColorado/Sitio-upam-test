<?php

//constante de separador de directorio
defined('SD') ? NULL : define('SD', DIRECTORY_SEPARATOR);
//constante que nos indica la direccion de la carpeta raiz de nuestro proyecto
defined('RAIZ_DIR') ? NULL : define('RAIZ_DIR', 'C:' . SD . 'xampp' . SD . 'htdocs' . SD . 'upam2014.bugs3'); //cambiar para servidor remoto
//defined('RAIZ_DIR') ? NULL : define('RAIZ_DIR', SD.'home'.SD.'u444596555'.SD.'public_html');//direccion del servidor remoto
//constante de las librerias de nuestro proyecto
defined('LIB_DIR') ? NULL : define('LIB_DIR', RAIZ_DIR . SD . 'lib');

require_once(LIB_DIR . SD . 'DB' . SD . 'config.php');
require_once(LIB_DIR . SD . 'functions.php');
require_once(LIB_DIR . SD . 'DB' . SD . 'database.php');
require_once(LIB_DIR . SD . 'DB' . SD . 'databasetable.php');
//Librerias para usuarios
require_once(LIB_DIR . SD . 'clases' . SD . 'usuarios' . SD . 'person.php');
require_once(LIB_DIR . SD . 'clases' . SD . 'usuarios' . SD . 'admin.php');
require_once(LIB_DIR . SD . 'clases' . SD . 'usuarios' . SD . 'docente.php');
require_once(LIB_DIR . SD . 'clases' . SD . 'usuarios' . SD . 'alumno.php');
//Librerias para cuestionarios
require_once(LIB_DIR . SD . 'clases' . SD . 'cuestionarios' . SD . 'cuestionario.php');
?>