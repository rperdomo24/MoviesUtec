<?php
/*require_once("functions.php");*/
include ("../Database/conexion.php");
$email      = $_GET['email'];
$pass       =$_GET['pass'];
$query      ="SELECT * FROM usuarios WHERE CorreoElectronico = '$email' AND Contrasenna = '$pass'";
$arr        = getSQLResultSet($connect,$query);
//$arr      = getSQLResultSet("SELECT Nick_name FROM usuario");
echo $arr;

function getSQLResultSet($connect,$commando){
//$mysqli   = new mysqli("localhost", "mtechwor_test", "test_abc123.", "mtechwor_Test");
$mysqli     = $connect;
//echo(var_dump($mysqli));
/* check connection */
if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
printf("Error: %s\n", $mysqli->connect_errno);
exit();
}else{

$rq         = $mysqli->query($commando);
$all        = mysql_fetch_all($rq);
return $all;
}
$mysqli->close();
}

function mysql_fetch_all($result) {
$return     = array();
$i          =0;
while($row  =mysqli_fetch_row($result)) {
$return["respuestas"][$i] = array("IdUsuario" => $row[0],"Usuario" => $row[1],"CorreoElectronico"=>$row[2],"Nombres"=>$row[4],"Apellidos"=>$row[5],"Cuenta"=>$row[6]);
$i++;
}
return json_encode($return);
}
?>
