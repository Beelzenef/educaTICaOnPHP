<?php

    include_once "app.php";

    App::showHTMLHeader("Reservas de aula - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idAula = $_GET['idAula'];
    
        if (!isset($idAula)) {
            echo '<p>Sin reserva elegida</p>';
        }
        else {
            $app->getReservaFromAula($idAula);
    }

    App::showHTMLFooter();
    
?>