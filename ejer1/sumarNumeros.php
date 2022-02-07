<?php 
// Instanciamos un nuevo servidor SOAP
$uri="192.168.129.140";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("sumarNumeros");
$server->handle();

// Función para obtener raíz cuadrada
function sumarNumeros($num1, $num2) {
    $resultado=$num1+$num2;
    return $resultado;
}
?>