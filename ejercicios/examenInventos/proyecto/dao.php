<?php

class DAO {

    protected $conn;

    function __construct() {
        try {
            $this->conn = new PDO('mysql:dbname=inventos;host=localhost', 'www-data', 'www-data');
        }
        catch (PDOException $e) {
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    function hayConexion() {
        if ($this->conn == null)
            return false;
        return true;
    }

    function getInventos() {
        $sql = "select * from creadoresycosis";

        try {
            $resultado = $this->conn->query($sql);
            return $resultado->fetchAll();
        }
        catch (Exception $e) {
            echo "<p> ¡Error! " .$e->getMessage(). "</p>";
        }
    }

    function anadirItem($invento, $inventor) {

        if (!$this->existeItem($invento))
        {
            try {
                $sentencia = "INSERT INTO creadoresycosis (id, inventor, invento) VALUES (NULL, :inventor, :invento)";
                $statement = $this->conn->prepare($sentencia);
                $statement->bindParam(":inventor", $inventor);
                $statement->bindParam(":invento", $invento);

                if ($statement->execute()) {
                    echo "<p> ¡Invento añadido! </p>";
                }
                else {
                    echo "<p> Error al insertar invento </p>";
                }

            }
            catch (Exception $e) {

            }
        }
        else {
            echo "<p class=\"aviso\"> El invento que intentas añadir ya existe en la base de datos</p>";
        }
    }

    function existeItem($invento) {
        $sql = "select invento from creadoresycosis where invento rlike '" .$invento. "'";
        $resultado = $this->conn->query($sql);
        if (count($resultado->fetchAll()) > 0)
            return true;
        return false;
    }

    function consultaAleatoria() {
        $consulta = "select count(*) from creadoresycosis";
        $sentencia = $this->conn->query($consulta);
        $numeroRegistros = $sentencia->fetchColumn();
        $numeroPregunta = rand(0, $numeroRegistros);

        return $numeroPregunta;
    }

    function getInventorAleatorio () {
        $sql = "select * from creadoresycosis where id = " .$this->consultaAleatoria(). "";
        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll();
    }
}
?>