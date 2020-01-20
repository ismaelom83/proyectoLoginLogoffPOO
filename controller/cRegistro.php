<?php
    $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
    //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    $aErrores = [
        'name' => null,
        'desc' => null,
        'pass' => null,
        'pass2' => null
    ];
    if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['name'] = validacionFormularios::comprobarAlfaNumerico($_POST['name'], 15, 1, 1);  //maximo, mínimo y opcionalidad
        $aErrores['desc'] = validacionFormularios::comprobarAlfaNumerico($_POST['desc'], 255, 1, 1); //maximo, mínimo y opcionalidad
        $aErrores['pass'] = validacionFormularios::comprobarAlfaNumerico($_POST['pass'], 64, 4, 1); //maximo, mínimo y opcionalidad
        $aErrores['pass2'] = validacionFormularios::comprobarAlfaNumerico($_POST['pass2'], 64, 4, 1); //maximo, mínimo y opcionalidad

        //Autenticación con la base de datos
        if ($entradaOK) {
            $codUsuario = $_POST['name'];
            $descUsuario = $_POST['desc'];
            $password = hash('sha256', $_POST['name'] . $_POST['pass']); //Guardar la contraseña ya resumida
            if(UsuarioPDO::existeUsuario($codUsuario)){ //Si el codigo ya está en uso, muestra un mensaje de error
                $aErrores['name'] = "El usuario ya existe";
            }else{
                $objetoUsuario = UsuarioPDO::crearUsuario($codUsuario, $descUsuario, $password); //Comprobar que el usuario existe en la base de datos

                $_SESSION['DAW215LoginLogoutPOO'] = $objetoUsuario;
                $_SESSION['DAW215LLPagina'] = $controladores['inicio'];
                header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
                exit;
            }
        }    
    }
$vista = $vistas["registro"]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = "Registro"; //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base
