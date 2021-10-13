<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">

  <title></title>
  <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo constant('URL') ?>Librerias/css/estilos.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>Librerias/css/registroCuestionario.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top" id="barraNav">
  <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">


<a class="btn bg-dark " id="config" data-toggle="modal" data-target="#exampleModal">Configuracion</a>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion de cuestionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="formularioCuestionario" method="post" action="#" enctype="multipart/form-data">

      <div class="modal-body" id="infoCuestionario">
            <div class="form-group">
            <label class="row justify-content-center">Titulo</label>
            <input type="text" class="form-control" id="tituloCuestionario" required>
            </div>
            <label class="row justify-content-center">Foto del cuestionario</label>
            <div class="row justify-content-center mb-3">
            <label class="uploader2" class="modal-content" class="modal-header">
            <i class="icon icon-upload"></i>
            <img src="">
            <input id="imagenCuestionario" name="imagenCuestionario" type="file">
            </label>
            </div>
            <div class="form-group">
            <label class="row justify-content-center">Descripccion</label>
            <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarCuestionario" >Guardar cambios</button>
      </div>
       </form>
    </div>
  </div>
</div>


  </div>
  </div>
  <a class="navbar-brand" href="#"><!--LOGO--></a>
  <div id="navbarResponsive">
  <ul class="navbar-nav">
  <li class="nav-item">
  <a class="nav-link bg-dark btn" id="hecho" href="">Hecho</a>
  </li>
  <li class="nav-item">
   <a class="nav-link bg-secondary btn" href="<?php echo constant('URL') ?>principalProfesor">Salir</a>
   </li>
   </ul>
   </div>
   </div>
   </nav>



<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery-1.11.0.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/js/registroCuestionario.js"></script>
<script type="text/javascript">
        var fileUploader = new FileUploader('.uploader2');
        var fileUploader = new FileUploader();
        fileUploader.init('.uploader2');
</script>
<!--
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>-->
<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="<?php echo constant('URL') ?>Librerias/js/registroCuestionarioApp.js"></script>
</body>

</html>
