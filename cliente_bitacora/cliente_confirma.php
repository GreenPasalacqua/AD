<?php
    $servidor="localhost";
    $usuario="root";
    $cont="";
    $db="analisi";
    $conn=mysqli_connect($servidor,$usuario,$cont,$db);
    $dni=$_GET['dni'];
    $campo=$_POST['opcion'];
    session_start();
    if($conn->connect_error){
        die("Error en la conexión".$conn->connect_error);
    }
    if(is_numeric($campo) ){
        $id=$campo;
        $sql="select * FROM cliente WHERE id='$id'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        if($id!=$row['id']){
            ?>
            <script>
                alert("Id no encontrado");
                window.location="menu_cliente.php";
            </script>
            <?php
        }
    }else{
        $nom=strtoupper($campo);
        $sql="select * FROM cliente WHERE nombre_contacto='$nom'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        if($nom!=$row['nombre_contacto']){
            ?>
            <script>
                alert("Registro por nombre no encontrado");
                window.location="menu_cliente.php";
            </script>
            <?php
        }
    }

?>
    <table style="border:solid 1px black " align="center" cellspacing="10px">
        <tr>
            <td>Id del Cliente</td>
            <td>Nombre de Contacto</td>
            <td>Nombre de la empresa</td>
            <td>Teléfono de contacto</td>
            <td>Direccion de la empresa</td>
            <td>Proceder</td>
        </tr>
        <tr>
            <form action="cliente_MD.php?dni=<?php echo $dni?>&campo=<?php echo $campo ?>" method="post">
                <td><input value="<?php echo $row['id']?>"hidden><input value="<?php echo $row['id']?>"disabled></td>
                <td><input value="<?php echo $row['nombre_contacto']?>" hidden><input value="<?php echo $row['nombre_contacto']?>" disabled></td>
                <td><input value="<?php echo $row['empresa']?>" hidden><input value="<?php echo $row['empresa']?>" disabled></td>
                <td><input value="<?php echo $row['telefono']?>" hidden><input value="<?php echo $row['telefono']?>" disabled></td>
                <td><input value="<?php echo $row['direccion']?>" hidden><input value="<?php echo $row['direccion']?>" disabled></td>
                <td><button type="submit">Eliminar</button></td>
            </form>
        </tr>
<?php
/**
 * Created by PhpStorm.
 * User: Jorge del Angel
 * Date: 17/11/2016
 * Time: 08:39 PM
 */