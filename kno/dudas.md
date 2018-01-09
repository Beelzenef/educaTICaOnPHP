# Dudas

Aparecen en clase y _damn_!

## Recogiendo consulta con control de errores


```php
function getItems() {
        $sql = "SELECT * FROM " .TABLE;
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

```
