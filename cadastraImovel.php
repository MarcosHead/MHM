<?php

require "funcoes.php";

$msgErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  // Define e inicializa as variáveis
  $tipo = $area = $cep = $rua_avenida = $nro_casa = $bairro = $cidade = $estado = $andar = $valor = $portaria24h = $quartos = $suites = $salas_estar = $jantar = $vagas = $armario = $descricao = "";
  
  $tipo             = filtraEntrada($_POST["tipo"]);
  $cpf              = filtraEntrada($_POST["area"]);
  $cep              = filtraEntrada($_POST["cep"]);
  $rua_avenida      = filtraEntrada($_POST["rua_avenida"]);
  $nro_casa         = filtraEntrada($_POST["nro_casa"]);
  $bairro           = filtraEntrada($_POST["bairro"]);
  $cidade           = filtraEntrada($_POST["cidade"]);
  $estado           = filtraEntrada($_POST["estado"]);
  $andar            = filtraEntrada($_POST["andar"]);
  $valor            = filtraEntrada($_POST["valor"]);
  $portaria24h      = filtraEntrada($_POST["portaria24h"]);
  $quartos          = filtraEntrada($_POST["qtd_quartos"]);
  $suites           = filtraEntrada($_POST["qtd_suites"]);
  $salas_estar      = filtraEntrada($_POST["qtd_salas_de_estar"]);
  $jantar           = filtraEntrada($_POST["qtd_salas_de_jantar"]);
  $vagas            = filtraEntrada($_POST["qtd_vagas_garagem"]);
  $armario          = filtraEntrada($_POST["armario_embutido"]);
  $descricao        = filtraEntrada($_POST["descricao"]);
  $nome_arquivo     = filtraEntrada($_POST["nome_arquivo"]);




  try
  {    
    if(isset($_FILES["foto"])){
      $conn = conectaAoMySQL();

      $conn->begin_transaction();

      $sql = "
        INSERT INTO IMOVEL (tipo, id_imovel, area, cep, rua_avenida, nro_casa, bairro, cidade, estado, andar, valor, portaria24h, qtd_quartos, qtd_suites, qtd_salas_de_estar, qtd_salas_de_jantar, qtd_vagas_garagem, armario_embutido, descricao)
        VALUES (?, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
      ";

      $sql2 = "
        INSERT INTO foto (nome_arquivo, IMOVEL_id_imovel);
        VALUES (?, LAST_INSERT_ID());
      ";

      //Prepared Statments 1
      if (! $stmt = $conn->prepare($sql))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

      if (! $stmt->bind_param("siisisssiisiiiiiss", $tipo, $area, $cep, $rua_avenida, $nro_casa, $bairro, $cidade, $estado, $andar, $valor, $portaria, $quartos, $suites, $salas_estar, $jantar, $vagas, $armario, $descricao))
        throw new Exception("Falha na operacao bind_param: " . $stmt->error);
          
      if (! $stmt->execute())
        throw new Exception("Falha na operacao execute: " . $stmt->error);

      //Prepared Statments 2
      if (! $stmt = $conn->prepare($sql2))
        throw new Exception("Falha na operacao prepare: " . $conn->error);

      date_default_timezone_set('America/Sao_Paulo');

      $id_imovel = $conn->insert_id;

      foreach ($_FILES['foto']['error'] as $key => $error) {
        if($error == UPLOAD_ERR_OK){
          $dir = "imagens/";

          $ext = strtolower(substr($_FILES['foto']['name'][$key], -4));

          $nome_arquivo = $dir.date('Y.m.d-H.i.s') . '-' . $id_imovel . $ext;

          $tmp_name = $_FILES["foto"]["tmp_name"][$key];

          if(move_uploaded_file($tmp_name, $nome_arquivo)){
            if (! $stmt->bind_param("s", $nome_arquivo))
            throw new Exception("Falha na operacao bind_param: " . $stmt->error);
          
            if (! $stmt->execute())
            throw new Exception("Falha na operacao execute: " . $stmt->error);
          }
          else{
            throw new Exception("Não foi possível. " . $stmt->error);
          }
        }
      }

      $conn->commit();
      
      $formProcSucesso = true;
    }
    else{
      throw new Exception("Arquivos não enviados. ");
    }

    
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