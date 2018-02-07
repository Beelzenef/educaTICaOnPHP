<?php

    include_once "app.php";

    $app = new App();
    $app->cabecera("Listar inventos");

    $app->listarInventos();

    $app->pie();

?>