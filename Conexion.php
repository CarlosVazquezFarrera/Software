<?php
class Conexion{
	private $conn;
	private $host = 'localhost';
	private $usuario = 'veterinaria';
	private $pass = '12345';
	private $base  = "veterinaria";

	public function getConnection(){
		$this->conn = new PDO("mysql:host=$this->host; dbname=$this->base;",$this->usuario, $this->pass);
		return $this->conn;
	}
}

?>