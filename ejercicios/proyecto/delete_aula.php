<?php

    include_once "app.php";

    App::showHTMLHeader("Eliminando aula");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idAula = $_GET['idAula'];

    if (!isset($idAula)) {
        echo '<p>Sin aula elegida</p>';
    }
    else {
        App::confirmationDialog("aula", $idAula);
    }

    App::showHTMLFooter();
    
?>