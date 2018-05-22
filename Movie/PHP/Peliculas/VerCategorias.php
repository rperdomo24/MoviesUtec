<?php
include ("../Database/conexion.php");

SESSION_START();

    if(!isset($_SESSION['Usuario'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $nom = $_SESSION['Usuario'];
    }
    $idCatalogo = $_GET["idCatalogoPlanes"];
    
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
    <title>Ver Categorias</title>
  </head>
  <body>
  <?php include ("../Comun/Nav.php") ?>
<div class="col-lg-12" >
  <div class="container">
      <div class="col-lg-12" style="margin-bottom:50px;">
  <?php include ("../Buscador/Buscador.php") ?>
</div>

        <div class="col-lg-12">
            <div class="container">  
                <?php include ("CarruselCategoriasPeliculas.php") ?>
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