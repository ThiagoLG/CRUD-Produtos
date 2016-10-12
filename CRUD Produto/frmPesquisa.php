<!-- formulário que recebe as informações para ser realizada a pesquisa do produto -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CRUD Produtos </title>
	<!-- meta definido com charset UTF-8 para funcionamento de acentos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="js/bootstrap.min.js"></script>
	<!-- scripts de máscara JQuery -->
	<script type="text/javascript" src="js/jquery.min.js"> </script>
	<script type="text/javascript" src="js/jquery.maskMoney.js"> </script>
	
	 <script type="text/javascript">
    $(function(){
		$("#preco").maskMoney({thousands:'', decimal:'.', symbolStay: true});
	})
    </script>
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
		<h1>Pesquisar produtos</h1>
	</div>
	<!-- Form com os campos a serem preenchidos para a pesquisa. Aciona a pagina pesquisar através do metodo post, que irá enviar as informações para realizar a pesquisa -->
	<form action="pesquisar.php" method="post">
			<table align="center">
				<tr>
					<td> ID </td>
					<td> <input type="number" name="id" min="1" /> </td>
				</tr>
				<tr>
					<td> Descrição </td>
					<td> <input type="text" name="descricao" maxlength="255" /> </td>
				</tr>
				<tr>
					<td> Quantidade</td>
					<td> <input type="number" name="quantidade" maxlength="4" min="0" max="9999" /> </td>
				</tr>
				<tr>
					<td> Preço (R$)</td>
					<td> <input type="text" id="preco" name="preco"/> </td>
				</tr>
				<tr>
					<td> <input type="submit" value="Pesquisar" class="btn btn-info"/></td>
					<td> <input type="reset" value="Limpar"class="btn"/></td>
				</tr>
			</table>
</body>
</html>


