<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Clientes
{
	public $id_propie;
	public $nombrepropie;
	public $apellidospropie;
	public $direccionpropie;
	public $dni_propie;
	public $genero_propie;
	
	function mostrar(){
			$query="select * from propietario";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into propietario values('$this->id_propie','$this->nombrepropie','$this->apellidospropie','$this->direccionpropie','$this->dni_propie','$this->genero_propie')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update propietario set nombrepropie ='$this->nombrepropie',apellidospropie='$this->apellidospropie',direccionpropie='$this->direccionpropie',dni_propie='$this->dni_propie',genero_propie='$this->genero_propie'  where id_propie='$this->id_propie'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from propietario where id_propie='$this->id_propie'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>PROPIETARIO</i></font></font>
<table width="714" border="1" background="img/imagetres.jpg">
  
    <td width="28">N</td>
    <td width="47">Id_clie</td>
    <td width="71">nombre</td>
    <td width="128">Apellido</td>
    <td width="146">direccion </td>
    <td width="60">DNI</td>
    <td width="45">Genero</td>
    <td width="68">Modificar</td>
    <td width="63">Eliminar</td>
  </tr>
  <?php
  $lista = new Clientes;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->id_propie=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->id_propie=$_GET['cod1'];
	 $lista->nombrepropie=$_GET['nom1'];
	 $lista->apellidospropie=$_GET['ape1'];
	 $lista->direccionpropie=$_GET['dir1'];
	 $lista->dni_propie=$_GET['dni1'];
	 $lista->genero_propie=$_GET['gen1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->id_propie=$_GET['cod1'];
	 $lista->nombrepropie=$_GET['nom1'];
	 $lista->apellidospropie=$_GET['ape1'];
	 $lista->direccionpropie=$_GET['dir1'];
	 $lista->dni_propie=$_GET['dni1'];
	 $lista->genero_propie=$_GET['gen1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["id_propie"] ?></td>
    <td><?php echo $dato["nombrepropie"] ?></td>
    <td><?php echo $dato["apellidospropie"] ?></td>
    <td><?php echo $dato["direccionpropie"] ?></td>
    <td><?php echo $dato["dni_propie"] ?></td>
    <td><?php echo $dato["genero_propie"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificarpro.php?id1=<?php echo $dato["id_propie"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('propietario.php?id1=<?php echo $dato["id_propie"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertarpro.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>