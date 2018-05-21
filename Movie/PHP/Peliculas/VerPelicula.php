<?php
include ("../Database/conexion.php");

SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
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
                    "UrlPelicula, " .
                    "tr.UrlTriller " .
                    "FROM peliculas AS pe " .
                    "LEFT JOIN Trailers AS tr on tr.FKPelicula = pe.IdPelicula " .
                    "INNER JOIN generopelicula AS gp on gp.IdGeneroPelicula = pe.FKGenero " .
                    "INNER JOIN nacionalidades AS na on na.IdNacionalidad = pe.FKNacionalidad " .
                    "INNER JOIN clasificacionpelicula AS cl on cl.IdClasificacionPelicula = pe.FKClasificacion " .
                    "WHERE pe.IdPelicula=" . $PeliculaId . ";";                    

    $NombrePelicula = getRawSQLResultSet($connect, "SELECT Titulo FROM Peliculas WHERE IdPelicula=" . $PeliculaId . ";");
  
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
  <?php include ("../Comun/Nav.php") ?>
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

            if(!is_null($Pelicula[15])){
                echo '<center>TRAILER</center>';
                echo '<center><video id="idTrilerPelicula" width="80%" controls>';
                echo '<source src="' . $Pelicula[15] . '" type="video/mp4" >';
                echo '</video></center>';
                if($EsPro < 1){
                    echo '<center><a href="#">Hazte PRO para ver la pelicula completa!</a></center>';
                    echo '<center><img id="PagaPro" src="../../IMG/Paga.jpg" /></center>';
                }
                echo '<br>';
            }
            echo '<br>';
            echo '<br>';
            if($EsPro > 0){
                echo '<center><div id="cntPelicula"><video id="idPelicula" width="80%" controls>';
                echo '<source src="' . $Pelicula[14] . '" type="video/mp4" >';
                echo '</video></div></center>';
            }
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
        $("img#PagaPro").hide();
        /*
        var EsPro = <?php echo $EsPro; ?>;
        if(EsPro == 0){
            $("img#PagaPro").hide();
            EvaluarTiempoVideo();
        }*/
    });

</script>
</body>
</html>