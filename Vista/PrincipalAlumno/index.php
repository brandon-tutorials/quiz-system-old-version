<!--Seccion principal del alumno-->
<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>Librerias/css/principalAlumno.css">
</head>
<body>
	<?php
require 'vista/header.php';
?>
<div class="container">

<div class="row justify-content-center">

<div class="col-lg-4 mt-4">
<div class="card">
<div class="header-p">
<a href="#">
<img src="<?php echo constant('URL') ?>img/perfil.png">
</a>
<h2>
    <?php
echo $this->nombreAlumno;
?>
</h2>
<h4>
</h4>
</div>
<div class="descripcion-p">
<h5 id="cr"></h5>
<h5 id="cp"></h5>
</div>
</div>
</div>
<div class="col-lg-4 mt-4 mb-4">
<div class="row justify-content-center">
<div class="col">
<table class="table table-bordered table-condensed bg-white">
<thead>

<th><h4 style="text-align: center;"> Ingresa a un cuestionario</h4></th>

</thead>
<tr>
<td>


<button class="btn" id="caja3">
      <h3>¡Juega!</h3>
</button>
</td>
</tr>
</table>
</div>
</div>



</div>

</div>



</div>

<script type="text/javascript" src="<?php echo constant('URL')?>Librerias/js/principalAlumnoApp.js">
</script>

</body>



</html>