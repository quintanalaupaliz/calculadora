<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Tipoconsulta
{
	public $cod_tipoconsul;
	public $nom_tipoconsul;
	
	function mostrar(){
			$query="select * from tipo_consulta";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into tipo_consulta values('$this->cod_tipoconsul','$this->nom_tipoconsul')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update tipo_consulta set nom_tipoconsul='$this->nom_tipoconsul' where cod_tipoconsul='$this->cod_tipoconsul'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from tipo_consulta where cod_tipoconsul='$this->cod_tipoconsul'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#FFFFFF"><i>Consulta</i></font></font>
<table width="600" border="1" background="img/gato.jpg">
 
    <td width="34">N</td>
    <td width="227">codigo</td>
    <td width="254">nombre</td>
    <td width="68">Modificar</td>
    <td width="83">Eliminar</td>
  </tr>
  <?php
  $lista = new Tipoconsulta;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->cod_tipoconsul=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->cod_tipoconsul=$_GET['cod1'];
	 $lista->nom_tipoconsul=$_GET['nom1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->cod_tipoconsul=$_GET['cod1'];
	 $lista->nom_tipoconsul=$_GET['nom1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["cod_tipoconsul"] ?></td>
    <td><?php echo $dato["nom_tipoconsul"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificartipo.php?id1=<?php echo $dato["cod_tipoconsul"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('consulta.php?id1=<?php echo $dato["cod_tipoconsul"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertartipo.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>