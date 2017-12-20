<?php

    include_once "login_app.php";

    App::showHTMLHeader("Lista de productos en BD");
    $app = new App();
    $app->validateSession();
    $app->listarProductos();

    App::showHTMLFooter();
    
?>