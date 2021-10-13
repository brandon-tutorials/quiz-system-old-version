
<?php
/*Elimina una pregunta dentro de un cuestionario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db             = new Database();
$usuarioSession = new usuarioSession();
$idCuestionario = $usuarioSession->obtenerIdCuestionario();

$id = $_POST['id'];

$sqlRutaImagen = "SELECT rutaImagenPregunta FROM pregunta WHERE idPregunta='" . $id . "' AND idCuestionario='" . $idCuestionario . "'";
$resultadoRuta = mysqli_query($db->conexion, $sqlRutaImagen);
$row           = mysqli_fetch_array($resultadoRuta);
unlink("../" . $row[0]);

$sqlEliminarPregunta = "DELETE FROM pregunta where idPregunta='" . $id . "' AND idCuestionario='" . $idCuestionario . "'";
$resultadoEliminar   = mysqli_query($db->conexion, $sqlEliminarPregunta);

if ($resultadoEliminar) {
    echo "Exito al eliminar";
}

?>