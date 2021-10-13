<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';

$db= new Database();

$sqlConsultarNum="SELECT numpregunta from reportecuestionario WHERE idreporte='".$_POST['id']."'";

$resultadoCantidad = mysqli_query($db->conexion, $sqlConsultarNum);
$num = mysqli_fetch_array($resultadoCantidad);
$total=$num[0];
$total=$total+1;

$sqlAumentarPregunta="UPDATE reportecuestionario SET numpregunta=".$total." WHERE idreporte='".$_POST['id']."'";
$resultadoAumentar = mysqli_query($db->conexion, $sqlAumentarPregunta);


if($resultadoAumentar){
    echo json_encode(1);
}

?>