<?php

class GamificacionProfesor extends control
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

    public function render()
    {
        $this->view->render('GamificacionProfesor/index');
    }
}
?>