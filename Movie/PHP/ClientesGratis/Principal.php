<?php
include ("../Database/conexion.php");

SESSION_START();

	if(!isset($_SESSION['Usuario'])) {
		header("Location: ..\Registro\Login.php");
	}
	else {
    $nom = $_SESSION['Usuario'];
  }

  $queryPeliculas = 
          "SELECT Titulo, " .
          "Sinopsis, " .
          "UrlPaginaOficial, " .
          "gp.Nombre AS Genero, " .
          "gp.Descripcion AS GeneroDescripcion, " .
          "na.Nombre AS Nacionalidad, " .
          "DuracionMinutos, " .
          "Anio, " .
          "Directores, " .
          "Actores, " .
          "cl.Nombre AS Clasificacion, " .
          "cl.Descripcion AS ClasificacionDescripcion, " .
          "UrlImgPortada, " .
          "UrlPelicula " .
          "FROM peliculas AS pe " .
          "INNER JOIN generopelicula AS gp on gp.IdGeneroPelicula = pe.FKGenero " .
          "INNER JOIN nacionalidades AS na on na.IdNacionalidad = pe.FKNacionalidad " .
          "INNER JOIN clasificacionpelicula AS cl on cl.IdClasificacionPelicula = pe.FKClasificacion " .
          "ORDER BY pe.Anio DESC;";

  $result = getSQLResultSet($connect, $queryPeliculas);
  
  function getSQLResultSet($connect, $commando){
    $mysqli = $connect;
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      printf("Error: %s\n", $mysqli->connect_errno);
      exit();
    } else {
      $rq = $mysqli->query($commando);
      return $rq;
    }
    $mysqli->close();
  }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal</title>
    <link href="../../CSS/Slider.css" rel="stylesheet">
    <link href="..\..\Vendor/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\..\CSS/carousel.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.rtl.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\themes\default.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Peliculas Utec</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">Inicio</a></li>
                <li><a href="..\..\PHP\Pago\Planes.php">Haste Pro!</a></li>
                <li><a href="..\..\PHP\Registro\Login.php">Cerrar Sesion</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="col-lg-12" style="margin-top:100px">
      <div class="container">
      <h5>Hola! <b><?php echo $nom;?><b> ¿Qué deseas ver hoy?</h5>

  <?php 
    while($row = mysqli_fetch_row($result)) {
      echo '<div class="row__inner">';
      echo '<div class="tile__media">';
      echo '<img class="tile__img" src="' . $row[12] . '"/>';
      echo '</div>';
      echo '<div class="tile">' . $row[0] . ' - ' . $row[7] . '</div>';
      echo '<div class="tile__details">Sinopsis: ' . $row[1] . '</div>' ;
      echo '</div>';
/*
      $return[$i] = array("Titulo"=>$row[0],
        "Sinopsis"=>$row[1],
        "UrlPaginaOficial"=>$row[2],
        "Genero"=>$row[3],
        "GeneroDescripcion"=>$row[4],
        "Nacionalidad"=>$row[5],
        "DuracionMinutos"=>$row[6],
        "Anio"=>$row[7],
        "Directores"=>$row[8],
        "Actores"=>$row[9],
        "Clasificacion"=>$row[10],
        "ClasificacionDescripcion"=>$row[11],
        "UrlImgPortada"=>$row[12],
        "UrlPelicula"=>$row[13]
      );
      */
    }
  ?>


      <!--
<div class="contain">
<h1>Categorias de Peliculas<small> usuario gratuito</small> </h1>
<div class="row">
  <h1>Romanticas</h1>
<div class="row__inner">
<div class="tile">
<div class="tile__media">
<img class="tile__img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-1.jpg" alt=""  />
</div>
<div class="tile__details">
<div class="tile__title">
Top Gear
</div>
</div>
</div>

<div class="tile">
<div class="tile__media">
<img class="tile__img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-2.jpg" alt=""  />
</div>
<div class="tile__details">
<div class="tile__title">
<a href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-2.jpg">Top Gear</a>
</div>
</div>
</div>

</div>
</div>

<div class="row">
  <h1>Comedia</h1>
<div class="row__inner">
<div class="tile">
<div class="tile__media">
<img class="tile__img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-1.jpg" alt=""  />
</div>
<div class="tile__details">
<div class="tile__title">
Top Gear
</div>
</div>
</div>

<div class="tile">
<div class="tile__media">
<img class="tile__img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-2.jpg" alt=""  />
</div>
<div class="tile__details">
<div class="tile__title">
<a href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/70390/show-2.jpg">Top Gear</a>
</div>
</div>
</div>

</div>
</div>-->

      </div>
    </div>
  <footer>
    <p>© 2018 Utec</p>
  </footer>
</div>
<script src="..\..\Vendor\Jquery\jquery-3.3.1.min.js"></script>
<script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>
<script src="..\..\Vendor\alertify\alertify.min.js"></script>
<script>

</script>
</body>
</html>