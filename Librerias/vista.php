
<?php
/*Vista permite cargar la pagina mediate render*/
class Vista
{
    public function __construct()
    {
        //echo "<p>vista base</p>";
    }
    public function render($nombre)
    {
        require 'Vista/' . $nombre . '.php';
    }
}

?>
