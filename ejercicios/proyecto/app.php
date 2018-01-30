<?php

    include_once "dao.php";
    class App {
        
        protected $dao;

        function __construct () {
            $this->dao = new DAO();
        }

        function getDAO() {
            return $this->dao;
        }
    
        // GESTION SESIONES

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
        
        // FUNCIONES PARA VISUALIZAR HTML
    
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
                <script src=\"http://code.jquery.com/jquery.js\"></script>
                <script src=\"js/bootstrap.min.js\"></script>
                ";
        }

        static function showMenu() {
            print "
            <nav class=\"navbar navbar-toggleable-md navbar-light bg-faded\">
            <a class=\"navbar-brand\">Gestión EDUCA-TIC-A</a>
          
            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"aulas.php\"/>Aulas</a>
                </li>
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"reservas.php\"/>Reservas</a>
                </li>
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"buscar_reservas.php\"/>Buscar reservas</a>
                </li>
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"logout.php\"/>Cerrar sesión</a>
                </li>
              </ul>
            </div>
            </nav>
            
            </br></br>";
        }
        
        static function showHTMLFooter() {
            print "
            </body>
                <footer class=\"page-footer blue center-on-small-only\">
                    <br/><br/><br/>
                    <div class=\"footer-copyright\">
                        <div class=\"container-fluid text-center\">
                            © 2018 Coded with ☕ by <a href=\"https://about.me/Beelzenef\"> Elena Guzmán Blanco </a>
                        </div>
                    </div>
                </footer>
            </html>";
        }

        // CONSULTAS PARA AULAS

        static function nuevaAulaForm() {
            echo "
            <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\">Añadiendo aulas</h5>
              </div>
            <form method=\"POST\" action=\"<?=\$_SERVER['PHP_SELF']\">
            <div class=\"form-group\">
              <label for=\"nombre\">Nombre</label>
              <input type=\"text\" name=\"nombre\" required=\"required\" class=\"form-control\" id=\"nombre\" aria-describedby=\"nombre\" placeholder=\"Introduce nombre de aula\">
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Añadir aula</button>
          </form></div></div>";
          ;        
        }

        function addNuevaAula($nombreAula, $codeAula, $ubiAula, $ticAula, $pcsAula) {
            try {
                $aulas = $this->dao->addNuevaAula($nombreAula, $codeAula, $ubiAula, $ticAula, $pcsAula);
                echo "<p>¡Aula añadida!</p>";
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        function deleteAula($id) {
            try {
                $aulas = $this->dao->deleteAula($id);
                echo "<p>¡Aula eliminada!</p>";
            }
            catch (Exception $e)
            {
                echo "<p>No ha sido posible eliminar...</p>";
            }
        }

        function getAulas() {
            try {

                $aulas = $this->dao->getAulas();

                if (count($aulas) > 0) {
                    echo "
                    <h1 class=\"text-center\"> Listado de aulas </h1>
                    <table class=\"table table-bordered table-striped\">";
                    echo "<thead class=\"thead-default\"> <tr> <th> ID </th> <th> Nombre </th> <th> Codigo </th> <th> Ubicacion </th> <th> TIC </th> <th> Reservar </th> <th> Eliminar aula </th> <th>Buscar reservas</th> </tr> </thead>";
                    
                    foreach ($aulas as $item) {
                        echo "<tr> <td> " .$item['id']. "</td>";
                        echo "<td> " .$item['nombre']. "</td>";
                        echo "<td> " .$item['codigo']. "</td>";
                        echo "<td> " .$item['ubicacion']. "</td>";
                        if ($item['tic'] == 1)
                            echo "<td> Sí </td>";
                        else
                            echo "<td> No </td>";
                        echo "<td> <a href=\"altaReserva.php?idAula=" .$item['id']. "\"> <img src=\"https://flow.microsoft.com/Content/retail/assets/button.619efbb4f46aceff2c9b7df7c0630a57.2.svg\"/></a> ";
                        echo "<td> <a href=\"delete_aula.php?idAula=" .$item['id']. "\"> <img src=\"https://static.independent.co.uk/static-assets/close-video-preroll.svg\"/> </a> </td>";
                        echo "<td> <a href=\"ver_reservas.php?idAula=" .$item['id']. "\"> <img src=\"https://www.barganero.com/images/botonLupaBuscador.png\"/> </a> </td> </tr>";                            
                    }

                    echo "</table>";
                    echo "<a href=\"add_aula.php\" class=\"btn btn-primary btn-lg\" role=\"button\">Añadir nueva aula</a>";  
                }
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        // CONSULTAS PARA USUARIOS

        function altaUsuario ($user, $nombre, $passw, $email, $fechanac) {
            try {
                $aulas = $this->dao->altaUsuario ($user, $nombre, $passw, $email, $fechanac);
                echo "<p>¡Registro realizado!</p>";
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        // CONSULTAS PARA RESERVAS

        // Funciones que faltan:
        // * Alta de reserva por dias
        // * Alta de reserva por horas
        // * Formulario de reserva, con combobox para elegir horas/dias de reserva (no se permiten más de 4)
        // * Listado de reservas realizadas, con control de valores NULL
        // * Eliminar reserva

        function getReservas() {
            try {
                $reservas = $this->dao->getReservas();

                if (count($reservas) > 0) {
                    $this->listarReservas($reservas);
                }
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        function getReservaFromAula($idAula)
        {
            try {  
            $reservas = $this->dao->getReservaFromAula($idAula);
                
                if (count($reservas) > 0) {
                    $this->listarReservas($reservas);       
                }
                else {
                    echo "<h4>No hay reservas para esta aula</h4>";
                }
            } catch (Exception $e) {
                echo "<p>Error en la consulta</p>";
            }
        }

        function getReservaConMotivo($motivo) {
            try {      
                $reservas = $this->dao->getReservaConMotivo($motivo);
                
                if (count($reservas) > 0) {
                    $this->listarReservas($reservas);       
                }
                else {
                    echo "<h4>No hay reservas para estos parámetros</h4>";
                }
            } catch (Exception $e) {
                echo "<p>Error en la consulta</p>";
            }
        }

        function getReservaPorCodigo($codigoaula) {
            try {      
                $reservas = $this->dao->getReservaConMotivo($codigoaula);
                
                if (count($reservas) > 0) {
                    $this->listarReservas($reservas);       
                }
                else {
                    echo "<h4>No hay reservas para estos parámetros</h4>";
                }
            } catch (Exception $e) {
                echo "<p>Error en la consulta</p>";
            }
        }

        function altaReservaPorHoras($hora, $horasReservadas, $idAulaReservada, $motivo) {
            try {
                $aulas = $this->dao->altaReservaPorHoras($hora, $horasReservadas, $idAulaReservada, $motivo);
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        function altaReservaPorDia($dia, $diasReservados, $idAulaReservada, $motivo) {
            try {
                $aulas = $this->dao->altaReservaPorDia($dia, $diasReservados, $idAulaReservada, $motivo);
            }
            catch (Exception $e)
            {
                echo "<p>Error en la consulta</p>";
            }
        }

        function deleteReserva($idReserva) {
            try {
                $reserva = $this->dao->deleteReserva($idReserva);
                echo "<p>¡Reserva eliminada!</p>";
            }
            catch (Exception $e)
            {
                echo "<p>No ha sido posible eliminar...</p>";
            }
        }

        // LISTAR RESERVAS (EXTRACCION)

        function listarReservas ($lista) {
            echo "
            <h1 class=\"text-center\"> Listado de reservas </h1>
            <table class=\"table table-bordered table-striped\">";

            echo "<thead class=\"thead-default\"> <tr> <th> ID </th> <th> Aula </th> <th> Reservado en: </th>
            <th> Cantidad </th> <th> Motivo </th> <th> Eliminar reserva </th> </tr> </thead>";

            foreach ($lista as $item) {
                echo "<tr> <td> " .$item['idReserva']. "</td>";
                echo "<td> " .$item['idAulaReservada']. "</td>";

                if (is_null($item['hora'])) {
                    echo "<td> " .$item['dia']. "</td>";
                    echo "<td> " .$item['diasreservados']. "</td>";
                }
                if (is_null($item['dia'])) {
                    echo "<td> " .$item['hora']. "</td>";
                    echo "<td> " .$item['horasreservadas']. "</td>";
                }
                echo "<td> " .$item['motivo']. "</td>";
                echo "<td> <a href=\"delete_reserva.php?idReserva=" .$item['idReserva']. "\"> <img src=\"https://static.independent.co.uk/static-assets/close-video-preroll.svg\"/> </a> </td></tr>";                        
            }
            echo "</table>";
        }

        // CONSULTAS PARA USUARIOS

        static function showRegisterForm() {
            echo "
                <div class=\"modal-dialog\" role=\"document\">
                    <div class=\"modal-content\">
                      <div class=\"modal-header\">
                        <h5 class=\"modal-title\">Registro</h5>
                      </div>
                    <form method=\"POST\" action=\"<?=\$_SERVER['PHP_SELF']\">
                    <div class=\"form-group\">
                      <label for=\"user\">Nombre de usuario</label>
                      <input type=\"text\" name=\"user\" required=\"required\" class=\"form-control\" id=\"user\" aria-describedby=\"user\" placeholder=\"Usuario\">
                      <label for=\"passw\">Contraseña</label>
                      <input type=\"password\" name=\"passw\" required=\"required\" class=\"form-control\" id=\"passw\" aria-describedby=\"passw\" placeholder=\"Contraseña\">
                      <label for=\"nombre\">Nombre y apellidos</label>
                      <input type=\"text\" name=\"nombre\" required=\"required\" class=\"form-control\" id=\"nombre\" aria-describedby=\"nombre\" placeholder=\"Nombre y apellidos\">
                      <label for=\"fechanac\">Fecha de nacimiento</label>
                      <input type=\"date\" name=\"fechanac\" required=\"required\" class=\"form-control\" id=\"fechanac\" aria-describedby=\"fechanac\" placeholder=\"Fecha de nacimiento\">
                      <label for=\"email\">Email</label>
                      <input type=\"email\" name=\"email\" required=\"required\" class=\"form-control\" id=\"email\" aria-describedby=\"email\" placeholder=\"Email\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Confirmar registro</button>
                  </form></div></div>";
                  ;        
                }
            
        // FUNCIONES GENERALES

        static function confirmationDialog($tipoItem, $id) {
            
            echo "
            <div class=\"modal-dialog\" role=\"document\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <h5 class=\"modal-title\">Eliminar " .$tipoItem. "</h5>
                </div>
                <div class=\"modal-body\">
                  <p>El botón de confirmar eliminará el " .$tipoItem. " de la base de datos.
                  Obviamente esta acción no puede deshacerse.</p>
                </div>
                <div class=\"modal-footer\">
                  <a class=\"nav-link\" href=\"delete_confirm.php?id=" .$id. "\">
                    <button type=\"button\" class=\"btn btn-primary\">Eliminar</button>
                  </a>
                  <a class=\"nav-link\" href=\"aulas.php\"/>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                  </a>
                </div>
              </div>
            </div>";
        }

        static function confirmationDialogReserva($tipoItem, $id) {
            
            echo "
            <div class=\"modal-dialog\" role=\"document\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <h5 class=\"modal-title\">Eliminar " .$tipoItem. "</h5>
                </div>
                <div class=\"modal-body\">
                  <p>El botón de confirmar eliminará la " .$tipoItem. " de la base de datos.
                  Obviamente esta acción no puede deshacerse.</p>
                </div>
                <div class=\"modal-footer\">
                  <a class=\"nav-link\" href=\"delete_confirm_r.php?id=" .$id. "\">
                    <button type=\"button\" class=\"btn btn-primary\">Eliminar</button>
                  </a>
                  <a class=\"nav-link\" href=\"aulas.php\"/>
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>
                  </a>
                </div>
              </div>
            </div>";
        }
    
    
    }
?>
