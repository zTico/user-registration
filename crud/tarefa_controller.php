<?php
    require "../crud/tarefa.model.php";
	require "../crud/tarefa.service.php";
	require "../crud/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('nome', $_POST['nome']);
        $tarefa->__set('email', $_POST['email']);
        $tarefa->__set('cpf', $_POST['cpf']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();
        
		header('Location: ../crud_public/add.php?inserido=usuario_adicionado');
    } 
    elseif($acao == 'recuperar'){
        $tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
    } 
    elseif($acao = 'remover'){
        
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        header('Location: ../crud_public/index.php?removido=usuario_deletado');
    }