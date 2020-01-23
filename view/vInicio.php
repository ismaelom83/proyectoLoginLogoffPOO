<div class="inicio1">
    <p> <?php echo $saludoInicial ?></p>
    <p><?php echo "Tu perfil es ".$perfil ?></p>
    <p><?php echo $accesosT ?></p>
    <p><?php echo $ultimaConexion ?></p>
    <br>
 <?php if ($perfil == "usuario") { ?>
       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
           <input type="submit" class="btn btn-danger" value="EditarPerfil" name="editarPerfil">
            <input type="submit" class="btn btn-danger" value="BorrarCuenta" name="borrarCuenta">
        </form>
    <?php } ?> 
     <?php if ($perfil == "administrador") { ?>
       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
           <input type="submit" class="btn btn-danger" value="MantenimientoUsuarios" name="mantenimientoUsuarios">
        </form>
    <?php } ?> 
</div>

