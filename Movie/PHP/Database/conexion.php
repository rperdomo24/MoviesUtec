<?php
$server = "moviesutec-mysqldbserver.mysql.database.azure.com";//servidor
$user = "MoviesUtec@moviesutec-mysqldbserver";//usuario
$password = "abc123..";//poner tu propia contraseña, si tienes una.
$bd = "mysqldatabase29190";//base de dato
	//funcion que verifica la conexion
	$connect = mysqli_init();
	mysqli_real_connect($conn, $server, $username, $user, $bd, 3306);
	/*$connect = mysqli_connect($server, $user, $password, $bd);*/
	if (!$connect){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}
?>
