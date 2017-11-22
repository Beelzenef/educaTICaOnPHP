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

print "
    </body>
</html>";

?>