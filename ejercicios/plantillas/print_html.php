<?php

function showHTMLHeader($titulo)
{
    print "
    <!DOCTYPE html>
    <html lang=\"es\">
        <head>
                <title>" .$titulo. "</title>
                <meta charset=\"utf-8\"/>
        </head>
        <body>";
}

function showHTMLFooter()
{
    print "
    </body>
    </html>";
}

?>