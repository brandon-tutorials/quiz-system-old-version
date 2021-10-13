<?php
require_once '../Librerias/database.php';
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$db= new Database();
$usuarioSession=new usuarioSession();

$sqlUsuario="SELECT idUsuario FROM Usuario WHERE nombreUsuario='".$usuarioSession->obtenerUsuarioActual()."'";
$resultadoUsuario = mysqli_query($db->conexion, $sqlUsuario);
$resultadoUsuario=mysqli_fetch_array($resultadoUsuario);

$sqlProfesor="SELECT idProfesor FROM profesor where idUsuario='".$resultadoUsuario[0]."'";
$resultadoConsultaProfesor = mysqli_query($db->conexion, $sqlProfesor);
$resultadoProfesor=mysqli_fetch_array($resultadoConsultaProfesor);

$sqlListaCuestionarios = "SELECT *FROM Cuestionario WHERE idProfesor='".$resultadoProfesor[0]."'";

$resultadoLista = mysqli_query($db->conexion, $sqlListaCuestionarios);

$json     = array();
$posicion = 0;
while ($row = mysqli_fetch_array($resultadoLista)) {
    $posicion += 1;
    $json[] = array(
        'idCuestionario'         => $row['idCuestionario'],
        'posicion'               => $posicion,
        'tituloCuestionario'     => $row['tituloCuestionario'],
        'fecha'                  => $row['fecha'],
        'descripcion'            => $row['descripcion'],
        'rutaImagenCuestionario' => $row['rutaImagenCuestionario']
    );

}

$jsonstring = json_encode($json);
echo $jsonstring;
?>