<?php

	class TarefaService{

		private $conexao;
		private $tarefa;
	

		public function __construct(Conexao $conexao, Tarefa $tarefa){

			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
			
		}

		public function insert(){

			$query = 'INSERT INTO tb_tarefas (tarefa) VALUES (:ta)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':ta', $this->tarefa->__get('tarefa'));
			$stmt->execute();
		}

		public function get_all(){

			$query = 'SELECT id,id_status,tarefa FROM tb_tarefas ';
			$stmt  = $this->conexao->prepare($query);
			$stmt->execute(); 
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

		public function update(){

			$query = 'UPDATE tb_tarefas set tarefa = :ta WHERE id = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':ta', $this->tarefa->__get('tarefa'));
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			return $stmt->execute();

		}

		public function remove(){

			$query = 'DELETE FROM tb_tarefas WHERE id = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			return $stmt->execute();

			
		}

		public function mudarStatus(){

			$query = 'UPDATE tb_tarefas set id_status = :status WHERE id = :id';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':status', $this->tarefa->__get('id_status'));
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			return $stmt->execute();
		}

		public function buscaEspecifica(){

			$query = 'SELECT id,id_status,tarefa FROM tb_tarefas WHERE id_status = 1 ';
			$stmt  = $this->conexao->prepare($query);
			$stmt->execute(); 
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}

	}
?>