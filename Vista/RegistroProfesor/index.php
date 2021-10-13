<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
  <title></title>
  <link href="<?php echo constant('URL')?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL')?>Librerias/css/registroUsuarios.css">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL')?>Librerias/css/validacion.css">
</head>
<body>
<?php
require('Vista/headerIngreso.php');
?>
<div style="background: #FC4A68;">
<div id="alertUsuario" style="text-align:center;"></div> 
  <div class="container-contact100" id="contenedorRegistro">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" action="/PROYECTO/registroProfesor/registrarProfesor" method="POST">
        <span class="contact100-form-title">
          Informacion de profesor
        </span>

        <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
          <span class="label-input100">Nombre completo</span>
          <input class="input100" type="text" name="nombreCompleto" placeholder="Nombre..." required>
        </div>
        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
          <span class="label-input100">Nombre de cuenta</span>
          <input class="input100" type="text" name="nombreUsuario" placeholder="Cuenta..." required>
        </div>

        <div class="wrap-input100 bg1 rs1-wrap-input100">
          <span class="label-input100">Contraseña</span>
          <input class="input100" type="password" name="contrasenia" placeholder="Contraseña..." required>
        </div>     
        <a class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Registrarse
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </a>
      </form>
  </div>
    </div>    </div>


<script src="<?php echo constant('URL')?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL')?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo constant('URL')?>Librerias/js/alertas.js"></script>
</body>
</html>