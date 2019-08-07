<?php
try
{
	require "funcoes.php";

	if (isset($_POST["id_imovel"]))
	{
		$saida='';
		$id_imovel = filtraEntrada($_POST["id_imovel"]);
		$conn = conectaAoMySQL();
		
		$sql = "SELECT * FROM IMOVEL WHERE id_imovel='$id_imovel';";
		
		if (! $result = $conn->query($sql))
			throw new Exception('Ocorreu uma falha ao buscar os bairros: ' . $conn->error);
	
		$saida .="
			<div class='table-responsive'>
				<table class='table table-striped table-hover'>
		";	

		while($row = $result->fetch_assoc())
		{
			$saida.="
				<tbody>
					<tr><td><b>Área:</b></td><td>".$row['area']." m².</td></tr>
					<tr><td><b>CEP:</b></td><td>".$row['cep'].".</td></tr>
					<tr><td><b>Estado:</b></td><td>".$row['estado'].".</td></tr>
					<tr><td><b>Bairro:</b></td><td>".$row['bairro'].".</td></tr>
					<tr><td><b>Rua/Avenida:</b></td><td>".$row['rua_avenida'].".</td></tr>
					<tr><td><b>Número:</b></td><td>".$row['nro_casa'].".</td></tr>

			";

			if($row['tipo'] == 'Apartamento')
			{
				$saida .= "
					<tr>
						<td><b>Andar:</b></td>
						<td>".$row['andar'].".</td>
					</tr>
					<tr>
						<td><b>Valor Condomínio:</b></td>
						<td>R$ ".$row['valor_condominio'].".</td>
					</tr>";
			}

			$saida.="
				<tr><td><b>Preço:</b></td><td>R$ ".$row['valor'].".</td></tr>
				<tr><td><b>Data da Construção:</b></td><td>".$row['data_construcao'].".</td></tr>
				<tr><td><b>Quantidade de Quartos:</b></td><td>".$row['qtd_quartos'].".</td></tr>
				<tr><td><b>Quantidade de Suítes:</b></td><td>".$row['qtd_suites'].".</td></tr>
				<tr><td><b>Quantidade de Salas de Estar:</b></td><td>".$row['qtd_salas_de_estar'].".</td></tr>
				<tr><td><b>Quantidade de Garagens:</b></td><td>".$row['qtd_vagas_garagem'].".</td></tr>
			";

			if($row['tipo'] == 'Apartamento')
			{
				$saida.= "
					<tr>
						<td><b>Armários Embutidos:</b></td>
						<td>
				";
					if($row['armario_embutido'] == '1') $saida.= "Sim.";
					else $saida.= "Não.";
				
				$saida.= "
						</td>
					</tr>
					<tr>
						<td><b>Portaria 24 horas:</b></td>
						<td>
				";
				if($row['portaria24h'] == '1') $saida.= "Sim.";
				else $saida.= "Não.";
				
				$saida.= "
						</td>
					</tr>
				";
			}

			$saida.= "
				<tr>
					<td><b>Descrição:</b></td>
					<td>
			";
						if($row['descricao'] != '') $saida.= $row['descricao'];
						else $saida.= "Não possui.";
			$saida.= "
					</td>
				</tr>
			";	
		}
		$saida.= "
					</tbody>
			</table>
			<p align='center'>  
				<img class='fotos2 img-fluid' src='imagens/apart4.jpg'> <br>
				<img class='fotos2' src='imagens/apart5.jpg'> <br>
				<img class='fotos2' src='imagens/apart6.jpg'> 
			</p>
			</div>
		";
		echo $saida;
	}
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