<?php
    $dni=$_GET["dni"];
    $sel=$_GET["sel"];
    if($dni==3 || $dni==4){
        $redireccion="bitacora_verificar.php";
    }else{
        $redireccion="bitacora_MD.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sel?></title>
</head>
<body>

        <?php echo $sel?><br><br>
        <select name="opcion" id="opcion">
            <option>Rango Fechas</option>
            <option>Año y Mes</option>
            <option>ID</option>
            <option>Fecha Especifica</option>
        </select>
        <br><br><button onclick="formu()">Escoger Formulario</button>
        <section id="rang" style="display: none">
            <form action="<?php echo $redireccion?>?dni=<?php echo $dni?>" method="post">
            <br>INGRESE RANGO DE FECHAS<br>
            <br>RANGO INFERIOR<br><input type="date" name="inicio" required>
            <br>RANGO SUPERIOR<br><input type="date" name="final" required>
            <br>
            <button type="reset">Cancel</button>
            <button type="submit">Enviar</button>
            </form>
        </section>
        <section id="aym" style="display: none">
            <form action="<?php echo $redireccion?>?dni=<?php echo $dni?>" method="post">
            <br>INGRESE AÑO Y MES DE CONSULTA<br>
            <br>AÑO<br><input type="number" name="year" required>
            <br><select name="month" required>
                    <option value="01">ENERO</option>
                    <option value="02">FEBRERO</option>
                    <option value="03">MARZO</option>
                    <option value="04">ABRIL</option>
                    <option value="05">MAYO</option>
                    <option value="06">JUNIO</option>
                    <option value="07">JULIO</option>
                    <option value="08">AGOSTO</option>
                    <option value="09">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                </select>
            <br>
            <button type="reset">Cancel</button>
            <button type="submit">Enviar</button>
            </form>
        </section>
        <section id="cid" style="display: none">
            <form action="<?php echo $redireccion?>?dni=<?php echo $dni?>" method="post">
            <br>INGRESE ID DE CONSULTA<br>
            <br>ID<br><input type="number" name="id" required>
            <br>
            <button type="reset">Cancel</button>
            <button type="submit">Enviar</button>
            </form>
        </section>
        <section id="fec" style="display: none">
            <form action="<?php echo $redireccion?>?dni=<?php echo $dni?>" method="post">
            <br>INGRESE FECHA A CONSULTAR<br>
            <br>FECHA<br><input type="date" name="fech" required>
            <br>
            <button type="reset">Cancel</button>
            <button type="submit">Enviar</button>
            </form>
        </section>
        <script>
            function formu() {
                $opc=document.getElementById("opcion").value;
                if($opc==="Rango Fechas"){
                    document.getElementById('rang').style.display = 'block';
                    document.getElementById('aym').style.display = 'none';
                    document.getElementById('cid').style.display = 'none';
                    document.getElementById('fec').style.display = 'none';
                }else if ($opc==="Año y Mes"){
                    document.getElementById('aym').style.display = 'block';
                    document.getElementById('rang').style.display = 'none';
                    document.getElementById('cid').style.display = 'none';
                    document.getElementById('fec').style.display = 'none';
                }else if($opc==="ID"){
                    document.getElementById('cid').style.display = 'block';
                    document.getElementById('rang').style.display = 'none';
                    document.getElementById('aym').style.display = 'none';
                    document.getElementById('fec').style.display = 'none';
                }else if($opc==="Fecha Especifica"){
                    document.getElementById('fec').style.display = 'block';
                    document.getElementById('aym').style.display = 'none';
                    document.getElementById('rang').style.display = 'none';
                    document.getElementById('cid').style.display = 'none';

                }
            }
        </script>

</body>
</html>