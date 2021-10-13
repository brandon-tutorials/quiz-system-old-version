
<?php

require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db             = new Database();
$usuarioSession = new usuarioSession();
$idCuestionario=$_POST['idCuestionario'];

$sqlBusquedaPregunta = "SELECT tituloPregunta FROM pregunta where idCuestionario='" . $idCuestionario . "'";

$resultadoBusqueda = mysqli_query($db->conexion, $sqlBusquedaPregunta);

$json = array();
while ($row = mysqli_fetch_array($resultadoBusqueda)) {
    $json[] = array(
        'tituloPregunta'     => $row['tituloPregunta'],
    );

}

$jsonstring = json_encode($json);
echo $jsonstring;

?>