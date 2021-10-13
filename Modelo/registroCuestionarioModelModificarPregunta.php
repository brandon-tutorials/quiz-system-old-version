
<?php
/*Modifica una pregunta en especifico de un cuestionario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db = new Database();

$usuarioSession    = new usuarioSession();
$idCuestionario    = $usuarioSession->obtenerIdCuestionario();
$nombreRutaDestino = "";

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["imagenPregunta"]["type"] == "image/pjpeg")
        || ($_FILES["imagenPregunta"]["type"] == "image/jpeg")
        || ($_FILES["imagenPregunta"]["type"] == "image/png")
        || ($_FILES["imagenPregunta"]["type"] == "image/gif")) {

        $nombreRutaDestino = "Img/Imagen_" . $idCuestionario . "_" . $_POST['idPregunta'] . "." . pathinfo(($_FILES["imagenPregunta"]["name"]), PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["imagenPregunta"]["tmp_name"], "../" . $nombreRutaDestino)) {
            echo "subida al servidor con exito";
        }
    }
}

if ($nombreRutaDestino == "") {
    $sqlRutaActual       = "SELECT rutaImagenPregunta FROM pregunta WHERE idPregunta='" . $_POST['idPregunta'] . "'";
    $resultadoRutaActual = mysqli_query($db->conexion, $sqlRutaActual);
    $row                 = mysqli_fetch_array($resultadoRutaActual);
    $nombreRutaDestino   = $row[0];
}

$sqlPregunta = "UPDATE pregunta SET titulopregunta='" . $_POST['tituloPregunta'] . "',
rutaimagenpregunta='" . $nombreRutaDestino . "',
respuestauno='" . $_POST['respuestaUno'] . "',
respuestados='" . $_POST['respuestaDos'] . "',
respuestatres='" . $_POST['respuestaTres'] . "',
respuestacuatro='" . $_POST['respuestaCuatro'] . "',
estadoUno='" . $_POST['estadoUno'] . "',
estadoDos='" . $_POST['estadoDos'] . "',
estadoTres='" . $_POST['estadoTres'] . "',
estadoCuatro='" . $_POST['estadoCuatro'] . "',
tiempo=" . $_POST['tiempo'] . ",
puntos='" . $_POST['puntos'] . "'
WHERE idPregunta='" . $_POST['idPregunta'] . "'";

$resultadoInsercion = mysqli_query($db->conexion, $sqlPregunta);

if (isset($resultadoInsercion)) {
    echo "insertado con exito";
}

?>
