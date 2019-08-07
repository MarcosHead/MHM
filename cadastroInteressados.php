<?php
try
{
	require "funcoes.php";
	$conn = conectaAoMySQL();

	$saida = "";
	
	if (isset($_POST["id_imovel"]))
	{
		$id_imovel         = filtraEntrada($_POST['id_imovel']);
		$nome              = filtraEntrada($_POST['nome']);
		$email             = filtraEntrada($_POST['email']);
		$ddd               = filtraEntrada($_POST['ddd']);
		$telefone          = filtraEntrada($_POST['telefone']);
		$descricaoProposta = filtraEntrada($_POST['descricaoProposta']);
		
		$SQL = "INSERT INTO INTERESSADOS (IMOVEL_id_imovel, nome, email, ddd, numero, descricao) VALUES ('$id_imovel', '$nome', '$email', '$ddd', '$telefone', '$descricaoProposta')";
		
		if (! $result = $conn->query($SQL))
			throw new Exception('Ocorreu uma falha ao inserir a proposta: ' . $conn->error);
		else
			$saida = "<b class='bg-success text-success'>PROPOSTA REALIZADA COM SUCESSO.</b>";

		echo $saida;
	}
}
catch (Exception $e)
{
	// altera o código de retorno de status para '500 Internal Server Error'.
	// A função http_response_code deve ser chamada antes do script enviar qualquer
	// texto para a saída padrão 
	http_response_code(500); 
	
	$msgErro = "<b class='bg-danger text-danger'>".$e->getMessage()."</b>";
	echo $msgErro;
}

if ($conn != null)
	$conn->close();

?>