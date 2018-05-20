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
                <li class="active"><a href="../../Index.html">Inicio</a></li>
                <li><a href="..\..\PHP\Registro\Registro.php">Registrate</a></li>
                <li><a href="..\..\PHP\Registro\Login.php">Inicia Sesion</a></li>

              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>



    <div class="col-lg-12" style="margin-top:150px">
      <div class="container">
          <div class="row">
              <div class="col-md-offset-3 col-md-6">
                  <div class="form-login">
                  <h4>Bienvenido.</h4>
                  <small>por favor ingresa tus datos</small>
                  <br>
                  <input type="mail" id="userName" class="form-control input-sm chat-input" placeholder="Correo" />
                  </br>
                  <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                  </br>
                  <div class="wrapper">
                  <span class="group-btn">
                    <input type="submit" class="btn btn-primary btn-md" value="Ingresar" id="Ingresar" onclick="enviar();" />
                  </span>
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
