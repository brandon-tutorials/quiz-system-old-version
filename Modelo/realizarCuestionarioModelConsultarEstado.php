<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';


    $db= new Database();
    $idReporte=$_POST['idReporte'];

    $sqlConsultarReporte="SELECT estado FROM reportecuestionario WHERE idreporte='".$idReporte."'";
    $resultadoConsultarReporte = mysqli_query($db->conexion, $sqlConsultarReporte);
    $reporte=mysqli_fetch_array($resultadoConsultarReporte);

  if($reporte[0]==1){
  echo json_encode(1);
  }else{
  echo json_encode(0);
  }
   
    



?>