<!--Seccion de reportes de cuestionarios-->
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
</head>
<body>
	<?php
require 'vista/header.php';
?>
<section id="primeraSeccion">
<div class="container mt-4">
<div class="row justify-content-center">
<div class="col-10">

<div class="table-responsive">
<table class="table table-bordered table-condensed bg-white">
<thead>
<th id="tituloClase">Mis reportes
</th>
</thead>
<tr>
<td>
<div class="container bg-white"  id="seccionReportes">
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</section>

<section id="segundaSeccion">
<div class="container">
<div class="row justify-content-center">
<div class="col-6" id="tarjetaReporte">
</div>
<div class="col-9">
<div class="row justify-content-center">
<div class="col mt-3">
  <h4 style="text-align: center;">Clasificación final</h4>
<table class="table table-bordered table-success" style="font-size: 20px; text-align: center;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Alumno</th>
<th scope="col">Puntos</th>
</tr>
</thead>
<tbody id="tablaAlumnos"> 
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


</section>


<script type="text/javascript" src="<?php echo constant('URL')?>Librerias/js/reportesAlumnoApp.js"></script>
</body>
</html>