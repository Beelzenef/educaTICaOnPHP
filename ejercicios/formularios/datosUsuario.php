<?php

include "../plantillas/print_html.php";

// Rescatando datos:
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$username = $_POST["username"];
$passwd = $_POST["passwd"];
$pass_rpt = $_POST["passwd_repeat"];
$email = $_POST["email"];
$fecha = $_POST["fecha"];
$ciudad = $_POST["ciudad"];
$pais = $_POST["pais"];
$acepta = isset($_POST["acepta"]);
$frec = $_POST["frec"];

// Mostrando HTML:
howHTMLHeader("Recogiendo datos de usuario");

	print "El usuario " .$nombre. " y " .$apellidos. ", nacido en " .$fecha. ", con usuario " .$username. " y email " .$email. " ";

	if ($acepta)
		print "acepta ";
	else
		print "no acepta ";

	print "los términos y condiciones de uso de rolForevah.</p>";

	print "<p> Se registra desde " .$ciudad. ", en " .$pais. "</p>";

	print "<p> Su contraseña y repetición de contraseña ";

	if ($passwd == $passwd_repeat)
		print "<p>coinciden</p>";
	else
		print "<p>no coinciden</p>";

	print "<p> Ha decidido recibir novedades cada " .$frec. "</p>";

showHTMLFooter();

?>