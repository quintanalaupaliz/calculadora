<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "coneccion.php";
    session_start();
class Detalle{
		public $cod_medica;
		function buscaproductodet(){
				$sql="select * from medicamento where cod_medica='$this->cod_medica' ";
				$rs = mysql_query($sql);
				return $rs;
			}
	}
	if(isset($_GET['codmas'])){
	$_SESSION["lista"][$_GET["codmas"]]= $_GET['codmas'];
	$_SESSION["lista1"][$_GET["codmas"]]= $_GET['canti'];
	}
	if(isset($_GET["codeliminar"])){
		unset($_SESSION["lista"][$_GET['codeliminar']]);
	}
	
	$detallearticulo= new Detalle;
	?>
    <table width="500" border="1" bgcolor="#CCCCCC" background="img/anim.jpg">
  <tr bgcolor="#CCCCCC">
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">N°</td>
    <td>Nombre</td>
    <td>P. U</td>
    <td>Cantidad</td>
    <td>Sub total</td>
  </tr>
    <?php
	$n=0;
	$importet=0;
	//$nl=count($_SESSION["lista"]);
	foreach($_SESSION["lista"] as $indice=>$valor)
	//echo $nl;	
	{
	$detallearticulo->cod_medica=$valor;
	$imprime= $detallearticulo->buscaproductodet();		
	$n=$n+1;
?>

  <tr bgcolor="#009999">
    <td><input type="button" name="resta" id="resta" value="-" onclick="Enviar('detalleboleta.php?codeliminar=<?php echo mysql_result($imprime,0,"cod_medica")?>','apDiv3')" /></td>
    <td><?php echo $n ?></td>
    <td><?php echo mysql_result($imprime,0,"nombre_medica") ?></td>
    <td><?php echo mysql_result($imprime,0,"precio_uni") ?></td>
    <td><input type="text" name="cantidad" id="cantidad" size="8" value="<?php echo $_SESSION["lista1"][$indice] ?>"/></td>
    <td><input type="text" name="importe" id="importe <?php echo mysql_result($imprime,0,"cod_medica")?>" size="8" value="<?php $importe =$_SESSION["lista1"][$indice]*mysql_result($imprime,0,"precio_uni"); echo $importe?>" /></td>
  </tr>
  <?php
  $importet=$importet+$importe;
  }
  ?>
  <tr>
  <td colspan="4" style="empty-cells:hide"></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="4" style="empty-cells:hide"></td>
  <td>TOTAL</td>
  <td><input type="text" name="total" id="total" value="<?php $total= $importet ;echo $total?>"  /></td>
  </tr>
</table>

</body>
</html>