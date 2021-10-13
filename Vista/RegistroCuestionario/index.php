<!--Registro de cuestionario desde una cuenta profesor-->
<!DOCTYPE html>
<html lang="es">
<head>
<title></title>

<script src="<?php echo constant('URL') ?>Librerias/jquery/7194a2c969.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
require 'vista/headerCuestionario.php';
?>

<div class="container-fluid" id="contenedorCuestionario">
<div class="row justify-content-center">

<div class="col" id="colScroll" >
<div class="container-fluid bg-dark">
  <a class="btn btn-danger mt-2 mb-2" id="nuevo">Nuevo</a>
</div>
<div class="container-fluid bg-dark"  id="my-custom-scrollbar">
</div>
</div>



<div class="modal fade" id="confirmarEliminarPregunta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de eliminar la pregunta?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Elige una opción
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" id="confirmarElim" data-dismiss="modal"> Confirmar</button>
      </div>
    </div>
  </div>
</div>



<div class="col-10">
<div class="row justify-content-center">
<div class="col  mb-4 mt-4">
<div class="input-group">
<input type="text" class="form-control" placeholder="Pregunta..." id="pregunta" name="pregunta" required>
</div>
</div>
</div>
<div class="row justify-content-center">
<h5 class="mb-3 text-center">Ingresa una imagen</h5>
</div>
<div class="row justify-content-center">
<label class="uploader" id="subirFotoPregunta">
<i class="icon icon-upload"></i>
<img id="cargaImagen" src="">
<input id="imagenPregunta" type="file" accept="image/*">
</label>
</div>
<div class="row justify-content-center">
<div class="col">
<h5 class="mb-5 text-center">Puntos</h5>
<div class="inputDiv mx-auto">
<div class="etiqueta"></div>
<input type="range" value="100" min="0" max="200" autocomplete="off" id="input3">
</div>
</div>
<div class="col">
<div class="row justify-content-center">
<div class="col-6">
<div class="form-group">
<h5 class="mb-4 text-center">Tiempo(Seg)</h5>
<select class="form-control" id="selecTiempo">
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20" selected>20</option>
<option value="30">30</option>
<option value="60">60</option>
<option value="90">90</option>
<option value="120">120</option>
<option value="240">240</option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="container" id="contenedorInput">
<div class="row">
<div class="col">
<div class="input-group mb-3">
<div class="input-group-prepend">
<button class="btn btn-danger" value="0" id="botonUno" onClick="cambiarValorBoton('botonUno','iUno');"><i class="fas fa-check-circle" id="iUno"></i></button>
</div>
<input id="op1" class="form-control"  type="text" name="opcion1" placeholder="Opcion1">
</div>
</div>
<div class="col">
<div class="input-group mb-3">
<div class="input-group-prepend">
<button class="btn btn-primary" value="0" id="botonDos"  onClick="cambiarValorBoton('botonDos','iDos');"><i class="fas fa-check-circle" id="iDos"></i></button>
</div>
<input id="op2" type="text" name="opcion2" placeholder="Opcion2" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col">
<div class="input-group">
<div class="input-group-prepend">
<button class="btn btn-warning" value="0" id="botonTres"  onClick="cambiarValorBoton('botonTres','iTres');"><i class="fas fa-check-circle" id="iTres"></i></button>
</div>
<input id="op3" class="form-control"  type="text" name="opcion3" placeholder="Opcion3">
</div>
</div>
<div class="col">
<div class="input-group">
<div class="input-group-prepend">
<button class="btn btn-success" value="0" id="botonCuatro"  onClick="cambiarValorBoton('botonCuatro','iCuatro');"><i class="fas fa-check-circle" id="iCuatro"></i></button>
</div>
<input id="op4" class="form-control"  type="text" name="opcion4" placeholder="Opcion4">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<script src="<?php echo constant('URL') ?>Librerias/js/registroCuestionario.js"></script>
<script type="text/javascript">
        var fileUploader = new FileUploader('.uploader');
        var fileUploader = new FileUploader();
        fileUploader.init('.uploader');
</script>
</body>
</html>