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
    <td>codigo</td><label for="textfield"></label>
    <td><input type="text" name="cod" id="textfield" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" />
    </td>
  </tr>
  <tr>
    <td align="right">Fecha_V</td>
    <td><label for="textfield3"></label>
      <input type="text" name="ape" id="textfield3" />
    </td>
  </tr>
  <tr>
    <td align="right">Stok</td>
    <td><label for="textfield4"></label>
      <input type="text" name="dir" id="textfield4" />
    </td>
  </tr>
  <tr>
    <td align="right">Precio</td>
    <td><label for="textfield5"></label>
      <input type="text" name="pre" id="textfield5" value="" />
    </td>
  </tr>
  <tr>
    <td align="right">DosisN</td>
    <td><label for="textfield6"></label>
      <input type="text" name="do" id="textfield6" /></td>
  </tr>
  <tr>
    <td align="right">DosisM</td>
    <td><label for="textfield7"></label>
      <input type="text" name="dosi" id="textfield7" /></td>
  </tr>
  <tr>
    <td align="right">Detalle</td>
    <td><label for="textfield7"></label>
      <input type="text" name="det" id="textfield7" /></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('medicamento.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ape1='+form1.ape.value+'&dir1='+form1.dir.value+'&pre1='+form1.pre.value+'&do1='+form1.do.value+'&dosi1='+form1.dosi.value+'&det1='+form1.det.value+'&ident=1','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('medicamento.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>