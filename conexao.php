<?php

	class Conexao{

		private $host = "localhost";
		private $dbname = "help_desk";
		private $user = "root";
		private $pass = "";

		//$pdo = new PDO('mysql:host=localhost; dbname=base_teste;', 'root', '');

		public function conectar(){

			try{

				$conexao = new PDO(

					"mysql:host=$this->host; dbname=$this->dbname;",
					"$this->user",
					"$this->pass"
				);

				return $conexao;

			} catch(PDOException $e){

				echo '<p>'.$e->getMessage().'</p>';

			}

		}
	}
?>