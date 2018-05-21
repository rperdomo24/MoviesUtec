<?php 
include ("../Database/conexion.php");
SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
    }

      $QueryPlanes =  "Select 
      idCatalogoPlanes,
      NoMesPlan,
      PrecioPlan,
      FechaCompraPlan,
      ComentarioPlan,
      TipoPago
      from catalogoplanes";

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


?>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Principal</title>
    <link href="..\..\Vendor/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="..\..\CSS/carousel.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\alertify.rtl.min.css" rel="stylesheet">
    <link href="..\..\Vendor\alertify\css\themes\default.min.css" rel="stylesheet">
  </head>

  <body>
    <?php include ("../Comun/Nav.php") ?>
    <div class="col-lg-12">       
<div class="container">
    <div class="row">
  <div class="text-center">
    <h2>Nuestros Planes</h2>
    <h3>Lo mejor para ti! <?php echo $nom;?>!</h>
    <h4>Se premium por los meses que tu desees</h4>
    
  </div>
  <div class="row">
  <div class="col-lg-12">
  <?php
        $_Planes = getSQLResultSet($connect, $QueryPlanes);
        while($Planes = mysqli_fetch_row($_Planes))
        {    
            echo '<div class="col-sm-6">';
            echo '<input type="hidden" value="'.$Planes[0].'"/>';
            echo '<div class="panel panel-default text-center">';
            echo  '<div class="panel-heading">';
            echo '<h1> <strong><i class="glyphicon glyphicon glyphicon-user"></i></strong> '.$Planes[1].'</h1>';
            echo '</div>';
            echo '<div class="panel-body">';
            echo '<h3><p><small>' . $Planes[4].'</small></p></h3>';
            echo '</div>';
            echo '<div class="panel-footer">';
            echo '<h3> $'. $Planes[2].'</h3>';
            echo '<h4>'. $Planes[5].' Mensual <h4>';
            if($Planes[2] != 0){
              echo '<a href="Carrito.php?idCatalogoPlanes='.$Planes[0].'" class="btn btn-lg btn-success">Hazte Premium!</a>';
            }else{
              echo '<h3>Plan Actual </h3>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
       }
        ?>
</div>

</div>
            </div>  
      <footer>
        <p >© 2018 Utec</p>
      </footer>

    </div>
    <script src="..\..\Vendor\Jquery\jquery-3.3.1.min.js"></script>
    <script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>
      <script src="..\..\Vendor\alertify\alertify.min.js"></script>

</body>
</html>
<script>



</script>
