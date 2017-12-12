<?php

include "../plantillas/print_html.php";
include "../oop/geometria.php";

    //print "<pre>" .print_r($_REQUEST). "</pre>";

    $cateto1 =  $_POST["cateto1"];
    $cateto2 =  $_POST["cateto2"];
    $mostrar = isset($_POST["mostrar"]);

    /*
    function calcularHipotenusa($cat1, $cat2)
    {
        return sqrt(pow($cat1, 2) + pow($cat2, 2));
    }
    */

    $triangulo = new Triangulo($cateto1, $cateto2);

    showHTMLHeader("Cálculo de hipotenusa");
    
     // ¿Ha sido marcada la variable $mostrar?
    if ($mostrar)
        print "<p> El cálculo de hipotenusa con (" .$triangulo->getCateto1(). ", " .$triangulo->getCateto2(). ") resulta en " .$triangulo->calcularHipotenusa(). "</p>";
    else
        print "<p> El cálculo de hipotenusa resulta en " .$triangulo->calcularHipotenusa(). "</p>";

    showHTMLFooter();

?>