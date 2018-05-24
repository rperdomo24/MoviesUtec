<?php

include ("../Database/conexion.php");
$IdUsuario=$_GET['IdUsuario'];
$IdProducto=$_GET['IdProducto'];
$Total=$_GET['Total'];

     if($IdUsuario != ""){
        $QueryCompra = "INSERT INTO facturas (FKIdUsuario, FKIdProducto, FechaCompra,FechaVencimiento,Total)
        VALUES ('$IdUsuario','$IdProducto', now(),adddate(now(),interval 30 DAY),'$Total');";
        $QueryCompra .= "update usuarios set FechaVencimiento = adddate(now(),interval 30 DAY), Cuenta = 1 where IdUsuario = '$IdUsuario';";

          InserFactura($connect,$QueryCompra);        
     }else{
        $Error = (object) ['Result' => 0];
        echo json_encode($Error, true);
        exit();
     }

function InserFactura($connect,$commando){
	$mysqli = $connect;
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		printf("Error: %s\n", $mysqli->connect_errno);
		exit();
	}else{
		if($mysqli->multi_query($commando)=== TRUE)
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
