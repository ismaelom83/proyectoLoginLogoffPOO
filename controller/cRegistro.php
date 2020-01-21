<?php
    $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
    //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    $aErrores = [
        'CodUsuario' => null,
        'DescUsuario' => null,
        'password1' => null,
        'password2' => null
    ];
    if (isset($_POST['altaUsuario'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['CodUsuario'], 15, 1, 1);  //maximo, mínimo y opcionalidad
        $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescUsuario'], 255, 1, 1); //maximo, mínimo y opcionalidad
        $aErrores['password1'] = validacionFormularios::comprobarAlfaNumerico($_POST['password1'], 64, 4, 1); //maximo, mínimo y opcionalidad
        $aErrores['password2'] = validacionFormularios::comprobarAlfaNumerico($_POST['password2'], 64, 4, 1); //maximo, mínimo y opcionalidad

        //Autenticación con la base de datos
        if ($entradaOK) {
            $codUsuario = $_POST['CodUsuario'];
            $descUsuario = $_POST['DescUsuario'];
            $password = hash('sha256', $_POST['CodUsuario'] . $_POST['password1']); //Guardar la contraseña ya resumida
            if(UsuarioPDO::validarCodNoExiste($codUsuario)){ //Si el codigo ya está en uso, muestra un mensaje de error
                $aErrores['CodUsuario'] = "El usuario ya existe";
            }else{
                $objetoUsuario = UsuarioPDO::altaUsuario($codUsuario, $descUsuario, $password); //Comprobar que el usuario existe en la base de datos

                $_SESSION["DAW209POOusuario"] = $objetoUsuario;
                $_SESSION['pagina'] = $controladores['inicio'];
//                $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
                header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
                exit;
            }
        }    
    }
$vista = $vistas["registro"]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['pagina'] = "registro"; //Sirve para la cabecera
//$_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
require_once $vistas["layout"]; //muesto el layout con el login cómo base
        
        
