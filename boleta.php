<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="estilob.css" rel="stylesheet"  />
<style type="text/css">
#color {
	font-weight: bold;
	color: #00C;
}
</style>
<script language="javascript" src="ajaxcontenido.js"></script>
<script language="javascript">
function ocultar(a){
		if(a==1){
				div = document.getElementById("buscacli");
				div.style.display="block";
			}
			if(a==0){
				div = document.getElementById("buscacli");
				div.style.display="none";
			}
	}

function calcular(cant,pre)
	{
		impo=cant*pre;
		document.getElementById('importe').value=impo;
	}	
</script>
</head>

<body>
<?php
include "coneccion.php";
session_start();
	$_SESSION["lista"]= array();
	$_SESSION["lista1"]= array();
class Boleta
{
	public $nboleta;
	public $fechab;
	public $idpropietario;
	function numero(){
			$sql="select max(nro_boleta) from boleta";
			$rs=mysql_query($sql);
			$max=mysql_result($rs,0,"max(nro_boleta)");
			$this->nboleta=$max+1; 
		}
	function fecha(){
			$fe=date ("Y/m/d");
			$this->fechab=$fe;
		}
	function cliente(){
			$sql="select * from propietario where id_propie='$this->idpropietario' ";
			$rs=mysql_query($sql);
			
			return $rs;
		}		
	}
$opboleta= new Boleta;
if(isset($_GET['codclie'])){
		$opboleta->idpropietario=$_GET['codclie'];
		
		$imprecli=$opboleta->cliente();
		}	
?>
<div id="apDiv1">
<table width="560" border="0" align="center" background="img/anim.jpg">
  <tr>
    <td rowspan="5"><center>
   <h1>  VETERINARIA TOBY</h1></center></td> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span id="color">Sr(a):</span><?php
	if(isset($_GET['codclie'])){
		echo mysql_result($imprecli,0,"nombrepropie")." ".mysql_result($imprecli,0,"apellidospropie");
	}
	?>
    </td>
    <td>
      <input type="submit" name="button" id="button" value="Buscar" onclick="Enviar('buscacli.php','buscacli'); ocultar(1)" />   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span id="color">direccion</span>
    <?php
	if(isset($_GET['codclie'])){
		echo mysql_result($imprecli,0,"direccionpropie");
	}
	?>
    </td>
    <td>fecha:<?php $opboleta->fecha(); echo $opboleta->fechab ?></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <input type="button" name="button1" id="button" value="producto" onclick="Enviar('buscaproduc.php','buscacli'); ocultar(1)" />
    </form></td>
    <td>&nbsp;</td>
  </tr>
</table>

<div id="apDiv2">
<table width="150" border="0" background="img/imagesent.jpg">
  <tr>
    <td align="center" >N° boleta</td>
  </tr>
  <tr>
    <td align="center"><?php
    	$opboleta->numero(); 
		echo $opboleta->nboleta;		
	?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<div id="apDiv3"></div>
<div id="apDiv4"></div>
<div id="buscacli" style="display:none"></div>

<div id="botones">
<table>
<tr>
<td> <form name="guardar">
<?php
			if(isset($_GET['codclie'])){
				//igv stt total $desc
				$idC=$_GET['codclie'];
        ?>
<input type="button" name="guardar" value="Guardar" onclick="Enviar('save.php?idU=<?php echo mysql_result($imprecli,0,"id_propie")?>'&subt='+stt.value+'&total='+total.value','')" />
<?php
			}
        ?>
</form>
</td>
<td><form name="nuevo">
<input type="button" name="nuevo" value="Nuevo" onclick="Enviar('boleta.php','cuerpo')" />
</form></td>
<td><form name="salir">
<a href="principal.php"><input type="button" name="salir" value="Salir" /></a>
</form></td>
</tr>
</table>
</div>
</div>

</body>
</html>