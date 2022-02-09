<!DOCTYPE html>
<?php 
// Vaciamos algunas variables
$error = "";
$ciudades = "";
$poblacion = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/DWES-UD7/ejer3/muestraCiudades.php";
$uri = "http://localhost/DWES-UD7/ejer3/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
var_dump($cliente);
// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['numero'])) {
        $poblacion = $_POST['numero'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        
        $ciudades = $cliente->getCiudades($poblacion);
?>
        <h1>Ciudades con población mayor a la indicada</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>NOMBRE</th>
            <th>POBLACIÓN</th>
        </tr>
        <?php foreach ($ciudades as $ciudad) : ?>
            <tr>
                <td><?php echo $ciudad['id'] ?></td>
                <td><?php echo $ciudad['nombre'] ?></td>
                <td><?php echo $ciudad['poblacion'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table><?php
    } else {
        $error = "<strong>Error:</strong> Debes introducir un parametro correcto<br/><br/>";
    }
}
?>
<html>
    <head>
        <title>Calcular numero par - Servicio Web + PHP + SOAP</title>
        <link rel="stylesheet" type="text/css" href="/estilo.css">
    </head>
<body>
    <h1>Obtener ciudades según número de población</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='numero' value='$poblacion'>";
        print "<input type='submit' name='enviar' value='Mostrar ciudades por población'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$ciudades</p>";
    ?>
    </form>
</body>
</html>