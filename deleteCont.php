<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 07/11/2016
 * Time: 12:18 AM
 */
$id=$_GET['id'];


$sql="DELETE FROM siscontable WHERE id='$id'";
include("conexion.php");
    if(base($sql)){
        echo "Registro Eliminado Exitosamente";
        echo "<script type='text/javascript'>
            alert('Registro Eliminado Exitosamente');
            window.location = 'MenuContabilidad.html';
            </script>";
        //header('Location: MenuContabilidad.html');
    }else{
        echo "Algo ocurrio :(";
    }