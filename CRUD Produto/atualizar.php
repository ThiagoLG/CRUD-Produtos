<!-- página que realiza a atualização do produto -->
<!-- Importação de página a serem utilizadas (dbConect para gerar conexão com bancco e menuOpcoes que é o cabeçalho da página) -->
<? include("dbConnect.php"); ?>
<? include("menuOpcoes.php"); ?>

<?
	//Recebimento dos valores do inputText para variaveis php através do método post
	$id = $_POST['id'];
	$descricao = $_POST['descricao'];
	$quantidade = $_POST['quantidade'];
	$preco = $_POST['preco'];
	
	//Linha com a string de comando com o banco de dados (no caso update para atualizar o produto)
	$sql = "update produto set descricao='$descricao', quantidade=$quantidade, preco=$preco where id_prod = $id";
	
	//Execução da query e atribuição do resultado booleano para a variavel atualiza, que irá fazer testes para constar o sucesso na operação
	$atualiza = mysql_query($sql, $con);
	
	//Estrutura if para verificar se a operação foi realizada (caso true: deu certo, caso false: deu errado)
	if($atualiza){
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi bem sucedida -->
		<div class="alert alert-success">
		Atualização realizada com sucesso!
		</div>
<?
	}else{
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi mal sucedida -->
		<div class="alert alert-error">
		Falha na atualização!
		</div>
<?
	}
	
	//Fechamento da conexão com o banco
	mysql_close();

?>