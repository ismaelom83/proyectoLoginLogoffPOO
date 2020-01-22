<div class="inicio1">
    <p> <?php echo $saludoInicial ?></p>
    <p><?php echo "Tu perfil es ".$perfil ?></p>
    <p><?php echo $accesosT ?></p>
    <p><?php echo $ultimaConexion ?></p>
    <br>

</div>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
           <input type="submit" class="btn btn-danger" value="EditarPerfil" name="editarPerfil">
            <input type="submit" class="btn btn-danger" value="BorrarCuent" name="cerrarSesion">
        </form>