<!-- página que realiza a exclusão do produto -->
<!-- Importação de página a serem utilizadas (dbConect para gerar conexão com banco e menuOpcoes que é o cabeçalho da página) -->
<? include("menuOpcoes.php"); ?>
<? include("dbConnect.php"); ?>

<?
	//Recebimento do id do produto a ser excluido (id do produto selecionado na tabela)
	$id = $_POST['id'];
	
	//String com comando de delete do bd através do id do produto recebido
	$sql = "delete from produto where id_prod = $id";
	
	//Execução da query e atribuição do resultado booleano para a variavel exlui, que irá fazer testes para constar o sucesso na operação
	$exclui = mysql_query($sql,$con);
	
	//Estrutura de decisão que analisa o resultado da operação e verifica se tudo ocorreu bem ou não.
	if($exclui){
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi bem sucedida -->
		<div class="alert alert-success">
		Exclusão realizada com sucesso!
		</div>
<?
	} else {
?>
		<!-- Alerta de mensagem do bootstrap para informar que a ação foi mal sucedida -->
		<div class="alert alert-error">
		Falha na exclusão!
		</div>
<?
	}
	//Fechamento da conexão com o banco
	mysql_close();

?>
