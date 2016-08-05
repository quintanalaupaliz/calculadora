<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<link type="text/css" href="estilo.css" rel="stylesheet" />
<style type="text/css">
letra {
	font-weight:lighter;
}
#color {
	color:#F0F;
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
session_start();
if ($_SESSION["acceso"]==1){
?>

<div id="principal">
  <div id="cabecera">
  <div id="cerrar">
  <a href="cerrarsesion.php">Cerrar Sesion</a>
  </div>
  <marquee>
<table width="1000" height="170"border="1" background="img/images.jpg">
<tr>
   <td align="center"><h1 id="color">VETERINARIA TOBY</h1></td>
</tr>
</table>
</marquee>
  </div>
  <div id="menu">
  	<table width="630" align="center">
    	<tr>
        <td width="35">Inicio</td>
        <td width="62"><a href="javascript:Enviar('mascota.php','cuerpo')"><h3>Mascota</h3> </a></td>
        <td width="60"><a href="javascript:Enviar('boleta.php','cuerpo')"><h3>Boleta</h3></a></td>
        <td width="71"><a href="javascript:Enviar('propietario.php','cuerpo')"><h3>Propietario</h3></a></td>
         <td width="87"><a href="javascript:Enviar('medicamento.php','cuerpo')"><h3>Medicamento</h3></a></td>
         <td width="71"><a href="javascript:Enviar('veterinario.php','cuerpo')"><h3>Veterinario</h3></a></td>
         <td width="67"><a href="javascript:Enviar('tipomascota.php','cuerpo')"><h3>TipoMa</h3></a></td>
          <td width="65"><a href="javascript:Enviar('consulta.php','cuerpo')"><h3>TipoCon</h3></a></td>
          <td width="72"><a href="javascript:Enviar('usuario.php','cuerpo')"><h3>Usuarios</h3></a></td>
        </tr>
        
        <tr>
        <td>&nbsp;</td>
        <td><a href="javascript:Enviar('seguridad.php','cuerpo')"><h3>CopiaM</h3></a></td>
        <td><a href="javascript:Enviar('seguridadpro.php','cuerpo')"><h3>SeguriPro</h3></a></td>
        <td><a href="javascript:Enviar('seguridadme.php','cuerpo')"><h3>eguriMedi</h3></a></td>
        <td><a href="javascript:Enviar('seguridadve.php','cuerpo')"><h3>SeguriVeteri</h3></a></td>
        <td><a href="javascript:Enviar('seguridadtma.php','cuerpo')"><h3>SeguriTmas</h3></a></td>
        <td><a href="javascript:Enviar('seguridadcon.php','cuerpo')"><h3>SeguriTcon</h3></a></td>
        <td><a href="javascript:Enviar('seguridadusu.php','cuerpo')"><h3>SeguriUsu</h3></a></td>
        </tr>
    </table>
  </div>
  <div id="cuerpo"></div>
  
</div>
<?php
}
else {
		header("location:index.php");
	}
?>
</body>
</html>