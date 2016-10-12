<!-- formulário para realizar a pesquisa do produto a ser alterado -->
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
		<!-- Form que contem os campos de ID e descricao, e aciona a pagina listaAtualizar através do método post, enviando os parametros para ser realizada a pesquisa -->
		<form action="listaAtualizar.php" method="post">
			<table align="center">
				<tr>
					<td>ID</td>
					<td><input type="number" name="id" min="1"/> </td>
				</tr>
				<tr>
					<td>Descrição</td>
					<td><input type="text" name="descricao" maxlength="255"/> </td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-info" value="Pesquisar" /></td>
					<td><input type="reset" class="btn" value="Limpar"/> </td>
				</tr>
			</table>
		</form>
	<!-- urls JQuery e bootstrap -->
	<script src="http://code.jquery.com/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>