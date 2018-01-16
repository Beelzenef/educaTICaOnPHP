
<?php

    include_once "login_app.php";
    App::showHTMLHeader("Lista de productos en BD");
    App::showMenu();
    $app = new App();
    $app->validateSession();

    $idDependency = $_GET['idDependency'];

    if (!isset($idDependency)) {
        echo '<p>Sin dependencia elegida</p>';
    }
    else {
        $resulset = $app->getDAO()->getSectorsByDependency($idDependency);
        $sector = $resulset->fetchAll();
        // ¿Error en la base de datos
        if (!$resulset) {
            echo '<p>Error en la base de datos</p>';
                }
        else {
            // No hay sectores en la dependencia
            if (count($sector) == 0) {
                echo '<p> No hay nada que mostrar</p>';
            }
            else {
            // Hay datos que mostrar
                try {
                    echo "
                    <h1 class=\"text-center\"> Listado de productos por dependencia </h1>
                    <h2 class=\"text-center\">Dependencia elegida: " .$idDependency. "</h2>
                    <table class=\"table table-bordered table-striped\">";
                    
                    echo "<thead class=\"thead-default\"> <tr> <th> ID </th> <th> Nombre </th> <th> Precio </th> <th> Dependencia </th> </tr> </thead>";
                    
                    foreach ($sector as $item) {
                        echo "<tr> <td> " .$item['id']. "</td>";
                        echo "<td> " .$item['nombre']. "</td>";
                        echo "<td> " .$item['precio']. "</td>";
                        echo "<td> " .$item['idDependencia']. "</td>";
                    }
                    echo "</table>";
                }
                catch (Exception $e) {
                    echo "<p>Error en la consulta</p>";
                }
            }
        }
    }

?>