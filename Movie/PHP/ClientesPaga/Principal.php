<?php
include ("../Database/conexion.php");

SESSION_START();
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
    <link href="..\..\Vendor\start-boostrap\css\star-rating.min.css" rel="stylesheet">
  </head>
  <body>
  <?php include ("../Comun/Nav.php") ?>
    <div class="col-lg-12" >
      <div class="container">        
          <?php include ("../Buscador/Buscador.php") ?>
          
          <br>
          <?php include ("../Peliculas/CarruselPeliculas.php") ?>
               <footer>
        <p>© 2018 Utec</p>
      </footer>
    </div>
    <script src="..\..\Vendor\Jquery\jquery-3.3.1.min.js"></script>
    <script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>
    <script src="..\..\Vendor\start-boostrap\js\star-rating.min.js"></script>
    <script src="..\..\Vendor\alertify\alertify.min.js"></script>
    <script src="..\..\Vendor\Scripts\Funciones.js"></script>
    
</body>
</html>
<script>

function enviar(){
  var mailu = $("#userName").val();
  var passu = $("#userPassword").val() ;
   if(!$.isEmptyObject(mailu) && !$.isEmptyObject(passu)){
     $.ajax({
     method: "GET",
     url: "../Database/Login.php",
     data: { email: mailu, pass: passu}
   })
     .done(function( msg ) {
       data= JSON.parse(msg);
       if(!$.isEmptyObject(data)){
         console.log(data);
         if(data.respuestas[0].Cuenta == 0){
           alertify.success('Bienvenido en estos momentos sera redireccionado, usuario gratuito');

              /* window.location.href = "https://www.bufa.es";	 */

         }else if (data.respuestas[0].Cuenta == 1){
            alertify.success('Bienvenido en estos momentos sera redireccionado, usuario Paga');

             /* window.location.href = "https://www.bufa.es";	 */
         }
       }
       else {
         console.log(data);
         alertify.error('Por favor verifica tu correo y Contrasenna si estan correctos ó si aun no te has registrado hazlo');
       }
     })
     .fail(function (msg) {
       alertify.error('Error con la base de datos');
    alert( "error: " + msg );
    });
  }else{
    alertify.error('por favor llena contraseña y password');
  }
}

</script>
