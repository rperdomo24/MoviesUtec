<?php
$server = "moviesutec-mysqldbserver.mysql.database.azure.com";//servidor
$user = "MoviesUtec@moviesutec-mysqldbserver";//usuario
$password = "abc123..";//poner tu propia contraseña, si tienes una.
$bd = "mysqldatabase29190";//base de dato
	//funcion que verifica la conexion
	$connect = mysqli_connect($server, $user, $password, $bd);
	/*$connect = mysqli_connect($server, $user, $password, $bd);*/
	/*cambios nuevos*/
	if (mysqli_connect_errno($connect)){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}

	function getRawSQLResultSet($connect, $Query){
        $mysqli=$connect;
		if ($mysqli->connect_errno) {
		  printf("Connect failed: %s\n", $mysqli->connect_error);
		  printf("Error: %s\n", $mysqli->connect_errno);
		  exit();
		} else {
		  return $mysqli->query($Query);
		}
		$mysqli->close();
	}
?>
