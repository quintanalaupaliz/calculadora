<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "coneccion.php";
	$sql = "select * from seguridad_mascota";
	$rs = mysql_query($sql);
	$n = mysql_num_rows($rs);
?>	
<table width="900" border="1" bgcolor="#CCCCCC" background="img/ima.jpg">
  <tr>
    <td>codigo</td>
    <td>Nombre</td>
    <td>genero</td>
    <td>Color</td>
    <td>Fe_naci</td>
    <td>Tamaño</td>
    <td>peso</td>
    <td>edad</td>
    <td>observaciones</td>
    <td>cod_tmas</td>
    <td>idpro</td>
    <td>fecha</td>
    <td>hora</td>
    <td>Eliminar</td>
    
  </tr>
<?php
for ($i=0;$i<$n;$i++)
{
?>

    <td><?php echo mysql_result($rs,$i,"codmascota_s");?></td>
    <td><?php echo mysql_result($rs,$i,"nombremascota_s");?></td>
    <td><?php echo mysql_result($rs,$i,"generomascota_s");?></td>
    <td><?php echo mysql_result($rs,$i,"color_s");?></td>
    <td><?php echo mysql_result($rs,$i,"fecha_naci");?></td>  
    <td><?php echo mysql_result($rs,$i,"tamanio_s");?></td>
    <td><?php echo mysql_result($rs,$i,"peso_s");?></td>
    <td><?php echo mysql_result($rs,$i,"edad_s");?></td>
    <td><?php echo mysql_result($rs,$i,"observaciones_s");?></td>
    <td><?php echo mysql_result($rs,$i,"cod_tipomascota_s");?></td>
    <td><?php echo mysql_result($rs,$i,"id_propie_s");?></td>
    <td><?php echo mysql_result($rs,$i,"fecha");?></td>
    <td><?php echo mysql_result($rs,$i,"hora");?></td>
    <td><?php echo mysql_result($rs,$i,"elimihar");?></td>
  </tr>
  <?php
}
  ?>
</table>
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
</body>
</html>