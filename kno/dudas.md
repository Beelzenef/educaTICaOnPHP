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

## Creando menús de navegación

Enlace a documentación de Bootstrap, [_navbars_](https://v4-alpha.getbootstrap.com/components/navbar/#supported-content).

```php
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
            </nav>";
        }
```