<?php

include "../plantillas/print_html.php";

    //print "<pre>" .print_r($_REQUEST). "</pre>";

    $cateto1 =  $_POST["cateto1"];
    $cateto2 =  $_POST["cateto2"];
    $mostrar = isset($_POST["mostrar"]);

    function calcularHipotenusa($cat1, $cat2)
    {
        return sqrt(pow($cat1, 2) + pow($cat2, 2));
    }

    showHTMLHeader("Cálculo de hipotenusa");
    
     // ¿Ha sido marcada la variable $mostrar?
    if ($mostrar)
        print "<p> El cálculo de hipotenusa con (" .$cateto1. ", " .$cateto2. ") resulta en " .calcularHipotenusa($cateto1, $cateto2). "</p>";
    else
        print "<p> El cálculo de hipotenusa resulta en " .calcularHipotenusa($cateto1, $cateto2). "</p>";

    showHTMLFooter();

?>