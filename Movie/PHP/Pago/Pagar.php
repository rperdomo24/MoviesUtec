<?php 
include ("../Database/conexion.php");
SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
    }
    if(!isset($_GET["idCatalogoPlanes"])) {
      header("Location: Planes.php");
  } else {
    $idCatalogoPlanes = $_GET["idCatalogoPlanes"];
  }
      $QueryPlanes =  "Select 
      idCatalogoPlanes,
      NoMesPlan,
      PrecioPlan,
      FechaCompraPlan,
      ComentarioPlan,
      TipoPago
      from catalogoplanes where idCatalogoPlanes=".$idCatalogoPlanes;

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
    <h2>Tu mejor Desicion</h2>
    <h3>Lo mejor para ti! <?php echo $nom;?>!</h>
    <h4>Lista de compra</h4>
    
  </div>
  <div class="row">
  <div class="col-lg-12">
  <div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Plan</th>
							<th style="width:10%">Precio</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
  <?php
        $_Planes = getSQLResultSet($connect, $QueryPlanes);
        while($Planes = mysqli_fetch_row($_Planes))
        {    
          echo '<tr>';
          echo '<td data-th="Product">';
          echo '<div class="row">';
          echo '	<div class="col-sm-2 hidden-xs"></div>';
          echo '<div class="col-sm-10">';
          echo '<h4 class="nomargin">'.$Planes[1].'</h4>';
          echo '<p>'. $Planes[4].'</p>';
          echo '</div>';
          echo '</div>';  
          echo '<td data-th="Price">$'. $Planes[2].'</td>';          
          echo '<td data-th="Subtotal" class="text-center">'. $Planes[2].'</td>';
          echo '<td class="actions" data-th="">';        								
          echo '	</td>';       
           echo '</td>';
           echo '</tr>';            
       }     
        ?>
</div>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="../ClientesGratis/Principal.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Cancelar</a></td>
							<td colspan="2" class="hidden-xs"></td>						
							<td><a href="" class="btn btn-success btn-block">Comprar<i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>

        
</div>
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
