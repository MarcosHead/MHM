<?php

class Endereco 
{
  public $rua;
  public $cidade;
  public $bairro;
  public $estado;
}

try
{
	require "funcoes.php";
	$conn = conectaAoMySQL();

	$endereco = "";
	$cep = "";
	if (isset($_POST["cep"]))
		$cep = $_POST["cep"];

	$SQL = "
		SELECT rua_avenida, bairro, cidade, estado
		FROM CEP
		WHERE cep = '$cep';
	";

	if (! $result = $conn->query($SQL))
		throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);

	if ($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();

		$endereco = new Endereco();

		$endereco->rua_avenida    	= $row["rua_avenida"];
		$endereco->bairro 			= $row["bairro"];
		$endereco->cidade 			= $row["cidade"];
		$endereco->estado			= $row["estado"];
	}
	
	$jsonStr = json_encode($endereco);
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