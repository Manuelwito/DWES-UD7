<?php

    function getConnection()
    {
        $user = 'root';
        $password = 'root';
        return new PDO('mysql:host=localhost;dbname=ciudades', $user, $password);
    }

    function getCiudadesFiltro($num){
        echo "modelo";
        $db = getConnection();
        $result = $db->prepare('SELECT * FROM ciudades WHERE poblacion >= :poblacion');
        $result -> bindParam("poblacion", $num);
        $result->execute();
        $ciudades= $result->fetchAll();
        $conn = null;
        return $ciudades;
    
    }
