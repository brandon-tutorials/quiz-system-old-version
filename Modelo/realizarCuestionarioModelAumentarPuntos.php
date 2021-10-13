<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

    $db= new Database();
    $usuarioSession= new usuarioSession();
    $usuarioActual = $usuarioSession->obtenerUsuarioActual();

    $sqlObtenerIdAlumno="SELECT idalumno FROM usuario,alumno WHERE usuario.idusuario=alumno.idusuario and nombreusuario='".$usuarioActual."'";
        $resultadoIdAlumno = mysqli_query($db->conexion, $sqlObtenerIdAlumno);
        $idalumno=mysqli_fetch_array($resultadoIdAlumno);

   $sqlConsultarPuntos="SELECT puntos FROM alumnoreporte WHERE idReporte='".$_POST['id']."' AND
   idAlumno='".$idalumno[0]."'";     
           $resultadoConsultarPuntos = mysqli_query($db->conexion, $sqlConsultarPuntos);
        $puntos=mysqli_fetch_array($resultadoConsultarPuntos);
        $nuevoPuntaje=$puntos[0]+$_POST['puntajeGanado'];

    $sqlAumentarPuntos="UPDATE alumnoreporte SET puntos=".$nuevoPuntaje." WHERE idReporte='".$_POST['id']."' AND idAlumno='".$idalumno[0]."'";
           $resultadoAumentarPuntos = mysqli_query($db->conexion, $sqlAumentarPuntos);
         if($resultadoAumentarPuntos){
            echo json_encode(1);
         }else{
            echo json_encode(0);
         }



?>