<?php

    include_once "app.php";

    $app = new App();
    $app->validateSession();

    $idAula = $_GET['id'];
    
        if (!isset($idAula)) {
            echo '<p>Sin aula elegida</p>';
        }
        else {
            $app->deleteAula($idAula);
        }
    
?>