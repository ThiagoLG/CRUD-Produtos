<!-- página que realiza a pesquisa através dos dados obtidos no formulário de pesquisa -->
<!-- import da conexão com o banco de dados -->
<? include ("dbConnect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- style para esconder campos -->
<style>
.hidden {
  display: none !important;
}
</style>
	<!-- meta definido com charset UTF-8 para funcionamento de acentos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<title>CRUD Produtos </title>
</head>
<body>
	<!-- Div html com o navBar do bootstrap para montagem do menu de navegação -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<a class="brand" href="index.php">CRUD Produtos</a>
			<ul class="nav">
				<li><a href="frmCadastro.php">Cadastrar</a></li>
				<li class="active"><a href="frmPesquisa.php">Pesquisar/Deletar</a></li>
				<li><a href="frmAtualizacao.php">Atualizar</a></li>
			</ul>
		</div>
	</div>
	<br><br><br>
	<!-- Div com o page-header do bootstrap para título da página -->
	<div class="page-header" align="center">
				<h1>Resultado da pesquisa</h1>
	</div>
	
	<?
	//Recebimento das informações do formulário de pesquisa para poder realizar a busca. Recebidos via post.
	$id = $_POST['id'];
	$descricao = $_POST['descricao'];
	$quantidade = $_POST['quantidade'];
	$preco = $_POST['preco'];

	//Estrutura que verifica qual campo foi preechido pra realizar a busca, tendo como ordem de prioridade o ID, descricao, quantidade e preco, onde se um estiver vazio
	//A busca é realizada pelo próximo, e caso todos estejam vazios, a busca é geral
	if($id != ""){
		$sql = "select * from produto where id = $id";
	}else if($descricao != ""){
		$sql = "select * from produto where descricao like '%$descricao%'";
	}else if($quantidade != ""){
		$sql = "select * from produto where quantidade = $quantidade";
	}else if($preco != ""){
		$sql = "select * from produto where preco = $preco";
	}else{
		$sql = "select * from produto";
	}
	
	//Execução da string de busca no banco
	$pesquisa = mysql_query($sql,$con);
?>	
	<!-- Criação da tabela que receberá o resultado da pesquisa. Tabela utilizando o table-striped do bootstrap -->
	<table class="table table-striped" >
		<tr>
			<th>ID</th>
			<th>Descrição</th>
			<th>Quantidade </th>
			<th>Preço </th>
			<th> - </th>

<?	
	//Verificação se há resultados da pesquisa apra serem adicionados na tabela
	if($pesquisa){
		while($produto = mysql_fetch_array($pesquisa)) { ?>
			<!-- form que adiciona os itens na tabela e cria para cada um o botão de exclusão, que por usa vez chama a pagina excluir, passando via post o id do produto -->
			<form action="excluir.php" method="post">
				<tr>
					<td>
						<?= $produto['id_prod'] ?>
						<input type="number" name="id" value="<?= $produto['id_prod'] ?>" class="hidden"/>
					</td>
					<td><?= $produto['descricao'] ?></td>
					<td><?= $produto['quantidade'] ?></td>
					<td><?= $produto ['preco'] ?></td>
					<td class="danger"><input type="submit" value="excluir" class="btn btn-danger"/></td>
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
		<!-- url's do bootstrap e do JQuery -->
	    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
