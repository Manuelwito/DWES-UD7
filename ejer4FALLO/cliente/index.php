<?php


define('CONTROLLERS_FOLDERS', "controllers/");
define('DEFAULT_CONTROLLER', "ciudades");
define("DEFAULT_ACTION", "muestraCiudades");

$controller = DEFAULT_CONTROLLER;
if (!empty($_GET['controller'])) {

        $controller = $_GET['controller'];
}

$action = DEFAULT_ACTION;

if (!empty($_GET['action'])) {
        $action = $_GET['action'];
}
$controller = CONTROLLERS_FOLDERS . $controller . '_controller.php';

try {
        if (is_file($controller)) {
                require_once($controller);
        } else {
                throw new Exception("la controlador no existe - 404 not found");
        }
        //Si la variable $action es una funcion la ejecutamos o detenemos el escript 

        if (is_callable($action)) {
                $action();
        } else {
                throw new Exception("la accion no existe - 404 not found");
        }
} catch (Exception $e) {
        echo "fallo en el index del cliente ";
        echo 'Excepcion capturada: ' . $e->getMessage() . "\n";
}
