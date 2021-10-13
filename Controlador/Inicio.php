<?php
/*El controlador Inicio se encarga de cargar la primera vista del sistema web*/
class Inicio extends Control
{
    public function __construct()
    {
        parent::__construct();
    }
    /*La funcion Render se encarga de cargar la vista de Inicio*/
    public function render()
    {
        $this->view->render('Inicio/index');
    }
}
?>