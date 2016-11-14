<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 06/11/2016
 * Time: 11:14 PM
 */
    $fecha=$_POST['fecha'];
    $descripcion=$_POST['descripcion'];
    $cantidad=$_POST['cantidad'];
    if($_POST['tipo']=="ingreso"){
        $tipo=true;
    }else{
        $tipo=false;
    }
    $sql="INSERT INTO siscontable(fecha,tipo,descripcion,cantidad) VALUES ('$fecha','$tipo','$descripcion','$cantidad')";
    include("conexion.php");
    if(base($sql)){
        header('Location: MenuContabilidad.html');
    }else{
        echo "error";
    }
