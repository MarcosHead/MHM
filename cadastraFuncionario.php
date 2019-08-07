<?php

// Inclui o arquivo com os dados e funções de conexão
require "funcoes.php";

// Valida uma string removendo alguns caracteres
// especiais que poderiam ser provenientes
// de ataques do tipo HTML/CSS/JavaScript Injection

$msgErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
  // Define e inicializa as variáveis
  $nome = $cpf = $cargo = $data_ingresso = $salario = $telefone_contato = $telefone_celular = $outro_telefone = $cep = $rua_avenida = $nro_casa = $bairro = $cidade = $estado = $login = $senha = "";
  
  $nome             = filtraEntrada($_POST["nome"]);
  $cpf              = filtraEntrada($_POST["cpf"]);
  $cargo            = filtraEntrada($_POST["cargo"]);
  $data_ingresso    = filtraEntrada($_POST["data_ingresso"]);     
  $salario          = filtraEntrada($_POST["salario"]);
  $telefone_contato = filtraEntrada($_POST["telefone_contato"]);
  $telefone_celular = filtraEntrada($_POST["telefone_celular"]);
  $outro_telefone   = filtraEntrada($_POST["outro_telefone"]);
  $cep              = filtraEntrada($_POST["cep"]);
  $rua_avenida      = filtraEntrada($_POST["rua_avenida"]);
  $nro_casa         = filtraEntrada($_POST["nro_casa"]);
  $bairro           = filtraEntrada($_POST["bairro"]);
  $cidade           = filtraEntrada($_POST["cidade"]);
  $estado           = filtraEntrada($_POST["estado"]);
  $login            = filtraEntrada($_POST["login"]);
  $senha            = filtraEntrada($_POST["senha"]);

  try
	{    
    // Função definida no arquivo conexaoMysql.php
    $conn = conectaAoMySQL();

    $conn->begin_transaction();

    $sql = "
      INSERT INTO PESSOA (nome, cpf, telefone_contato, cep, rua_avenida, nro_casa, bairro, cidade, estado)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";

    $sql2 = "
      INSERT INTO FUNCIONARIO (PESSOA_cpf, cargo, data_ingresso, salario, telefone_celular, outro_telefone, login, senha)
      VALUES (?, ?, ?, ?, ?, ?, ?, md5(?));
    ";

    //Prepared Statments 1
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);

    if (! $stmt->bind_param("sssisisss", $nome, $cpf, $telefone_contato, $cep, $rua_avenida, $nro_casa, $bairro, $cidade, $estado))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
        
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    //Prepared Statments 2
    if (! $stmt = $conn->prepare($sql2))
      throw new Exception("Falha na operacao prepare: " . $conn->error);

    if (! $stmt->bind_param("sssdssss", $cpf, $cargo, $data_ingresso, $salario, $telefone_celular, $outro_telefone, $login, $senha))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
        
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    $conn->commit();
    
    $formProcSucesso = true;
  }
	catch (Exception $e)
	{
    $conn->rollback();
		$msgErro = $e->getMessage();
	}
}
  
?>

<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {  
    if ($msgErro == "")
      echo "<h3 class='text-success'>Dados armazenados com sucesso!</h3>";
    else
      echo "<h3 class='text-danger'>Cadastro não realizado: $msgErro</h3>";
  }
?>

</body>
</html>