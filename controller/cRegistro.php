<?php

$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
//Inicializamos un array que se encargara de recoger los errores(Campos vacios)
$aErrores = [
    'CodUsuario' => null,
    'DescUsuario' => null,
    'password1' => null,
    'password2' => null
];
//si pulsamos el boton salir nos saca de la aplicacion
if (isset($_POST["VolverLogin"])) {
    header("Location: index.php");
    $_SESSION["pagina"] = "login"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
}
//al pulsar el boton alatausuarios intentamos meter un usuario a la base de datos.
if (isset($_POST['altaUsuarios'])) {
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['CodUsuario'], 15, 1, 1);  //maximo, mínimo y opcionalidad
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescUsuario'], 255, 1, 1); //maximo, mínimo y opcionalidad
    $aErrores['password1'] = validacionFormularios::comprobarAlfaNumerico($_POST['password1'], 64, 4, 1); //maximo, mínimo y opcionalidad
    $aErrores['password2'] = validacionFormularios::comprobarAlfaNumerico($_POST['password2'], 64, 4, 1); //maximo, mínimo y opcionalidad
    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $codUsuario = $_POST['CodUsuario'];
        $descUsuario = $_POST['DescUsuario'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];
        if ($password === $password2) {
            $password = hash('sha256', $_POST['CodUsuario'] . $_POST['password1']); //Guardar la contraseña ya resumida
            if (UsuarioPDO::validarCodNoExiste($codUsuario)) { //Si el codigo ya está en uso, muestra un mensaje de error
                $aErrores['CodUsuario'] = "duplicado de clave primaria";
                $vista = $vistas["registro"];
                $_SESSION['pagina'] = "registro";
                require_once $vistas["layout"];
            } else {
                $objetoUsuario = UsuarioPDO::altaUsuario($codUsuario, $descUsuario, $password); //Comprobar que el usuario existe en la base de datos
                $_SESSION["DAW209POOusuario"] = $objetoUsuario;
                $_SESSION['pagina'] = "inicio";
                header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
                exit;
            }
        } else {
            $aErrores['password2'] = "Las contraseñas no coinciden";
            $vista = $vistas["registro"];
            $_SESSION['pagina'] = "registro";
            require_once $vistas["layout"];
        }
    }else{
        $vista = $vistas["registro"];
    $_SESSION['pagina'] = "registro";
    require_once $vistas["layout"];
    }
} else {

    $vista = $vistas["registro"];
    $_SESSION['pagina'] = "registro";
    require_once $vistas["layout"];
}

       
        
