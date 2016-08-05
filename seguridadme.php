<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "coneccion.php";
	$sql = "select * from seguridadmedi";
	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);
?>	
<table width="900" border="1" bgcolor="#CCCCCC" background="img/ima.jpg">
  <tr>
    <td>codigo</td>
    <td>Nombre</td>
    <td>fechave</td>
    <td>Stok</td>
    <td>Precio</td>
    <td>Dosis Nor</td>
    <td>dosis Max</td>
    <td>detalle</td>
    <td>fecha</td>
    <td>hora</td>
    <td>estado</td>    
  </tr>
<?php
for ($i=0;$i<$n;$i++)
{
?>
 
    <td><?php echo mysql_result($rs,$i,"codme");?></td>
    <td><?php echo mysql_result($rs,$i,"nomme");?></td>
    <td><?php echo mysql_result($rs,$i,"fechave");?></td>
    <td><?php echo mysql_result($rs,$i,"stoks");?></td>
    <td><?php echo mysql_result($rs,$i,"preuni");?></td>  
    <td><?php echo mysql_result($rs,$i,"dosnor");?></td>
    <td><?php echo mysql_result($rs,$i,"dosmax");?></td>
    <td><?php echo mysql_result($rs,$i,"detalle");?></td>
    <td><?php echo mysql_result($rs,$i,"fecha");?></td>
    <td><?php echo mysql_result($rs,$i,"hora");?></td>
    <td><?php echo mysql_result($rs,$i,"estado");?></td>
  </tr>
  <?php
}
  ?>
</table>
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
</body>
</html>