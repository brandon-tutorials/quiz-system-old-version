<?php
/*Busca un cuestionario que tenga un parecido a lo tecleado por el usuario*/
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db = new Database();
$usuarioSession=new usuarioSession();



$buscar = $_POST['buscar'];
if (!empty($buscar)) {


$sqlProfesor="SELECT idProfesor FROM profesor,usuario WHERE profesor.idusuario=usuario.idusuario AND nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."'";

$resultadoConsultaProfesor = mysqli_query($db->conexion, $sqlProfesor);
$resultadoProfesor=mysqli_fetch_array($resultadoConsultaProfesor);


    $sqlBusqueda       = "SELECT * FROM cuestionario WHERE tituloCuestionario LIKE '$buscar%' AND idprofesor='".$resultadoProfesor[0]."'";
    $resultadoBusqueda = mysqli_query($db->conexion, $sqlBusqueda);

    if (!$resultadoBusqueda) {
        die('Error en la busqueda' . mysqli_error($connection));
    }

    $json     = array();
    $posicion = 0;
    while ($row = mysqli_fetch_array($resultadoBusqueda)) {
        $posicion += 1;
        $json[] = array(
            'tituloCuestionario' => $row['tituloCuestionario'],
            'idCuestionario'     => $row['idCuestionario'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>
