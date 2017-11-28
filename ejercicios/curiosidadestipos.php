<?php

print "
<!DOCTYPE html>
<html lang=\"es\">
    <head>
            <title>Curiosidades del lenguaje no tipado...</title>
            <meta charset=\"utf-8\"/>
    </head>
    <body>";

    $a = "12 manzanas";
    $b = "5 peras";

    echo "<p> La suma de manzanas y peras es " .($a + $b). "</p>";

    echo "<p> Sin paréntesis, solo coge el número en la cadena después del símbolo '+': " .$a + $b. "</p>";

    $c = "platanos";
    $d = "naranjas";

    echo "<p> La suma de platanos y naranjas es " .($c + $d). "</p>";

print "
    </body>
</html>";

?>