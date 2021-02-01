<?php 
$acao = 'recuperar';
require 'tarefa_controller.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <script>
			function editar(id, txt_nome, txt_cpf, txt_email) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = 'tarefa_controller.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'nome'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_usuario

				//criar um input hidden para guardar o id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluir inputTarefa no form
				form.appendChild(inputTarefa)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//teste
				//console.log(form)

				//selecionar a div tarefa
				let tarefa = document.getElementById('dados_'+id)

				//limpar o texto da tarefa para inclusão do form
				tarefa.innerHTML = ''

				//incluir form na página
				tarefa.insertBefore(form, tarefa[0])

			} 
			</script>

 <title>CRUD-Usuários</title>

 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Crud Usuários</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#">In&iacute;cio</a></li>
    </ul>
   </div>
  </div>
 </nav>

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Usuários</h2>
		</div>
		<div class="col-sm-6">
		<?php
			if(isset($_GET['removido']) && $_GET['removido'] == 'usuario_deletado'){ ?>
				<div class="alert alert-danger" role="alert">Deletado com sucesso</div>
			<?php } ?>
		
			
		</div>
		<div class="col-sm-3">
			<a href="add.php" class="btn btn-primary pull-right h2">Novo Item</a>
		</div>
	</div> <!-- /#top -->
 
 
	 <hr />
	 
<?php foreach ($tarefas as $key => $valor) { ?>
		
	 
<div id="list" class="row">
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Cpf</th>
					<th>Cadastro</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					
					<td><?php echo $valor->id ?></td>
					<td><?php echo $valor->nome ?></td>
					<td><?php echo $valor->email ?></td>
					<td><?php echo $valor->cpf ?></td>
					<td><?php echo $valor->cadastro ?></td>
					<td class="actions">
					<!--	<a class="btn btn-success btn-xs" href="view.html">Visualizar</a> -->
						<a class="btn btn-warning btn-xs" onclick="editar(<?php $valor->id ?>, '<?php $valor->nome ?>', , '<?php $valor->cpf ?>' , '<?php $valor->email ?>' , '<?php $valor->cadastro ?>')">Editar</a>
						<a class="btn btn-danger btn-xs"  href="tarefa_controller.php?acao=remover&id=<?php echo $valor->id ?>" >Excluir</a>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
	
	</div> <?php } ?> <!-- /#list -->
	
<!-- /#main -->


     


 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>