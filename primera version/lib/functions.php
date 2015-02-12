<?php

/**
 * funcion que nos permite redireccionarnos a la url introducida
 */
function redireccionar($url) {
    header('Location: ' . $url . ' ');
    exit();
}

/**
 * sobreescribimos la funcion autoload
 */
function __autoload($nombre_clase) {
    die('La clase ' . $nombre_clase . ' no ha sido encontrada.');
}
/**
 * esta funcion nos permite incluir las plantillas de nuestro
 * proyecto
 */
function incluir_plantillas($plantilla) {
    include (RAIZ_DIR . SD . 'layouts' . SD . $plantilla);
}

?>