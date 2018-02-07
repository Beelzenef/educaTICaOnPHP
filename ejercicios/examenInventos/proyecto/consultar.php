<?php

    include_once "app.php";

    $app = new App();
    $app->cabecera("Consultar");

    if ($_SERVER['REQUEST_METHOD'] != "POST") {
  
        $inventor;
        $invento;
        
        $inventorAleatorio = $app->getInventorAleatorio();

        foreach ($inventorAleatorio as $item) { 
            $inventor = $item['inventor'];
            $invento = $item['invento'];
        }

    echo "<p>¿Qué inventó " .$inventor. "?</p>";
    }

?>

<form method="POST" action=<?=$_SERVER['PHP_SELF']?>>

<?php

    if ($_SERVER['REQUEST_METHOD'] != "POST") {

    echo " 
        
        <p><input name=\"pruebaInvento\" required=\"required\" type=\"text\"/>
        <input name=\"invento\" type=\"hidden\" value=\"" .$invento. "\"/>
        <input name=\"inventor\" type=\"hidden\" value=\"" .$inventor. "\"/>
        <button type=\"submit\">Enviar consulta</button></p>
    </form>";

    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $pruebaInvento = $_POST['pruebaInvento'];
        $invento = $_POST['invento'];
        $inventor = $_POST['inventor'];

        if ($pruebaInvento == $invento) {
            echo "<p>¡Has acertado!</p>";
        }
        else {
            echo "<p> " .$inventor. " no inventó el/la " .$pruebaInvento. "</p>";
        }
        
    }

    $app->pie();

?>