<?php
$server = "moviesutec-mysqldbserver";//servidor
$user = "MoviesUtec";//usuario
$password = "abc123...";//poner tu propia contraseña, si tienes una.
$bd = "mysqldatabase29190";//base de dato
	//funcion que verifica la conexion
	$connect = mysqli_connect($server, $user, $password, $bd);
	if (!$connect){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}
?>
