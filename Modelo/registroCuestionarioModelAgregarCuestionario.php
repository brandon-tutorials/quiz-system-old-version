
<?php
/*Agrega un nuevo cuestionario a la cuenta de un profesor*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db             = new Database();
$usuarioSession = new usuarioSession();
$idCuestionario = $usuarioSession->obtenerIdCuestionario();

$sqlIdProfesor       = "SELECT idProfesor FROM Profesor,Usuario WHERE Profesor.idUsuario=Usuario.idUsuario AND nombreUsuario='" . $usuarioSession->obtenerUsuarioActual() . "'";
$resultadoIdProfesor = mysqli_query($db->conexion, $sqlIdProfesor);

$row        = mysqli_fetch_array($resultadoIdProfesor);
$idProfesor = $row[0];

$sqlCuestionario       = "INSERT INTO Cuestionario(idCuestionario,tituloCuestionario,descripcion,rutaImagenCuestionario,idProfesor) VALUES ('" . $idCuestionario . "','Sin nombre','','Img/cuestionario.png','" . $idProfesor . "')";
$resultadoCuestionario = mysqli_query($db->conexion, $sqlCuestionario);

$sqlBusquedaPregunta = "SELECT COUNT(idpregunta) from pregunta where idCuestionario='" . $idCuestionario . "'";
$resultadoBusqueda   = mysqli_query($db->conexion, $sqlBusquedaPregunta);

$row = mysqli_fetch_array($resultadoBusqueda);

if ($row[0] == 0) {
    $sqlInicializar = "INSERT INTO pregunta(titulopregunta,rutaimagenpregunta,respuestauno,respuestados,respuestatres,
respuestacuatro,estadoUno,estadoDos,estadoTres,estadoCuatro,tiempo,puntos,idcuestionario) values('','','','','','','0','0','0','0','10','100','" . $idCuestionario . "')";
    $resultadoInsercion = mysqli_query($db->conexion, $sqlInicializar);

    if (isset($resultadoInsercion)) {
        echo "insertado con exito";
    }
}

?>