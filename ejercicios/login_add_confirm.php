<?php

    include_once "login_app.php";

    App::showHTMLHeader("Lista de productos en BD");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $nombre =  $_POST["nombreDep"];
    $shortname =  $_POST["snombreDep"];

    $app->addNewDependency($nombre, $shortname);

    App::showHTMLFooter();
    
?>