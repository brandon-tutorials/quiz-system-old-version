<!--Seccion de ingresar al sistema web-->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>Librerias/css/ingresar.css">
  <title></title>
  <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

        <div class="card card-signin my-5">
       <div id="alertIngresar"></div>
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar sesión</h5>
            <form class="form-signin"  action="ingresar/ingresar"  method="POST">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="nombreUsuario" class="form-control" placeholder="Cuenta...">
                <label for="inputEmail">Nombre de cuenta</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="contrasenia" class="form-control" placeholder="Contraseña...">
                <label for="inputPassword">Contraseña</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase text-white" type="submit">Iniciar sesión</button>
              <a href="PrincipalRegistroUsuario"class="btn btn-lg btn-success btn-block text-uppercase text-white" type="submit">Registrarse</a>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL') ?>Librerias/js/alertas.js"></script>
</body>
</html>