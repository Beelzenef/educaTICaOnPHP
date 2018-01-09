<?php

function showHTMLHeader($titulo)
{
    print "
    <!DOCTYPE html>
    <html lang=\"es\">
        <head>
                <title>" .$titulo. "</title>
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <meta charset=\"UTF-8\">
             
                <!-- CSS de Bootstrap -->
                <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
        </head>
        <body>
        <p>Con Bootstrap</p>
        <script src=\"http://code.jquery.com/jquery.js\"></script>
        <script src=\"js/bootstrap.min.js\"></script>
        ";
}

function showHTMLFooter()
{
    print "
    </body>
    </html>";
}

?>