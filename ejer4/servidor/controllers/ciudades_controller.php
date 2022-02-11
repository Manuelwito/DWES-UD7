<?php
    $uri="http://localhost/DWES-UD7/ejer4/servidor/";
    $server = new SoapServer(null,array('uri'=>$uri));
    $server->addFunction("getCiudades");
    $server->handle();

    function getCiudades($num)
{  
    //incluimos el modelo
    include './models/ciudades_model.php';
    getCiudadesFiltro($num);
    
 
}

