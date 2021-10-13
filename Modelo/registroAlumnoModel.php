<?php
/*Registra un alumno en el sistema web*/
class RegistroAlumnoModel extends Modelo
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        $sqlUsuario       = "INSERT INTO Usuario(idUsuario,nombreUsuario,contrasenia) VALUES ('" . $datos['idUsuario'] . "','" . $datos['nombreUsuario'] . "','" . md5($datos['contrasenia']) . "')";
        $sqlAlumno        = "INSERT INTO Alumno(idAlumno,idUsuario) VALUES ('" . $datos['idAlumno'] . "','" . $datos['idUsuario'] . "')";
        $resultadoUsuario = mysqli_query($this->db->conexion, $sqlUsuario);
        $resultadoAlumno  = mysqli_query($this->db->conexion, $sqlAlumno);
        if (!empty($resultadoUsuario) && !empty($resultadoAlumno)) {
            return true;
        } else {
            return false;
        }
    }

}
?>