<?php
/*El controlador Ingresar permite el accesso dependiendo el tipo de usuario (Profesor o Alumno)*/
class Ingresar extends Control
{

    public function __construct()
    {

        parent::__construct();

        /*Se identifica el tipo de usuario para redirigirlo a su vista correspondiente*/
        $this->usuarioSession = new UsuarioSession();

        if ($this->usuarioSession->obtenerUsuarioActual()) {
            if ($this->usuarioSession->obtenerTipoUsuarioActual() == "profesor") {
                header("Location:" . constant('URL') . "principalProfesor");
            } else {
                header("Location:" . constant('URL') . "principalAlumno");
            }
        }

    }
    /*La funcion Render se encarga de cargar la vista de Ingresar*/
    public function render()
    {
        $this->view->render('Ingresar/index');
        /*Si existe un error al ingresar se muestra un mensaje en la vista*/
        if ($this->usuarioSession->obtenerError()) {

            echo "<script> mensajeIncorrecto();</script>";
            $this->usuarioSession->establecerError(null);

        }
    }

    /*La funcion ingresar valida los datos y establece el usuario mediante sesiones PHP*/
    public function ingresar()
    {

        if (($_POST['nombreUsuario'] != null) && ($_POST['contrasenia'] != null)) {

            $nombreUsuario = $_POST['nombreUsuario'];
            $contrasenia   = $_POST['contrasenia'];

            if ($datos = $this->model->usuarioExiste($nombreUsuario, $contrasenia)) {
                $this->usuarioSession->establecerUsuarioActual($nombreUsuario);
                if ($this->model->tipoUsuario($datos['idUsuario'])) {
                    $this->usuarioSession->establecerTipoUsuarioActual("profesor");
                    header("Location:" . constant('URL') . "principalProfesor");
                } else {
                    $this->usuarioSession->establecerTipoUsuarioActual("alumno");
                    header("Location:" . constant('URL') . "principalAlumno");
                }
            } else {
                $this->usuarioSession->establecerError(true);
                header("Location:" . constant('URL') . "ingresar");
            }

        } else {
            $this->usuarioSession->establecerError(true);
            header("Location:" . constant('URL') . "ingresar");

        }

    }

}
?>