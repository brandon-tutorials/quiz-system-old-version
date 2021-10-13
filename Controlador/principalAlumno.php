<?php
/*El controlador PrincipalAlumno carga la vista principal del usuario Alumno*/
class PrincipalAlumno extends Control
{

    public function __construct()
    {
        parent::__construct();

        /*Validaciones para evitar el ingreso de usuarios que no sean alumno*/
        $this->usuarioSession = new UsuarioSession();
        if ($this->usuarioSession->obtenerUsuarioActual()) {

            if ($this->usuarioSession->obtenerTipoUsuarioActual() == "alumno") {
                $this->view->nombreAlumno = $this->usuarioSession->obtenerUsuarioActual();
                $this->view->tipo         = $this->usuarioSession->obtenerTipoUsuarioActual();
            } else {
                header("Location:" . constant('URL') . "principalProfesor");
            }

        } else {

            header("Location:" . constant('URL') . "Inicio");
        }

    }
    /*La funcion Render se encarga de cargar la vista de PrincipalAlumno*/
    public function render()
    {
        $this->view->render('PrincipalAlumno/index');
    }
}
?>