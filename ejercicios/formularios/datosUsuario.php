<?php

include "print_html.php";

// Elena Guzmán Blanco - SGEMP

// Rescatando datos:
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$username = $_POST["username"];
$passwd = $_POST["passwd"];
$passwd_repeat = $_POST["passwd_repeat"];
$email = $_POST["email"];
$ciudad = $_POST["ciudad"];
$pais = $_POST["pais"];
$acepta = isset($_POST["acepta"]);
$frec = isset($_POST["frec"]);

if ($frec)
    $frecuenciaElegida = $_POST["frec"];


// Mostrando HTML:
showHTMLHeader("Recogiendo datos de usuario");

	print "El usuario " .$nombre. " " .$apellidos. ", con usuario " .$username. " y email " .$email. " ";

	if ($acepta)
		print "acepta ";
	else
		print "no acepta ";

	print "los términos y condiciones de uso de rolForevah.</p>";

	print "<p> Se registra desde " .$ciudad. ", en " .$pais. "</p>";

	print "<p> Su contraseña y repetición de contraseña ";

	if ($passwd == $passwd_repeat)
		print "coinciden</p>";
	else
		print "no coinciden</p>";

    if ($frec)
	    print "<p> Ha decidido recibir novedades cada " .$frecuenciaElegida. "</p>";

showHTMLFooter();

?>