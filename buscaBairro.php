<?php
try
{
	require "funcoes.php";
	$conn = conectaAoMySQL();

	$bairro = [];
	
	if (isset($_POST["status"]))
		$status = filtraEntrada($_POST["status"]);

	
	$SQL = "SELECT DISTINCT bairro FROM IMOVEL WHERE status_imovel='$status';";
	
	if (! $result = $conn->query($SQL))
		throw new Exception('Ocorreu uma falha ao buscar os bairros: ' . $conn->error);
	if ($result->num_rows > 0)
	{
		for($i = 0; $row = $result->fetch_assoc(); $i++){
			$bairro[$i] = $row['bairro'];
		}
	}

	$jsonStr = json_encode($bairro);
	echo $jsonStr;
}
catch (Exception $e)
{
	// altera o código de retorno de status para '500 Internal Server Error'.
	// A função http_response_code deve ser chamada antes do script enviar qualquer
	// texto para a saída padrão 
	http_response_code(500); 
	
	$msgErro = $e->getMessage();
	echo $msgErro;
}

if ($conn != null)
	$conn->close();

?>