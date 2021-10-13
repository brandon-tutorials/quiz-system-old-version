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


$sqlConsultarReportes="SELECT * FROM reportecuestionario,cuestionario,alumnoreporte WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND reportecuestionario.idreporte=alumnoreporte.idreporte AND idAlumno='".$resultadoAlumno[0]."'";

$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);



$totalP=0;

while($resultadoReportes=mysqli_fetch_array($resultadoConsultaReportes))
{
	$totalP+=1;
}



$sqlConsultarIdProfesores="SELECT count(idprofesor)
FROM alumnoreporte,reportecuestionario,cuestionario,alumno,usuario 
WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario 
AND reportecuestionario.idreporte=alumnoreporte.idreporte 
AND alumnoreporte.idalumno=alumno.idalumno 
AND alumno.idusuario=usuario.idusuario AND nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."' group by (idprofesor)";

$resultadoConsultaIdProfesores = mysqli_query($db->conexion, $sqlConsultarIdProfesores);

$total=0;

while($profesores=mysqli_fetch_array($resultadoConsultaIdProfesores)){
	$total+=1;
}


$json     = array();

$json[] = array(
        'totalC'         => $totalP
    );

$json[]=array(
  'profesores'         => $total
);



$jsonstring = json_encode($json);
echo $jsonstring;
?>




