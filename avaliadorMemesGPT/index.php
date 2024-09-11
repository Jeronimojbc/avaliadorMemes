<?php

// index.php

// Configuración de errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Autocarga de clases
spl_autoload_register(function ($class) {
    $paths = [
        'controllers/',
        'models/',
        'core/',
    ];

    foreach ($paths as $path) {
        $file = __DIR__ . '/' . $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Obtener el controlador y la acción desde la URL
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'memes';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Mapear el controlador a una clase
$controllerClass = ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();

    // Verificar que el método de la acción exista en el controlador
    if (method_exists($controller, $action)) {
        // Llamar al método de la acción
        $controller->$action($id);
    } else {
        // Acción no encontrada
        echo "Acción no encontrada: {$action}";
    }
} else {
    // Controlador no encontrado
    echo "Controlador no encontrado: {$controllerClass}";
}
