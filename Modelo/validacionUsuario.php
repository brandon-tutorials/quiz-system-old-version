
<?php
/*La validacion de usuario permite identificar si un usario ya existe con un nombre de usuario y de esta manera evitar que se repitan nombres de usuario*/
class ValidacionUsuario extends Modelo
{
    public function __construct()
    {
        parent::__construct();
    }

    public function busquedaNombreUsuario($nombreUsuario)
    {

        $sqlUsuario       = "SELECT *FROM Usuario WHERE nombreUsuario='" . $nombreUsuario . "'";
        $resultadoUsuario = mysqli_query($this->db->conexion, $sqlUsuario);

        if ($row = mysqli_fetch_array($resultadoUsuario)) {
            return $row;
        } else {
            return null;
        }

    }

}
?>