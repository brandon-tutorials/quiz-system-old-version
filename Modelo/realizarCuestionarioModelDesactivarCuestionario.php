<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
/*Consulta todos los cuestionarios y los devuelve en un JsonString*/
$db= new Database();

$sqlActivarCuestionario="UPDATE reportecuestionario SET estado=false WHERE idreporte='".$_POST['id']."'";
$resultadoActivacion = mysqli_query($db->conexion, $sqlActivarCuestionario);
if($resultadoActivacion){
    echo json_encode(1);
}



?>