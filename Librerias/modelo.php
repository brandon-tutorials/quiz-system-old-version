
<?php
/*El modelo proporciona acceso a la conexion de la base de datos*/
class Modelo
{
    public function __construct()
    {
        $this->db = new Database();
    }
}
