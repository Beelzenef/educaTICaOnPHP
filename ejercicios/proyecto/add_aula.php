<?php

    include_once "app.php";

    App::showHTMLHeader("Añadir aula - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $app->nuevaAulaForm();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Recoger datos de aula
        // Registrar aula
    }


    App::showHTMLFooter();
    
?>