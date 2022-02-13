<!DOCTYPE html>
<head>
        <title>CIUDADES</title>
        <link rel="stylesheet" type="text/css" href="/estilo.css">
    </head>
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
    </table>
    
</html>