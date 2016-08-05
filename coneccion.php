
<?php
class Conectar
{
	public $servidor;
	public $usuario;
	public $clave;
	public $datos;
	public $conexion;
	
	function __construct(){
		$this->servidor= "localhost";
		$this->usuario= "root";
		$this->clave= "";
		$this->datos= "veterinaria";		
	}
	
	public function conec(){
		$this->conexion= mysql_connect($this->servidor,$this->usuario,$this->clave);
		mysql_select_db($this->datos,$this->conexion);		
		}
	function __destruct(){
			unset($this->servidor);
			unset($this->usuario);
			unset($this->clave);
			unset($this->datos);
		}	
}
$seconecto = new Conectar;
$seconecto->conec();

?>