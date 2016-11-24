<?php
    $dni=$_GET["dni"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Bitácora</title>
</head>
<body>
    <form method="post" action="bitacora_MD.php?dni=<?php echo $dni ?>">
        REGISTRO DE ENTRADA PARA BITÁCORA
        <br>Id de la empresa<br><input type="number" name="id" required>
        <br>Fecha<br><input type="date" name="fech" required>
        <br>Cantidad de equipos<br><input type="number" name="noe" required>
        <br>Registro de estado<br>
        <select name="e_s">
            <option>ALMACEN</option>
            <option>ENTREGADOS</option>
        </select>
        <br>
        <button type="reset">Cancelar</button>
        <button type="submit">Registrar entrada</button>
    </form>

</body>
</html>