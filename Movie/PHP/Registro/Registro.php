<html lang="en"><head>
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


    <div class="col-lg-12" style="margin-top:100px">
      <div class="container">
  			<div class="col-md-offset-3 col-md-6">
  				<div class="panel-heading">
  	               <div class="panel-title text-center">
  	               		<h1 class="title">Registrate</h1>
  	               		<hr />
  	               	</div>
  	            </div>
  				<div class="main-login main-center">
  						<div class="form-group">
  							<label for="name" class="cols-sm-2 control-label">Nombre de usuario</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="Usuario" id="Usuario"  placeholder="Digite su Username"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="email" class="cols-sm-2 control-label">Correo Electronico</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="CorreoElectronico" id="CorreoElectronico"  placeholder="Digite su Correo Electronico"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="username" class="cols-sm-2 control-label">Nombres</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="Nombres" id="Nombres"  placeholder="Digite sus nombres"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="Apellidos" class="cols-sm-2 control-label">Apellidos</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="Apellidos" id="Apellidos"  placeholder="Digite sus Apellidos"/>
  								</div>
  							</div>
  						</div>

  						<div class="form-group">
  							<label for="confirm" class="cols-sm-2 control-label">Contraseña</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
  									<input type="password" class="form-control" name="Contrasenna" id="Contrasenna"  placeholder="Digite contraseña"/>
  								</div>
  							</div>
  						</div>
              <div class="form-group">
                <label for="confirm" class="cols-sm-2 control-label">Confirme Contraseña</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="ConfirmContrasenna" id="ConfirmContrasenna"  placeholder="Digite contraseña"/>
                  </div>
                </div>
              </div>
  						<div class="form-group ">
  							<button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="enviar();">Registrate</button>
  						</div>
  				</div>
  			</div>
  		</div>
      <footer>
        <p>© 2018 Utec</p>
      </footer>
    </div>
    <script src="..\..\Vendor\Jquery\jquery-3.3.1.min.js"></script>
    <script src="..\..\Vendor\bootstrap-3.3.7\js\bootstrap.min.js"></script>
    <script src="..\..\Vendor\alertify\alertify.min.js"></script>
    <script src="..\..\Vendor\Scripts\Funciones.js"></script>

</body>
</html>
<script>

function enviar(){
  var Username = $("#Usuario").val();
  var mail = $("#CorreoElectronico").val();
  var Names = $("#Nombres").val();
  var Apellidos = $("#Apellidos").val();
  var Contrasenna = $("#Contrasenna").val();
  var ConfirmContrasenna = $("#ConfirmContrasenna").val();
   if(!$.isEmptyObject(Username)){
     if(!$.isEmptyObject(mail) && ValidarCorreo(mail)){
       if(!$.isEmptyObject(Names)){
         if(!$.isEmptyObject(Apellidos)){
           if(!$.isEmptyObject(Contrasenna)){
             if(Contrasenna == ConfirmContrasenna ){
               $.ajax({
                 method: "GET",
                 url: "../Database/Registro.php",
                 data: { Usuario: Username,
                          CorreoElectronico: mail,
                          Nombres: Names,
                          Apellidos: Apellidos,
                          email: mail,
                          Contrasenna: Contrasenna,
                          Cuenta: 0
                      }
               })
                 .done(function( msg ) {
                   data= JSON.parse(msg);

                     console.log(data);
                     if(data.Result == 1){
                        alertify.success('Registro Correcto redireccionando a login');
                        setTimeout("location.href='Login.php'",5000);
                     }

                 })
                 .fail(function (msg) {
                alert( "error: " + msg );
                });
            }else{
              alertify.error('por favor digite la contraseña ac confirmar y verifique que las 2 esten iguales');
            }
          }else{
        alertify.error('por favor digite Contraseña');
          }
        }else{
      alertify.error('por favor digite Apellidos');
        }
      }else{
    alertify.error('por favor digite Nombres');
      }
    }else{
  alertify.error('por favor digite Correo Electronico correctamente');
    }
  }else{
alertify.error('por favor digite Nombre de usuario');
  }
}


</script>
