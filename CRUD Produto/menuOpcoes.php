<!-- menu de opções geral, nesse não há nenhuma opção selecionada como ativada -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
				<li><a href="frmPesquisa.php">Pesquisar/Deletar</a></li>
				<li><a href="frmAtualizacao.php">Atualizar</a></li>
			</ul>
		</div>
	</div>
	<br><br><br>
		<!-- urls JQuery e bootstrap -->
	    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>