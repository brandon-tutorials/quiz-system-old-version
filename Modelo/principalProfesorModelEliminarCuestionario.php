
<?php
/*Elimina las preguntas de un cuestionario y posterior a ello el cuestionario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';

$db             = new Database();
$idCuestionario = $_POST['id'];

$sqlEliminarPreguntas       = "DELETE FROM pregunta WHERE idCuestionario='" . $idCuestionario . "'";
$resultadoEliminarPreguntas = mysqli_query($db->conexion, $sqlEliminarPreguntas);

if ($resultadoEliminarPreguntas) {
    echo "Exito al eliminar preguntas";
}


$sqlConsultarReportes="SELECT idreporte FROM reportecuestionario,cuestionario WHERE reportecuestionario.idcuestionario=cuestionario.idcuestionario AND cuestionario.idcuestionario='".$idCuestionario."'";
$resultadoConsultaReportes = mysqli_query($db->conexion, $sqlConsultarReportes);

while($reporte= mysqli_fetch_array($resultadoConsultaReportes)){
	$sqlEliminarAlumnoReporte="DELETE FROM alumnoreporte WHERE idreporte='".$reporte['idreporte']."'";
	$resultadoEliminarAlumnoReporte = mysqli_query($db->conexion, $sqlEliminarAlumnoReporte);
	if($resultadoEliminarAlumnoReporte)
	{
		echo "Exito al eliminar alumnoreporte";
	}
}

$sqlEliminarReporte="DELETE FROM reportecuestionario WHERE idcuestionario='".$idCuestionario."'";
$resultadoEliminarReporte = mysqli_query($db->conexion, $sqlEliminarReporte);
	if($resultadoEliminarReporte)
	{
		echo "Exito al eliminar reporte";
	}


$sqlEliminarCuestionario       = "DELETE FROM cuestionario where idCuestionario='" . $idCuestionario . "'";
$resultadoEliminarCuestionario = mysqli_query($db->conexion, $sqlEliminarCuestionario);

if ($resultadoEliminarCuestionario) {
    echo "Exito al eliminar cuestionario";
}

?>