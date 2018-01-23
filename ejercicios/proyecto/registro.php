<?php

    include_once "app.php";

    App::showHTMLHeader("Registro - EDUCA-TIC-A");
    $app = new App();

?>


<div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Registro</h5>
                      </div>
                    <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                      <label for="user">Nombre de usuario</label>
                      <input type="text" name="user" required="required" class="form-control" id="user" aria-describedby="user" placeholder="Usuario">
                      <label for="passw">Contraseña</label>
                      <input type="password" name="passw" required="required" class="form-control" id="passw" aria-describedby="passw" placeholder="Contraseña">
                      <label for="nombre">Nombre y apellidos</label>
                      <input type="text" name="nombre" required="required" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre y apellidos">
                      <label for="fechanac">Fecha de nacimiento</label>
                      <input type="date" name="fechanac" required="required" class="form-control" id="fechanac" aria-describedby="fechanac" placeholder="Fecha de nacimiento">
                      <label for="email">Email</label>
                      <input type="email" name="email" required="required" class="form-control" id="email" aria-describedby="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar registro</button>
                  </form></div></div>"

<?php

    App::showHTMLFooter();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Recoger datos de usuario
        $user = $_POST['user'];
        $nombre = $_POST['nombre'];
        $passw = $_POST['passw'];
        $email = $_POST['email'];
        $fechanac = $_POST['fechanac'];
        // Registrar usuario

        $app->altaUsuario ($user, $nombre, $passw, $email, $fechanac);

        echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
    }
?>