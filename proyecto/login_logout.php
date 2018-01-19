<?php

    include_once "login_app.php";
    session_start();
    $app = new App();
    $app->destroySession();

?>