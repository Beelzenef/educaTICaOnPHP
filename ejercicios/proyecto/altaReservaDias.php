<?php

    include_once "app.php";

    App::showHTMLHeader("Reserva de aulas - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    // Alta reserva por días
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
      $idAula = $_GET['idAula'];
?>

    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reservando aula (por días)</h5>
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
      <label for="dia">Día para reservar</label>
      <input type="date" name="dia" required="required" class="form-control" id="dia" aria-describedby="dia">
      <label for="diasreservados">Horas a reservar</label>
      <input type="number" name="diasreservados" required="required" class="form-control" min="1" max="4" id="diasreservados" aria-describedby="diasreservados" value="1">
      <label for="motivo">Motivo de la reserva</label>
      <input type="text" name="motivo" required="required" class="form-control" id="motivo" aria-describedby="motivo">
    </div>
    <button type="submit" class="btn btn-primary">Reservar aula</button>
  </form>
    </div></div>

<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAula = $_POST['idAula'];
    $motivo =$_POST['motivo'];
    $dia = $_POST['dia'];
    $diasreservados = $_POST['diasreservados'];

    $app->altaReservaPorDia($dia, $diasreservados, $idAula, $motivo);
    //echo "<script language=\"javascript\">window.location.href=\"reservas.php\"</script>";
  }
    App::showHTMLFooter();
    
?>