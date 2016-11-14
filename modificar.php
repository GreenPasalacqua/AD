<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 05/11/2016
 * Time: 10:39 PM
 */
$id= $_GET['aid'];
include("conexion.php");

$sql="SELECT * FROM equipo WHERE id='$id'";

$row=consul($sql);
echo "<form action='guardar.php?id=$id' method='post'>";
echo "<input type='number' name='id' disabled value='".$row['id']."'><br>";
echo "<input type='text' placeholder='cliente' name='cliente' disabled value='" . $row['cliente'] . "' ><br>";
echo "<input type='text' placeholder='empleado' name='empleado' disabled value='" . $row['empleado'] . "' ><br>";
echo "<input type='text' placeholder='errores' name='error' value='" . $row['errores'] . "' ><br>";
echo "<input type='text' placeholder='tipo modem-decondificador' value='" . $row['tipo'] . "' name='tipo' ><br>";
echo "<input type='text' placeholder='reparacion' name='reparacion' value='" . $row['reparacion'] . "'.' ><br>";
echo "<label for='stock'>Stock</label>";

if($row['stock']==TRUE){
    echo "<input type='checkbox'   name='stock' checked ><br>";
}else{
    echo "<input type='checkbox'   name='stock'  ><br>";
}
echo "<input type='submit' value='Guardar' >";
echo "</form>";
