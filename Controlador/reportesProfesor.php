<?php
/*El controlador Reportes carga la vista de Reportes*/
class ReportesProfesor extends control
{

    public function __construct()
    {
        parent::__construct();
        $this->usuarioSession = new UsuarioSession();
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
    /*La funcion Render se encarga de cargar la vista de Reportes*/
    public function render()
    {
        $this->view->render('ReportesProfesor/index');
    }
}
?>