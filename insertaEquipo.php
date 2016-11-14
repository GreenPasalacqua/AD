

<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 05/11/2016
 * Time: 03:53 PM
 */
    session_start();
    include("conexion.php");





        $id = $_POST['id'];
        $cliente=$_POST['cliente'];
        $empleado=$_POST['empleado'];
        $error= $_POST['error'];
        $tipo= $_POST['tipo'];
        $reparacion= $_POST['reparacion'];
        $fecha=$_POST['fecha'];
        if(isset($_POST['stock'])){
            $stock=true;
        }else{
            $stock=false;

        }
        $sql="INSERT into equipo(id,cliente,empleado,errores,tipo,reparacion,stock,fecha) VALUES('$id','$cliente','$empleado','$error','$tipo','$reparacion','$stock','$fecha')";

        if(base($sql)){
            echo "<script type='text/javascript'>
                   alert('Registro insertado correctamente');
                   window.location='MenuEquipo.html'; 
                    </script>";

        }else{
            echo "Eror: ".$conn->error;
        }



