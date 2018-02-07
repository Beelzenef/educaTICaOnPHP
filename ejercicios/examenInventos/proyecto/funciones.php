<?php

function cabecera($texto) 
{
    print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">
    <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
       \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<html xmlns=\"http://www.w3.org/1999/xhtml\">
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
	<title>Examen Inventos- $texto</title>
	<link href=\"estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
	</head>\n\n<body>\n";
}

function pie() 
{
    print "</div>
           <div id=\"pie\">
           </div>
           </body>
           </html>";
}
