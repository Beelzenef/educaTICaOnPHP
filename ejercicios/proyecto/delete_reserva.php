<?php

    include_once "app.php";

    App::showHTMLHeader("Eliminando reserva - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idReserva = $_GET['idReserva'];

    if (!isset($idReserva)) {
        echo '<p>Sin reserva elegida</p>';
    }
    else {
        App::confirmationDialogReserva("reserva", $idReserva);
    }

    App::showHTMLFooter();
    
?>