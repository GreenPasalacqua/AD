<?php
/**
 * Created by PhpStorm.
 * User: ruth
 * Date: 05/11/16
 * Time: 4:54 PM
 */
/**
 * -Trabajador-> supervisor, tecnico, tester,contador,CEO
 * id
 * nombre
 * puesto
 * Salario
 * contrasenha
 * calificacion
 * */

ob_start();

include("conexion.php");
session_start();

$seleccionador=$_GET['val'];
$llave=$_SESSION['llave'];
$modo=$_GET['modo'];

if($seleccionador==1){
    insertar();
    header('Location: mostrar.php?val=1');
    //header('Location: Empleados.php');
    //exit(0);
}
else if($seleccionador==2){
    consultar();
    header('Location: mostrar.php?val=2');
}
if($modo==2){
    modificar();
    header('Location: Empleados.php');
}else if($modo==3){
    eliminar();
    header('Location: Empleados.php');
}




function insertar() //1
{

    try {
        $conn = conectar();
        echo "Connected successfully";
        $stmt = $conn->prepare("INSERT INTO trabajador (id, nombre, password, puesto, especial, salario) VALUES (:id, :nombre, :password, :puesto, :especial, :salario)");

        $id = $_POST["txtId"];
        //$nombre = strtoupper(["txtNombre"]);
        $nombre1 =$_POST["txtNombre"];
        $nombre=strtoupper($nombre1);
        $password = $_POST["txtPassword"];
        $puesto1 = $_POST["txtPuesto"];
        $puesto=strtoupper($puesto1);
        //$especial = $_POST["txtEspecial"];
        if($_POST["txtEspecial"]=="true"){
            $especial=true;
        }else{
            $especial=false;
        }
        $salario = $_POST["txtSalario"];

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':puesto', $puesto);
        $stmt->bindParam(':especial', $especial);
        $stmt->bindParam(':salario', $salario);

        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['puesto'] = $puesto;
        $_SESSION['salario'] = $salario;

        $stmt->execute();
        $conn = null;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


}

function consultar() //2
{
    try {
        $conn = conectar();
        echo "Connected successfully";

        //$id = $_POST["chkId"];
        //$nombre = $_POST["chkNombre"];
        $texto1=$_POST["txt"];

        if ($_POST["chk"]=="chkId") {
            $stmt = $conn->prepare("SELECT * FROM trabajador WHERE id = '$texto'");
        } else if ($_POST["chk"]=="chkNombre") {
            $texto=strtoupper($texto1);
            $stmt = $conn->prepare("SELECT * FROM trabajador WHERE nombre = '$texto'");
        }

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['puesto'] = $row['puesto'];
            $_SESSION['especial'] = $row['especial'];
            $_SESSION['salario'] = $row['salario'];
        }



    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}

function modificar()
{
    //consultar();
    try {
        $conn = conectar();
        echo "Connected successfully";

        $id = $_SESSION['id'];
        $nombre = strtoupper($_POST["txtNombre"]);
        $password = $_POST["txtPassword"];
        $puesto = strtoupper($_POST["txtPuesto"]);
        $especial = $_POST["txtEspecial"];
        $salario = $_POST["txtSalario"];

        $sql = "UPDATE trabajador SET nombre='$nombre',puesto='$puesto',especial='$especial', salario='$salario' WHERE id='$id'";

        $stmt = $conn->prepare($sql);

        $stmt->execute();


    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

}

function eliminar()
{
    //consultar();
    try {
        $conn = conectar();
        echo "Connected successfully";
        $id = $_SESSION['id'];
        $sql = "DELETE FROM trabajador WHERE id='$id'";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

}

ob_end_flush();

