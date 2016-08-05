<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Mascota
{
	public $codmas;
	public $nommas;
	public $genemas;
	public $color;
	public $fecha;
	public $taman;
	public $peso;
	public $edad;
	public $obser;
	public $tipoma;
	public $propie;			
	
	function mostrar(){
			$query="select * from mascota";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into mascota values('$this->codmas','$this->nommas','$this->genemas','$this->color','$this->fecha','$this->taman','$this->peso','$this->edad','$this->obser','$this->tipoma','$this->propie')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update mascota set nombremasco ='$this->nommas',generomasco='$this->genemas',color='$this->color',fecha_naci='$this->fecha',tamanio='$this->taman',peso='$this->peso',edad='$this->edad',observaciones='$this->obser',cod_tipomascota='$this->tipoma',id_propie='$this->propie' where codmascota='$this->codmas'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from mascota where codmascota='$this->codmas'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>MASCOTAS</i></font></font>
<table width="900" border="1" background="img/imagebody.jpg">
  
    <td width="19">N</td>
    <td width="51">Codmas</td>
    <td width="56">nombre</td>
    <td width="41">genero</td>
    <td width="57">Color </td>
    <td width="67">fecha_naci</td>
    <td width="49">Tamaño</td>
    <td width="42">Peso </td>
    <td width="63">Edad</td>
    <td width="98">observaciones</td>
    <td width="51">tipomas.</td>
    <td width="67">Propietario</td>
    <td width="75">Modificar</td>
    <td width="76">Eliminar</td>
  </tr>
  <?php
  $lista = new Mascota;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->codmas=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->codmas=$_GET['cod1'];
	 $lista->nommas=$_GET['nom1'];
	 $lista->genemas=$_GET['uni1'];
	 $lista->color=$_GET['car1'];
	 $lista->fecha=$_GET['pre1'];
	 $lista->taman=$_GET['sto1'];
	 $lista->peso=$_GET['dni1'];
	 $lista->edad=$_GET['ema1'];
	 $lista->obser=$_GET['obs1'];
	 $lista->tipoma=$_GET['tpo1'];
	 $lista->propie=$_GET['pro1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->codmas=$_GET['cod1'];
	 $lista->nommas=$_GET['nom1'];
	 $lista->genemas=$_GET['uni1'];
	 $lista->color=$_GET['car1'];
	 $lista->fecha=$_GET['pre1'];
	 $lista->taman=$_GET['sto1'];
	 $lista->peso=$_GET['dni1'];
	 $lista->edad=$_GET['ema1'];
	 $lista->obser=$_GET['obs1'];
	 $lista->tipoma=$_GET['tpo1'];
	 $lista->propie=$_GET['pro1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td height="28"><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["codmascota"] ?></td>
    <td><?php echo $dato["nombremasco"] ?></td>
    <td><?php echo $dato["generomasco"] ?></td>
    <td><?php echo $dato["color"] ?></td>
    <td><?php echo $dato["fecha_naci"] ?></td>
    <td><?php echo $dato["tamanio"] ?></td>
    <td><?php echo $dato["peso"] ?></td>
    <td><?php echo $dato["edad"] ?></td>
    <td><?php echo $dato["observaciones"] ?></td>
     <td><?php echo $dato["cod_tipomascota"] ?></td>
    <td><?php echo $dato["id_propie"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificarmas.php?id1=<?php echo $dato["codmascota"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('mascota.php?id1=<?php echo $dato["codmascota"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="javascript:Enviar('insertarmas.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>