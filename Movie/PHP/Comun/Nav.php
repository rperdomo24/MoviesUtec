
<?php 
	if(!isset($_SESSION['Usuario'])) {
		header("Location: ..\Registro\Login.php");
	}
	else {
        $nom = $_SESSION['Usuario'];
    }

    if(!isset($_SESSION['Cuenta'])) {
        header("Location: ..\Registro\Login.php");
    } else {
        $EsPro = $_SESSION['Cuenta'];
    }

?>

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
            <li><a href="Principal.php">Inicio</a></li>
            <?php
            if($EsPro == 0){
                echo '<li><a href="..\..\PHP\Pago\Planes.php">Hazte Pro!</a></li>';
            } else {
                // ....
            }
            ?>

            <li><a href="..\..\PHP\Registro\Login.php">Cerrar Sesion</a></li>
            <li><h4><b>Hola <?php echo $nom;?>!<b> ¿Qué deseas ver hoy?</h4></li>
          </ul>
        </div>
      </div>
    </nav>
</div>