<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();
$usuarioSession=new usuarioSession();

$sqlConsultarIdProfesores="SELECT idprofesor
FROM alumnoreporte,reportecuestionario,cuestionario,alumno,usuario 
WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario 
AND reportecuestionario.idreporte=alumnoreporte.idreporte 
AND alumnoreporte.idalumno=alumno.idalumno 
AND alumno.idusuario=usuario.idusuario AND nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."' group by (idprofesor)";

$resultadoConsultaIdProfesores = mysqli_query($db->conexion, $sqlConsultarIdProfesores);




$json=array();
$posicion=0;
while($resultadoId=mysqli_fetch_array($resultadoConsultaIdProfesores))
{

$sqlConsultarNombre="SELECT nombreUsuario FROM usuario,profesor WHERE usuario.idusuario=profesor.idusuario AND profesor.idprofesor='".$resultadoId['idprofesor']."'";
$resultadoNombre = mysqli_query($db->conexion, $sqlConsultarNombre);
$nombre=mysqli_fetch_array($resultadoNombre);


  $posicion += 1;
    $json[] = array(
        'idProfesor'         => $resultadoId['idprofesor'],
        'posicion'               => $posicion,
         'nombre'             =>$nombre[0]        
    );

}

$jsonstring = json_encode($json);
echo $jsonstring;
?>




