
<?php
/*Control se encarga de cargar el Modelo de un controlador*/
class Control
{
    public function __construct()
    {

        $this->view = new Vista();

    }
    /*Cada que ingresa a un controlador, se carga un modelo si es que existe uno*/
    public function cargarModelo($model)
    {
        $url = 'Modelo/' . $model . 'Model.php';
        if (file_exists($url)) {
            require $url;
            $modelName   = $model . 'Model';
            $this->model = new $modelName();
        }

    }
    /*Esta funcion se encarga de generar ID unicos*/
    public function generarId()
    {
        $idNuevo = uniqid($_SERVER['PHP_SELF'], true);
        $idMd5   = md5($idNuevo);
        $id      = substr($idMd5, 0, 7);
        return $id;
    }

}
