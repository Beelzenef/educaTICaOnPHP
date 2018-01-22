<?php

    include_once "app.php";

    App::showHTMLHeader("Registro - EDUCA-TIC-A");
    $app = new App();

    $app->showRegisterForm();

    App::showHTMLFooter();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Recoger datos de usuario
        // Registrar usuario
    }
?>