<?php

print "
<!DOCTYPE html>
<html lang=\"es\">
    <head>
            <title>Variables de ámbito estático</title>
            <meta charset=\"utf-8\"/>
    </head>
    <body>";

    function contador_visitas ()
    {
        static $visitas = 0;
        echo "<p>La página ha recibido " . $visitas. " visitas </p>";
        $visitas++;
    }

    contador_visitas();
    contador_visitas();
    contador_visitas();
print "
    </body>
</html>";

?>