<?php
/*El controlador RegistroProfesor carga la vista del registro del profesor*/
class RegistroProfesor extends Control
{
    public function __construct()
    {
        parent::__construct();
    }
    /*La funcion Render se encarga de cargar la vista de RegistroProfesor*/
    public function render()
    {
        $this->view->render('RegistroProfesor/index');
    }

    /*La funcion registrarProfesor obtiene los datos del formulario y los envia a la funcion insert que pertenece al modelo del profesor*/
    public function registrarProfesor()
    {
        $nombreUsuario  = $_POST['nombreUsuario'];
        $nombreCompleto = $_POST['nombreCompleto'];
        $contrasenia    = $_POST['contrasenia'];
        $idUsuario      = Control::generarId();
        $idProfesor     = Control::generarId();

        $this->validacionUsuario = new validacionUsuario();
        if (
            $this->validacionUsuario->busquedaNombreUsuario($nombreUsuario)) {
            echo '<script type="text/javascript">
  usuarioExistente();
    </script>';
        } else {
            if ($this->model->insert(['idUsuario' => $idUsuario, 'idProfesor' => $idProfesor, 'nombreUsuario' => $nombreUsuario, 'nombreCompleto' => $nombreCompleto, 'contrasenia' => $contrasenia])) {
                echo '<script type="text/javascript">registroExitoso();
 setTimeout(function(){location.href="' . constant('URL') . 'inicio"},2000);
 </script>';
            } else {
                echo '<script type="text/javascript">
   registroFallido();
  setTimeout(function(){location.href="' . constant('URL') . 'inicio"},3000);
    </script>';
            }

        }

    }
}
?>