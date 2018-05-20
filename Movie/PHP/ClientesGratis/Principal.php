<?php
SESSION_START();
	if(!isset($_SESSION['Usuario'])) {
		header("Location: ..\Registro\Login.php");
	}
	else {
    $nom = $_SESSION['Usuario'];
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
                <li><a href="..\..\PHP\Registro\Login.php">Cerrar Sesion</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="col-lg-12" style="margin-top:100px">


      <div class="container">
        <h5>Bienvenido <?php echo $nom;?> puedes escoger el trailer que desees ver nuestra </h5>

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
<?php } ?>
