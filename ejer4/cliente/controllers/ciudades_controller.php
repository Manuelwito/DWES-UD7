<?php

function muestraCiudades()
{
    include 'views/ciudades_consultar.php';
}

function consultar()
{
    $url = "http://localhost/DWES-UD7/ejer4/servidor/index.php?controller=ciudades&action=filtraPoblacion";
    $uri = "http://localhost/DWES-UD7/ejer4/servidor/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    if (!isset($_POST['numero'])){
        die("No has especificado un número de población.");}
        else{
      
    $num = $_POST['numero'];
 
 
    $ciudades = $cliente->getCiudades($num);

    if ($ciudades === null)
        die("Algo ha ido mal al pedirselo al servidor");
    //Pasamos a la vista toda la información que se desea representar
    include('views/ciudades_listar.php');
       
        }
 
    
    
}
