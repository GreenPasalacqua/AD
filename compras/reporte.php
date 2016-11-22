<?php

ob_start();

include("conexion.php");

try {
    $conn = conectar();
    echo "Connected successfully";

    $fechaIn=$_POST['dateInicio'];
    $fechaFin=$_POST['dateFinal'];
    //$sql="SELECT * FROM siscontable WHERE fecha BETWEEN '".$fechaIn."' AND '".$fechaFin."'";
    $stmt = $conn->prepare("SELECT * FROM siscontable WHERE fecha BETWEEN '".$fechaIn."' AND '".$fechaFin."'");


    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['puesto'] = $row['puesto'];
    $_SESSION['especial'] = $row['especial'];
    $_SESSION['salario'] = $row['salario'];




} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

?>