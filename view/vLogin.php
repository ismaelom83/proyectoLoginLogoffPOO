
<div class="wrap">
    <h1>LOGIN</h1>
    <form action="<?php $_GET['pagina']=$controladores['login']; echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Introduce Usuario:" value="">
            <br>
            <label for="password">Password</label><br>
            <input type="text" name="password" id="password" class="form-control" placeholder="Introduce Password:" value="">                       
            <br>
            <div class="botones2">
                <input type="submit" name="enviar"  value="IniciarSesion" class="form-control  btn btn-primary mb-1">
                <br><br>
                  <input type="submit" name="registro" value="Registrarse" class="form-control  btn btn-success mb-1">  
                <br><br>             
            </div>
        </fieldset>
    </form>
</div>                       
<br/>
<br/>   