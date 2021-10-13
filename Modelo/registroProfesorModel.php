
<?php
/*Registra un profesor en el sistema web*/
class RegistroProfesorModel extends Modelo
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {

        $sqlUsuario        = "INSERT INTO Usuario(idUsuario,nombreUsuario,contrasenia) VALUES ('" . $datos['idUsuario'] . "','" . $datos['nombreUsuario'] . "','" . md5($datos['contrasenia']) . "')";
        $sqlProfesor       = "INSERT INTO Profesor(idProfesor,idUsuario,nombreCompleto) VALUES ('" . $datos['idProfesor'] . "','" . $datos['idUsuario'] . "','" . $datos['nombreCompleto'] . "')";
        $resultadoUsuario  = mysqli_query($this->db->conexion, $sqlUsuario);
        $resultadoProfesor = mysqli_query($this->db->conexion, $sqlProfesor);
        if (!empty($resultadoUsuario) && !empty($resultadoProfesor)) {
            return true;
        } else {
            return false;
        }

    }

}
?>