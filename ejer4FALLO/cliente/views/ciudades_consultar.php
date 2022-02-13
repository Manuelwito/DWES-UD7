<?php

?>
<html>
    <head>
        <title>CIUDADES</title>
        <link rel="stylesheet" type="text/css" href="/estilo.css">
    </head>
<body>
    <h1>Obtener ciudades según número de población</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php?controller=ciudades&action=mostrar" method="post"> 
    <?php 
        print "<input type='text' name='numero'>";
        print "<input type='submit' name='enviar' value='Mostrar ciudades por población'>";
    ?>
    </form>
</body>
</html>