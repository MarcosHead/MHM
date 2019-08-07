<?php

	define("HOST", "fdb22.awardspace.net"); 
	define("USER", "2838342_ppi");
	define("PASSWORD", "marquim123"); 
	define("DATABASE", "2838342_ppi");

	class Imovel 
	{
		public $id_imovel;
		public $codigo_anuncio;
		public $FUNCIONARIO_PESSOA_cpf;
		public $valor;
		public $cep;
		public $rua_avenida;
		public $nro_casa;
		public $bairro;
		public $cidade;
		public $estado;
		public $data_construcao;
		public $area;
		public $qtd_quartos;
		public $qtd_suites;
		public $qtd_salas_de_estar;
		public $qtd_vagas_garagem;
		public $armario_embutido;
		public $descricao;
		public $portaria24h;
		public $valor_condominio;
		public $andar;
		public $tipo;
		public $status_imovel;

	}

	function conectaAoMySQL()
	{
		$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
		if ($conn->connect_error)
		throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);

		return $conn;   
	}

	function filtraEntrada($dado) 
	{
		$dado = trim($dado);               // remove espaços no inicio e no final da string
		$dado = stripslashes($dado);       // remove contra barras: "cobra d\'agua" vira "cobra d'agua"
		$dado = htmlspecialchars($dado);   // caracteres especiais do HTML (como < e >) são codificados

		return $dado;
	}

?>