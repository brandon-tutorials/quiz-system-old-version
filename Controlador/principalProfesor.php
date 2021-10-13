<?php
class PrincipalProfesor extends Control
{
    public function __construct()
    {
        parent::__construct();

        $this->usuarioSession = new UsuarioSession();
        /*Validacion para evitar que ingresen usuarios que no sean profesor*/
        if ($this->usuarioSession->obtenerUsuarioActual()) {
            if ($this->usuarioSession->obtenerTipoUsuarioActual() == "profesor") {
                $this->view->nombreProfesor = $this->usuarioSession->obtenerUsuarioActual();
                $this->view->tipo= $this->usuarioSession->obtenerTipoUsuarioActual();
            } else {
                header("Location:" . constant('URL') . "principalAlumno");
            }

        } else {
            header("Location:" . constant('URL') . "Inicio");
        }
    }
    /*La funcion Render se encarga de cargar la vista de principalProfesor*/
    public function render()
    {
        $this->view->render('PrincipalProfesor/index');
    }

    public function finalizarSessionCuestionario()
    {
        $this->usuarioSession->establecerIdCuestionario(null);
        header("Location:".constant('URL')."principalProfesor");
    }
}
?>