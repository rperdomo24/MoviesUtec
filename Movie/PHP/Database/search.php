<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

include ("../Database/conexion.php");

function search($connect)
{
  $mysqli = $connect;
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT pe.IdPelicula as id ,pe.Titulo as title FROM mysqldatabase29190.peliculas as pe WHERE pe.Titulo LIKE '%$search%' Limit 5";
  $res = $mysqli->query($query);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {   
    echo "<p><a href='../Peliculas/VerPelicula.php?Pelicula= $row[id]'>$row[title]</a></p>";
  }
}

search($connect);