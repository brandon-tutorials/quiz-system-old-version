<?php

class Salir extends Control
{
    public function __construct()
    {
        parent::__construct();
        $usuario = new UsuarioSession();
        $usuario->cerrarSession();
    }
    /*La funcion Render se encarga de cargar la vista de Salir*/
    public function render()
    {
        $this->view->render('Inicio/index');
    }
}
?>