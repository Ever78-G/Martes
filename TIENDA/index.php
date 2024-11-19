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
if (isset($_GET["controllers"])) {
    $nombre_controlador = $_GET['controllers'] . 'controllers';
} elseif (isset($_GET['controller']) && ($_GET['action'])) {
    $nombre_controlador = $_GET['controllers'] . 'controllers';
} else {
    Show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (isset($_GET['controllers']) && !isset($_GET['action'])) {
        $action_defauld = action_defauld;
        $controlador->$action_defauld();

    }
    else{
        Show_error();
    }
}
else{
    Show_error();
}
require_once "views/layout/footer.php";
?>