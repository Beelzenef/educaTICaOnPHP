<?php

    include_once "app.php";

    App::showHTMLHeader("Añadir aula - EDUCA-TIC-A");
    App::showMenu();
    $app = new App();
    $app->validateSession();

?>

<div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Añadiendo aulas</h5>
              </div>
              <form method="POST" action="<?=$_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" required="required" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Introduce nombre de aula">
              <label for="codigo">Codigo</label>
              <input type="text" name="codigo" required="required" class="form-control" id="codigo" aria-describedby="codigo" placeholder="Código">
              <label for="ubicacion">Ubicacion</label>
              <input type="text" name="ubicacion" required="required" class="form-control" id="ubicacion" aria-describedby="ubicacion" placeholder="Ubicación">
              <label for="tic">TIC</label>
              <input type="checkbox" name="tic" class="form-control" id="tic" aria-describedby="tic" placeholder="¿Es aula TIC?">
              <label for="pcs">Número de PCs</label>
              <input type="number" name="pcs" class="form-control" id="pcs" aria-describedby="pcs" placeholder="Número de PCs">
            </div>
            <button type="submit" class="btn btn-primary">Añadir aula</button>
          </form></div></div>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Recoger datos de aula
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $ubicacion = $_POST['ubicacion'];
        $tic = isset($_POST['tic']);
        $pcs = $_POST['pcs'];
        // Registrar aula

        if (!$tic) {
            $pcs = 0;
            $tic = 0;
        }
        else {
            $tic = 1;
        }

        $app->addNuevaAula($nombre, $codigo, $ubicacion, $tic, $pcs);

        echo "<script language=\"javascript\">window.location.href=\"aulas.php\"</script>";

    }
    App::showHTMLFooter();
    
?>