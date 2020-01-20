<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="name">Nombre del usuario: </label>
            <input type="text" id="name" name="name" placeholder="Usuario" width="10" height="20" value="<?php if ($aErrores['name'] == NULL && isset($_POST['name'])) {
    echo $_POST['name'];
} ?>"><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="desc">Descripción del usuario: </label>
            <input type="text" id="desc" name="desc" placeholder="Descripción" width="10" height="20" value="<?php if ($aErrores['desc'] == NULL && isset($_POST['desc'])) {
    echo $_POST['desc'];
} ?>"><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="pass">Contraseña: </label> 
            <input type="password" id="pass" name="pass" placeholder="Contraseña" value="<?php if ($aErrores['pass'] == NULL && isset($_POST['pass'])) {
    echo $_POST['pass'];
} ?>"><br>      
        </div>
        <br/>
        <div class="obligatorio">
            <label for="pass2">Repita la contraseña: </label> 
            <input type="password" id="pass2" name="pass2" placeholder="Contraseña"><br>        
        </div>
        <br/>
        <div>
            <input type="submit" name="enviar" value="Registrarse">
            <a href="<?php $_GET['pagina']=$controladores['login']; echo $_SERVER['PHP_SELF']; ?>"><input type="button" name="volver" value="Cancelar"></a>
        </div>
    </fieldset>
</form>