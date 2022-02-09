<?php 
// Instanciamos un nuevo servidor SOAP
$uri="http://localhost/DWES-UD7/ejer3/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("getCiudades");
$server->handle();

function getConnection()
{
    $user = 'root';
    $password = 'root';
    return new PDO('mysql:host=localhost;dbname=ciudades', $user, $password);
}

function getCiudades($poblacion)
{
    $db = getConnection();
    $result = $db->prepare('SELECT * FROM ciudades WHERE poblacion >= :poblacion');
    $result -> bindParam("poblacion", $poblacion);
    $result->execute();
    $ciudades= $result->fetchAll();
    $conn = null;
    return $ciudades;

}

var_dump(getCiudades(123));
?>



