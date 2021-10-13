<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
  <title></title>
  <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="<?php echo constant('URL')?>Librerias/css/estilos.css" rel="stylesheet">
        <link href="<?php echo constant('URL')?>Librerias/css/principalRealizarCuestionarioAlumno.css" rel="stylesheet">
  
<script src="<?php echo constant('URL') ?>Librerias/jquery/7194a2c969.js" crossorigin="anonymous"></script>
  

</head>
<body>
	<section id="seccionUno">
   
	<div class="Wrapper">
      <div id="mensaje"></div>
  <h1 class="Title">Ingresa el PIN del cuestionario</h1>

  <div class="Input">

  <input type="text" id="input" class="Input-text" placeholder="Ingresa el PIN del cuestionario" required>
  <label for="input" class="Input-label">PIN del cuestionario</label>    
  </div>
  <div class="row justify-content-center">
  <button id="ContinuarCA" class="btn btn-dark">Continuar</button>
  </div>

  </div>
	</section>
  <section id="seccionDos">
<input id="idReporte"  style="display: none">
<div class="container">
<div class="col" id="contenedorText">
<h1>Bienvenido</h1>
<h2>¡Espera la señal de tu profesor!</h2>
</div>  
<div class="row justify-content-center" id="contenedorboton">    
<button class="btn btn-info" id="iniciarCuestionario">Iniciar</button>
</div>
</div>
</section>

<section id="seccionTres">
<div class="container">

<h1 style="text-align: center;">¡Selecciona la respuesta correcta!</h1>
<div class="row justify-content-center">
<span class="dot" id="countdown"></span>  
</div>

<div class="row justify-content-center" id="respCompleto">
  
</div>

</div>

</section>

<section id="seccionCuatro">

<div id="opcionCorrecta">  
<div class="row justify-content-center">
<h1 id="tCorrecto">¡Correcto!</h1>
</div>
<div class="row justify-content-center">
<img src="Img/palomita.png" id="imgResp">  
</div>
</div>  

<div id="opcionIncorrecta"> 
<div class="row justify-content-center">
<h1 id="tIncorrecto">Incorrecto</h1>
</div>
<div class="row justify-content-center">
<img src="Img/tache.png" id="imgResp">  
</div>    
</div>

<div class="row justify-content-center">
  <button class="btn btn-info" id="contPreg">Continuar</button>
</div>

</section>

<section id="seccionCinco">
    <div class="container-fluid">
<div class="row justify-content-center">

<div class="col-7 mt-5">
  <h2 style="text-align: center;">Clasificación final</h2>
<table class="table table-bordered table-success" style="font-size: 25px;  text-align: center;">
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

<div class="col-2 mt-5">
  <a id="btnSalirC"  class="btn btn-info mt-5" href="principalAlumno">Salir</a>
</div>  

</div>
</div>
</section>

</body>
<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL')?>Librerias/jquery/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/js/principalRealizarCuestionarioAlumnoApp.js"></script>

</body>
</html>