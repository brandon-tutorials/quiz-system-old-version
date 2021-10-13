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


$sqlConsultarReportes="SELECT nombreUsuario, sum(alumnoreporte.puntos) as puntos FROM alumnoreporte,reportecuestionario,cuestionario,alumno,usuario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND reportecuestionario.idreporte=alumnoreporte.idreporte AND alumnoreporte.idalumno=alumno.idalumno AND alumno.idusuario=usuario.idusuario AND idProfesor='".$resultadoProfesor[0]."' GROUP BY(nombreUsuario) ORDER BY puntos DESC";

$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);


$json     = array();
$posicion = 0;
$band;
while ($resultadoReportes=mysqli_fetch_array($resultadoConsultaReportes)) 
{
       $json[] = array(
        'nombreUsuario'         => $resultadoReportes['nombreUsuario'],
        'posicion'=> $posicion+1,
        'puntos'                  => $resultadoReportes['puntos']
    );
    
 $posicion += 1;   
}


$jsonstring = json_encode($json);
echo $jsonstring;
?>




