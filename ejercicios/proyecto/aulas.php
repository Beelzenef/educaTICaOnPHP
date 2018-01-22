<?php

    include_once "app.php";

    App::showHTMLHeader("Lista de aulas - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $app->getAulas();

    App::showHTMLFooter();
    
?>