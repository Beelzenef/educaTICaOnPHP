<?php

    include_once "app.php";

    $app = new App();
    $app->validateSession();
    App::showHTMLHeader("Eliminando aula - EDUCA-TIC-A");
    App::showMenu();

    $idAula = $_GET['id'];
    
        if (!isset($idAula)) {
            echo '<p>Sin aula elegida</p>';
        }
        else {
            $app->deleteAula($idAula);
        }
    
?>