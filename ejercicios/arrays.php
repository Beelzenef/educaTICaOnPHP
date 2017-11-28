<?php

print "
<!DOCTYPE html>
<html lang=\"es\">
    <head>
            <title>Arrays | Matrices</title>
            <meta charset=\"utf-8\"/>
    </head>
    <body>";

    $datos = ["Python", "C#", "Kotlin"];

    $libros = [
        ["I.A." => "Mutantes en la sombra", "E.G." => "Ocaso"],
        ["JC.H" => "EXO 3464", "M.S." => "sLAng"]
    ];

    $autores = array (
        array ( "nombre" => "Arriola", "fecha" => "1996", "titulo" => "Mutantes en la sombra"),
        array ( "nombre" => "Elena G", "fecha" => "2017", "titulo" => "Ocaso")
    );

    $abecedario = array (
            1 => "a",
            "1" => "b",
            1.5 => "c",
            true => "d"
    );

    $abecedarioBien = array (
        "uno" => "a",
        "dos" => "b",
        100 => "c",
        -100 => "d"
    );

    $arraySorpresa = array (
        "a",
        "b",
        6 => "c",
        "d"
    );

    print "<h3> Mis lenguajes preferidos son </h3>";
    print "<p>" .$datos[1]. "</p>";
    print "<p>" .$datos[0]. "</p>";
    print "<p>" .$datos[2]. "</p>";

    print "<h3> Libros y autores de rol </h3>";
    echo "<pre>" .print_r ($libros, true). "</pre>";

    print "<h3> Otros libros y autores de rol </h3>";
    echo "<pre>" .print_r ($autores, true). "</pre>";

    // Si se utilizan varios keys, se coge el último
    // Este lenguaje no distingue entre arrays indexados y asociativos
    print "<h3> Sobreescritura </h3>";
    echo "<pre>" .print_r ($abecedario, true). "</pre>";

    print "<h3> Sin diferencias entre arrays asociativos e indexados </h3>";
    echo "<pre>" .print_r ($abecedarioBien, true). "</pre>";

    print "<h3> Cambiando índices sobre la marcha... </h3>";
    echo "<pre>" .print_r ($arraySorpresa, true). "</pre>";

    $arraySorpresa = array ();    
    $arraySorpresa = array (1, 2, 3);

    print "<h3> Cambiando índices sobre la marcha... </h3>";
    echo "<pre>" .print_r ($arraySorpresa, true). "</pre>";

    echo "<p> El número de elementos de un array se obtiene mediante " .count($arraySorpresa). "</p>";

    print "<h3> Recorriendo un array con un bucle FOR... holly molly, un error! </h3>";

    for ($i = 0; $i < count($libros); $i++)
    {
        echo "<p> La posición " .$i. " contiene el elemento " .$libros[$i]. "</p>";
    }

    // Las matrices asociativas no se pueden recorrer mediante un bucle FOR

    print "<h3> Recorriendo un array asociativo con un bucle FOREACH... </h3>";

    $posicion = 0;
    foreach ($abecedarioBien as $item)
    {
        echo "<p> Recorriendo array asociativo, la posición " .$posicion. " contiene el elemento " .$item. "</p>";
        $posicion++;
    }

    $posicion = 0;
    foreach ($abecedarioBien as $item)
    {
        if (!is_array($item))
            echo "<p> Recorriendo array asociativo, la posición " .$posicion. " contiene el elemento " .$item. "</p>";
        else
            echo "<p> Recorriendo array asociativo, la posición " .$posicion. " contiene el elemento " .print_r($item, true). "</p>";
        $posicion++;
    }

print "
    </body>
</html>";

?>