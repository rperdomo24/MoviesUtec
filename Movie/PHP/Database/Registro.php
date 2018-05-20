<?php

include ("../Database/conexion.php");
$Username=$_GET['Usuario'];
$Mail=$_GET['CorreoElectronico'];
$Password=$_GET['Contrasenna'];
$Nombre=$_GET['Nombres'];
$Apellidos=$_GET['Apellidos'];
$Cuenta=$_GET['Cuenta'];

     if($Mail != ""){
       $query ="INSERT INTO usuarios(Usuario, CorreoElectronico, Contrasenna, Nombres, Apellidos, Cuenta)
       VALUES ('$Username','$Mail','$Password','$Nombre','$Apellidos','$Cuenta')";
          InsertUsuario($connect,$query);
     }else{
        $Error = (object) ['Result' => 0];
        echo json_encode($Error, true);
        exit();
     }

function InsertUsuario($connect,$commando){
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
