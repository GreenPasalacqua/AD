<?php
    $dni=$_GET["dni"];
    $sel=$_GET["sel"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prueba</title>
    <form action="cliente_MD.php?dni=<?php echo $dni ?>" method="post">
        <?php echo $sel ?><br>
        <input type="number" required name="id" placeholder="Id del Cliente">
        <br>
        <input type="text" required name="contacto" placeholder="Nombre del Contacto">
        <br>
        <input type="number" required name="telefono" placeholder="Teléfono de Contacto">
        <br>
        <input type="text" required name="empresa" placeholder="Nombre de la Empresa">
        <br>
        <input type="text" required name="direccion" placeholder="Direccion de la empresa">
        <br>
        <button type="reset">Cancel</button>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>
</head>
<body>

</body>
</html>