<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Veterinario
{
	public $id_veterinario;
	public $nom_veterinario;
	public $apes_veterinario;
	public $dir_veterinario;
	public $tel_veterinario;
	public $genero_veterinario;
	public $correo_veterinario;
	
	function mostrar(){
			$query="select * from veterinario";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into veterinario values('$this->id_veterinario','$this->nom_veterinario','$this->apes_veterinario','$this->dir_veterinario','$this->tel_veterinario','$this->genero_veterinario','$this->correo_veterinario')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update veterinario set nom_veterinario ='$this->nom_veterinario',apes_veterinario='$this->apes_veterinario',dir_veterinario='$this->dir_veterinario',tel_veterinario='$this->tel_veterinario',genero_veterinario='$this->genero_veterinario',correo_veterinario='$this->correo_veterinario'  where id_veterinario='$this->id_veterinario'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from veterinario where id_veterinario='$this->id_veterinario'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>VETERINARIOS</i></font></font>
<table width="714" border="1" background="img/imagedos.jpg">
 
    <td width="28">N</td>
    <td width="47">Id_Vete</td>
    <td width="71">nombre</td>
    <td width="128">Apellido</td>
    <td width="146">direccion </td>
    <td width="60">Telefono</td>
    <td width="45">Genero</td>
    <td width="45">Correo</td>
    <td width="68">Modificar</td>
    <td width="63">Eliminar</td>
  </tr>
  <?php
  $lista = new Veterinario;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->id_veterinario=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->id_veterinario=$_GET['cod1'];
	 $lista->nom_veterinario=$_GET['nom1'];
	 $lista->apes_veterinario=$_GET['ape1'];
	 $lista->dir_veterinario=$_GET['dir1'];
	 $lista->tel_veterinario=$_GET['tel1'];
	 $lista->genero_veterinario=$_GET['gen1'];
	 $lista->correo_veterinario=$_GET['cor1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->id_veterinario=$_GET['cod1'];
	 $lista->nom_veterinario=$_GET['nom1'];
	 $lista->apes_veterinario=$_GET['ape1'];
	 $lista->dir_veterinario=$_GET['dir1'];
	 $lista->tel_veterinario=$_GET['tel1'];
	 $lista->genero_veterinario=$_GET['gen1'];
	 $lista->correo_veterinario=$_GET['cor1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["id_veterinario"] ?></td>
    <td><?php echo $dato["nom_veterinario"] ?></td>
    <td><?php echo $dato["apes_veterinario"] ?></td>
    <td><?php echo $dato["dir_veterinario"] ?></td>
    <td><?php echo $dato["tel_veterinario"] ?></td>
    <td><?php echo $dato["genero_veterinario"] ?></td>
    <td><?php echo $dato["correo_veterinario"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificarve.php?id1=<?php echo $dato["id_veterinario"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('veterinario.php?id1=<?php echo $dato["id_veterinario"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertarve.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>