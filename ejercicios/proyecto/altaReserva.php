<?php

    include_once "app.php";

    App::showHTMLHeader("Reserva de aulas - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    // Alta reserva por horas
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        $idAula = $_GET['idAula'];
    
?>

    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reservando aula (por horas)</h5>
      </div>
      <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
    <div class="form-group">
    <?php
     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         echo "
         <input type=\"hidden\" name=\"idAula\"
         class=\"form-control\" id=\"idAula\" aria-describedby=\"idAula\" value=\"" .$idAula. "\"\>";
     }
    ?>
        <label for="hora">Horas a reservar</label>
      <input type="time" name="hora" required="required" class="form-control" id="hora" aria-describedby="hora">
      <label for="horasreservadas">Horas a reservar</label>
      <input type="number" name="horasreservadas" required="required" class="form-control" min="1" max="4" id="horasreservadas" aria-describedby="horasreservadas" value="1">
      <label for="motivo">Motivo de la reserva</label>
      <input type="text" name="motivo" required="required" class="form-control" id="motivo" aria-describedby="motivo">
    </div>
    <button type="submit" class="btn btn-primary">Reservar aula</button>
  </form>
    <a href="altaReservaDias.php?idAula=" .$idAula. "\">
        <button type="submit" class="btn btn-primary">Reservar durante días</button>
    </a>
    </div></div>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $idAula = $_POST['idAula'];
        $motivo =$_POST['motivo'];
        $hora = $_POST['hora'];
        $horasReservadas = $_POST['horasreservadas'];

        $app->altaReservaPorHoras($hora, $horasReservadas, $idAula, $motivo);
        //echo "<script language=\"javascript\">window.location.href=\"reservas.php\"</script>";
         //echo "<script language=\"javascript\">window.location.href=\"reservas.php\"</script>";

    }
    App::showHTMLFooter();
    
?>