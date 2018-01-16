<?php

    include_once "login_dao.php";

    class App {
        protected $dao;

        function __construct () {
            $this->dao = new DAO();
        }


        function getDAO() {
            return $this->dao;
        }

        // Cuando el usuario se ha logueado, se arranca sesión
        // con su usuario hacia el servidor como identificador
        // Se almacena su nombre en $_SESSION
        function iniciarSesion ($usuario) {
            if (!isset($_SESSION['user']))
            {
                $_SESSION['user'] = $usuario;
            }
        }

        // Si no está logueado, redirigiendo al login!
        function validateSession() {
            session_start();
            if (!$this->isLogged())
            {
                $this->showLogin();
            }
            //$this->listarProductos();
        }

        // ¿Está logueado el usuario?
        function isLogged () {
            return isset($_SESSION['user']);
        }

        // Redirigiendo al login
        function showLogin() {
            echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";            
        }

        // Eliminando una sesión previamente creada
        function destroySession() {
            if (isset($_SESSION['user']))
            {
                unset($_SESSION['user']);
            }
            session_destroy();
            $this->showLogin();
        }

        function listarProductos()
        {
            $datos = $this->dao->listarProds();

            print" <h1 class=\"text-center\"> Listado de productos </h1>
            <table class=\"table table-bordered table-striped\">";

            echo "<thead class=\"thead-default\"> <tr> <th> Nombre </th> <th> Precio </th> </tr> </thead>";

            foreach ($datos as $item)
            {
                echo "<tr> <td> " .$item[0]. " </td>";
                echo "<td> " .$item[1]. " </td></tr>";
            }

            echo "</table>";

        }

        function getDependencies ()
        {
                try {

                    $dependencias = $this->dao->getDependencies();

                    if (count($dependencias) > 0) {
                        echo "
                        <h1 class=\"text-center\"> Listado de dependencias </h1>
                        <table class=\"table table-bordered table-striped\">";

                        echo "<thead class=\"thead-default\"> <tr> <th> ID </th> <th> Nombre </th> <th> Codigo </th> <th> Localizacion </th> </tr> </thead>";

                        foreach ($dependencias as $item) {
                            echo "<tr> <td> " .$item['id']. "</td>";
                            echo "<td> " .$item['name']. "</td>";
                            echo "<td> " .$item['shortname']. "</td>";
                            echo "<td> <a href=\"login_sector.php?idDependency=" .$item['id']. "\"> <img src=\"http://www.cornerstonebuildersswfl.com/wp-content/themes/glacial/images/location_icon_1.png\"/> </a> </tr>";
                        }

                        echo "</table>";                        
                    }
                }
                catch (Exception $e)
                {
                    echo "<p>Error en la consulta</p>";
                }
        }
    
        static function showHTMLHeader ($titulo) {
            print "
            <!DOCTYPE html>
            <html lang=\"es\">
                <head>
                        <title>" .$titulo. "</title>
                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                     
                        <!-- CSS de Bootstrap -->
                        <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
                </head>
                <body>
                <p>Con Bootstrap</p>
                <script src=\"http://code.jquery.com/jquery.js\"></script>
                <script src=\"js/bootstrap.min.js\"></script>
                ";
        }

        static function showMenu() {
            print "
            <nav class=\"navbar navbar-toggleable-md navbar-light bg-faded\">
            <a class=\"navbar-brand\">3d10Mundos</a>
          
            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"login_inventory.php\"/>Dependencias</a>
                </li>
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"login_productos.php\"/>Productos</a>
                </li>
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"login_logout.php\"/>Cerrar sesión</a>
                </li>
              </ul>
            </div>
            </nav>
            
            </br></br>";
        }
        
        static function showHTMLFooter() {
            print "
            </body>
            </html>";
        }
    
    
    }

?>