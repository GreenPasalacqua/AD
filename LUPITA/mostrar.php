<?php
/**
 * Created by PhpStorm.
 * User: ruth
 * Date: 05/11/16
 * Time: 10:22 PM
 */
session_start();
$valor = $_GET['val'];
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
if(empty($_SESSION['id'])&&empty($_SESSION['nombre'])&&empty($_SESSION['password'])&&empty($_SESSION['puesto'])&&empty($_SESSION['especial'])&&empty($_SESSION['salario'])){
    ?><script type='text/javascript'>
            alert('No se encontro');
            window.location = 'Empleados.php';
            </script><?php
}

if ($valor == 1 || ($valor==2 && $llave ==2 )){
    $texto="OK";
?>
<form action="Empleados.php" method="post">
    <?php
    }

else if ($valor == 2 && $llave==3){
        $texto="Modificar";

?>
    <form action="trabajador.php?modo=2" method="post">
    <?php
}

        else if ($valor == 2 && $llave==4){
        $texto="Eliminar";

        ?>
        <form action="trabajador.php?modo=3" method="post">
            <?php
            }
            ?>

    Id empleado: <input type="text" value="<? echo $_SESSION['id'];?>" disabled><br>
    Nombre: <input type="text"  name="txtNombre"  value="<? echo $_SESSION['nombre'];?>"><br>
    Puesto: <input type="text" name="txtPuesto" value="<? echo $_SESSION['puesto'];?>"><br>
    Salario: <input type="text" name="txtSalario"  value="<? echo $_SESSION['salario'];?>"><br>
    <button type="submit"><? echo $texto;?></button><br>
<?php
if ($valor==2 && $llave ==2 ){
?>

    <a href="reporte.php"> <button type="button">GENERAR REPORTE</button></a><br>
<?php }
?>

    </form>

</body>
</html>
