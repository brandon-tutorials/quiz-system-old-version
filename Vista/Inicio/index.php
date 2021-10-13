
<!--Seccion principal del sistema web-->
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <title></title>
    <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>Librerias/css/inicio.css">


  </head>
  <body background="img/background2.gif";>
  <?php
require 'Vista/headerIngreso.php';
?>

    <div class="container" id="contenedor">
      <div class="row justify-content-center">
        <h1 id="titulo">¡Bienvenido!</h1>
      </div>
      <div class="row justify-content-around">
      <a class="btn col-8 col-md-5 bg-primary" id="caja" href="Ingresar">
      <img src="img/logoIni.png">
      <h3>Iniciar sesion</h3>

        </a>
        <a class="btn col-8 col-md-5" id="caja2" href="principalRegistroUsuario">
      <img src="img/logoRegis.png">
      <h3>Registrate</h3>
        </a>
      </div>
    </div>

  <?php
require 'Vista/footer.php';

?>







<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


</html>