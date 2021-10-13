
<?php
/*App se encarga de cargar las paginas del sistema web*/
class App
{
    public function __construct()
    {
        /*Obtiene informacion de la URL*/
        $url = isset($_GET['url']) ? $_GET['url'] : 'inicio';
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        /*Llama al controlador si existe y tambien sus metodos*/
        $archivoController = 'Controlador/' . $url[0] . '.php';
        if (file_exists($archivoController)) {
            require_once $archivoController;

            $controller = new $url[0];
            $controller->cargarModelo($url[0]);

            if (isset($url[1])) {

                $controller->render();
                $controller->{$url[1]}();

            } else {
                $controller->render();
            }

        } else {
            $controller = new Errores();
        }

    }
}

?>

