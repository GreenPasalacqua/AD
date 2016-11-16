<?php
session_start();
session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
</head>
<body>

Empleados

<br><a href="insertar.html"><button type="button">INSERTAR</button></a>
<br><a href="consultar.php?llave=3"><button type="button">MODIFICAR</button></a>
<br><a href="consultar.php?llave=4"><button type="button">ELIMINAR</button></a>
<br><a href="consultar.php?llave=2"><button type="button">CONSULTAR</button></a>
<!--<br><a href="reporte.php"><button type="button">GENERAR REPORTE</button></a>-->

</body>
</html>