<?php
/*Agrega una nueva pregunta dentro de un cuestionario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db = new Database();

$usuarioSession = new usuarioSession();
$idCuestionario = $usuarioSession->obtenerIdCuestionario();

$sqlPregunta = "INSERT INTO pregunta(titulopregunta,rutaimagenpregunta,respuestauno,respuestados,respuestatres,
respuestacuatro,estadoUno,estadoDos,estadoTres,estadoCuatro,tiempo,puntos,idcuestionario) values('','','','','','','0','0','0','0','10','100','" . $idCuestionario . "')";

$resultadoInsercion = mysqli_query($db->conexion, $sqlPregunta);

if (isset($resultadoInsercion)) {
    echo "insertado con exito";
}

?>
