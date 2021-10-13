<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();
$usuarioSession=new usuarioSession();

$sqlUsuario="SELECT idUsuario FROM Usuario WHERE nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."'";
$resultadoUsuario = mysqli_query($db->conexion, $sqlUsuario);
$resultadoUsuario=mysqli_fetch_array($resultadoUsuario);

$sqlProfesor="SELECT idProfesor FROM profesor where idUsuario='".$resultadoUsuario[0]."'";
$resultadoConsultaProfesor = mysqli_query($db->conexion, $sqlProfesor);
$resultadoProfesor=mysqli_fetch_array($resultadoConsultaProfesor);


$sqlConsultarReporte="SELECT reportecuestionario.fecha,titulocuestionario FROM reportecuestionario,cuestionario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND idreporte='".$_POST['idReporte']."' AND idprofesor='".$resultadoProfesor[0]."'";

$resultadoConsultaReporte = mysqli_query($db->conexion, $sqlConsultarReporte);
$resultadoReporte=mysqli_fetch_array($resultadoConsultaReporte);
$jsonstring = json_encode($resultadoReporte);
echo $jsonstring;
?>




