<?php
include ("../Database/conexion.php");

SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
    }

    if(!isset($_SESSION['Cuenta'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $EsPro = $_SESSION['Cuenta'];
    }
    
    $PeliculaId = $_GET["Pelicula"];

    $QueryPelicula = "SELECT IdPelicula, " .
                    "Titulo, " .
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
                    "WHERE pe.IdPelicula=" . $PeliculaId . ";";

    $NombrePelicula = getSQLResultSet($connect, "SELECT Titulo FROM Peliculas WHERE IdPelicula=" . $PeliculaId . ";");
  
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../CSS/Slider.css" rel="stylesheet">
    <link href="..\..\Vendor/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\..\CSS/carousel.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.rtl.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\themes\default.min.css" rel="stylesheet">
    <title>Ver <?php while($Nombre = mysqli_fetch_row($NombrePelicula)) { echo $Nombre[0]; }?></title>
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
            <li><a href="../ClientesGratis/Principal.php">Inicio</a></li>

            <li><a href="../Pago/Planes.php">Haste Pro!</a></li>

            <li><a href="..\..\PHP\Registro\Login.php">Cerrar Sesion</a></li>
            <li><h4><b>Hola <?php echo $nom;?>!<b> ¿Qué deseas ver hoy?</h4></li>
          </ul>
        </div>
      </div>
    </nav>
</div>
    
<div class="col-lg-12" style="margin-top:100px">
  <div class="container">
        <?php
        $_Pelicula = getRawSQLResultSet($connect, $QueryPelicula);
        while($Pelicula = mysqli_fetch_row($_Pelicula))
        {    
            echo '<div>';
            echo '<img width="248px" height="375px" src="' . $Pelicula[13] . '" title="" alt="img" />';
            echo '<p><b>' . $Pelicula[1] . ' - ' . $Pelicula[7] . 'min</b>.</p>';
            echo '<p><b>Año: </b>' . $Pelicula[8] . '.</div>';
            echo '<p><b>Clasificacion: </b>' . $Pelicula[11] . '.</p>';
            echo '<p><b>Género: </b>' . $Pelicula[4] . '.</p>';
            echo '<p><b>Directores: </b>' . $Pelicula[9] . '.</p>';
            echo '<p><b>Actores: </b>' . $Pelicula[10] . '.</p>';
            echo '<p><b>Sinopsis: </b>' . $Pelicula[2] . '</p>';           
            echo '</div>';
            echo '';
            echo '';

            if($EsPro == 0){
                echo '<center><a href="#">Hazte PRO para ver la pelicula completa!</a></center>';
                echo '<center><img id="PagaPro" src="../../IMG/Paga.jpg" /></center>';
            }
            
            echo '<center><div id="cntPelicula"><video id="idPelicula" width="80%" controls>';
                echo '<source src="' . $Pelicula[14] . '" type="video/mp4" >';
            echo '</video></div></center>';
        }

        ?>
        <br>
        <br>
        <div class="col-lg-12" style="margin-top:100px">
            <div class="container">  
                <?php include ("CarruselPeliculas.php") ?>
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
<script src="..\..\Vendor\Scripts\Funciones.js"></script>
<script>
    $(function(){
        var EsPro = <?php echo $EsPro; ?>;
        if(EsPro == 0){
            $("img#PagaPro").hide();
            EvaluarTiempoVideo();
        }
    });

</script>
</body>
</html>