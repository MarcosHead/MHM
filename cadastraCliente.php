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
  $nome = $cpf = $sexo = $email = $ddd = $profissao = $telefone_contato = $estado_civil = $cep = $rua_avenida = $nro_casa = $bairro = $cidade = $estado = "";
  
  $nome             = filtraEntrada($_POST["nome"]);
  $cpf              = filtraEntrada($_POST["cpf"]);
  $sexo             = filtraEntrada($_POST["sexo"]);     
  $email            = filtraEntrada($_POST["email"]);
  $ddd              = filtraEntrada($_POST["ddd"]);
  $telefone_contato = filtraEntrada($_POST["telefone_contato"]);
  $profissao        = filtraEntrada($_POST["profissao"]);
  $estado_civil     = filtraEntrada($_POST["estado_civil"]);
  $cep              = filtraEntrada($_POST["cep"]);
  $rua_avenida      = filtraEntrada($_POST["rua_avenida"]);
  $nro_casa         = filtraEntrada($_POST["nro_casa"]);
  $bairro           = filtraEntrada($_POST["bairro"]);
  $cidade           = filtraEntrada($_POST["cidade"]);
  $estado           = filtraEntrada($_POST["estado"]);

  try
	{    
    // Função definida no arquivo conexaoMysql.php
    $conn = conectaAoMySQL();

    $conn->begin_transaction();

    $sql = "
      INSERT INTO PESSOA (nome, cpf, sexo, email, ddd, telefone_contato, profissao, estado_civil, cep, rua_avenida, nro_casa, bairro, cidade, estado)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ";

    $sql2 = "
        INSERT INTO CLIENTE_PROPRIETARIO (PESSOA_cpf)
        VALUES (?);
    ";
    //Prepared Statments 1
    if (! $stmt = $conn->prepare($sql))
      throw new Exception("Falha na operacao prepare: " . $conn->error);

    if (! $stmt->bind_param("ssssisssisisss", $nome, $cpf, $sexo, $email, $ddd, $telefone_contato, $profissao, $estado_civil, $cep, $rua_avenida, $nro_casa, $bairro, $cidade, $estado))
      throw new Exception("Falha na operacao bind_param: " . $stmt->error);
        
    if (! $stmt->execute())
      throw new Exception("Falha na operacao execute: " . $stmt->error);

    //Prepared Statments 2
    if (! $stmt = $conn->prepare($sql2))
      throw new Exception("Falha na operacao prepare: " . $conn->error);

    if (! $stmt->bind_param("s", $cpf))
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