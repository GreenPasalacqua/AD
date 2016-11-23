<?php
    $dni=$_GET["dni"];
    $servidor="localhost";
    $usuario="root";
    $cont="";
    $db="analisi";
    $conn=mysqli_connect($servidor,$usuario,$cont,$db);

/**
 * Created by PhpStorm.
 * User: Jorge del Angel
 * Date: 15/11/2016
 * Time: 10:15 AM
 */
    if(!empty($_POST['inicio']) && !empty($_POST['final'])){
        $inicio=$_POST['inicio'];
        $final=$_POST['final'];
        $sql="SELECT * FROM bitacora WHERE fecha BETWEEN '".$inicio."' AND '".$final."'";
    }else if(!empty($_POST['year']) && !empty($_POST['month'])){
        $year=$_POST['year'];
        $month=$_POST['month'];
        $sql="SELECT * FROM bitacora WHERE EXTRACT(MONTH from fecha)= '$month' AND YEAR(fecha)='$year'";
    }else if(!empty($_POST['id'])){
        $id=$_POST['id'];
        $sql="SELECT * FROM bitacora WHERE id_empresa='$id'";

    }else if(!empty($_POST['fech'])){
        $fecha=$_POST['fech'];
        $sql="SELECT * FROM bitacora WHERE fecha='$fecha'";
    }
    $res=mysqli_query($conn,$sql);
    $row=$res->fetch_assoc();
    if(empty($row)){
        echo "<script>
                           alert('Registro vacio, no encontrado');
                           window.location='menu_bitacora.php'
                      </script>";
    }else {
        unset($row);
        unset($res);
        ?>
        <table style="border:solid 1px black " align="center" cellspacing="10px">
        <tr>
        <td>Id de la empresa</td>
        <td>Fecha</td>
        <td>Cantidad de equipos</td>
        <td>Registro (E/S)</td>
        <td>Continuar</td>
        </tr>
        <?php
        $res=mysqli_query($conn,$sql);
        while ($row=$res->fetch_assoc()){
            $id_c=$row['id_control'];
            $id=$row['id_empresa'];
            $fecha=$row['fecha'];
            $cantidad=$row['cantidad_equipos'];
            $estado=$row['registro_e_s'];
            if($dni==3){
            ?>
            <tr>
            <form action="bitacora_MD.php?dni=<?php echo $dni?>&id_c=<?php echo $id_c?>" method="post">
                <td><input type="text" value="<?php echo $id?>" name="id"></td>
                <td><input type="date" value="<?php echo $fecha?>" name="fech" placeholder="aaaa-dd-mm"></td>
                <td><input type="number" value="<?php echo $cantidad?>" name="cant"></td>
                <td>
                    <select name="esta">
                    <?php
                        if($estado=="ENTREGADOS"){
                            ?>
                            <option selected>ENTREGADOS</option>
                            <option>ALMACEN</option>
                            <?php
                        }else{
                            ?>
                            <option>ENTREGADOS</option>
                            <option selected>ALMACEN</option>
                            <?php
                        }
                    ?>
                    </select>
                </td>
                <td><button type="submit">Actualizar</button></td>
            </form>
            </tr>
            <?php
            }else if($dni==4){
            ?>
            <tr>
            <form action="bitacora_MD.php?dni=<?php echo $dni?>&id_c=<?php echo $id_c?>" method="post">
                <td><input type="text" value="<?php echo $id?>" name="id" disabled></td>
                <td><input type="text" value="<?php echo $fecha?>" name="fech" disabled></td>
                <td><input type="text" value="<?php echo $cantidad?>" name="cant" disabled></td>
                <td><input type="text" value="<?php echo $estado?>" name="esta" disabled></td>
                <td><button type="submit">Eliminar</button></td>
            </form>
            </tr>
            <?php
            }
        }
    }
    echo "</tr></table>";