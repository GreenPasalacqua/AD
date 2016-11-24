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
    }else if($dni==1){
        //REGISTRAR INFORMACION
        $id=$_POST['id'];
        if($id>=0){
            $nombre_cont=strtoupper($_POST['contacto']);
            $empresa=strtoupper($_POST['empresa']);
            $telefono=$_POST['telefono'];
            $direccion=strtoupper($_POST['direccion']);
            $sql="insert into cliente(id,nombre_contacto,empresa,telefono,direccion) values ('$id','$nombre_cont','$empresa','$telefono','$direccion')";
            if($conn->query($sql)){
                echo "<script>
                           alert('Registro insertado correctamente');
                           window.location='menu_cliente.php'
                  </script>";
            }
        }else{
            echo "<script>
                           alert('Id no permitido');
                           window.location='menu_cliente.php'
                  </script>";
        }


    }else if($dni==2){
        //CONSULTAR INFO
        $campo=$_POST['opcion'];
        if(is_numeric($campo)){
            $id=$campo;
            $sql="select * FROM cliente WHERE id='$id'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($res);
            if($row['id']==$id && $id>=0){
                ?>
                <table style="border:solid 1px black " align="center" cellspacing="10px">
                <tr>
                    <td>Id del Cliente</td>
                    <td>Nombre de Contacto</td>
                    <td>Nombre de la empresa</td>
                    <td>Teléfono de contacto</td>
                    <td>Direccion de la empresa</td>
                </tr>
                <tr>
                <?php
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nombre_contacto']."</td>";
                echo "<td>".$row['empresa']."</td>";
                echo "<td>".$row['telefono']."</td>";
                echo "<td>".$row['direccion']."</td>";
                echo "</tr></table>";




                echo "<a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>";
            }else{
                echo "<script>
                           alert('Error ID no encontrado o no valido');
                           window.location='menu_cliente.php'
                      </script>";
            }
        }else{
            $nom=strtoupper($campo);
            $sql="select * FROM cliente WHERE nombre_contacto='$nom'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($res);
            if($row['nombre_contacto']==$nom){
                ?>
                <table style="border:solid 1px black " align="center" cellspacing="10px">
                <tr>
                    <td>Id del Cliente</td>
                    <td>Nombre de Contacto</td>
                    <td>Nombre de la empresa</td>
                    <td>Teléfono de contacto</td>
                    <td>Direccion de la empresa</td>
                </tr>
                <tr>
                <?php
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nombre_contacto']."</td>";
                echo "<td>".$row['empresa']."</td>";
                echo "<td>".$row['telefono']."</td>";
                echo "<td>".$row['direccion']."</td>";
                echo "</tr></table>";

                echo "<a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>";
            }else{
                echo "<script>
                           alert('Error, nombre no encontrado');
                           window.location='menu_cliente.php'
                      </script>";
            }
        }
    }else if ($dni==3){
        //ELIMINAR CLIENTE
        $campo=$_GET['campo'];
        if(is_numeric($campo)){
            $id=$campo;
            $sql_del="delete FROM cliente WHERE id='$id'";
        }else{
            $nom=strtoupper($campo);
            $sql_del="delete FROM cliente WHERE nombre_contacto='$nom'";
        }if($conn->query($sql_del)){
            echo "<script>
                    alert('Registro eliminado correctamente');
                    window.location='menu_cliente.php'
                  </script>";
        }else{
            echo "<script>
                    alert('El Registro no fue eliminado');
                    window.location='menu_cliente.php'
                  </script>";
        }

    }else if($dni==4){
        $campo=$_GET['campo'];
        $id=$_POST['id'];
        $nombre_cont=strtoupper($_POST['nom']);
        $empresa=strtoupper($_POST['emp']);
        $telefono=$_POST['tel'];
        $direccion=strtoupper($_POST['dir']);
        if(is_numeric($campo)){
            $sql_up="UPDATE cliente set id='$id', nombre_contacto='$nombre_cont',empresa='$empresa',telefono='$telefono',direccion='$direccion' WHERE id='$id'";
        }else{
            $sql_up="UPDATE cliente set id='$id', nombre_contacto='$nombre_cont',empresa='$empresa',telefono='$telefono',direccion='$direccion' WHERE nombre_contacto='$nombre_cont'";
        }
        if($conn->query($sql_up)){
            echo "<script>
                           alert('Registro actualizado');
                           window.location='menu_cliente.php'
                      </script>";
        }else{
            echo "<script>
                           alert('Registro no encontrado');
                           window.location='menu_cliente.php'
                      </script>";
        }
        ?>
        <?php
    }

/**
 * Created by PhpStorm.
 * User: Jorge del Angel
 * Date: 05/11/2016
 * Time: 02:44 PM
 */