<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();


$sqlCuestionario="SELECT idCuestionario FROM reportecuestionario WHERE idReporte='".$_POST['id']."'";

$resultadoIdCuestionario=mysqli_query($db->conexion,$sqlCuestionario);
$idCuestionario=mysqli_fetch_array($resultadoIdCuestionario);

$sqlCantidadPregunta="SELECT COUNT(idPregunta) FROM pregunta WHERE idCuestionario='".$idCuestionario[0]."'";

$resultadoCantidad = mysqli_query($db->conexion, $sqlCantidadPregunta);
$cantidad=mysqli_fetch_array($resultadoCantidad);

$sqlReporteEstado="SELECT numPregunta FROM reportecuestionario WHERE idReporte='".$_POST['id']."'";
$resultadoEstado = mysqli_query($db->conexion, $sqlReporteEstado);
$estadoPregunta=mysqli_fetch_array($resultadoEstado);

if($cantidad[0]!=$estadoPregunta[0])
{

$sqlConsultarPreguntas="SELECT *FROM pregunta WHERE idCuestionario='".$idCuestionario[0]."'";
$resultadoPreguntas = mysqli_query($db->conexion, $sqlConsultarPreguntas);

$json = array();
$posicion=0;
while ($row = mysqli_fetch_array($resultadoPreguntas))
{
if($posicion==$estadoPregunta[0]){
    $json[] = array(
        'tituloPregunta'     => $row['tituloPregunta'],
        'rutaImagenPregunta' => $row['rutaImagenPregunta'],
        'respuestaUno'       => $row['respuestaUno'],
        'respuestaDos'       => $row['respuestaDos'],
        'respuestaTres'      => $row['respuestaTres'],
        'respuestaCuatro'    => $row['respuestaCuatro'],
        'estadoUno'          => $row['estadoUno'],
        'estadoDos'          => $row['estadoDos'],
        'estadoTres'         => $row['estadoTres'],
        'estadoCuatro'       => $row['estadoCuatro'],
        'tiempo'             => $row['tiempo'],
        'puntos'             => $row['puntos'],
    );
}
$posicion=+1;
}

echo json_encode($json[0]);

}else{
echo json_encode(0);
}


?>