<!--Seccion para realizarCuestionarioProfesor al sistema web-->
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
  <title></title>
  <link href="<?php echo constant('URL') ?>Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="<?php echo constant('URL') ?>Librerias/css/principalRealizarCuestionarioProfesor.css" rel="stylesheet">  
    <link href="<?php echo constant('URL')?>Librerias/css/estilos.css" rel="stylesheet">
  
</head>
<body>
<section id="seccionUno">
<div class="container">
<div class="row">
<button class="btn btn-success" id="volver">Regresar</button> 
</div>
<div class="container">
<div class="row justify-content-center">
<div class="col" id="contenedorTextPIN">
<h1 id="textPIN">Ingresa el siguiente PIN</h1>
<h2 id="subtextPIN"><?php echo $this->pinReporte;?></h2>
<input id="idCuesActual" type="text" value="<?php echo $this->pinReporte;?>" style="display: none;">
</div>
</div>
<div class="row justify-content-center" id="contenedorPINboton">  	
<button class="btn btn-info" id="iniciarC">Iniciar</button>
</div>
</div>
</div>
</section>


<section id="seccionDos">
<div class="container mb-5 mt-4">

<div class="row justify-content-center"> 
<div class="col-10">
<div class="row justify-content-center">
<div class="col  mb-3">
<div class="card">
<div class="card-body" id="tituloP">
</div>
</div>
</div>
</div>
  

<div class="row justify-content-center">

<div class="col-4 mb-2">
  <div class="row justify-content-center">
    <span class="dot" id="countdown"></span>  
  </div>
  
</div>
<div class="col">
<div class="row justify-content-left">
<div class="card" style="width: 300px; height: 300px;">	
<img id="cargaImagen" src="">
</div>
</div>
</div>
</div>

<div class="container" id="contenedorInput">
<div class="row">
<div class="col">
<div class="card" id="contUno">
  <div class="card-body border border-danger " id="respuestaUno" >
  </div>
</div>

</div>
<div class="col">
<div class="card" id="contDos">
  <div class="card-body border border-primary" id="respuestaDos">
   
  </div>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col">
	<div class="card" id="contTres">
  <div class="card-body border border-warning" id="respuestaTres">
   
  </div>
</div>

</div>
<div class="col">

<div class="card" id="contCuatro">
  <div class="card-body border border-success" id="respuestaCuatro">
   
  </div>
</div>
</div>
</div>
</div>

</div>
</div>

</div>
</section>

<section id="seccionTres"> 
<div class="container-fluid">
<button class="buttonSeccionTres btn">Mostrar resultados</button>
</div>
</section>

<section id="seccionCuatro">
<div class="container mb-5 mt-4">

<div class="row justify-content-center"> 
<div class="col-10">
<div class="row justify-content-center">
<div class="col  mb-3">
<div class="card">
<div class="card-body" id="tituloPT">
</div>
</div>
</div>
</div>
  

<div class="row justify-content-center">


<div class="col">
<div class="row justify-content-end">
<div class="card" style="width: 300px; height: 300px;"> 
<img id="cargaImagenT" src="">
</div>
</div>
</div>
<div class="col-4 mb-2">
<div class="row justify-content-center">
<button class="btn btn-info" id="btnContinuar">Continuar</button>
</div>  
</div>
</div>


<div class="container mt-3" id="contenedorInput">
<div class="row">
<div class="col">
<div class="card" id="contUno">
  <div class="card-body border border-danger " id="respuestaUnoT" >
  </div>
</div>

</div>
<div class="col">
<div class="card" id="contDos">
  <div class="card-body border border-primary" id="respuestaDosT">
   
  </div>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col">
  <div class="card" id="contTres">
  <div class="card-body border border-warning" id="respuestaTresT">
   
  </div>
</div>

</div>
<div class="col">

<div class="card" id="contCuatro">
  <div class="card-body border border-success" id="respuestaCuatroT">
   
  </div>
</div>
</div>
</div>
</div>

</div>
</div>

</div>
</section>

<section id="seccionCinco">
<div class="container-fluid">
<div class="row justify-content-center">

<div class="col-7 mt-5">
  <h2 style="text-align: center;">Clasificación</h2>
<table class="table table-bordered table-warning" style="font-size: 25px;  text-align: center;">
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

  <button class="btn btn-info mt-5" id="btnSiguiente">Siguiente pregunta</button>
  
</div>  

</div>
</div>
</section>
<section id="seccionSeis">
  <div class="container-fluid">
<div class="row justify-content-center">

<div class="col-7 mt-5">
  <h2 style="text-align: center;">Clasificación final</h2>
<table class="table table-bordered table-success" style="font-size: 25px; text-align: center;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Alumno</th>
<th scope="col">Puntos</th>
</tr>
</thead>
<tbody id="tablaAlumnosFinal"> 
</tbody>
</table>
</div>

<div class="col-2 mt-5">
  <a id="btnSalirC"  class="btn btn-info mt-5" href="principalProfesor">Salir</a>
</div>  

</div>
</div>
</section>

<script src="<?php echo constant('URL') ?>Librerias/jquery/jquery.slim.min.js"></script>
<script src="<?php echo constant('URL')?>Librerias/jquery/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="<?php echo constant('URL') ?>Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL') ?>Librerias/js/principalRealizarCuestionarioProfesorApp.js"></script>

</body>
</html>