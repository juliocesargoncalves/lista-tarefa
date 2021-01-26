<?php


	require "conexao.php";
	require "tarefa.model.php";
	require "tarefa.service.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir'){

		$tarefa = new Tarefa();

		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);

		$tarefaService->insert();

		header("Location:nova_tarefa.php?resultado=1");


	}else if($acao == "recuperar"){

		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->get_all();

	}else if($acao == "update"){

		$tarefa = new Tarefa();

		$tarefa->__set('id',$_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new tarefaService($conexao, $tarefa);

		$tarefaService->update();

		header("Location:todas_tarefas.php?resultado=1");

	}else if($acao == "mudar"){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);

		$tarefaService->mudarStatus();

		header("Location:todas_tarefas.php");

	} else if($acao == "remover"){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remove();

		header("Location:todas_tarefas.php");

	}else if($acao == "recuperarEspecifico"){

		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->buscaEspecifica();

	}

		



?>