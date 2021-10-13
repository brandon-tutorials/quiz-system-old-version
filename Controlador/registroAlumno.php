<?php

class RegistroAlumno extends Control
{
    public function __construct()
    {
        parent::__construct();

    }
    /*La funcion Render se encarga de cargar la vista de RegistroAlumno*/
    public function render()
    {
        $this->view->render('RegistroAlumno/index');
    }
    /*La funcion registrarAlumno obtiene los datos del formulario y los envia a la funcion insert que pertenece al modelo del alumno*/
    public function registrarAlumno()
    {

        $nombreUsuario           = $_POST['nombreUsuario'];
        $contrasenia             = $_POST['contrasenia'];
        $idUsuario               = Control::generarId();
        $idAlumno                = Control::generarId();
        $this->validacionUsuario = new validacionUsuario();
        if (
            $this->validacionUsuario->busquedaNombreUsuario($nombreUsuario)) {
            echo '<script type="text/javascript">
  usuarioExistente();
    </script>';
        } else {
            if ($this->model->insert(['idUsuario' => $idUsuario, 'idAlumno' => $idAlumno, 'nombreUsuario' => $nombreUsuario, 'contrasenia' => $contrasenia])) {
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