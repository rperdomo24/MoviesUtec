<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

include ("../Database/conexion.php");

function search($connect)
{
  //$mysqli = $connect;
  //$search = $mysqli->real_escape_string($_POST['search']);
  $search = $_POST['search'];
  $query = "SELECT DISTINCT cantautores FROM canciones WHERE cantautores LIKE '%$search%' Limit 5;";
  //$res = $mysqli->query($query);
  $result = getRawSQLResultSet($connect, $query);
  while ($row = mysqli_fetch_row($result)) {   
    echo '<p><a href="../Musica/ReproducirMusica.php?Cantante=' . $row[0] . '">' . $row[0] . '</a></p>';
  }
}

search($connect);