<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();
$usuarioSession=new usuarioSession();

$sqlAlumno="SELECT idAlumno FROM alumno,usuario WHERE alumno.idusuario=usuario.idusuario AND nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."'";

$resultadoConsultaAlumno = mysqli_query($db->conexion, $sqlAlumno);
$resultadoAlumno=mysqli_fetch_array($resultadoConsultaAlumno);


$sqlConsultarReportes="SELECT reportecuestionario.idreporte, reportecuestionario.fecha,titulocuestionario FROM reportecuestionario,cuestionario,alumnoreporte WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND reportecuestionario.idreporte=alumnoreporte.idreporte AND idAlumno='".$resultadoAlumno[0]."'";

$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);


$json     = array();
$posicion = 0;
while ($resultadoReportes=mysqli_fetch_array($resultadoConsultaReportes)) 
{
    $posicion += 1;
    $json[] = array(
        'idReporte'         => $resultadoReportes['idreporte'],
        'posicion'               => $posicion,
        'tituloCuestionario'     => $resultadoReportes['titulocuestionario'],
        'fecha'                  => $resultadoReportes['fecha']
    );
}


$jsonstring = json_encode($json);
echo $jsonstring;
?>




