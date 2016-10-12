<!-- página que carrega a o formulário com os dados do produto a ser alterado -->
<!-- Import da conexão com o banco de dados -->
<? include("dbConnect.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- meta definido com charset UTF-8 para funcionamento de acentos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
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
				<h1>Atualizar produtos</h1>
	</div>
<?
	//Recebimento do id do produto a ser atualizado (id do produto selecionado na tabela)
	$id = $_POST['id'];
	
	//string para selecionar o produto com o referido id
	$sql = "select * from produto where id_prod = $id";
	
	//execução da query e atribuição do resultado em uma variavel para verificar se foi bem sucedida a ação
	$pesquisa = mysql_query($sql,$con);
	
	//Estrutura para verificar se há algum retorno da pesquisa realizada
	if($produto = mysql_fetch_array($pesquisa)) { ?>
			<!-- formulario que vai receber as informações do produto a ser alterado (aciona a pagina de atualização através do método post) -->
			<form action="atualizar.php" method="post">
				<table align="center">
				<tr>
					<td>ID</td>
					<td><input type="number" name="id" value="<?= $produto['id_prod'] ?>" required="true" readonly="true" /></td>
				</tr>
				<tr>
					<td>Descrição</td>
					<td><input type="text" name="descricao" value="<?= $produto['descricao'] ?>"  required="true" /></td>
				</tr>
				<tr>
					<td>Quantidade</td>
					<td><input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>"  required="true" /></td>
				</tr>
				<tr>
					<td>Preço</td>
					<td><input type="text" name="preco" value="<?= $produto['preco'] ?>"  required="true" /></td>
				</tr>
				<tr>					
					<td><input type="submit" value="Gravar" class="btn btn-warning"/></td>
				</tr>
				</table>
			</form>
<?
	}
	//Fechamento da conexão com o banco de dados
	mysql_close();
		
?>
	<!-- urls Jquery e bootstrap -->
	<script src="http://code.jquery.com/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>