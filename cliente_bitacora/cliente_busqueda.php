<?php
    $dni=$_GET["dni"];
    $sel=$_GET["sel"];
    if($dni==4){
        $action="cliente_campos.php";
    }elseif ($dni==3){
        $action="cliente_confirma.php";
    }else{
        $action="cliente_MD.php";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campo llave de actualización</title>
    <form action="<?php echo $action ?>?dni=<?php echo $dni ?>" method="post">
        <?php echo $sel?>
        <br>
        <input type="radio" name="eleccion" value="nom">Nombre<br>
        <input type="radio" name="eleccion" value="pid">Id<br>
        <input type="text" name="opcion" required>
        <button type="SUBMIT"> Enviar</button>
        <button type="reset">Cancelar</button>
        <br>

    </form>
    <br>
    <a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>
</head>
<body>

</body>
</html>