<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 13/11/2016
 * Time: 07:58 PM
 */
$id=$_GET['id'];


$sql="DELETE FROM equipo WHERE id='$id'";
include("conexion.php");
if(base($sql)){
    echo "Registro Eliminado Exitosamente";
    echo "<script type='text/javascript'>
            alert('Registro Eliminado Exitosamente');
            window.location = 'MenuEquipo.html';
            </script>";
    //header('Location: MenuContabilidad.html');
}else{
    echo "Algo ocurrio :(";
}
