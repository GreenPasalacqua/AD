<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar</title>
</head>
<body>
<?php
session_start();
$llave=$_GET['llave'];
$_SESSION['llave']=$llave;
?>
<form action="trabajador.php?val=2" method="post">
    ID<input type="radio" name="chk" value="chkId"><br>
    NOMBRE <input type="radio" name="chk" value="chkNombre"><br>
    <input type="text" name="txt" maxlength="150" required><br>

    <input type="submit" value="ENVIAR">
</form>
</body>
</html>