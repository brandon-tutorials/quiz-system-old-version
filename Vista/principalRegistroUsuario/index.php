<!--Seccion para registrarse al sistema web-->
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
  <title></title>
  <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>Librerias/css/validacion.css">
</head>
<body>
<nav>
<?php
require 'Vista/headerIngreso.php';
?>

  <div class="container" id="contenedor">
    <div class="row justify-content-center">
      <h1 id="titulo">¡Quiero registrarme!</h1>
    </div>
    <div class="row justify-content-center">


      <a class="btn col-12 col-md-5 col-lg-4 mr-md-4" id="caja" href="registroProfesor">
      <h2>Como</h2>
      <h1>profesor</h1>
      </a>


      <a class="btn col-12 col-md-5 col-lg-4 ml-md-4" id="caja2" href="registroAlumno">
      <h2>Como<h2>
      <h1>alumno</h1>
      </a>
    </div>
  </div>


<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>