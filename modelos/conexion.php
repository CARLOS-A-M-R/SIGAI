<?php 

class Conexion
{

	
		private $db = "bd_inbursa";
		private $charset = "utf8";
		private $usuario = "DBASIGAI";
		private $contrasena = "#seguridad2020";
		public $pdo = null;
		private $opciones = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
		
		function __construct()
		{
			$this->pdo = new PDO("mysql:host=192.168.1.72:3306;dbname={$this->db};charset={$this->charset}", $this->usuario, $this->contrasena, $this->opciones);
		}
		
			public function getdb():string
			{
				return $this->db;
			}
	
			public function getCharset():string
			{
				return $this->charset;
			}
	
			public function getUsuario():string
			{
				return $this->usuario;
			}
	
			public function getContrasena():string
			{
				return $this->contrasena;
			}


			static public function conectar()
			{

				$conexion = new PDO("mysql:host=192.168.1.72:3306;dbname=bd_inbursa",
									"DBASIGAI",
									"#seguridad2020");

				$conexion->exec("set names utf8");

				return $conexion;

			}
}

 ?>