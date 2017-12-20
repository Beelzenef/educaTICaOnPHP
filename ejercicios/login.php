<?php
    include_once "login_app.php";

    session_start();

    App::showHTMLHeader("Login con PHP");
?>
    <div class="container">
        <div class="row">
        
            <div class="col-6 col-md-4 offset-md-4 offset-3">
                <h1 class="text-center">Inicar sesión</h1>
                <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
                    
                    <div class="form-group">
                        <label class="" for="inputUser">Usuario</label>
                        <input class="form-control" type="text" name="user" id="inputUser" value="" />
                    </div>
                    <div class="form-group">
                        <label class="" for="inputPassw">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="inputPassw" value=""/>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

        if (empty($user))
            echo "<p>Debe introducir un nombre de usuario</p>";
        if (empty($password))
            echo "<p>Debe introducir una contraseña</p>";
        else {
            // Conexión a base de datos
            // ¿Existe el usuario?

            $app = new App();

            if (!$app->getDAO()->isConnected()) {
                echo "<p>" .$app->getDAO()->err. "</p>";
            }
            else if ($app->getDAO()->validateUser($user, $password)) {
                // Guardando sesión de usuario
                // Redireccionando a otra pag
                $app->iniciarSesion($user);
                echo "<script language=\"javascript\">window.location.href=\"login_inventory.php\"</script>";
            }
            else {
                echo "<p>Usuario incorrecto</p>";
            }
            
        }
    }
    App::showHTMLFooter();
    
?>