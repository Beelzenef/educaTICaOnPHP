<?php
define ("DATABASE", "educatica");
define ("MYSQL_HOST", "mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER", "www-data");
define ("MYSQL_PASSWORD","www-data");
define ("USER_TABLE", "user");
define ("USERNAME_COLUMN", "name");
define ("USERPASSW_COLUMN", "password");
define ("TABLE_AULA", "aula");
define ("COLUMN_AULA_ID", "id");
define ("COLUMN_AULA_NAME", "nombre");
define ("COLUMN_AULA_SHORTNAME", "codigo");
define ("COLUMN_AULA_UBICACION", "ubicacion");
define ("COLUMN_AULA_TIC", "tic");
define ("COLUMN_AULA_PCS", "pcs");
define ("TABLE_RESERVA", "reserva");
// Definir columnas de tabla RESERVA
define ("COLUMN_AULARESERVADA", "idAula")

    class DAO {
        // Variables
        protected $conn;
        public $err;
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
        // Método para comprobar si el campo conn es igual a null
        // ¿Hay conexión a la base de datos?
        function isConnected()
        {
           if ($this->conn == null)
                return false;
            return true;
        }
        // Función que comprueba si el usuario existe en la BD
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
        // Destructor de la Clase
        function _destruct()
        {
            if ($this->isConnected())
            {
                $this->conn = null;
                unset($this->err);
            }
        }
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

        // Añadir aulas
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

        // Eliminar aulas
        function deleteAula($idAula) {
             $sql = "DELETE FROM " .TABLE_AULA. " WHERE id = :id";
            
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $idAula);
            $statement->execute();
            return $statement;
        }

        // Obtener reservas de un aula concreta
        function getReservaFromAula($idAula) {
            $sql = "SELECT * FROM " .TABLE_RESERVA. 
                " WHERE " .COLUMN_AULARESERVADA. " = :idAula";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':idAula', $idAula);
            $statement->execute();
            return $statement;
        }
    }
?>