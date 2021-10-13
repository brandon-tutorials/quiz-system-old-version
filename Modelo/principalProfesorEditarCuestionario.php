<?php
/*Establece el Id de cuestionario para ser editado*/
require_once '../Config/config.php';
require_once '../Modelo/usuarioSession.php';

$cuestionarioSession = new usuarioSession();
$cuestionarioSession->establecerIdCuestionario($_POST['id']);
?>
