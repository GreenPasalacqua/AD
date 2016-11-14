<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 07/11/2016
 * Time: 01:31 AM
 */
$id=$_GET['id'];
$descripcion=$_POST['descripcion'];
$cantidad=$_POST['cantidad'];
if($_POST['tipo']=="true"){
    $tipo=true;
}else{
    $tipo=false;
}

$sql="UPDATE  siscontable SET descripcion='$descripcion', cantidad='$cantidad',tipo='$tipo' WHERE id='$id'";
//$sql="UPDATE equipo SET errores='$error',tipo='$tipo',reparacion='$reparacion',stock='$stock' WHERE id='$id'";

include("conexion.php");
if(base($sql)){
    echo "Registro Modificado Exitosamente";
    //header('Location: MenuContabilidad.html');
}else{
    echo "Algo ocurrio :(";
}