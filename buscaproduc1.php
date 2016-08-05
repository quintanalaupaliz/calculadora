<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "coneccion.php";
class buscaproduc
{
	public $codprod;
	function selecprod(){
			$sql="select * from medicamento where nombre_medica like '%$this->codprod%'";
	$rs=mysql_query($sql);
	$lista = array();		
while($valores=mysql_fetch_assoc($rs))
{
				$lista[]=$valores;
				}
				return $lista;		
			}
}
$buscararti= new buscaproduc;
$buscararti->codprod=$_GET['nompro'];
$mostrar=$buscararti->selecprod(); 
?>
<table width="340" border="1" background="img/imagetres.jpg">
 
    <td width="26">Nro</td>
    <td width="201" align="center">Medicamento</td>
    <td width="101" align="center">seleccionar</td>
  </tr>
  <?php 
  $n=0;
  foreach ($mostrar as $imprimir)
  {
  ?>
  <tr>
    <td bgcolor="#999999"><?php echo $n= $n+1?></td>
    <td bgcolor="#FFFFFF"><?php echo $imprimir["nombre_medica"];?></td>
    <td><input name="button" type="button" id="button" value="Seleccionar" onclick="Enviar('paradetalleboleta.php?codprod=<?php echo $imprimir["cod_medica"]?>','apDiv4'); ocultar(0)"/></td>
  </tr>
  <?php
  }
  ?>
</table>


</body>
</html>