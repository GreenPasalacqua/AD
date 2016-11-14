<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 05/11/2016
 * Time: 08:34 PM
 */

    if(!empty($_POST['busquedaNom'])){

        $sql="SELECT * FROM equipo WHERE empleado='".$_POST['busquedaNom']."'";

    }else if(!empty($_POST['busquedaid'])){

        $sql="SELECT * FROM equipo WHERE id='".$_POST['busquedaid']."'";

    }else if(!empty($_POST['busquedaClien'])){
        $sql="SELECT * FROM equipo WHERE cliente='".$_POST['busquedaClien']."'";
    }

    include("conexion.php");
    $rec=$conn->query($sql);

        while ($row = $rec->fetch_array(MYSQLI_ASSOC)) {
            // while ( $row=consul($sql)) {
            $vari=$row['id'];
            echo "<form action='modificar.php?aid=$vari' method='post' >";
            echo "<input type='number' name='id' value='" . $row['id'] . "' disabled><br>";
            echo "<input type='text' placeholder='cliente' name='cliente' disabled value='" . $row['cliente'] . "' ><br>";
            echo "<input type='text' placeholder='empleado' name='empleado' value='" . $row['empleado'] . "' disabled><br>";
            echo "<input type='text' placeholder='errores' name='error' value='" . $row['errores'] . "' disabled><br>";
            echo "<input type='text' placeholder='tipo modem-decondificador' value='" . $row['tipo'] . "' name='tipo' disabled><br>";
            echo "<input type='text' placeholder='reparacion' name='reparacion' value='" . $row['reparacion'] . "'.' disabled><br>";
            echo "<label for='stock'>Stock</label>";
            if($row['stock']==TRUE){
                echo "<input type='checkbox'   name='stock' checked disabled><br>";
            }else{
                echo "<input type='checkbox'   name='stock'  disabled><br>";
            }
            //echo "<input type='number' value='$vari' hidden name='aidi'> ";
            echo "<br><input type='submit' value='Seleccionar'><br><br>";

        }
