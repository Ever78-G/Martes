<?php
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametro.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function Show_error()
{
    $error = new Errorcontroller();
    $error->index();
}

// Verificar si se especifica un controlador en la URL
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} else {
    // Usar el controlador y acción predeterminados
    $nombre_controlador = controller_defauld;
}

// Verificar si el controlador existe
if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    // Verificar si se especifica una acción en la URL
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        // Usar la acción predeterminada si no se especifica ninguna
        $action_defauld = action_defauld;
        $controlador->$action_defauld();
    }
} else {
    // Mostrar un error si el controlador no existe
    Show_error();
}

require_once "views/layout/footer.php";
?>
