<?php
    $servidor="localhost";
    $usuario="root";
    $cont="";
    $db="analisi";
    $conn=mysqli_connect($servidor,$usuario,$cont,$db);
    $dni=$_GET['dni'];
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escoger los datos a actualizar</title>
        <?php
        $campo=$_POST['opcion'];
        if(is_numeric($campo)){
            $id=$campo;
            $sql="select * FROM cliente WHERE id='$id'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($res);
            if ($row['id']==$id){
                ?>

                <form action='cliente_MD.php?dni=<?php echo $dni?>&campo=<?php echo $campo ?>' method='post'>
                    <br><input type='text' name="id" value='<?php echo $row['id']?>' hidden><br>
                    SELECCIONE CAMPOS PARA ACTUALIZAR:<br>
                    ID <br><input type='text' disabled value='<?php echo $row['id']?>'><br>
                    Nombre del contacto<br><input type='text' name='nom' value='<?php echo $row['nombre_contacto']?>'><br>
                    <br>
                    Empresa<br><input type='text' name='emp' value='<?php echo $row['empresa']?>'><br>
                    <br>
                    Teléfono<br><input type='number' name='tel' value='<?php echo $row['telefono']?>'><br>
                    <br>
                    Direccion<br><input type='text' name='dir' value='<?php echo $row['direccion']?>'><br>
                    <br>
                    <button type='submit'>Actualizar</button>
                    <button type='reset'>Cancelar</button>
                </form>
                <a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>
                <?php
            }else{
                echo "<script>
                           alert('ID Inexistente');
                           window.location='menu_cliente.php'
                      </script>";
            }
        }else{
            $nom=strtoupper($campo);
            $sql="select * FROM cliente WHERE nombre_contacto='$nom'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($res);
            if ($row['nombre_contacto']==$nom){
                ?>

                <form action='cliente_MD.php?dni=<?php echo $dni ?>&campo=<?php echo $campo ?>' method='post'>
                    <input type="text" hidden name="nom" value="<?php echo $row['nombre_contacto']?>"><br>
                    SELECCIONE CAMPOS PARA ACTUALIZAR:<br>
                    Nombre de contacto<br><input type='text' disabled value='<?php echo $row['nombre_contacto']?>'><br>
                    Id<br><input type='number' name='id' value="<?php echo $row['id']?>"><br>
                    Empresa<br><input type='text' name='emp' value="<?php echo $row['empresa']?>"><br>
                    <br>
                    Teléfono<br><input type='number' name='tel' value="<?php echo $row['telefono']?>"><br>
                    <br>
                    Direccion<br><input type='text' name='dir' value="<?php echo $row['direccion']?>"><br>
                    <br>
                    <button type='submit'>Actualizar</button>
                    <button type='reset'>Cancelar</button>
                    </form>
                    <a href='menu_cliente.php'><button>Regresar al Menu principal</button></a>
                <?php
            }else{
                echo "<script>
                           alert('Nombre de contacto no valido');
                           window.location='menu_cliente.php'
                      </script>";
            }
        }
        ?>
</head>
<body>
</body>
</html>