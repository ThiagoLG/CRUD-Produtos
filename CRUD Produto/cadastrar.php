<!-- Página que realiza o cadastro de produtos -->
<!-- Importação de página a serem utilizadas (dbConect para gerar conexão com bancco e menuOpcoes que é o cabeçalho da página) -->
<? include("menuOpcoes.php"); ?>
<? include("dbConnect.php"); ?>

<?
	//Recebimento dos valores do inputText para variaveis php através do método post
	$descricao = $_POST['descricao'];
	$quantidade = $_POST['quantidade'];
	$preco = $_POST['preco'];
	
	//String para realizar o insert no banco de dados através dos dados obtidos do formulário e recebidos nas variaveis
	$sql = "insert into produto (descricao, quantidade, preco) values ('$descricao',$quantidade,$preco)";
	
	//execução da query e atribuição de sua resposta a uma variavel para realizar testes de o produto foi realmente inserido
	$cadastro = mysql_query($sql,$con);

	//Estrutura para verificar se o insert foi bem sucedido, através da resposta obtida na variavel $cadastro
	if($cadastro){
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi bem sucedida -->
		<div class="alert alert-success">
		Cadastro realizado com sucesso!
		</div>
<?
	} else {
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi mal sucedida -->
		<div class="alert alert-error">
		Falha no cadastro!
		</div>
<?
	}
	//fechamento da conexão com o banco
	mysql_close();

?>
