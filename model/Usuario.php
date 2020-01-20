<?php
/**
 * Class Usuario
 *
 * Clase para definir un objeto de la clase usuario
 *
 * Clase que con los atributos igual que el modelo fisico de datos nos permite crear 
 * un objeto de la clase Usuario para utilizarlo con nuestra sesion.
 * 
 * PHP version 7.3
 *
 * @category instanciacion
 * @package  LoginLogoffMulticapaMVC
 * @source Usuario.php
 * @since 1.0
 * @copyright 15-01-2020
 * @author  Ismael Heras Salvador
 * 
 * 
 */
 
class Usuario{
    /**
     *
     * @var type string 
     *  @var type string 
     *  @var type integer
     *  @var type string 
     *  @var type integer
     * access private
     */
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;
    
    /**

     * 
     * @param type $codUsuario el codigo del usuario 
     * @param type $descUsuario la descripcion del usuario
     * @param type $password la contraseña pdel usuario
     * @param type $perfil el perfil del usuario puede ser(usuario o administrador)
     * @param type $ultimaConexion nos indica la fecha de la ultima conexion
     * @param type $contadorAccesos  nos devuelve el numero de veces que se ha conectado a la base de datos    /
     */
    
    function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos) {
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->ultimaConexion = $ultimaConexion;
        $this->contadorAccesos = $contadorAccesos;
    }
    
    /**
     * Getter para mostrar el atributo
     * 
     * @return type/ el codigo del usuario
     */
    
    function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Getter para mostrar el atributo
     * 
     * @return type/ descripcion del usuario
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }
/**
 * Getter para mostrar el atributo
 * 
 * @return type/ password del usuario
 */
    function getPassword() {
        return $this->password;
    }
/**
 * Getter para mostrar el atributo
 *  
 * @return type / perfil del usuario
 */
    function getPerfil() {
        return $this->perfil;
    }

    /**
     * Getter para mostrar el atributo
     * 
     * @return type la ultima conexion del usuario
     */
    function getUltimaConexion() {
        return $this->ultimaConexion;
    }
    /**
     * 
     * Getter para mostrar el atributo
     * 
     * @return type el numero de veces que ha accedido a la base de datos
     */

    function getContadorAccesos() {
        return $this->contadorAccesos;
    }

    /**
     * Setter para modificar el atributo
     * 
     * @param type $codUsuario el codigo del usuario
     */
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     * Setter para modificar el atributo
     * 
     * @param type $descUsuario sescripcion del usuario
     */
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /**
     * Setter para modificar el atributo
     * 
     * @param type $password password del usuario
     */
    function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Setter para modificar el atributo
     * 
     * @param type $perfil perfil del usuario
     */ 
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
/**
 * Setter para modificar el atributo
 * 
 * @param type $ultimaConexion ultima conexion a la base de datos
 */
    function setUltimaConexion($ultimaConexion) {
        $this->ultimaConexion = $ultimaConexion;
    }
/**
 * Setter para modificar el atributo
 * 
 * @param type $contadorAccesos cuenta los accesos a la base de datos
 */
    function setContadorAccesos($contadorAccesos) {
        $this->contadorAccesos = $contadorAccesos;
    }
}
