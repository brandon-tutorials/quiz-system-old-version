<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
</head>
<body>
<?php
require 'vista/header.php';
?>

<section id="modalAlerta">
</section>
<div class="container" id="primeraSeccion"> 
<div class="row">
<div class="col-lg-3 mt-4">
<div class="card">
<div class="header-p">
<a href="">
<img src="<?php echo constant('URL')?>img/perfil.png">
</a>
<h2>
<?php
echo $this->nombreProfesor;
?>
</h2>
<h4>
</h4>
</div>
<div class="descripcion-p">
<h5 id="tc"></h5>
<h5 id="tr"></h5>
</div>
</div>
</div>
<div class="col-lg-9 mb-4 mt-4">
<div class="row" id="busqueda">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <div class="form-group">
  <div class="input-group">
    <input type="text" class="form-control " name="searchText" placeholder="Buscar..." value="" id="buscar">
  </div>
</div>
  </div>
</div>
 <div class="col">
          <div class="card my-4" id="contenedorResultados">
            <div class="card-body">
              <ul id="container"></ul>
            </div>
          </div></div>
<div class="table-responsive">
<table class="table table-bordered table-condensed bg-white">
<thead>
  <th id="tituloClase">Mis cuestionarios
    <a href="<?php echo constant('URL')?>RegistroCuestionario" class="btn float-right btn-success" 
    type="button">Crear nuevo</a>
  </th>
</thead>
<tr>
<td>
<div class="container bg-white"  id="seccionCuestionarios">
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php
require 'vista/principalProfesor/infoCuestionario.php';
?>

<script src="<?php echo constant('URL')?>Librerias/js/principalProfesorApp.js"></script>
</body>
</html>

