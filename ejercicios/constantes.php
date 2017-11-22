<?php

// Primero se declaran los packages o ficheros a utilizar
// Importando librerías

//include fichero.php;

// Después se definen constantes, en puro PHP
define ("TRIANGULO", 1);
define ("CUADRADO", 2);
define ("RECTANGULO", 3);
define ("CIRCUNFERENCIA", 4);

define ("MIN_VALUE_RAND", 1);
define ("MAX_VALUE_RAND", 4);

//Si se repiten una variable local y otra global, no muestra fallo
// Ante la duda, usa siempre la local
// Para usar una variable definida fuera de la función, se ante pone global o se pasa como parámetro

// También podemos acceder directamente a las variables predefinidas en PHP
// que se encuentran en el array GLOBALS[] (superglobales)

const PI = 3.1416;

print "
<!DOCTYPE html>
<html lang=\"es\">
    <head>
            <title>Trabajando con constantes</title>
            <meta charset=\"utf-8\"/>
    </head>
    <body>";

    $figura = rand(MIN_VALUE_RAND, MAX_VALUE_RAND);

    switch ($figura)
    {
        case TRIANGULO:
            echo "<p>El area del triangulo de base 3 y altura 5 es " .area_triangulo(3, 5). + "</p>";            
            break;
        case CUADRADO:
            echo "<p>El area del cuadrado de lado 5 es " .area_cuadrado(5). + "</p>";
            break;
        case RECTANGULO:
            echo "<p>El area del rectangulo de base 4 y altura 7 es " .area_rectangulo(4, 7). + "</p>";
            break;
        case CIRCUNFERENCIA:
            echo "<p>El perímetro de la circunferencia de radio 6 es " .perimetro_circunferencia(6). + "</p>";
            break;
    }

    function area_triangulo ($base, $altura)
    {
        //$base = 3;
        //$altura = 5;
        return (($base * $altura) / 2);
    }

    function area_cuadrado ($lado)
    {
        //$lado = 5;
        return (pow($lado, 2));
    }

    function area_rectangulo ($base, $altura)
    {
        //$base = 4;
        //$altura = 7;
        return ($base * $altura);

    }

    function perimetro_circunferencia ($radio)
    {
        return 2 * PI * $radio;
    }

print "
    </body>
</html>";

?>