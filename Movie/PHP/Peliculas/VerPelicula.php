<?php
include ("../Database/conexion.php");

SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
        $email = $_SESSION['CorreoElectronico'];
        $Nombre = $_SESSION['Nombres'];
    }
    
    $PeliculaId = $_GET["Pelicula"];

    $QueryComentario = "SELECT post_id, fecha, name, email, comentarios from comentarios where IdPelicula =". $PeliculaId .";";

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
                    "tr.UrlTriller, " .
                    "Ranking " .
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
    <link href="..\..\Vendor\start-boostrap\css\star-rating.min.css" rel="stylesheet">
    <title>Ver <?php while($Nombre = mysqli_fetch_row($NombrePelicula)) { echo $Nombre[0]; }?></title>
  </head>
  <body>
  <?php include ("../Comun/Nav.php") ?>
<div class="col-lg-12" >
  <div class="container">
      <div class="col-lg-12" style="margin-bottom:50px;">
  <?php include ("../Buscador/Buscador.php") ?>
</div>
        <?php
        $_Pelicula = getRawSQLResultSet($connect, $QueryPelicula);
        while($Pelicula = mysqli_fetch_row($_Pelicula))
        {    
            echo '<div>';
            echo '<img width="248px" height="310px" src="' . $Pelicula[13] . '" title="" alt="img" />';
            echo '<p><h2><b>Ranking</b></h2></p>';
            echo '<p><input id="input-id" type="text" value="'. $Pelicula[16].'" class="rating" data-size="lg" ></p>';
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
<div class="col-md-12 clear"><hr><h3>Escribe tu comentario</h3>
<input type="hidden" id="Nombres" value="<?php echo $nom ?>"/>
<input type="hidden" id="email" value="<?php echo $email ?>"/>
<input type="hidden" id="PeliculaId" value="<?php echo $PeliculaId ?>"/>

            </div>
           <div class="col-md-12">
           			<div class="container-fluid well span8">
           
            <div class="panel panel-default">
                <div class="panel-body">  
                        <textarea class="form-control counted" name="message"  id="message" placeholder="Digita tu comentario" rows="5" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter">320 caracteres</h6>
                        <button class="btn btn-info" id="Comentar" type="submit" onclick="Comentar();">Comentar</button>                    
                </div>
            </div>
        </div>
	</div>	
 </div>	

<br>
<h1>Comentarios </h1>
<div class="col-lg-12"> 

  <?php
        $_Comentarios = getRawSQLResultSet($connect, $QueryComentario);
        while($Comentario = mysqli_fetch_row($_Comentarios))
        {    
         
            echo '<br>';
            echo '<input type="hidden" id="Comentario" value="'. $Comentario[0] .'"/>';
            echo '<div class="row clear"><hr>';
            echo '<div class="col-md-2 col-md-offset-1" >';
            echo '<img src="https://cdn.icon-icons.com/icons2/1097/PNG/512/1485477097-avatar_78580.png" width="100" height="100" class="img-circle">';
            echo '</div>';

            echo '<div class="col-md-8 ">';
            echo '<h3>'. $Comentario[2] .'</h3>';
            echo '<h4>'. $Comentario[3] .'</h4>';
            echo '<small><h5>'. $Comentario[1] .'</h5></small>';
            echo  $Comentario[4] ;
            echo '</div>';


            echo '</div>';
            echo '<br>';

        }
    ?>

</div>



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
<script src="..\..\Vendor\start-boostrap\js\star-rating.min.js"></script>
<script src="..\..\Vendor\alertify\alertify.min.js"></script>
<script src="..\..\Vendor\Scripts\Funciones.js"></script>
<script>
     $('#input-id').rating({displayOnly: true, step: 0.5});
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
<script>


function Comentar(){
  var message = $("#message").val();
  var nombre = $("#Nombres").val();
  var email = $("#email").val();
  var PeliculaId = $("#PeliculaId").val();
  console.log(PeliculaId);

   if(!$.isEmptyObject(message)){
            $('#cargando').show();
               $.ajax({
                 method: "GET",
                 url: "../Database/Comentarios.php",
                 data: { 
                    message: message,
                    nombre: nombre,
                    email: email,
                    PeliculaId:PeliculaId
                      }
               })
                 .done(function( msg ) {
                    $('#cargando').hide();
                   data= JSON.parse(msg);
                     if(data.Result == 1){
                        alertify.success('Comentario Agregado Correctamente');
                        setTimeout("location.reload();",1000);
                     }

                 })
                 .fail(function (msg) {
                    $('#cargando').hide();
                alert( "error: " + msg );
                });
            
         
       
     
    }else{
  alertify.error('Digite correctamente un Comentario');
    }
  
}

</script>