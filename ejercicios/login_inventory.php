<?php

    include_once "login_app.php";

    App::showHTMLHeader("Lista de productos en BD");
    $app = new App();
    $app->validateSession();
    
    //$app->listarProductos();

    //$resultset = $app->getDependencies();
    
    // Leyendo resultados de uno en uno
    /*
    while ($dependency = $resultset->fetch()) {

        echo $dependency[0]. ", " .$dependency[1];
    }
    */

    //$dependencies = $resultset->fetchAll();
    //print_r($dependencies);

    $app->getDependencies();

    App::showHTMLFooter();
    
?>