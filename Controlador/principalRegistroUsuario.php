<?php

class PrincipalRegistroUsuario extends Control
{
    public function __construct()
    {
        parent::__construct();
    }
    /*La funcion Render se encarga de cargar la vista de principalRegistroUsuario*/
    public function render()
    {
        $this->view->render('principalRegistroUsuario/index');
    }
}
?>