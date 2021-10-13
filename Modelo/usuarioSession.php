
<?php
/*En esta seccion se tienen las funciones que utilizamos para manejar las sesiones PHP*/
class UsuarioSession
{

    public function __construct()
    {
        session_start();

    }
    public function establecerIdReporteEjecutado($idCuestionario)
    {
        $_SESSION['idCuestionarioEjecutado'] = $idCuestionario;
    }

    public function obtenerIdReporteEjecutado()
    {
        if (isset($_SESSION['idCuestionarioEjecutado'])) {
            return $_SESSION['idCuestionarioEjecutado'];
        }
        return null;
    }

    public function establecerIdCuestionario($idCuestionario)
    {
        $_SESSION['idCuestionario'] = $idCuestionario;
    }

    public function obtenerIdCuestionario()
    {
        if (isset($_SESSION['idCuestionario'])) {
            return $_SESSION['idCuestionario'];
        }
        return null;
    }

    public function establecerUsuarioActual($usuario)
    {
        $_SESSION['usuario'] = $usuario;
    }

    public function obtenerUsuarioActual()
    {
        if (isset($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        }
        return null;
    }

    public function establecerTipoUsuarioActual($tipoUsuario)
    {
        $_SESSION['tipoUsuario'] = $tipoUsuario;
    }

    public function obtenerError()
    {
        if (isset($_SESSION['error'])) {
            return $_SESSION['error'];
        }
        return false;
    }

    public function establecerError($error)
    {
        $_SESSION['error'] = $error;
    }

    public function obtenerTipoUsuarioActual()
    {
        if (isset($_SESSION['tipoUsuario'])) {
            return $_SESSION['tipoUsuario'];
        }
        return null;
    }

    public function cerrarSession()
    {
        session_unset();
        session_destroy();
    }

}
?>