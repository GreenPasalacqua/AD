<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 13/11/2016
 * Time: 11:00 PM
 */
include("conexion.php");
$mes=$_POST['mes'];
$ano=$_POST['ano'];

$sql="SELECT * FROM siscontable WHERE EXTRACT(MONTH from fecha)= '$mes' AND YEAR(fecha)='$ano'";
$rec=$conn->query($sql);
?>
    <table style="border:solid 1px black " align="center" cellspacing="10px">
        <tr>
            <td>Descripcion</td>
            <td>Fecha</td>
            <td>Monto</td>
            <td>Total (E/S)</td>
        </tr>
<?php
$total=0;
while ($row = $rec->fetch_array(MYSQLI_ASSOC)) {

        echo "<tr>";
        $desc = $row['descripcion'];
        $fecha = $row['fecha'];
        $cantidad = $row['cantidad'];
    if($row['tipo']==false){
    $cantidad*=-1;
    }
        echo "<td>$desc </td>";
        echo "<td>$fecha</td>";
        echo "<td>$cantidad</td>";


    $total+=$cantidad;
    echo "</tr>";
}
echo "<td>-----</td>";
echo "<td>-----</td>";
echo "<td>-----</td>";
echo "<td> $total</td>";

?>
        </table>

