<?php
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//variable para controlar el formulario
$entradaOK = true;
//Array de los errores
$aErrores = [];
//si pulsamos el boton salir nos saca de la aplicacion
if (isset($_POST["salir"])) {
    header("Location: ../DWES.php");
}
//si pulsamos el votor enviar del formulario nos ejecuta el programa y comprueba si se valida al usuario o no
if (isset($_POST["enviar"])) {
    $aErrores["codUsuario"] = validacionFormularios::comprobarAlfaNumerico($_POST["usuario"], 250, 1, 1);
    $aErrores["password"] = validacionFormularios::comprobarAlfaNumerico($_POST["password"], 255, 4, 1);
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaOK = false;
        }
    }
    //si la entrada  es correcta entramos en el if
    if ($entradaOK) {
        //almacenamos en una variable el usuario tecleado en el formulario
        $codUsuario = $_POST["usuario"];
        //alamacenamos en una variable el hash y la contraseña del usuario
        $password = hash("SHA256", $codUsuario . $_POST["password"]);
        //alamacenamos en una variable el valor dde la consulta validar usuario
        $obUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        //si exise a creado el objeto validamos al usuario y nos redirigimos al login.
        if (!is_null($obUsuario)) {
            //asignamos la sesion del usuario a el objeto de la clase UsuarioPDO validado
            $_SESSION["DAW209POOusuario"] = $obUsuario;      
             //llamamos a la funcion registarUltimaConexion para que nos añada una vistita en la base de datos en el usuario logeado.
             UsuarioPDO::registarUltimaConexion($codUsuario);
             //y por ultimo nos dirigimos al index.
            header("Location: index.php");
                                          
            /**
             * si no  existe el usuario nos direcciona al login
             */
            $vista = $vistas["login"];
            require_once $vistas["layout"];
        }
    } else {
        /**
         * si no  existe el usuario nos direcciona al login
         */
        $vista = $vistas["login"];
        require_once $vistas["layout"];
    }
} else {
    /**
     * si no  existe el usuario nos direcciona al login
     */
    $vista = $vistas["login"];
    require_once $vistas["layout"];
}
