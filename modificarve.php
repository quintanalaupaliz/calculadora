<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
$id_veterinario=$_GET['id1'];
$query = "select * from veterinario where id_veterinario ='$id_veterinario' ";
$rs = mysql_query($query);
$n =mysql_num_rows($rs)
?>
<form action="" name="form1" method="get">
<table width="200" border="0" background="img/image.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" value="<?php echo mysql_result($rs,0,"id_veterinario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" value="<?php echo mysql_result($rs,0,"nom_veterinario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Apellido</td>
    <td><label for="textfield3"></label>
      <input type="text" name="ape" id="textfield3" value="<?php echo mysql_result($rs,0,"apes_veterinario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Direccion</td>
    <td><label for="textfield4"></label>
      <input type="text" name="dir" id="textfield4" value="<?php echo mysql_result($rs,0,"dir_veterinario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Telefono</td>
    <td><label for="textfield5"></label>
      <input type="text" name="tel" id="textfield5" value="<?php echo mysql_result($rs,0,"tel_veterinario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Genero</td>
    <td><label for="select"></label>
      <select name="gen" id="gen">
      	<option value="<?php echo mysql_result($rs,0,"genero_veterinario")?>">  <?php echo mysql_result($rs,0,"genero_veterinario")?></option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select></td>
  </tr>
  <tr>
    <td align="right">Correo</td>
    <td><label for="textfield6"></label>
      <input type="text" name="cor" id="textfield6" value="<?php echo mysql_result($rs,0,"correo_veterinario")?>" /></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('veterinario.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ape1='+form1.ape.value+'&dir1='+form1.dir.value+'&tel1='+form1.tel.value+'&gen1='+form1.gen.value+'&cor1='+form1.cor.value+'&ident=2','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('veterinario.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>