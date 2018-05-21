<?php
include ("../Database/conexion.php");

SESSION_START();

	if(!isset($_SESSION['Usuario'])) {
		header("Location: ..\Registro\Login.php");
	}
	else {
    $nom = $_SESSION['Usuario'];
  }

  function getSQLResultSet($connect, $Query){
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

  $QueryGeneroPelicula = "SELECT IdGeneroPelicula, ".
                        "Nombre, " .
                        "Descripcion " .
                        "FROM GeneroPelicula " .
                        "WHERE EXISTS (SELECT * FROM Peliculas WHERE FKGenero = IdGeneroPelicula) " .
                        "ORDER BY Nombre ASC;";

  $TodosGeneros = getSQLResultSet($connect, $QueryGeneroPelicula);
  
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
            <li><a href="#">Haste Pro!</a></li>
            <li><a href="..\..\PHP\Registro\Login.php">Cerrar Sesion</a></li>
            <li><h4><b>Hola <?php echo $nom;?>!<b> ¿Qué deseas ver hoy?</h4></li>
          </ul>
        </div>
      </div>
    </nav>
</div>
    
    <div class="col-lg-12" style="margin-top:100px">
      <div class="container">  
          <?php include ("../Peliculas/CarruselPeliculas.php") ?>
      </div>
    </div>
    <footer>
      <p>© 2018 Utec</p>
    </footer>
  </div>
</div>
<script src="..\..\Vendor\Jquery\jquery-3.3.1.min.js"></script>
<script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>
<script src="..\..\Vendor\alertify\alertify.min.js"></script>
<script>

$(function(){
  $('div.tile').on('click', function(){
    var href = $(this).attr("data-href");
    if(href){
      window.location.href = href;
    }
  });
});

</script>
</body>
</html>