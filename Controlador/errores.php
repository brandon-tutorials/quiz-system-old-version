<?php
/*Controlador de errores, es utilizada cuando se ingresa una direccion incorrecta en la URL*/
class Errores extends Control{
	function __construct(){
		parent:: __construct();
		$this->view->render('errores/index');
		//echo"<p>Error al cargar el recurso</p>";
	}
}
?>