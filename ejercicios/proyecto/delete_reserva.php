<?php

    include_once "app.php";

    App::showHTMLHeader("Eliminando reserva");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idReserva = $_GET['idReserva'];

    if (!isset($idReserva)) {
        echo '<p>Sin reserva elegida</p>';
    }
    else {
        App::confirmationDialog("reserva", $idReserva);
    }

    App::showHTMLFooter();
    
?>