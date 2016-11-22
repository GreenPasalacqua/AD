<?php
session_start();
session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compras</title>
</head>
<body>

COMPRAS

<br><a href="agregar.html"><button type="button">AGREGAR FALTANTES</button></a>
<br><a href="consultarLista.php?llave=1"><button type="button">MODIFICAR MATERIAL</button></a>
<br><a href="consultarLista.php?llave=3"><button type="button">REGISTRAR COMPRA</button></a>
<br><a href="lista.php?val=2"><button type="button">CONSULTAR LISTA</button></a>
<br><a href="consultarLista.php?llave=2"><button type="button">ELIMINAR MATERIAL</button></a>
<!--<br><a href="reporte.php"><button type="button">GENERAR REPORTE</button></a>-->

</body>
</html>