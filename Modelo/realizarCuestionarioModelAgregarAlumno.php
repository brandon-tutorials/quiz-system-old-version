<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

    $db= new Database();
    $usuarioSession= new usuarioSession();
    $usuarioActual = $usuarioSession->obtenerUsuarioActual();

    $sqlConsultarReporte="SELECT *FROM reportecuestionario WHERE idreporte='".$_POST['pinReporte']."'";
    $resultadoConsultarReporte = mysqli_query($db->conexion, $sqlConsultarReporte);
    $reporte=mysqli_fetch_array($resultadoConsultarReporte);

   if($reporte[0]!=null){
    $sqlObtenerIdAlumno="SELECT idalumno FROM usuario,alumno WHERE usuario.idusuario=alumno.idusuario and nombreusuario='".$usuarioActual."'";
        $resultadoIdAlumno = mysqli_query($db->conexion, $sqlObtenerIdAlumno);
        $idalumno=mysqli_fetch_array($resultadoIdAlumno);

    $sqlRegistrarAlumno="INSERT INTO alumnoreporte(puntos,idAlumno,idReporte) VALUES(0,'".$idalumno[0]."','".$_POST['pinReporte']."')";
    $resultadoRegistro = mysqli_query($db->conexion, $sqlRegistrarAlumno);
    if($resultadoRegistro){
    echo ($_POST['pinReporte']);
    }

    }else{
    echo json_encode(0);
    }



?>