<?php
/*Ingresar model se encarga de hacer consultas en base de datos para ingresar al sistema web*/
class IngresarModel extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }
/*Verificar existencia*/
    public function usuarioExiste($usu, $contra)
    {
        $md5contra = md5($contra);
        $sql       = "SELECT * FROM usuario WHERE nombreUsuario = '" . $usu . "' AND  contrasenia = '" . $md5contra . "';";
        $query     = mysqli_query($this->db->conexion, $sql);

        if ($row = mysqli_fetch_array($query)) {
            return $row;
        } else {
            return null;
        }
    }
/*Tipo de usuario*/
    public function tipoUsuario($idUsuario)
    {
        $sql   = "SELECT * FROM profesor WHERE idUsuario = '" . $idUsuario . "'";
        $query = mysqli_query($this->db->conexion, $sql);
        if ($row = mysqli_fetch_array($query)) {
            return true;
        } else {
            return false;
        }
    }

}

?>