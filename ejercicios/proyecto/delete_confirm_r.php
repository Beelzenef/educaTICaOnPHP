<?php

    include_once "app.php";

    $app = new App();
    $app->validateSession();
    App::showHTMLHeader("Eliminando reserva - EDUCA-TIC-A");
    App::showMenu();
    $idReserva = $_GET['id'];
    
        if (!isset($idReserva)) {
            echo '<p>Sin reserva elegida</p>';
        }
        else {
            $app->deleteReserva($idReserva);
        }
    
?>