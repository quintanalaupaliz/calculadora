<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	
	position: absolute;
	width: 400px;
	height: 250px;
	z-index: 1;
	left: 50%;
	background-image:url(img/gato.jpg);
	top:50px;
	margin-left:-200px;
	border-radius:10px;
	
}
</style>
</head>

<body>
<center> <h1> SOLO PERSONAL AUTORIZADO</h1></center> 
<div id="apDiv1">
  <form id="form1" name="form1" method="post" action="validar.php">
 
    <table width="400" border="0" cellpadding="2">
    
      <tr>
       
        <td >Usuario</td>
        <td ><label for="textfield"></label>
        <input type="text" name="textfield" id="textfield" /></td>
      </tr>
      <tr>
        <td >Clave</td>
        <td ><label for="textfield2"></label>
        <input type="password" name="textfield2" id="textfield2" /></td>
      </tr>
      <tr>
        <td ><input type="submit" name="button"  value="Aceptar" /></td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td height="46" colspan="2" ><?php 
				
		if (isset($_GET['ecla']))
		{
		echo  "La  clave  no  existe ";
		}
				if (isset($_GET['eusu']))
		{
		echo  "El usuario  no  existe ";
		}
		?>
       </td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
</div>
</body>
</html>