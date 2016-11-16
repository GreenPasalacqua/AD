<?php
include("conexion.php");
session_start();

$seleccionador=$_GET['val'];
$llave=$_SESSION['llave'];
$modo=$_GET['modo'];


if($seleccionador==1){
    insertar();
    header('Location: Compras.php');
    //header('Location: mostrar.php?val=1');
    //exit(0);
}
else if($seleccionador==2){
    consultar();
    header('Location: Compras.php');
}
else if($seleccionador==3 && $llave != 3){
    consulta_gral();
    header('Location: mostrarLista.php');
}
if($modo==1){
    modificar();
    header('Location: Compras.php');
}else if($modo==2){
    eliminar();
    header('Location: Compras.php');
}
else if($llave ==3){
    registrar();
    header('Location: Compras.php');
}




function insertar() //1
{

    try {
        $conn = conectar();
        echo "Connected successfully";
        $stmt = $conn->prepare("INSERT INTO lista_compras (id, objeto, cantidad, fecha, comprado) VALUES (:id, :objeto, :cantidad, :fecha, :comprado)");

        $comprado=false;
        $objeto = strtoupper($_POST["txtObjeto"]);
        //$objeto= strtoupper($objeto);
        $cantidad = $_POST["txtCantidad"];
        $fecha = $_POST["txtFecha"];
        $id = $_POST['txtId'];

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':objeto', $objeto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':comprado', $comprado);

        $_SESSION['objeto'] = $objeto;
        $_SESSION['id'] = $id;
        $_SESSION['fecha'] = $fecha;
        $_SESSION['cantidad'] = $cantidad;

        $stmt->execute();
        $conn = null;
        ?>
        ID
        <input type="text" value="<?php echo $id; ?>" disabled><br>
        OBJETO
        <input type="text" value="<?php echo $objeto; ?>" disabled><br>
        CANTIDAD
        <input type="text" value="<?php echo $cantidad; ?>" disabled><br>
        FECHA
        <input type="text" value="<?php echo $fecha; ?>" disabled><br>

<?php
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


}

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

function consultar() //2
{
    try {
        $conn = conectar();
        //echo "Connected successfully";

        //$stmt = $conn->prepare("SELECT id, objeto, cantidad, fecha FROM lista_compras WHERE comprado='false'");
        $stmt = $conn->prepare("SELECT * FROM lista_compras");

        ?>
        <table style="border:solid 1px black " align="center" cellspacing="10px" id="basic-table">
            <tr>
                <th>ID</th>
                <th>OBJETO</th>
                <th>CANTIDAD</th>
                <th>FECHA</th>
                <th>COMPRADO</th>
            </tr>
<?php
        $stmt->execute();

        /*while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
            <!-- foreach($row as $clave) { -->
            <td><?php $row['objeto'] ?></td>
            <td> <?php $row['cantiad'] ?></td>
            <td> <?php $row['fecha'] ?></td>
            </tr>
            <?php
        } ?>
        </table>
<?php*/
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    ?>
            </table>
        <a href="faltantes.html"> <button type="button">GENERAR LISTA FALTANTES</button></a><br>
    <?php
}

function consulta_gral(){
    try {
        $conn = conectar();

        $texto=$_POST["txt"];

        if ($_POST["chk"]=="chkId") {
            $stmt = $conn->prepare("SELECT * FROM lista_compras WHERE Id = '$texto'");
        } else if ($_POST["chk"]=="chkObj") {
            $stmt = $conn->prepare("SELECT * FROM lista_compras WHERE objeto = '$texto'");
        }

        /*$stmt = $conn->prepare("SELECT * FROM lista_compras WHERE Id='<?php $id ?>'");*/

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id']=$row['Id'];
        $_SESSION['objeto'] = $row['objeto'];
        $_SESSION['fecha'] = $row['fecha'];
        $_SESSION['cantidad'] = $row['cantidad'];
        $_SESSION['comprado'] = $row['comprado'];

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}

function modificar()
{
    //consultar();
    try {
        $conn = conectar();
        echo "Connected successfully";

        $id = $_SESSION['id'];
        $objeto = strtoupper(["txtObjeto"]);
        $fecha = $_POST["txtFecha"];
        $cantidad = $_POST["txtCantidad"];
        if($_POST["txtComprado"]=="true"){
            $comprado=true;
        }else{
            $comprado=false;
        }

        $sql = "UPDATE lista_compras SET objeto='$objeto',fecha='$fecha',cantidad='$cantidad', comprado='$comprado' WHERE Id='$id'";

        $stmt = $conn->prepare($sql);

        $stmt->execute();


    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

}


function registrar(){
    try {
        $conn = conectar();

        $texto=$_POST["txt"];

        $comprado=true;

        if ($_POST["chk"]=="chkId") {
            $sql = "UPDATE lista_compras SET comprado='$comprado' WHERE Id = '$texto'";
        } else if ($_POST["chk"]=="chkObj") {
            $texto=strtoupper($texto);
            $sql = "UPDATE lista_compras SET comprado='$comprado' WHERE objeto = '$texto'";
        }

        $stmt = $conn->prepare($sql);

        $stmt->execute();


    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}


function eliminar()
{
    //consultar();
    try {
        $conn = conectar();
        echo "Connected successfully";
        $id = $_SESSION['id'];
        $sql = "DELETE FROM lista_compras WHERE Id='$id'";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

}
//header('Location: Compras.php');

?>