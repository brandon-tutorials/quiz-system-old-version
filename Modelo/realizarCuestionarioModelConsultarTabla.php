<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';


    $db= new Database();
    $idReporte=$_POST['id'];
    $sqlConsultarReporteAlumno="SELECT *FROM alumnoreporte WHERE idreporte='".$idReporte."' ORDER BY puntos DESC";
    $resultadoConsultarReporteAlumno = mysqli_query($db->conexion, $sqlConsultarReporteAlumno);


    $json     = array();
    $posicion = 0; 


    while ($reportealumno = mysqli_fetch_array($resultadoConsultarReporteAlumno))
     {
    $sqlConsultarNombre="SELECT nombreUsuario FROM usuario,alumno WHERE usuario.idusuario=alumno.idusuario AND alumno.idalumno='".$reportealumno['idAlumno']."'";

    $resultadoConsultaNombre = mysqli_query($db->conexion, $sqlConsultarNombre);
    $nombre = mysqli_fetch_array($resultadoConsultaNombre);

    $posicion += 1;
   
    $json[] = array
    (
        'posicion'  => $posicion,
        'nombre'=> $nombre[0],
        'puntos' => $reportealumno['puntos']
    );

    } 


    
  if($json!=null)
  {
  echo json_encode($json);
  }
  else
  {
  echo json_encode(0);
  }
    

?>