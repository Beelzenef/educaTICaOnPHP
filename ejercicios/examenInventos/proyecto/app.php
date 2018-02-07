<?php

include_once "dao.php";

class App {

    private $dao;

    function __construct() {
        $this->dao = new DAO();
        echo "<h3>ÑE</h3>";
    }

    function getDao() {
        return $this->dao;
    }

    function cabecera($texto) 
    {
        print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
        \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
        <html xmlns=\"http://www.w3.org/1999/xhtml\">
        <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
        <title> Examen Inventos - $texto</title>
        <link href=\"estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
        </head>\n\n<body>
        <h1>Examen Inventos- $texto</h1>
        <div id=\"menu\">
            <ul>
                <a href=\"listar.php\"><li>Listar inventos</li></a>
                <a href=\"anadir.php\"><li>Añadir invento</li></a>
                <a href=\"consultar.php\"><li>Consultar</li></a>
            </ul>
        </div>\n";
    }

    function pie() 
    {
        print "</div>
            <div id=\"pie\">
            </div>
            </body>
            <p class=\"licencia\">Elena Guzmán Blanco - febrero 2018 (SGEMP)</p>
            </html>";
    }

    function listarInventos() {
        $inventos = $this->dao->getInventos();

        if (count($inventos) > 0) {
            echo "<table border=\"1\"> <thead> <tr>
             <th> Inventor </th> <th> Invento </th> </tr> </thead>";
            
            foreach ($inventos as $item) {
                echo "<tr> <td> " .$item['inventor']. "</td>";
                echo "<td>" .$item['invento']. "</td> </tr>";
            }

            echo "</table>";
        }
        else {
            echo "<p class=\"aviso\">Sin inventos que mostrar, NECESITAMOS MÁS CENCIA E INVENTORSL</p>";
        }
    }

    function getInventorAleatorio() {
        $inventoAleatorio = $this->dao->getInventorAleatorio();
        return $inventoAleatorio;
    }

    function anadirInvento($invento, $inventor) {

        try {
            $this->getDao()->anadirItem($invento, $inventor);
        }
        catch (Exception $e) {
            echo "<p class=\"aviso\"> ¡Error al añadir invento! </p>";
        }
    }

}

?>