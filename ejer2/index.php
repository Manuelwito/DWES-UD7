<!DOCTYPE html>
<?php 
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.193/DWES-UD7/ejer2.php";
$uri = "https://192.168.129.193/DWES-UD7";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = "El número es par o impar: " . $cliente->par($numero);
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
    <h1>Obtener par o impar</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='numero' value='$numero'>";
        print "<input type='submit' name='enviar' value='Calcular par o impar'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
    <div id="footer">Servidor del jesus su tio ahi weno! <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>
</html>