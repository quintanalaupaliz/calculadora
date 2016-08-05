<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Tipomascota
{
	public $cod_tipomascota;
	public $nom_tipomascota;
	
	function mostrar(){
			$query="select * from tipo_mascota";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into tipo_mascota values('$this->cod_tipomascota','$this->nom_tipomascota')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update tipo_mascota set nom_tipomascota ='$this->nom_tipomascota' where cod_tipomascota='$this->cod_tipomascota'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from tipo_mascota where cod_tipomascota='$this->cod_tipomascota'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>TIPO MASCOTAS</i></font></font>
    <table width="600" border="1" background="img/imagebody.jpg">
 
    <td width="34">N</td>
    <td width="227">codigo</td>
    <td width="254">nombre</td>
    <td width="68">Modificar</td>
    <td width="83">Eliminar</td>
  </tr>
  <?php
  $lista = new Tipomascota;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->cod_tipomascota=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->cod_tipomascota=$_GET['cod1'];
	 $lista->nom_tipomascota=$_GET['nom1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->cod_tipomascota=$_GET['cod1'];
	 $lista->nom_tipomascota=$_GET['nom1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["cod_tipomascota"] ?></td>
    <td><?php echo $dato["nom_tipomascota"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificartip.php?id1=<?php echo $dato["cod_tipomascota"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('tipomascota.php?id1=<?php echo $dato["cod_tipomascota"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertartip.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>