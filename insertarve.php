<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
?>
<form action="" name="form1" method="get">
<table width="200" border="0" background="img/imagesent.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" /></td>
  </tr>
  <tr>
    <td align="right">Apellido</td>
    <td><label for="textfield3"></label>
      <input type="text" name="ape" id="textfield3" /></td>
  </tr>
  <tr>
    <td align="right">Direccion</td>
    <td><label for="textfield4"></label>
      <input type="text" name="dir" id="textfield4" /></td>
  </tr>
  <tr>
    <td align="right">Telefono</td>
    <td><label for="textfield5"></label>
      <input type="text" name="tel" id="textfield5" value="" /></td>
  </tr>
  <tr>
    <td align="right">Genero</td>
    <td><label for="select"></label>
      <select name="gen" id="gen">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select></td>
  </tr>
  <tr>
    <td align="right">Correo</td>
    <td><label for="textfield6"></label>
      <input type="text" name="cor" id="textfield6" value="" /></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('veterinario.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ape1='+form1.ape.value+'&dir1='+form1.dir.value+'&tel1='+form1.tel.value+'&gen1='+form1.gen.value+'&cor1='+form1.cor.value+'&ident=1','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('veterinario.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>