<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Incertar clientes</title>
</head>

<body>
<?php
include "coneccion.php";
$cod_tipoconsul=$_GET['id1'];
$query = "select * from tipo_consulta where cod_tipoconsul ='$cod_tipoconsul' ";
$rs = mysql_query($query);
$n =mysql_num_rows($rs)
?>
<form action="" name="form1" method="get">
<table width="200" border="0" background="img/imagediez.jpg">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">codigo</td>
    <td><label for="textfield"></label>
      <input type="text" name="cod" id="textfield" value="<?php echo mysql_result($rs,0,"cod_tipoconsul")?>" /></td>
  </tr>
  <tr>
    <td align="right">Nombre</td>
    <td><label for="textfield2"></label>
      <input type="text" name="nom" id="textfield2" value="<?php echo mysql_result($rs,0,"nom_tipoconsul")?>" /></td>
  </tr>
  <tr>
    <td><input type="button" name="button" id="button" value="Guardar" onclick="Enviar('consulta.php?cod1='+form1.cod.value+'&nom1='+form1.nom.value+'&ident=2','cuerpo')" /></td>
    <td><input type="button" name="button2" id="button2" value="X" onclick="javascript:Enviar('consulta.php','cuerpo')" /></td>
  </tr>
</table>
</form>
</body>
</html>