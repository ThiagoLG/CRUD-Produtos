<!-- página com tabela que mostra o resultado da pesquisa e permite a alteração de dados -->
<!-- import da conexão com o banco de dados -->
<? include("dbConnect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- meta definido com charset UTF-8 para funcionamento de acentos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- Style para ocultar campos -->
	<style>
	.hidden {
		display: none !important;
	}
	</style>
<title>CRUD Produtos</title>
</head>
<body>
	<!-- Div html com o navBar do bootstrap para montagem do menu de navegação -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<a class="brand" href="index.php">CRUD Produtos</a>
			<ul class="nav">
				<li><a href="frmCadastro.php">Cadastrar</a></li>
				<li><a href="frmPesquisa.php">Pesquisar/Deletar</a></li>
				<li class="active"><a href="frmAtualizacao.php">Atualizar</a></li>
			</ul>
		</div>
	</div>
	<br><br><br>
	<!-- Div com o page-header do bootstrap para título da página -->
	<div class="page-header" align="center">
				<h1>Resultado da pesquisa</h1>
				<p>Selecione um produto para editar
	</div>
				
		<?
			//Recebimento dos parametros para realizar a busca, informado através do formulario pelo método post
			$id = $_POST['id'];
			$descricao = $_POST['descricao'];
			
			//Estruturas de decisão que verifica qual campo foi preenchido para executar a busca.
			//É dada prioridade para o ID, porém se estiver vazio, a consulta será pela descricao, e caso também esteja vazia, faz uma pesquisa geral
			if($id != ""){
				$sql = "select * from produto where id_prod = $id";
			}else if($descricao != ""){
				$sql = "select * from produto where descricao like '%$descricao%'";
			}else{
				$sql = "select * from produto";
			}
			
			//Execução da query e atribuição do resultado booleano na variavel pesquisa pra verificar se foi bem sucedida a operação
			$pesquisa = mysql_query($sql,$con);
?>
			<!-- Criação da tabela para mostrar os resultados, utilizando o table-striped do bootstrap -->
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Descrição</th>
					<th>Quantidade </th>
					<th>Preço </th>
					<th> - </th>
<?			
			//Verificação se a pesquisa retornou algo para poder assim preencher a tabela
			if($pesquisa){
				while($produto = mysql_fetch_array($pesquisa)) { 
?>
			<!-- form adiciona os itens na tabela, incluindo o botão de edição que aciona a pagina carregarAtualizacao via post -->
			<form action="carregarAtualizacao.php" method="post">
				<tr>
					<td>
						<?= $produto['id_prod'] ?>
						<input type="number" name="id" value="<?= $produto['id_prod'] ?>" class="hidden"/>
					</td>
					<td><?= $produto['descricao'] ?></td>
					<td><?= $produto['quantidade'] ?></td>
					<td><?= $produto ['preco'] ?></td>
					<td><input type="submit" value="editar" class="btn btn-warning"/></td>
				</tr>
			</form>
<?
		}
	}else{
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi mal sucedida -->
		<div class="alert alert-error">
		Não foram encontrados dados com as informações dadas!
		</div>
<?
	}
		//fechamento da conexão com o banco de dados
		mysql_close();	
		?>
		</table>
	<!-- urls JQuery e bootstrap -->
	<script src="http://code.jquery.com/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>