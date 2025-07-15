<?php
// Establece la zona horaria por defecto
date_default_timezone_set('America/Lima'); // Cambia según tu país

// Carga automática de clases (si no usas Composer)
function autoload($class) {
    if (file_exists("../controllers/{$class}.php")) {
        require_once "../controllers/{$class}.php";
    } elseif (file_exists("../models/{$class}.php")) {
        require_once "../models/{$class}.php";
    } elseif (file_exists("../config/{$class}.php")) {
        require_once "../config/{$class}.php";
    }
}
spl_autoload_register('autoload');

// Obtener controlador y acción desde la URL (por defecto: libro/index)
$controller = $_GET['controller'] ?? 'libro';
$action     = $_GET['action'] ?? 'index';

// Formar nombre del controlador
$controllerName = ucfirst($controller) . "Controller";

// Validar si el controlador y el método existen
if (file_exists("../controllers/$controllerName.php")) {
    require_once "../controllers/$controllerName.php";

    if (class_exists($controllerName)) {
        $controllerObj = new $controllerName();

        if (method_exists($controllerObj, $action)) {
            $controllerObj->$action();
        } else {
            echo "<h4>Error: Método '$action' no encontrado en el controlador '$controllerName'.</h4>";
        }

    } else {
        echo "<h4>Error: Clase '$controllerName' no definida.</h4>";
    }
} else {
    echo "<h4>Error: Archivo del controlador '$controllerName.php' no encontrado.</h4>";
}
?>