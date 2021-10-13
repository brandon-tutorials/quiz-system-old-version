
<?php
/*Modifica la informacion del cuestionario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db                   = new Database();
$fechaActual          = date('Y-m-d H:i:s');
$usuarioSession       = new usuarioSession();
$idCuestionarioActual = $usuarioSession->obtenerIdCuestionario();

$nombreRutaDestino = "Img/cuestionario.png";

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["imagenCuestionario"]["type"] == "image/pjpeg")
        || ($_FILES["imagenCuestionario"]["type"] == "image/jpeg")
        || ($_FILES["imagenCuestionario"]["type"] == "image/png")
        || ($_FILES["imagenCuestionario"]["type"] == "image/gif")) {

        $nombreRutaDestino = "Img/Imagen_" . $idCuestionarioActual . "." . pathinfo(($_FILES["imagenCuestionario"]["name"]), PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["imagenCuestionario"]["tmp_name"], "../" . $nombreRutaDestino)) {
            echo "subida al servidor con exito";
        }
    }
}

$sqlModificarCuestionario = "UPDATE Cuestionario SET
             tituloCuestionario='" . $_POST['tituloCuestionario'] . "',
             fecha='" . $fechaActual . "',
             descripcion='" . $_POST['descripcion'] . "',
             rutaImagenCuestionario='" . $nombreRutaDestino . "'
             WHERE idCuestionario='" . $idCuestionarioActual . "'";

$resultadoModificarCuestionario = mysqli_query($db->conexion, $sqlModificarCuestionario);
if (!empty($resultadoModificarCuestionario)) {
    echo "insercion finalizada con exito";
}

?>
