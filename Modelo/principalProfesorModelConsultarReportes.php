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


$sqlConsultarReportes="SELECT idreporte, reportecuestionario.fecha,titulocuestionario FROM reportecuestionario,cuestionario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND idprofesor='".$resultadoProfesor[0]."'";

$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);


$json     = array();
$posicion = 0;
while ($resultadoReportes=mysqli_fetch_array($resultadoConsultaReportes)) {
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




