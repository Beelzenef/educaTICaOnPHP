<?php

include_once "print_html.php";

    showHTMLHeader("Login con PHP");
?>
    <div class="container">
        <div class="row">
        
            <div class="col-6 col-md-4 offset-md-4 offset-3">
                <h1 class="text-center">Inicar sesión</h1>
                <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
                    
                    <div class="form-group">
                        <label class="" for="inputUser">Usuario</label>
                        <input class="form-control" type="text" name="user" id="inputUser" value="" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="" for="inputPassw">Contraseña</label>
                        <input class="form-control" type="text" name="password" id="inputPassw" value="" required="required" />
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php
    showHTMLFooter();
    
?>