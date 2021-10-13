<?php

require_once '../Librerias/database.php';
require_once '../Config/config.php';

$db             = new Database();
$idReporte = $_POST['id'];

$sqlEliminarAlumnos       = "DELETE FROM alumnoreporte WHERE idReporte='" . $idReporte . "'";
$resultadoEliminarAlumnos = mysqli_query($db->conexion, $sqlEliminarAlumnos);

if ($resultadoEliminarAlumnos) {
	$sqlEliminarReporte       = "DELETE FROM reportecuestionario where idReporte='" . $idReporte . "'";
$resultadoEliminarReporte = mysqli_query($db->conexion, $sqlEliminarReporte);

if ($resultadoEliminarReporte) {
    echo json_encode(1);
}else{
	echo json_encode(0);
}

}else{

	echo json_encode(0);
}


   



?>