<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "coneccion.php";
class buscacli
{
	public $codclie;
	function seleccli(){
			$sql="select * from propietario where nombrepropie like '%$this->codclie%'";
	$rs=mysql_query($sql);
	$lista = array();		
while($valores=mysql_fetch_assoc($rs))
{
				$lista[]=$valores;
				}
				return $lista;		
			}
}
$buscarcli= new buscacli;
$buscarcli->codclie=$_GET['nomcli'];
$mostrar=$buscarcli->seleccli(); 
?>
<table width="350" border="1" background="img/ima.jpg">

    <td width="30">Nro</td>
    <td width="350" align="center">Nombres y apellidos</td>
    <td width="150" align="center">seleccionar</td>
  </tr>
  <?php 
  $n=0;
  foreach ($mostrar as $imprimir)
  {
  ?>
  <tr>
    <td bgcolor="#999999"><?php echo $n= $n+1?></td>
    <td bgcolor="#FFFFFF"><?php echo $imprimir["nombrepropie"]." ".$imprimir["apellidospropie"]; ?></td>
    <td><input name="button" type="button" value="Seleccionar" onclick="Enviar('boleta.php?codclie=<?php echo $imprimir["id_propie"]?>','apDiv1'); ocultar(0)"/></td>
  </tr>
  <?php
  }
  ?>
</table>


</body>
</html>