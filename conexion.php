<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 05/11/2016
 * Time: 03:08 PM
 */
$servidor='localhost';
$usuario='root';
$password="";
$db="analisis";

$conn=mysqli_connect($servidor,$usuario,$password,$db);
function base($var)
{

    global $conn;
    if ($conn->connect_error) {
        die("Error en la conexion" . $conn->connect_error);
    } else {
        $sql = $var;
        if($conn->query($sql)===TRUE){
           return true;

        }else{
           return false;
        }

    }
    $conn->close();
}
function consul($var){
    global $conn;
    if($conn->connect_error) {
        die("Error en la conexion".$conn->connect_error);
    }else{
        $rec=$conn->query($var);
        if($rec->num_rows>0) {
            $row = $rec->fetch_array(MYSQLI_ASSOC);

            return $row;
        }else{
            echo "error";
        }
    }
}