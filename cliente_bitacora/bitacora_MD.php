<?php
    $servidor="localhost";
    $usuario="root";
    $cont="";
    $db="analisi";
    $conn=mysqli_connect($servidor,$usuario,$cont,$db);
    $dni=$_GET['dni'];
    session_start();
    if($conn->connect_error){
        die("Error en la conexión".$conn->connect_error);
    }else if ($dni==1){
        $id=$_POST['id'];
        $sql="select * FROM cliente WHERE id='$id'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        if($row['id']==$id){ //Checar que el id de la empresa a ingresar coincida
            //INGRRESAR ENTRADA
            $fecha=$_POST['fech'];
            $no_eq=$_POST['noe'];
            $in_out=strtoupper($_POST['e_s']);
            $sql="insert into bitacora(id_empresa,fecha,cantidad_equipos,registro_e_s) values ('$id','$fecha','$no_eq','$in_out')";
            if($conn->query($sql)){
                echo "<script>
                           alert('Registro intertado correctamente');
                           window.location='menu_bitacora.php'
                      </script>";
            }else{
                echo "<script>
                           alert('Error en el Query');
                           window.location='menu_bitacora.php'
                      </script>";
            }
        }else{
            echo "<script>
                           alert('No existe entrada de bitacora para cliente inexistente');
                           window.location='menu_bitacora.php'
                      </script>";
        }
    }else if ($dni==2){
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
            echo "Registro no encontrado";
        }else{
            unset($res);
            unset($row);
            ?>
            <table style="border:solid 1px black " align="center" cellspacing="10px">
            <tr>
                <td>Id de la empresa</td>
                <td>Fecha</td>
                <td>Cantidad de equipos</td>
                <td>Registro (E/S)</td>
            </tr>
            <?php
            $res=mysqli_query($conn,$sql);
            while ($row=$res->fetch_assoc()){
                echo "<tr>";
                foreach($row as $clave) {
                    echo "<td>".$clave."</td>";
                }
            }
            echo "</tr></table>";
            ?>
            <a href="menu_bitacora.php"><button>Menú principal</button></a>
            <?php
        }
    }else if($dni==3){
        $id_cont=$_GET['id_c'];
        $id_empresa=$_POST['id'];
        $fecha=$_POST['fech'];
        $cantidad_equipos=$_POST['cant'];
        $registro_e_s=$_POST['esta'];
        $sql="UPDATE bitacora SET id_empresa='$id_empresa',fecha='$fecha',cantidad_equipos='$cantidad_equipos', registro_e_s='$registro_e_s'
        WHERE id_control='$id_cont'";
        if($conn->query($sql)){
            echo "<script>
                           alert('Actualizaco correctamente');
                           window.location='menu_bitacora.php'
                      </script>";
        }else{
            echo "<script>
                           alert('Error');
                           window.location='menu_bitacora.php'
                      </script>";
        }
    }else if($dni==4){
        $id_cont=$_GET['id_c'];
        $sql="DELETE FROM bitacora WHERE id_control='$id_cont'";
        if($conn->query($sql)){
            echo "<script>
                           alert('Registro eliminado');
                           window.location='menu_bitacora.php'
                      </script>";
        }else{
            echo "<script>
                           alert('Error');
                           window.location='menu_bitacora.php'
                      </script>";
        }
    }
?>