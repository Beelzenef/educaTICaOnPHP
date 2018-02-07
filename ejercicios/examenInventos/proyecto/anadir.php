<?php

    include_once "app.php";

    $app = new App();
    $app->cabecera("Añadir inventos");

?>

    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        <p> Escriba el nombre del inventor y su invento o descubrimiento</p>
        <p> Inventor:
        <input name="inventor" required="required" type="text"/></p>
        <p> Nombre del invento: 
        <input name="invento" required="required" type="text"/></p>
        </br></br>
        <button type="submit">Añadir elemento</button>
    </form>

<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $invento = $_POST['invento'];
        $inventor = $_POST['inventor'];

        $app->anadirInvento($invento, $inventor);
    }

    $app->pie();

?>