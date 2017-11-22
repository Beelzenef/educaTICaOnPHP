<?php

print "
<!DOCTYPE html>
<html lang=\"es\">
    <head>
            <title>Superglobales</title>
            <meta charset=\"utf-8\"/>
    </head>
    <body>
    <h3>Informacion de la variable superglobal SERVER</h3>";

        echo "<pre> " .print_r ($_SERVER, true). "</pre>";

        echo "<h4> El nombre del server es " .$_SERVER['SERVER_NAME']. "</h4>";

print "
    </body>
</html>";

?>