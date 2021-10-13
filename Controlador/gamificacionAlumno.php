<?php
class GamificacionAlumno extends control
{

    public function __construct()
    {
        parent::__construct();
        $this->usuarioSession = new UsuarioSession();
        if ($this->usuarioSession->obtenerUsuarioActual()) {
            if ($this->usuarioSession->obtenerTipoUsuarioActual() == "alumno") {
                $this->view->tipo= $this->usuarioSession->obtenerTipoUsuarioActual();
            } else {
                header("Location:" . constant('URL') . "principalProfesor");
            }

        } else {
            header("Location:" . constant('URL') . "Inicio");
        }

    }

    public function render()
    {
        $this->view->render('GamificacionAlumno/index');
    }
}
?>