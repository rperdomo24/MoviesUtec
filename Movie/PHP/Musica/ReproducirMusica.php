<?php
include ("../Database/conexion.php");

    SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
    }
    
    $EsPaga = $_SESSION['Cuenta'];

    $Cantautor = $_GET["Cantante"];

    $QueryCanciones = "SELECT ".
                    "IdCancion, " .
                    "Titulo, " .
                    "FKGenero, " .
                    "gc.Nombre, " .
                    "DuracionMinutos, " .
                    "Cantautores, " .
                    "UrlImgPortada, " .
                    "UrlCancion, " .
                    "UrlCancionPrueba " .
                    "FROM Canciones AS ca " .
                    "INNER JOIN GeneroCanciones AS gc ON gc.IdGeneroCancion = ca.FKGenero " .
                    "WHERE ca.Cantautores = '" . $Cantautor . "';";    
  
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
    <title>Escuchar <?php echo $Cantautor; ?></title>
  </head>
  <body>
  <?php include ("../Comun/Nav.php") ?>
<div class="col-lg-12" >
  <div class="container">
      <div class="col-lg-12" style="margin-bottom:50px;">
  <?php include ("../Buscador/BuscadorMusica.php") ?>
</div>
        <?php
        $_Musica = getRawSQLResultSet($connect, $QueryCanciones);
        while($Musica = mysqli_fetch_row($_Musica))
        {    
            echo '<div>';
            echo '<img width="248px" height="310px" src="' . $Musica[6] . '" title="" alt="img" />';
            echo '<p><h2><b>Ranking</b></h2></p>';
            echo '<p><input id="input-id" type="text" value="'. 5 .'" class="rating" data-size="lg" ></p>';
            echo '<p><b>' . $Musica[1] . ' - ' . $Musica[4] . 'min</b>.</p>';
            echo '<div id="PagaPro-aud-' . $Musica[0] . '">';
            echo '<img src="../../IMG/Paga.jpg" width="100px" />';
            echo '<a href="../Pago/Planes.php">Hazte Premium</a> para continuar escuchando tu música favorita sin restricciones!';
            echo '</div>';
            echo '<div id="cnt-aud-' . $Musica[0] . '">';
                echo '<audio src="' . $Musica[7] . '" id="aud-' . $Musica[0] . '" controls></audio>';
            echo '</div>';
            echo '</div>';
            echo '<br />';
            echo '<br />';
            echo '<br />';
            echo '';

            echo '<script>';
            echo '$(function(){';
            echo '    $("#PagaPro-aud-' . $Musica[0] .'").hide();';
            if($EsPro == 0){
                echo 'EvaluarTiempoCancion("aud-'.$Musica[0].'");';
            }
            echo '});</script>';
        }

        ?>
        <br>
        <br>
        <div class="col-lg-12" style="margin-top:100px">
            <div class="container">  
                <?php include ("CarruselCanciones.php") ?>
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
    $('.rating').rating({displayOnly: true, step: 0.5});
</script>
</body>
</html>