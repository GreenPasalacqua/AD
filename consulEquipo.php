<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta Equipo</title>
</head>
<body>
    <?php
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

            echo "<br><input type='number' name='id' disabled value='".$row['id']."'><br>";
            echo "<input type='text' placeholder='cliente' name='cliente' disabled value='" . $row['cliente'] . "' ><br>";
            echo "<input type='text' placeholder='empleado' name='empleado' value='" . $row['empleado'] . "' disabled><br>";
            echo "<input type='text' placeholder='errores' name='error' value='" . $row['errores'] . "' disabled><br>";
            echo "<input type='text' placeholder='tipo modem-decondificador' value='" . $row['tipo'] . "' name='tipo' disabled><br>";
            echo "<input type='text' placeholder='reparacion' name='reparacion' value='" . $row['reparacion'] . "'.' disabled><br>";
            echo "<input type='date' value='".$row['fecha']."'>";
            echo "<br><label for='stock'>Stock</label>";

            if($row['stock']==TRUE){
                echo "<input type='checkbox'   name='stock' checked disabled><br>";
            }else{
                echo "<input type='checkbox'   name='stock'  disabled><br>";
            }
         }
    ?>

</body>
</html>
