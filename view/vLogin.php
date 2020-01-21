
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
                <input type="submit" name="enviar"  value="enviar" class="form-control  btn btn-primary mb-1">
                <br><br>
                  <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="button" name="registro" value="Registrarse"></a>   
                <br><br>
                 <input type="submit" name="salir"  value="salir" class="form-control  btn btn-danger mb-1">

              
            </div>
        </fieldset>
    </form>
</div>                       
<br/>
<br/>   
<a class="diagrama" href="DOC/GoF Design Patterns - Composite.vpd.pdf">Diagrama de clases</a>