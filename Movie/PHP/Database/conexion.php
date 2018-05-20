<?php
$server = "localhost";//servidor
$user = "id5758277_entretenimientoutec";//usuario
$password = "abc123...";//poner tu propia contraseña, si tienes una.
$bd = "id5758277_entretenimientoutec";//base de dato
	//funcion que verifica la conexion
	$connect = mysqli_connect($server, $user, $password, $bd);
	if (!$connect){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}
?>
