<?php
/*ControladorprincipalRealizarCuestionarioAlumno*/
class principalRealizarCuestionarioAlumno extends control
{

    public function __construct()
    {
        parent::__construct();

     $this->usuarioSession = new UsuarioSession();
        /*Validacion para evitar que ingresen usuarios que no sean profesor*/
        if ($this->usuarioSession->obtenerUsuarioActual()) {
            if ($this->usuarioSession->obtenerTipoUsuarioActual() != "alumno") {     
                header("Location:" . constant('URL') . "principalProfesor");
            }

        } 
        else {
            header("Location:" . constant('URL') . "Inicio");
        }

    }
    /*La funcion Render se encarga de cargar la vista de principalRealizarCuestionarioAlumno*/
    public function render()
    {

        $this->view->pinReporte=$this->usuarioSession->obtenerIdReporteEjecutado();
        $this->view->render('principalRealizarCuestionarioAlumno/index');


    }

}
?>