<?php

require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';

if(isset($_POST["borrarCuenta"])){
   //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    header('Location: index.html'); //nos redirige al login
    die();//con die() terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.   
}