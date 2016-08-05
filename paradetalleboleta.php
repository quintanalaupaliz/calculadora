<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
include "coneccion.php";
class Detalle{
		public $cod_medica;
		function buscaproductodet(){
				$sql="select * from medicamento where cod_medica='$this->cod_medica' ";
				$rs = mysql_query($sql);
				return $rs;
			}
	}
	if(isset($_GET["codprod"])){
	$_SESSION["lista"][$_GET["codprod"]]= $_GET["codprod"];
	}
	
	$detallearticulo= new Detalle;
	?>
    <form name="valores">
    <table width="500" border="1" background="img/anim.jpg">
  
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">N°</td>
    <td>Nombre</td>
    <td>P. U</td>
    <td>Cantidad</td>
    <td>Subtotal</td>
  </tr>
    <?php
	$n=0;	
	$detallearticulo->cod_medica=$_GET["codprod"];
	$imprime= $detallearticulo->buscaproductodet();		
	$n=$n+1;
?>

  <tr>
    <td><input type="button" name="mas" id="mas" value="+" onclick="Enviar('detalleboleta.php?codmas=<?php echo mysql_result($imprime,0,"cod_medica")?>'+'&canti='+valores.cantidad.value,'apDiv3')" /></td>
    <td><?php echo $n ?></td>
    <td><?php echo mysql_result($imprime,0,"nombre_medica") ?></td>
    <td><?php echo mysql_result($imprime,0,"precio_uni") ?></td>
    <td><input type="text" name="cantidad" id="cantidad" size="8" onblur="calcular(this.value,<?php echo mysql_result($imprime,0,"precio_uni")?>,<?php echo mysql_result($imprime,0,"cod_medica")?>)" /></td>
    <td><input type="text" name="importe" id="importe" size="8" /></td>
  </tr>
  <?php
  
  ?>
</table>
</form>
</body>
</html>