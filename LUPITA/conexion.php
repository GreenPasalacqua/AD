<?php
/**
 * Created by PhpStorm.
 * User: ruth
 * Date: 05/11/16
 * Time: 6:24 PM
 */


function conectar(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "analisis";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

}

function preparar($sql){

}