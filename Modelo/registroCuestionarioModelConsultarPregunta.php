<?php
/*Consulta una pregunta en especifico y devuelve sus datos en un JsonString*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db             = new Database();
$usuarioSession = new usuarioSession();
$idCuestionario = $usuarioSession->obtenerIdCuestionario();

$id = $_POST['id'];

$sqlBusquedaPregunta = "SELECT *FROM pregunta where idPregunta='" . $id . "' AND idCuestionario='" . $idCuestionario . "'";

$resultadoBusqueda = mysqli_query($db->conexion, $sqlBusquedaPregunta);

$json = array();
while ($row = mysqli_fetch_array($resultadoBusqueda)) {
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

$jsonstring = json_encode($json[0]);
echo $jsonstring;

?>