<?php
	class Conexion extends PDO
	{
		private $hostBd = 'localhost';
		private $nombreBd = 'id20503062_zapatec';
		private $usuarioBd = 'id20503062_zapateria';
		private $passwordBd = '';
        private $port = '3306';
		
		public function __construct()
		{
			try{
				parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';charset=utf8' . ';port='.$this->port, $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
				} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}
?>