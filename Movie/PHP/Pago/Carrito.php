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
    <STYLE TYPE="text/css" MEDIA=screen>
.modal-backdrop{
 position: relative; 
}
body { margin-top:20px; }
.panel-title {display: inline;font-weight: bold;}
.checkbox.pull-right { margin: 0; }
.pl-ziro { padding-left: 0px; }
</STYLE>
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
  $id ="";
  $total ="";
        $_Planes = getSQLResultSet($connect, $QueryPlanes);
        while($Planes = mysqli_fetch_row($_Planes))
        {    
          $id .= $Planes[0];
          $total .=$Planes[2];
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
							<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Comprar</button></td>
						</tr>
					</tfoot>
				</table>
        



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pagar con tarjeta de credito</h4>
      </div>
      <div class="modal-body">
      
      <input type="hidden" id="Id_Producto" value="<?php echo $id ?>">
       
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Metodo de pago
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            Numero de tarjeta</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Validar numero de tarjeta"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    Fecha de expiracion</label>
                                    
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?php echo $total?></span> Precio final</a>
                </li>
            </ul>
            <br/>
            <a href="#" class="btn btn-success btn-lg btn-block" role="button">Finalizar compra</a>
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>



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
