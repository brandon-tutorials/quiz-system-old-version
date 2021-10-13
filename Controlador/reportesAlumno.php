<?php
/*El controlador Reportes carga la vista de Reportes*/
class ReportesAlumno extends control
{

    public function __construct()
    {
        parent::__construct();
        $this->usuarioSession = new UsuarioSession();
        if ($this->usuarioSession->obtenerUsuarioActual()) {
            if ($this->usuarioSession->obtenerTipoUsuarioActual() == "alumno") {
                $this->view->nombreAlumno = $this->usuarioSession->obtenerUsuarioActual();
                $this->view->tipo= $this->usuarioSession->obtenerTipoUsuarioActual();
            } else {
                header("Location:" . constant('URL') . "principalProfesor");
            }

        } else {
            header("Location:" . constant('URL') . "Inicio");
        }

    }
    /*La funcion Render se encarga de cargar la vista de Reportes*/
    public function render()
    {
        $this->view->render('ReportesAlumno/index');
    }
}
?>