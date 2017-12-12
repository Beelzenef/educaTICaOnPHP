<?php

include_once "../print_html.php";
include_once "persona.php";
include_once "estudiante.php";

    showHTMLHeader("Testeando persona");
    
    // Creando el objeto persona
    $persona = new Persona("Elena", "G", 24);
    $persona2 = new Persona("Ethan", "T", 124);
    echo "<p> ". $persona->saludo() ."</p>";

    $estudiante = new Estudiante("Irene", "C", 23, 23245, array("DEINT", "SGEMP", "PMDM"));
    $estudiante2 = new Estudiante("Dasha", "N", 22, 245245, array("DEINT", "SGEMP", "PMDM"));    

    echo "<p> ". $estudiante->saludo() ."</p>";
    // Destruyendo el objeto creado
    //unset($persona);

    $arrayPersonas = array();
    $arrayPersonas[0] = $persona;
    $arrayPersonas[1] = $estudiante;
    $arrayPersonas[2] = $estudiante2;
    $arrayPersonas[3] = $persona2;

    for ($i = 0; $i < count($arrayPersonas); $i++)
    {
        echo "<h2> Persona encontrada </h2>";
        echo "<p>" .$arrayPersonas[$i]->getNombre() ."</p>";
        echo "<p>" .$arrayPersonas[$i]->getApellidos() ."</p>";
        echo "<p>" .$arrayPersonas[$i]->getEdad() ."</p>";

        if ($arrayPersonas[$i] instanceof Estudiante)
        {
            echo "<h3> ... y es estudiante: </h3>";
            echo "<p>" .$arrayPersonas[$i]->getCodigo() ."</p>";
            echo "<p>". print_r($arrayPersonas[$i]->getMatricula(), true) ."</p>";

            // El uso de propiedades estáticas se hace mediante el nombre de la Clase
            echo "<p>Número de módulos matriculados: ". Estudiante::$numModulos ."</p>";
        }
    }

    showHTMLFooter();

?>