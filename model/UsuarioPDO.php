<?php

/**
 * Class UsuarioPDO
 *
 * Clase que ejecutas las consultas
 *
 * Clase que ejecuta todas las consultas de la basee de datos 
 * 
 * PHP version 7.3
 *
 * @package  LoginLogoffMulticapaMVC
 * @source UsuarioPDO.php
 * @since 1.0
 * @copyright 15-01-2020
 * @author  Ismael Heras Salvador.
 * 
 * 
 */
include 'DBPDO.php';
require_once 'Usuario.php';
class UsuarioPDO {

    /**
     * funcion que valida usuarios y pide a la clase DBPDO el metodo ejecutarConsultas
     * 
     * @param type $codUsuario el codigo del usuario que recivimos en el formulario
     * @param type $password la contraseña del usuario que recivimos por el formulario
     * @return type devuelve un array con toos los valores de la base de datos del usuario
     */
    public static function validarUsuario($codUsuario, $password) {

        //creamos una consulta para saber el codigo del usuario y la contraseña
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=?";
        //pedimos el metodo ejecutar consulta y la ejecutamos
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]);

         
        
        //Si ahya algun resultado alamacenamos en el array todos los resultados.
        if ($resConsulta->rowCount() == 1) {
       $usuario =$resConsulta->fetchObject();
       $obUsuario = new Usuario($usuario->T01_CodUsuario,$usuario->T01_DescUsuario,$usuario->T01_Password,$usuario->T01_Perfil,$usuario->T01_FechaHoraUltimaConexion,$usuario->T01_NumAccesos);
       return $obUsuario;
        }else{
            return false;
        }
      
    }
    
    /**
     * funcion que aumenta en un valor cada vez que nos logeamos con ese usuario
     * 
     * @param type $codUsuario
     */
    
    public static function contadorVisitas($codUsuario) {
        //update a la base de datos para amuntar el numero de visitas
            $consulta = "UPDATE T01_Usuarios SET T01_NumAccesos=T01_NumAccesos+1, T01_FechaHoraUltimaConexion=now() WHERE T01_CodUsuario=?";
            DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
    }

}

