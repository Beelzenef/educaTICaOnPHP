<!DOCTYPE html>
<html lang="es">
    <head>
            <title>Saludos a humanos</title>
            <meta charset="utf-8"/>
    </head>
    <body>
        <?php

            /**
            * Ejemplo de comentario multilinea
            * Las comillas dobles interpretan las variables $
            * Estos comentarios solo se interpretan y deben permanecer dentro de bloques PHP
            */

            // Las comillas simples no interpretan el contenido de variables $

            $nombreusuario = "humanio";

            print "<h3>hey there!</h3>";
            echo "<h3>hola holita phpcillo! bienvenido $nombreusuario</h3>";

            echo "<p>Tu nombre es ".$nombreusuario."</p>";

            echo '<p>Así pues considerate saludado, $nombreusuario</p>';

            echo '<p>Nos veremos pronto, '.$nombreusuario.'</p>';
        ?>
    </body>
</html>