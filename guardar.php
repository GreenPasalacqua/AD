<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 06/11/2016
 * Time: 12:12 AM
 */
include("conexion.php");
$id = $_GET['id'];
//$cliente=$_POST['cliente'];
//$empleado=$_POST['empleado'];
$error= $_POST['error'];
$tipo= $_POST['tipo'];
$reparacion= $_POST['reparacion'];
if(isset($_POST['stock'])){
    $stock=true;
}else{
    $stock=false;

}
$sql="UPDATE equipo SET errores='$error',tipo='$tipo',reparacion='$reparacion',stock='$stock' WHERE id='$id'";


if(base($sql)){
    header('Location: consulEquipo.html');

}else{
    echo "Eror: ".$conn->error;
}

