<?php
session_start();
$llave = $_SESSION['llave'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar</title>
</head>
<body>
<?php
if ($llave==1){
    $texto="Modificar";

?>
<form action="lista.php?modo=1" method="post">
    <?php
    }

        else if ($llave==2) {
            $texto = "Eliminar";
    ?>
    <form action="lista.php?modo=2" method="post">
        <?php
        }
        ?>
            <form action="lista.php?modo=2" method="post">
            ID<input type="number" name="txtId" min="0" value="<? echo $_SESSION['id'];?>" disabled><br>
            OBJETO<input type="text" name="txtObjeto" maxlength="200" required value="<? echo $_SESSION['objeto'];?>"><br>
            CANTIDAD<input type="number" min="0" name="txtCantidad" required value="<? echo $_SESSION['cantidad'];?>"><br>
            FECHA <input type="date" placeholder="yyyy/ mm/ dd" name="txtFecha" required value="<? echo $_SESSION['fecha'];?>"><br>
            COMPRADO<input type="radio" name="txtComprado" value="true" <?php if($_SESSION['comprado']==1){ ?> checked <?php } ?>>SI<input type="radio" name="txtComprado" value="false" <?php if($_SESSION['comprado']==0){ ?> checked <?php } ?>>NO
            <button type="submit"><? echo $texto;?></button><br>

        </form>

</body>
</html>
