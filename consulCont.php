<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 06/11/2016
 * Time: 11:37 PM
 */

include("conexion.php");
if(!empty($_POST['fecha'])){
    $fecha=$_POST['fecha'];
    $sql="SELECT * FROM siscontable WHERE fecha='".$fecha."'";

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

            echo "<br>Fecha:<input type='date' value='" . $row['fecha'] . "'  disabled name='fecha'><br>";
            if ($row['tipo'] == false) {
                echo "Tipo: Gasto<br>";
            } else {
                echo "Tipo: Ingreso<br>";
            }
            echo "Descripcion: <input type='text' name='descripcion' disabled value='" . $row['descripcion'] . "'><br>";
            echo "Cantidad: <input type='number' min='1' step='any'disabled name='cantidad' value='" . $row['cantidad'] . "' ><br>";
            echo "-----------------------------------------------------------------------------";

    }
