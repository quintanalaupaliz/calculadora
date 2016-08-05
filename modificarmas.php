<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
$codmas=$_GET['id1'];
$query2="select * from mascota where codmascota ='$codmas'";
$rs2=mysql_query($query2);

$query = "select * from tipo_mascota ";
$rs = mysql_query($query);
$n =mysql_num_rows($rs);

$query1 = "select * from propietario ";
$rs1 = mysql_query($query1);
$n1 =mysql_num_rows($rs1);
?>
<form action="" name="form1" method="get">
<table width="200" border="0" background="img/gato.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" value="<?php echo mysql_result($rs2,0,"codmascota") ?>" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" value="<?php echo mysql_result($rs2,0,"nombremasco") ?>" /></td>
  </tr>
  <tr>
    <td align="right">Genero</td>
    <td><label for="textfield3"></label>
      <input type="text" name="uni" id="textfield3" value="<?php echo mysql_result($rs2,0,"generomasco") ?>" /></td>
  </tr>
  <tr>
    <td align="right">color</td>
    <td><label for="textfield4"></label>
      <input type="text" name="car" id="textfield4" value="<?php echo mysql_result($rs2,0,"color") ?>" /></td>
  </tr>
  <tr>
    <td align="right">fecha</td>
    <td><label for="textfield5"></label>
      <input type="text" name="pre" id="textfield5" value="<?php echo mysql_result($rs2,0,"fecha_naci")?>" /></td>
  </tr>
  <tr>
    <td align="right">Tamaño</td>
    <td><label for="textfield6"></label>
      <input type="text" name="sto" id="textfield6" value="<?php echo mysql_result($rs2,0,"tamanio")?>"  /></td>
  </tr>
  <tr>
    <td align="right">Peso</td>
    <td><label for="textfield7"></label>
      <input type="text" name="dni" id="textfield7" value="<?php echo mysql_result($rs2,0,"peso")?>" /></td>
  </tr>
  <tr>
    <td align="right">Edad</td>
    <td><label for="textfield8"></label>
      <input type="text" name="ema" id="textfield8" value="<?php echo mysql_result($rs2,0,"edad")?>" /></td>
  </tr>
   <tr>
    <td align="right">Observa.</td>
    <td><label for="textfield9"></label>
      <input type="text" name="obs" id="textfield9" value="<?php echo mysql_result($rs2,0,"observaciones")?>" /></td>
  </tr>
  <tr>
  <td align="right">tipomas</td>
   <td><select name="tpo" id="tpo">
        <?php 
		for($i=0; $i<$n; $i++)
		{
			?>
        <option value="<?php echo mysql_result($rs,$i,"cod_tipomascota")?>"><?php echo mysql_result($rs,$i,"nom_tipomascota")?></option> <?php } 
		?>
        </select>
    </td>
    </tr>
     <tr>
  <td align="right">Propietario</td>
   <td><select name="pro" id="pro">
        <?php 
		for($i=0; $i<$n1; $i++)
		{
			?>
        <option value="<?php echo mysql_result($rs1,$i,"id_propie")?>"><?php echo mysql_result($rs1,$i,"nombrepropie")?></option> <?php } 
		?>
        </select>
    </td>
    </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('mascota.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&uni1='+form1.uni.value+'&car1='+form1.car.value+'&pre1='+form1.pre.value+'&sto1='+form1.sto.value+'&dni1='+form1.dni.value+'&ema1='+form1.ema.value+'&obs1='+form1.obs.value+'&tpo1='+form1.tpo.value+'&pro1='+form1.pro.value+'&ident=2','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('mascota.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>