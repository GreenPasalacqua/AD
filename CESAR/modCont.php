<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 07/11/2016
 * Time: 01:28 AM
 */
include("conexion.php");
if(!empty($_POST['fecha'])){
    $fecha=$_POST['fecha'];
    $sql="SELECT * FROM siscontable WHERE fecha='$fecha'";

}else if(!empty($_POST['mes'])){
    $mes=$_POST['mes'];
    $ano=$_POST['ano'];
    $sql="SELECT * FROM siscontable WHERE EXTRACT(MONTH from fecha)= '$mes' AND YEAR(fecha)='$ano'";
    $rec=$conn->query($sql);
}else if(!empty($_POST['anio'])){
    $anoA=$_POST['anio'];

    $sql="SELECT * FROM siscontable WHERE YEAR(fecha) ='$anoA'";

}else if(!empty($_POST['fechaFin']) && !empty($_POST['fechaIn'])){
    $fechaIn=$_POST['fechaIn'];
    $fechaFin=$_POST['fechaFin'];
    $sql="SELECT * FROM siscontable WHERE fecha BETWEEN '".$fechaIn."' AND '".$fechaFin."'";

}
$rec=$conn->query($sql);




while ($row = $rec->fetch_array(MYSQLI_ASSOC)) {

    $id = $row['id'];
    $descripcion= $row['descripcion'];
    $cantidad=$row['cantidad'];
    echo "<form action='modifCont.php?id=$id' method='post'>";
    //echo "<form action='modifCont.php?id=".$id.">";
    echo "<br>Fecha:<input type='date' value='" . $row['fecha'] . "'  disabled name='fecha'><br>";
    if ($row['tipo'] == false) {
        echo "Tipo: <br>";
        echo "Gasto<input type='radio' value='false'  checked name='tipo'>";
        echo "Ingreso<input type='radio' value='true'   name='tipo'><br>";
    } else {
        echo "Tipo: <br>";
        echo "Gasto<input type='radio' value='false'   name='tipo'>";
        echo "Ingreso<input type='radio' value='true'  checked name='tipo'><br>";
    }
    echo "Descripcion: <input type='text' name='descripcion'   value='" . $row['descripcion'] . "'><br>";
    echo "Cantidad:  <input type='number' min='1' step='any'  name='cantidad' value='" . $row['cantidad'] . "' ><br>";
    echo "<input type='submit' value='Modificar'>";
    echo "</form>";
    echo "-----------------------------------------------------------------------------";


}