<!--Header principal para una cuenta Profesor o Alumno-->
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">

  <title></title>
  <link href="<?php echo constant('URL')?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo constant('URL')?>Librerias/css/estilos.css" rel="stylesheet">
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top" id="barraNav">
    <div class="container">
      <a class="navbar-brand" href="#"><!--LOGO--></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
       <button class="btn btn-success" id="volver">Regresar</button> 
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo constant('URL')?>principal<?php echo $this->tipo; ?>">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL')?>reportes<?php echo $this->tipo; ?>">Reportes</a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL')?>gamificacion<?php echo $this->tipo; ?>">Gamificacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL')?>salir">Salir</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<script src="<?php echo constant('URL')?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL')?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL')?>Librerias/jquery/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</body>

</html>
