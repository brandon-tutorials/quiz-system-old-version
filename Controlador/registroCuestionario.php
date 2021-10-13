<?php
/*El controlador RegistroCuestionario carga la vista del registro de cuestionario*/
class RegistroCuestionario extends control
{

    public function __construct()
    {
        parent::__construct();

        $this->cuestionarioSession = new UsuarioSession();
        /*Aparte de validar si el usuario es un Profesor guarda el Id del cuestionario*/
        if ($this->cuestionarioSession->obtenerUsuarioActual()) {
            if ($this->cuestionarioSession->obtenerIdCuestionario() == null) 
            {
                $idCuestionario = Control::generarId();
                $this->cuestionarioSession->establecerIdCuestionario($idCuestionario);
            }
            $this->view->idCuestionario = $this->cuestionarioSession->obtenerIdCuestionario();
        } else {
            header("Location:" . constant('URL') . "Inicio");
        }
 
    }
    /*La funcion Render se encarga de cargar la vista de RegistroCuestionario*/
    public function render()
    {

        $this->view->render('RegistroCuestionario/index');
        echo "<script>inicializarCuestionario();</script>";
    }

}
?>