<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();
$usuarioSession=new usuarioSession();

$sqlProfesor="SELECT idProfesor FROM profesor,usuario WHERE profesor.idusuario=usuario.idusuario AND nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."'";

$resultadoConsultaProfesor = mysqli_query($db->conexion, $sqlProfesor);
$resultadoProfesor=mysqli_fetch_array($resultadoConsultaProfesor);


$sqlConsultarReportes="SELECT COUNT(idreporte) FROM reportecuestionario,cuestionario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND
cuestionario.idprofesor='".$resultadoProfesor[0]."'";

$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);

$cantRepor=mysqli_fetch_array($resultadoConsultaReportes);


$sqlConsultarCuestionarios="SELECT COUNT(idcuestionario) FROM cuestionario WHERE idprofesor='".$resultadoProfesor[0]."'";

$resultadoCuestionarios = mysqli_query($db->conexion, $sqlConsultarCuestionarios);

$cantCues=mysqli_fetch_array($resultadoCuestionarios);


$json     = array();

$json[] = array(
        'cantRepor'         => $cantRepor[0] 
    );

$json[]=array(
  'cantCues'         => $cantCues[0]
);



$jsonstring = json_encode($json);
echo $jsonstring;
?>



