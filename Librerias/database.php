
<?php
/*Este es el archivo que contiene los datos a la base de datos y su conexion*/
class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    public $conexion;
    public function __construct()
    {
        $this->host     = constant('HOST');
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->conexion->connect_error) {
            echo "Conexión fallida: " . $this->conexion->connect_error;
        }
    }
}
?>