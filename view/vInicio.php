

<p> <?php echo $descripcion ?> Bienvenido a la aplicacion LOginLogoffMulticapaPOO</p>
<p>Tu perfil es (<?php echo $perfil?>)</p>
<p><?php echo $accesosT?></p>
<p><?php echo $ultimaConexion?></p>
<br>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?pagina=inicio" method="post">
    <input type="submit" class="btn btn-danger" value="Cerrar Sesion" name="salir">
</form>


