<?php

    include_once "login_app.php";

    App::showHTMLHeader("Lista de productos en BD");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idDependency = $_GET['idDependency'];
    
        if (!isset($idDependency)) {
            echo '<p>Sin dependencia elegida</p>';
        }
        else {
            $app->deleteDependency($idDependency);
        }

    App::showHTMLFooter();
    
?>