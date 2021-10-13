
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
$resultadoProfesor = mysqli_query($db->conexion, $sqlProfesor);
$resultadoProfesor=mysqli_fetch_array($resultadoProfesor);

$sqlListaCuestionarios = "SELECT *FROM Cuestionario WHERE idProfesor='".$resultadoProfesor[0]."' AND idCuestionario='".$_POST['idCuestionario']."'";
$resultadoLista = mysqli_query($db->conexion, $sqlListaCuestionarios);

$row = mysqli_fetch_array($resultadoLista);

$jsonstring = json_encode($row);
echo $jsonstring;
?>