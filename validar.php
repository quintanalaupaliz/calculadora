<?php
include "coneccion.php";
$usu = $_POST['textfield'];
$cla = $_POST['textfield2'];
$sql = "select * from usuarios where usuario = '$usu'";
$rs= mysql_query($sql);
$n = mysql_num_rows($rs);
 if($n ==1) 
 
 {
 $sql1 = "select * from usuarios where usuario = '$usu' and  clave ='$cla' ";	 
	$rs1 = mysql_query($sql1);
	$n1 = mysql_num_rows($rs1);
	
	if($n1 == 1) 
	    {
			session_start();
			$_SESSION["acceso"]=1;
			$_SESSION["usuario"]= mysql_result($rs1,0,"tipousu");
			$_SESSION["usuario"]=mysql_result($rs,0,"usuario");
			$_SESSION["nombreusu"]=mysql_result($rs,0,"nom_usu");
			$_SESSION["apellidousu"]=mysql_result($rs,0,"ape_usu");
			
			header("location:principal.php");
		}
		
		else{
			header("location:index.php?ecla=1");
			}
 }
		else{
			header("location:index.php?eusu=2");
			}
		

 
?>