 <div class="wrap">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <div class="obligatorio">
                            <label for="CodUsuario">Codigo</label> 
                            <input type="text" name="CodUsuario" placeholder="Introduce codigo de usuario(PK)" class="form-control " value=""
                        <br>
                        <div class="obligatorio">
                            <label for="DescUsuario">Descripcion</label>
                            <input type="text" name="DescUsuario" placeholder="Introduce Descripcion" class="form-control " value=""                              
                        <br>
                        <label class="label2" for="password1">Password</label>
                        <input type="text" name="password1" id="password" class="form-control" placeholder="Inserta Password" value="">
                      
                        <br>
                        <br>
                           <label class="label2" for="password2">Password</label>
                        <input type="text" name="password2" id="password" class="form-control" placeholder="Inserta Password" value="">
                        <br>
                        <br>
                        <div class="botones2">
                            <input type="submit" name="altaUsuario" value="AñadirRegistro" class="form-control  btn btn-secondary mb-1">
                        </div>
                    </fieldset>
                </form>
            </div>                     
            <br/>
            <br/> 
            
            <?php
$_SESSION["pagina"]="registro";