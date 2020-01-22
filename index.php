<?php

/**
 * requerimos los ficheros de configuarion
 */
require_once './config/confAplicacion.php';
require_once './config/confDB.php';

//iniciamos sesion o la continuamos
session_start();


//si la sesion a sido iniciada entra en el index
if (isset($_SESSION['DAW209POOusuario'])) {
//y si la pagina es igual a inicio carga el controlador de inicio
    if ($_SESSION["pagina"] == "inicio") {
        include_once $controladores["inicio"];
    }
} else if (isset($_SESSION["pagina"]) && $_SESSION["pagina"] == "registro") {
    include_once $controladores["registro"];
} else {
    $vista = $vistas["login"];
    include_once $controladores["login"];
}