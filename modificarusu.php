<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
$idusuario=$_GET['id1'];
$query = "select * from usuarios where idusuario='$idusuario' ";
$rs = mysql_query($query);
$n =mysql_num_rows($rs)
?>
<form action="" name="form1" method="get">
<table width="200" border="0" background="img/anim.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" value="<?php echo mysql_result($rs,0,"idusuario")?>" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" value="<?php echo mysql_result($rs,0,"nom_usu")?>" /></td>
  </tr>
  <tr>
    <td align="right">Apellido</td>
    <td><label for="textfield3"></label>
      <input type="text" name="ape" id="textfield3" value="<?php echo mysql_result($rs,0,"ape_usu")?>" /></td>
  </tr>
  <tr>
    <td align="right">Direccion</td>
    <td><label for="textfield4"></label>
      <input type="text" name="dir" id="textfield4" value="<?php echo mysql_result($rs,0,"dir_usu")?>" /></td>
  </tr>
  <tr>
    <td align="right">Telefono</td>
    <td><label for="textfield5"></label>
      <input type="text" name="tel" id="textfield5" value="<?php echo mysql_result($rs,0,"tel_usu")?>" /></td>
  </tr>
  <tr>
    <td align="right">TipoUsu</td>
    <td><label for="select"></label>
      <select name="gen" id="gen">
      	<option value="<?php echo mysql_result($rs,0,"tipousu")?>">  <?php echo mysql_result($rs,0,"tipousu")?></option>
        <option value="Gerente">Gerente</option>
        <option value="Vendedor">Vendedor</option>
      </select></td>
  </tr>
  <tr>
    <td align="right">Clave</td>
    <td><label for="textfield6"></label>
      <input type="password" name="cor" id="textfield6" value="<?php echo mysql_result($rs,0,"clave")?>" /></td>
  </tr>
  <tr>
    <td align="right">Usuario</td>
    <td><label for="textfield7"></label>
      <input type="text" name="usu" id="textfield7" value="<?php echo mysql_result($rs,0,"usuario")?>" /></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('usuario.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ape1='+form1.ape.value+'&dir1='+form1.dir.value+'&tel1='+form1.tel.value+'&gen1='+form1.gen.value+'&cor1='+form1.cor.value+'&usu1='+form1.usu.value+'&ident=2','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('usuario.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>