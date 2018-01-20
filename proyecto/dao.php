<?php
define ("DATABASE", "educatica");
define ("MYSQL_HOST", "mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER", "www-data");
define ("MYSQL_PASSWORD","www-data");
// Tabla USER
define ("USER_TABLE", "user");
define ("COLUMN_USER_USERNAME", "usuario");
define ("COLUMN_USER_NAME", "nombre");
define ("USERPASSW_COLUMN", "password");
define ("COLUMN_USER_EMAIL", "email");
define ("COLUMN_USER_FECHANAC", "fechanac");
// Tabla AULA
define ("TABLE_AULA", "aula");
define ("COLUMN_AULA_ID", "id");
define ("COLUMN_AULA_NAME", "nombre");
define ("COLUMN_AULA_SHORTNAME", "codigo");
define ("COLUMN_AULA_UBICACION", "ubicacion");
define ("COLUMN_AULA_TIC", "tic");
define ("COLUMN_AULA_PCS", "pcs");
// Tabla RESERVA
define ("TABLE_RESERVA", "reserva");
define ("COLUMN_RESERVA_ID", "idReserva")
define ("COLUMN_RESERVA_AULARESERVADA", "idAulaReservada");
define ("COLUMN_RESERVA_HORA", "hora");
define ("COLUMN_RESERVA_HORASRESERVADAS", "horasreservadas");
define ("COLUMN_RESERVA_DIA", "dia")
define ("COLUMN_RESERVA_DIASRESERVADOS", "diasreservados")
define ("COLUMN_RESERVA_MOTIVO", "motivo");

    class DAO {

        protected $conn;
        public $err;

        // Constructor
        function __construct()
        {
            try {
                $this->conn = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
            } catch (PDOException $e)
            {
                $this->err = "Error en la conexión: " .$e->getMessage();
                $this->conn = null;
            }
        }

        // Destructor
        function _destruct()
        {
            if ($this->isConnected())
            {
                $this->conn = null;
                unset($this->err);
            }
        }

        // GESTION DE SESIONES

        function isConnected()
        {
           if ($this->conn == null)
                return false;
            return true;
        }

        function validateUser($u, $p)
        {
            try {
                // Solución fácil, A EVITAR
                $sql = "SELECT name, password FROM " .USER_TABLE. " WHERE " .USERNAME_COLUMN. "='" .$u. "' AND " .USERPASSW_COLUMN. "=PASSWORD('" .$p. "');";
                $statement = $this->conn->query($sql);
                return ($statement->rowCount() == 1);
            } catch (PDOException $e) {
                $this->err = "Error con usuario: " .$e->getMessage();
            }
        }
        
        // CONSULTAS A AULA
        
        function listarAulas()
        {
            try {
                $consulta = "select id, nombre, codigo, ubicacion, tic from " .TABLE_AULA;
                $sentencia = $this->conn->prepare($consulta, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $aulas = $sentencia->fetchAll();
                return $aulas;
            } catch (PDOException $e)
            {
                $this->error = "Error al hacer consulta en tabla";
            }
        }

        function getAulas()
        {
                $sql = "SELECT * FROM " .TABLE_AULA;
                if ($resultado = $this->conn->query($sql)) 
                {
                    if ($resultado->fetchColumn() > 0) {
                        return $resultado;
                    }
                    else
                    {
                        echo "<h3 class=\"text-center\">Sin datos que mostrar</h3>";
                    }
                }
                else
                {
                    echo "<h3 class=\"text-center\">Error en la consulta</h3>";
                }
        }

        function addNuevaAula($nombreAula, $codeAula, $ubiAula, $ticAula, $pcsAula) {
            $sql = "INSERT INTO " .TABLE_AULA. " (" .COLUMN_AULA_ID. ", " .COLUMN_AULA_NAME. ", " .COLUMN_AULA_SHORTNAME. ", " .COLUMN_AULA_UBICACION. 
                 ", " .COLUMN_AULA_TIC. ", " .COLUMN_AULA_PCS. ") VALUES (NULL, :nombreAula, :codeAula, :ubiAula, :ticAula, :pcsAula)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':nombreAula', $nombreAula);
            $statement->bindParam(':codeAula', $codeAula);
            $statement->bindParam(':ubiAula', $ubiAula);
            $statement->bindParam(':ticAula', $ticAula);
            $statement->bindParam(':pcsAula', $pcsAula);
            $statement->execute();
        }

        function deleteAula($idAula) {
             $sql = "DELETE FROM " .TABLE_AULA. " WHERE id = :id";
            
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $idAula);
            $statement->execute();
            return $statement;
        }

        // CONSULTAS A RESERVA

        function getReservaFromAula($idAula) {
            $sql = "SELECT * FROM " .TABLE_RESERVA. 
                " WHERE " .COLUMN_RESERVA_AULARESERVADA. " = :idAulaReservada";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':idAulaReservada', $idAula);
            $statement->execute();
            return $statement;
        }

        function altaReserva() {
            $sql = "INSERT INTO" .TABLE_RESERVA. " (" .COLUMN_RESERVA_ID. ", ".COLUMN_RESERVA_HORA. ", ".COLUMN_RESERVA_HORASRESERVADAS. 
            ", ".COLUMN_RESERVA_DIA. ", ".COLUMN_RESERVA_DIASRESERVADOS. ", ".COLUMN_RESERVA_AULARESERVADA. ")
            VALUES (NULL, :hora, :horasReservadas:, :dia, :diasReservados, :idAulaReservada)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':hora', $hora);
            $statement->bindParam(':horasReservadas', $horasReservadas);
            $statement->bindParam(':dia', $dia);
            $statement->bindParam(':diasReservados', $diasReservados);
            $statement->bindParam(':idAulaReservada', $idAulaReservada);
            $statement->execute();
            return $statement;
        }

        function altaReservaPorDia($dia, $diasReservados, $idAulaReservada, $motivo) {
            $sql = "INSERT INTO" .TABLE_RESERVA. " (" .COLUMN_RESERVA_ID. ", ".COLUMN_RESERVA_DIA. ", ".COLUMN_RESERVA_DIASRESERVADOS. ", " .COLUMN_RESERVA_MOTIVO. ", " .COLUMN_RESERVA_AULARESERVADA. ")
            VALUES (NULL, :dia, :diasReservados, :motivo, :idAulaReservada)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':dia', $dia);
            $statement->bindParam(':diasReservados', $diasReservados);
            $statement->bindParam(':motivo', $motivo);
            $statement->bindParam(':idAulaReservada', $idAulaReservada);
            $statement->execute();
            return $statement;
        }

        function altaReservaPorHoras($hora, $horasReservadas, $idAulaReservada, $motivo) {
            $sql = "INSERT INTO" .TABLE_RESERVA. " (" .COLUMN_RESERVA_ID. ", ".COLUMN_RESERVA_HORA. ", ".COLUMN_RESERVA_HORASRESERVADAS. ", " .COLUMN_RESERVA_MOTIVO. ", ".COLUMN_RESERVA_AULARESERVADA. ")
            VALUES (NULL, :dia, :diasReservados, :motivo, :idAulaReservada)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':idReserva', $idReserva);
            $statement->bindParam(':hora', $hora);
            $statement->bindParam(':horasReservadas', $horasReservadas);
            $statement->bindParam(':motivo', $motivo);
            $statement->bindParam(':idAulaReservada', $idAulaReservada);
            $statement->execute();
            return $statement;
        }
    }
?>