<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
$id_propie=$_GET['id1'];
$query = "select * from propietario where id_propie ='$id_propie' ";
$rs = mysql_query($query);
$n =mysql_num_rows($rs);
?>
<form action="" name="form1" method="get">
<table width="200" border="0" bgcolor="#666666" background="img/luna verde.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" value="<?php echo mysql_result($rs,0,"id_propie")?>" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" value="<?php echo mysql_result($rs,0,"nombrepropie")?>" /></td>
  </tr>
  <tr>
    <td align="right">Apellido</td>
    <td><label for="textfield3"></label>
      <input type="text" name="ape" id="textfield3" value="<?php echo mysql_result($rs,0,"apellidospropie")?>" /></td>
  </tr>
  <tr>
    <td align="right">Direccion</td>
    <td><label for="textfield4"></label>
      <input type="text" name="dir" id="textfield4" value="<?php echo mysql_result($rs,0,"direccionpropie")?>"  /></td>
  </tr>
  <tr>
    <td align="right">DNI</td>
    <td><label for="textfield5"></label>
      <input type="text" name="dni" id="textfield5" value="<?php echo mysql_result($rs,0,"dni_propie")?>" /></td>
  </tr>
  <tr>
    <td align="right">Genero</td>
    <td><label for="select"></label>
      <select name="gen" id="gen1">
     	<option value="<?php echo mysql_result($rs,0,"genero_propie")?>">  <?php echo mysql_result($rs,0,"genero_propie")?></option>
        <option value="M">Masculno</option>
        <option value="F">Femenino</option>
        
      </select></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('propietario.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ape1='+form1.ape.value+'&dir1='+form1.dir.value+'&dni1='+form1.dni.value+'&gen1='+form1.gen.value+'&ident=2','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('propietario.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>