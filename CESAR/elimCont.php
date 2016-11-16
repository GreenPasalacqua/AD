<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 07/11/2016
 * Time: 12:12 AM
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
    $descripcion=$row['descripcion'];
    $id=$row['id'];
    $fecha=$row['fecha'];
    $cantidad=$row['cantidad'];
    if($row['tipo']=="ingreso"){
        $tipo=true;
    }else{
        $tipo=false;
    }
    echo "<form action='deleteCont.php?id=$id' method='post'>";
    echo "Fecha:$fecha <input type='date' value='$fecha' hidden  name='fecha'><br>";
    if($row['tipo']=="gasto"){
        echo "Tipo: Gasto<br>";

    }else{
        echo "Tipo: Ingreso<br>";

    }
    echo "Descripcion:$descripcion<br> ";
    echo "Cantidad:$cantidad<br>";
    echo "<input type=submit value='Eliminar'>";
    echo "</form>";

}