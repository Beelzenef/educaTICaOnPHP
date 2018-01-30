<?php

    include_once "app.php";

    App::showHTMLHeader("Búsqueda de reservas - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

?>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Buscando reservas</h5>
        </div>
        <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="motivo">Motivo de la reserva</label>
                <input type="text" name="motivo" required="required" class="form-control" id="motivo" aria-describedby="motivo">
            </div>
        <button type="submit" class="btn btn-primary">Buscar reserva</button>
        </form>
        </div>
    </div>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $motivo = $_POST['motivo'];

        echo "<h3 class=\"text-center\">Resultados por motivo</h3>";
        $app->getReservaConMotivo($motivo);

    }

    App::showHTMLFooter();
    
?>