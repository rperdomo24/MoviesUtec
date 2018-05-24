<?php

include ("../Database/conexion.php");
$message=$_GET['message'];
$nombre=$_GET['nombre'];
$email=$_GET['email'];
$PeliculaId=$_GET['PeliculaId'];
     if($message != ""){
        $QueryComentario = "insert into comentarios (IdPelicula,fecha,name,email,comentarios) 
        values($PeliculaId,now(),'$nombre','$email','$message');";

          InsertComentario($connect,$QueryComentario);        
     }else{
        $Error = (object) ['Result' => 0];
        echo json_encode($Error, true);
        exit();
     }

function InsertComentario($connect,$commando){
	$mysqli = $connect;
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		printf("Error: %s\n", $mysqli->connect_errno);
		exit();
	}else{
		if($mysqli->query($commando)=== TRUE)
    {
      $Succes = (object) ['Result' => 1];
      echo json_encode($Succes, true);
      	return $Succes;
      exit();
    }
    else{
      $Error = (object) ['Result' => 0];
      echo json_encode($Error, true);
      	return $Error;
      exit();
    }
	}
	$mysqli->close();
}



 ?>
