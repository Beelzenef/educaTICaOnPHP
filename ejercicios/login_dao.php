<?php

define ("DATABASE", "inventory");
define ("MYSQL_HOST", "mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER", "www-data");
define ("MYSQL_PASSWORD","www-data");

define ("USER_TABLE", "user");
define ("USERNAME_COLUMN", "name");
define ("USERPASSW_COLUMN", "password");

define ("TABLE_DEPENDENCY", "dependencia");
define ("COLUMN_DEPENDENCY_ID", "id");
define ("COLUMN_DEPENDENCY_NAME", "name");
define ("COLUMN_DEPENDENCY_SHORTNAME", "shortname");

define ("TABLE_SECTOR", "producto");
define ("COLUMN_SECTOR_ID", "id");
define ("COLUMN_SECTOR_NAME", "nombre");
define ("COLUMN_SECTOR_SHORTNAME", "precio");
define ("COLUMN_SECTOR_DEPENDENCY", "idDependencia");

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

        function listarProds()
        {
            try {
                $consulta = 'select nombre, precio from producto where precio > :precio';

                $sentencia = $this->conn->prepare($consulta, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sentencia->execute(array(':precio' => 10));
                $productos = $sentencia->fetchAll();

                return $productos;
            } catch (PDOException $e)
            {
                $this->error = "Error al hacer consulta en tabla";
            }
        }

        function getDependencies()
        {
                $sql = "SELECT * FROM " .TABLE_DEPENDENCY;

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

        function getSectorsByDependency($idDep) {
            $sql = "SELECT * FROM " .TABLE_SECTOR. 
                " WHERE " .COLUMN_SECTOR_DEPENDENCY. " = :idDep";

            // Otras fórmulas:
            //$sql = "SELECT * FROM " .TABLE_SECTOR. " WHERE " .COLUMN_SECTOR_DEPENDENCY. " = ? ";
            //return $statement->execute(array($idDep));

            $statement = $this->conn->prepare($sql);

            $statement->bindParam(':idDep', $idDep);
            // Más fórmulas
            //return $statement->execute(array('idDep' => $idDep));
            $statement->execute();
            return $statement;
        }

        function addNewDependency($name, $shortname) {
            $sql = "INSERT INTO " .TABLE_DEPENDENCY. " (id, name, shortname) VALUES (NULL, :nameDep, :shortnameDep)";

            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':nameDep', $name);
            $statement->bindParam(':shortnameDep', $shortname);

            $statement->execute();
        }

        function deleteDependency($id) {

            $sql = "DELETE FROM " .TABLE_DEPENDENCY. " WHERE id = :id";
            
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':id', $id);

            $statement->execute();
            return $statement;
        }
    }

?>