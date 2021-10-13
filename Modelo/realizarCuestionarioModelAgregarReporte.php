<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
require_once '../Librerias/control.php';

    $db= new Database();
    $cuestionarioSession=new usuarioSession();   
	$idReporte=Control::generarId();

    $sqlAgregarReporte="INSERT INTO reportecuestionario(idReporte,estado,numPregunta,idCuestionario) VALUES 
    ('".$idReporte."','false',0,'".$_POST['idCuestionario']."')";

     $resultadoAgregarReporte = mysqli_query($db->conexion, $sqlAgregarReporte);
     
     
     if($resultadoAgregarReporte)
     {
     $cuestionarioSession->establecerIdReporteEjecutado($idReporte);
     echo json_encode(1);
     }
     else
     {
     echo json_encode(2);
     }
    



?>