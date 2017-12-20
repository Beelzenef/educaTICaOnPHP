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

            foreach ($datos as $item)
            {
                echo "<p>Nombre de producto: " .$item[0]. "</p>";
                echo "<p>Precio: " .$item[1]. "</p><br/>";
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
        
        static function showHTMLFooter() {
            print "
            </body>
            </html>";
        }
    
    
    }

?>