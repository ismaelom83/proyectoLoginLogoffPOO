<?php

require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}

if (isset($_REQUEST["eliminarCuenta"])) {
    
    $codUsuario = $_SESSION['DAW209POOusuario']->getCodUsuario();
    UsuarioPDO::borrarUsuario($codUsuario);
    
  //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
} else {

    $usuario = $_SESSION["DAW209POOusuario"]->getCodUsuario();
    $descripcion = $_SESSION["DAW209POOusuario"]->getCodUsuario();
    $password = $_SESSION["DAW209POOusuario"]->getPassword();
    $vista = $vistas["borrarCuenta"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "borrarCuenta";

    require_once $vistas["layout"];
}
