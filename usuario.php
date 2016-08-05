<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Usuario
{
	public $idusuario;
	public $nom_usu;
	public $ape_usu;
	public $dir_usu;
	public $tel_usu;
	public $tipousu;
	public $clave;
	public $usuario;
	
	function mostrar(){
			$query="select * from usuarios";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into usuarios values('$this->idusuario','$this->nom_usu','$this->ape_usu','$this->dir_usu','$this->tel_usu','$this->tipousu','$this->clave','$this->usuario')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update usuarios set nom_usu='$this->nom_usu',ape_usu='$this->ape_usu',dir_usu='$this->dir_usu',tel_usu='$this->tel_usu',tipousu='$this->tipousu',clave='$this->clave',usuario='$this->usuario'  where idusuario='$this->idusuario'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from usuarios where idusuario='$this->idusuario'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>USUARIOS</i></font></font>
<table width="714" border="1" background="img/imagediez.jpg">
 
    <td width="28">N</td>
    <td width="47">Id_Usu</td>
    <td width="71">nombre</td>
    <td width="128">Apellido</td>
    <td width="146">direccion </td>
    <td width="60">Telefono</td>
    <td width="45">Tipo</td>
    <td width="45">clave</td>
    <td width="45">usuario</td>
    <td width="68">Modificar</td>
    <td width="63">Eliminar</td>
  </tr>
  <?php
  $lista = new Usuario;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->idusuario=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->idusuario=$_GET['cod1'];
	 $lista->nom_usu=$_GET['nom1'];
	 $lista->ape_usu=$_GET['ape1'];
	 $lista->dir_usu=$_GET['dir1'];
	 $lista->tel_usu=$_GET['tel1'];
	 $lista->tipousu=$_GET['gen1'];
	 $lista->clave=$_GET['cor1'];
	 $lista->usuario=$_GET['usu1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->idusuario=$_GET['cod1'];
	 $lista->nom_usu=$_GET['nom1'];
	 $lista->ape_usu=$_GET['ape1'];
	 $lista->dir_usu=$_GET['dir1'];
	 $lista->tel_usu=$_GET['tel1'];
	 $lista->tipousu=$_GET['gen1'];
	 $lista->clave=$_GET['cor1'];
	 $lista->usuario=$_GET['usu1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["idusuario"] ?></td>
    <td><?php echo $dato["nom_usu"] ?></td>
    <td><?php echo $dato["ape_usu"] ?></td>
    <td><?php echo $dato["dir_usu"] ?></td>
    <td><?php echo $dato["tel_usu"] ?></td>
    <td><?php echo $dato["tipousu"] ?></td>
    <td><?php echo $dato["clave"] ?></td>
    <td><?php echo $dato["usuario"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificarusu.php?id1=<?php echo $dato["idusuario"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('usuario.php?id1=<?php echo $dato["idusuario"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertarusu.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>