<?php
/*Consulta la lista de preguntas de un cuestionario y lo devuelve en JsonString*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db= new Database();
$usuarioSession = new usuarioSession();
$idCuestionario = $usuarioSession->obtenerIdCuestionario();

$sqlBusquedaPregunta = "SELECT idPregunta from pregunta where idCuestionario='" . $idCuestionario . "'";

$resultadoBusqueda = mysqli_query($db->conexion, $sqlBusquedaPregunta);

$json     = array();
$posicion = 0;
while ($row = mysqli_fetch_array($resultadoBusqueda)) {
    $posicion += 1;
    $json[] = array(
        'idPregunta' => $row['idPregunta'],
        'posicion'   => $posicion,
    );

}

$jsonstring = json_encode($json);
echo $jsonstring;

?>