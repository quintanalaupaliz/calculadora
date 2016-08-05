<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CLIENTES</title>
</head>

<body>
<?php
include "coneccion.php";
class Medicamento
{
	public $cod_medica;
	public $nombre_medica;
	public $fecha_vencimiento;
	public $stok;
	public $precio_uni;
	public $dosis_normal;
	public $dosis_maximo;
	public $detalle;
	
	function mostrar(){
			$query="select * from medicamento";
			$rs=mysql_query($query);
			$lista= array();
			
			while($valores=mysql_fetch_assoc($rs))
			{
				$lista[]=$valores;
				}
				return $lista;
		}
		function insertar(){
			$query="insert into medicamento values('$this->cod_medica','$this->nombre_medica','$this->fecha_vencimiento','$this->stok','$this->precio_uni','$this->dosis_normal','$this->dosis_maximo','$this->detalle')";
			$rs=mysql_query($query);
						
			}
			function actualizar(){
					$query="update medicamento set nombre_medica ='$this->nombre_medica',fecha_vencimiento='$this->fecha_vencimiento',stok='$this->stok',precio_uni='$this->precio_uni',dosis_normal='$this->dosis_normal',dosis_maximo='$this->dosis_maximo',detalle='$this->detalle' where cod_medica='$this->cod_medica'";
					$rs=mysql_query($query);
				}
				function eliminar(){
					$query="delete from medicamento where cod_medica='$this->cod_medica'";
					$rs=mysql_query($query);
					}
}
	?>
    <font size="+6"><font color="#0FF"><i>MEDICAMENTOS</i></font></font>
<table width="714" border="1" background="img/onduladoverde.jpg">
  
    <td width="22">N</td>
    <td width="45">Codigo</td>
    <td width="150">nombre</td>
    <td width="59">fecha_v</td>
    <td width="33">Stok </td>
    <td width="39">Precio</td>
    <td width="57">DosiNor.</td>
    <td width="63">DossMax</td>
    <td width="42">Detalle</td>
    <td width="68">Modificar</td>
    <td width="66">Eliminar</td>
  </tr>
  <?php
  $lista = new Medicamento;
// $imprimir= $lista->mostrar();
if(isset($_GET['ident'])){	
  
  if($_GET['ident']==3){
	  $lista->cod_medica=$_GET['id1'];
	  $lista->eliminar();
	  }
	  
	if($_GET['ident']==2){
	 $lista->cod_medica=$_GET['cod1'];
	 $lista->nombre_medica=$_GET['nom1'];
	 $lista->fecha_vencimiento=$_GET['ape1'];
	 $lista->stok=$_GET['dir1'];
	 $lista->precio_uni=$_GET['pre1'];
	 $lista->dosis_normal=$_GET['do1'];
	 $lista->dosis_maximo=$_GET['dosi1'];
	 $lista->detalle=$_GET['det1'];
	 $lista->actualizar();
	 }
	
 if($_GET['ident']==1){
	 $lista->cod_medica=$_GET['cod1'];
	 $lista->nombre_medica=$_GET['nom1'];
	 $lista->fecha_vencimiento=$_GET['ape1'];
	 $lista->stok=$_GET['dir1'];
	 $lista->precio_uni=$_GET['pre1'];
	 $lista->dosis_normal=$_GET['do1'];
	 $lista->dosis_maximo=$_GET['dosi1'];
	 $lista->detalle=$_GET['det1'];
	 $lista->insertar();
	 }
}
	 $imprimir= $lista->mostrar();

$sum=0;
  foreach($imprimir as $dato){
  ?>
  <tr>
    <td><?php echo $sum=$sum+1?></td>
    <td><?php echo $dato["cod_medica"] ?></td>
    <td><?php echo $dato["nombre_medica"] ?></td>
    <td><?php echo $dato["fecha_vencimiento"] ?></td>
    <td><?php echo $dato["stok"] ?></td>
    <td><?php echo $dato["precio_uni"] ?></td>
    <td><?php echo $dato["dosis_normal"] ?></td>
    <td><?php echo $dato["dosis_maximo"] ?></td>
    <td><?php //echo $dato["detalle"] ?></td>
    <td><input type="button" value="Modificar" onclick="Enviar('modificarme.php?id1=<?php echo $dato["cod_medica"]?>','insertar')" /></td>
    <td><input type="button" value="Eliminar" onclick="Enviar('medicamento.php?id1=<?php echo $dato["cod_medica"]?>&ident=3','cuerpo')" /></td>
  </tr>
  <?php
  }
  
  ?>
</table>
<input type="button" value="Nuevo" onclick="Enviar('insertarme.php','insertar')" />
<a href="principal.php"><input type="submit" value="Salir" onclick="Enviar('principal.php')" /></a>
<div id="insertar"></div>
</body>
</html>