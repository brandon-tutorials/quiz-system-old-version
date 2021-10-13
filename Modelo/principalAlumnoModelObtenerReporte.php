<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();
$usuarioSession=new usuarioSession();

$sqlConsultarReporte="SELECT reportecuestionario.fecha,titulocuestionario FROM reportecuestionario,cuestionario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND idreporte='".$_POST['idReporte']."'";

$resultadoConsultaReporte = mysqli_query($db->conexion, $sqlConsultarReporte);
$resultadoReporte=mysqli_fetch_array($resultadoConsultaReporte);
$jsonstring = json_encode($resultadoReporte);
echo $jsonstring;
?>




