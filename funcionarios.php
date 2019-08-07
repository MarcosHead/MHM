<?php 	
	session_start();
	include('login_check.php');	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>MHM Imóveis</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" type="image/x-icon" href="imagens/logo.png">
		<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="JS/script.js"></script>
	</head>

	<body class="corpo">
		
		<?php include "header.php"; ?>

		<?php include "navbarfun.php"; ?>

		<div class="aba container" id="cadFuncionarios">
			<form method="POST" action="cadastraFuncionario.php" name="form1">
				<div class="row">
					<div class="col-md-12">			
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nome:</label>
							<input type="text" name="nome" class="form-control">
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label for="cpf" class="col-form-label">CPF:</label>
							<input type="text" name="cpf" class="form-control">
						</div>			
					</div>

					<div class="col-md-6">			
						<div class="form-group">
							<label for="data" class="col-form-label">Data de Ingresso:</label>
							<input type="date" name="data_ingresso" class="form-control">
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label for="cargo" class="col-form-label">Cargo:</label>
							<input type="text" name="cargo" class="form-control">
						</div>			
					</div>

					<div class="col-md-6">			
						<div class="form-group">
							<label for="salario" class="col-form-label">Salário:</label>
							<input type="text" name="salario" class="form-control">
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-1">			
						<div class="form-group">
							<label for="DDD1" class="col-form-label">DDD:</label>
							<input type="text" name="DDD1" class="form-control">
						</div>			
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Telefone de Contato:</label>
							<input type="text" name="telefone_contato" class="form-control">	
						</div>
					</div>

					<div class="col-md-1">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">DDD:</label>
							<input type="text" name="DDD2" class="form-control">
						</div>			
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Telefone Celular:</label>
							<input type="text" name="telefone_celular" class="form-control">	
						</div>
					</div>

					<div class="col-md-1">			
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">DDD:</label>
							<input type="text" name="DDD3" class="form-control">
						</div>			
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Outro Telefone:</label>
							<input type="text" name="outro_telefone" class="form-control">	
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">			
						<div class="form-group">
							<label for="cep" class="col-form-label">CEP:</label>
							<input type="text" name="cep" class="form-control" onkeyup="buscaEndereco(this.value, 'form1')">
						</div>			
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label for="rua_avenida" class="col-form-label">Avenida/Rua:</label>
							<input type="text" name="rua_avenida" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="nro_casa" class="col-form-label">Número:</label>
							<input type="text" name="nro_casa"class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">			
						<div class="form-group">
							<label for="bairro" class="col-form-label">Bairro:</label>
							<input type="text" name="bairro" class="form-control">
						</div>
					</div>

					<div class="col-md-5">			
						<div class="form-group">
							<label for="cidade" class="col-form-label">Cidade:</label>
							<input type="text" name="cidade" class="form-control">
						</div>			
					</div>

					<div class="col-md-2">			
						<div class="form-group">
							<label for="estado" class="col-form-label">Estado:</label>
							<select class="custom-select mb-3 form-control" name="estado">
  								<option selected value="MG">MG</option>
  								<option value="SP">SP</option>
  								<option value="RJ">RJ</option>
							</select>
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">			
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Login:</label>
							<input type="text" name="login" class="form-control">
						</div>			
					</div>

					<div class="col-md-4">			
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Senha:</label>
							<input type="password" name="senha" class="form-control">
						</div>			
					</div>
				</div>

				<div class="row form-group centralizar">
					<div class="col-md-6 botao">
	 	 				<input type="submit" class="btn btn-success form-control" value="Cadastrar">
	    			</div>
	    			<div class="col-md-6 botao">
	    				<button type="button" class="btn btn-danger form-control">Cancelar</button>
	    			</div>
				</div>
				</div>

			</form>
		</div>

		<div class="aba container" id="cadClientes">
			<form action="cadastraCliente.php" method="POST" name="form2">
				<div class="row">
					<div class="col-md-12">			
						<div class="form-group">
							<label for="nome" class="col-form-label">Nome:</label>
							<input type="text" name="nome" class="form-control">
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label for="cpf" class="col-form-label">CPF:</label>
							<input type="text" name="cpf" class="form-control">
						</div>			
					</div>

					<div class="col-md-6">			
						<div class="form-group">
							<label for="sexo" class="col-form-label">Sexo:</label>
							<select class="custom-select mb-3 form-control" name="sexo">
  								<option selected value="M">Masculino</option>
  								<option value="F">Feminino</option>
							</select>
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label for="email" class="col-form-label">E-mail:</label>
							<input type="email" name="email" class="form-control">
						</div>			
					</div>

					<div class="col-md-2">			
						<div class="form-group">
							<label for="ddd" class="col-form-label">DDD:</label>
							<input type="text" name="ddd" class="form-control">
						</div>			
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="telefone_contato" class="col-form-label">Telefone de Contato:</label>
							<input type="text" name="telefone_contato" class="form-control">	
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="profissao" class="col-form-label">Profissão:</label>
							<input type="text" name="profissao" class="form-control">
						</div>			
					</div>

					<div class="col-md-6">			
						<div class="form-group">
							<label for="estado_civil" class="col-form-label">Estado Civil:</label>
							<select class="custom-select mb-3 form-control" name="estado_civil">
  								<option selected value="S">Solteiro</option>
  								<option value="C">Casado</option>
  								<option value="D">Divorciado</option>
							</select>
						</div>			
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">			
						<div class="form-group">
							<label for="cep" class="col-form-label">CEP:</label>
							<input type="text" name="cep" class="form-control" onkeyup="buscaEndereco(this.value, 'form2')">
						</div>			
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label for="rua_avenida" class="col-form-label">Avenida/Rua:</label>
							<input type="text" name="rua_avenida" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="nro_casa" class="col-form-label">Número:</label>
							<input type="text" name="nro_casa"class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">			
						<div class="form-group">
							<label for="bairro" class="col-form-label">Bairro:</label>
							<input type="text" name="bairro" class="form-control">
						</div>
					</div>

					<div class="col-md-5">			
						<div class="form-group">
							<label for="cidade" class="col-form-label">Cidade:</label>
							<input type="text" name="cidade" class="form-control">
						</div>			
					</div>

					<div class="col-md-2">			
						<div class="form-group">
							<label for="estado" class="col-form-label">Estado:</label>
							<select class="custom-select mb-3 form-control" name="estado">
  								<option selected value="MG">MG</option>
  								<option value="SP">SP</option>
  								<option value="RJ">RJ</option>
							</select>
						</div>			
					</div>
				</div>

				<div class="row form-group centralizar">
					<div class="col-md-6 botao">
	 	 				<input type="submit" class="btn btn-success form-control" value="Cadastrar">
	    			</div>
	    			<div class="col-md-6 botao">
	    				<button type="button" class="btn btn-danger form-control">Cancelar</button>
	    			</div>
				</div>

			</form>
		</div>


		<div class="aba container" id="cadImoveis">
			<form name="form3" method="POST" enctype="multipart/form-data" id="form3">
				<div class="row">
					<div class="col-md-6">			
						<div class="form-group">
							<label for="tipo" class="col-form-label">Tipo de Imóvel:</label>
							<select id="tipo" name="tipo" class="custom-select mb-3 form-control" onchange="testeTipo()">
  								<option selected value="C">Casa</option>
  								<option value="A">Apartamento</option>
							</select>
						</div>			
					</div>

					<div class="col-md-6">	
						<div class="form-group">
							<label for="area" class="col-form-label">Área:</label>
							<div class="input-group">
								<input type="number" name="area" class="form-control">
								<div class="input-group-addon">m²</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">			
						<div class="form-group">
							<label for="cep" class="col-form-label">CEP:</label>
							<input type="text" name="cep" class="form-control" onkeyup="buscaEndereco(this.value, 'form3')">
						</div>			
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label for="rua_avenida" class="col-form-label">Avenida/Rua:</label>
							<input type="text" name="rua_avenida" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="nro_casa" class="col-form-label">Número:</label>
							<input type="text" name="nro_casa"class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">			
						<div class="form-group">
							<label for="bairro" class="col-form-label">Bairro:</label>
							<input type="text" name="bairro" class="form-control">
						</div>
					</div>

					<div class="col-md-5">			
						<div class="form-group">
							<label for="cidade" class="col-form-label">Cidade:</label>
							<input type="text" name="cidade" class="form-control">
						</div>			
					</div>

					<div class="col-md-2">			
						<div class="form-group">
							<label for="estado" class="col-form-label">Estado:</label>
							<select class="custom-select mb-3 form-control" name="estado">
  								<option selected value="MG">MG</option>
  								<option value="SP">SP</option>
  								<option value="RJ">RJ</option>
							</select>
						</div>			
					</div>
				</div>

				<div id="Apartamento">
					<div class="row">
						<div class="col-md-4">	
							<div class="form-group">
								<label for="andar" class="col-form-label">Andar:</label>
								<input type="number" name="andar" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="valor" class="col-form-label">Valor do Condomínio:</label>
								<div class="input-group">
									<div class="input-group-addon">R$</div>
									<input type="number" name="valor" class="form-control">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="portaria" class="col-form-label">Porteiro 24 horas:</label>
								<select class="custom-select mb-3 form-control" name="portaria">
	  								<option selected value="S">Sim</option>
	  								<option value="N">Não</option>
								</select>
							</div>			
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">			
						<div class="form-group">
							<label for="quartos" class="col-form-label">Quartos:</label>
							<input type="number" name="quartos" class="form-control">
						</div>			
					</div>

					<div class="col-md-2">	
						<div class="form-group">
							<label for="suites" class="col-form-label">Suites:</label>
							<input type="number" name="suites" class="form-control">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="salas-estar" class="col-form-label">Salas de Estar:</label>
							<input type="number" name="salas_estar" class="form-control">
						</div>
					</div>

					<div class="col-md-2">	
						<div class="form-group">
							<label for="jantar" class="col-form-label">Salas de Jantar:</label>
							<input type="number" name="jantar" class="form-control">
						</div>
					</div>

					<div class="col-md-2">	
						<div class="form-group">
							<label for="vagas" class="col-form-label">Vagas na Garagem:</label>
							<input type="number" name="vagas" class="form-control">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="armario" class="col-form-label">Armário Embutido:</label>
							<select class="custom-select mb-3 form-control" name="armario">
  								<option selected value="S">Sim</option>
  								<option value="N">Não</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label for="descricao" class="col-form-label">Descrição</label>
						<textarea name="descricao" class="form-control" rows="5"></textarea>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label for="foto" class="col-form-label">Fotos</label>
						<input type="file" class="form-control" name="foto[]" multiple>
					</div>
					
				</div>

				<div class="row form-group centralizar">
					<div class="col-md-6 botao">
	 	 				<input type="submit" class="btn btn-success form-control" value="Cadastrar">
	    			</div>
	    			<div class="col-md-6 botao">
	    				<button type="button" class="btn btn-danger form-control">Cancelar</button>
	    			</div>
				</div>

			</form>
		</div>
			
		
		<div class="aba container table-responsive" id="listFuncionarios">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nome do Funcionário </th>
						<th>CPF </th>
						<th>Endereço </th>
						<th>Telefone </th>
						<th>Telefone contato </th>
						<th>Telefone celular </th>
						<th>Data de ingresso </th>
						<th>Cargo </th>
						<th>Salário </th>
					</tr>
				</thead>
				<tbody>
					<tr>	<td>João João João</td>	<td>111.111.111-11</td>	<td>Av. Lalala, 20</td>	<td>(34) 3200-0000</td>	<td>(34) 3200-0000</td>	<td>(34) 9000-0000</td> <td>01/05/2008</td> <td>Gerente</td> <td>R$10.000,00</td></tr>
					<tr>	<td>Maria Maria Maria</td>	<td>222.111.111-11</td>	<td>Av. Alguma, 10</td>	<td>(34) 3100-0000</td>	<td>(34) 3100-0000</td>	<td>(34) 7000-0000</td> <td>10/07/2017</td>	<td>Limpeza</td> <td>R$1.000,00</td></tr>
					<tr>	<td>João Marcos</td>	<td>113.113.113-11</td>	<td>Av. Tal, 100</td><td>(34) 3300-0000</td><td>(34) 3300-0000</td>	<td>(34) 8000-0000</td>	<td>10/01/2010</td> <td>Administrativo</td> <td>R$5.000,00</td></tr>
				</tbody>
			</table>
		</div>

		<div class="aba container  table-responsive" id="listClientes">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nome do Cliente </th>
						<th>CPF </th>
						<th>Endereço </th>
						<th>Telefone contato </th>
						<th>Email </th>
						<th>Sexo </th>
						<th>Estado Civil </th>
						<th>Profissão </th>
					</tr>
				</thead>
				<tbody>
					<tr>	<td>João João João</td>	<td>111.111.111-11</td>	<td>Av. Lalala, 20</td>	<td>(34) 3200-0000</td>	<td>joao@gmail.com</td> <td>Masculino</td> <td>Casado</td> <td>Analista de BD</td></tr>
					<tr>	<td>Maria Maria Maria</td>	<td>222.111.111-11</td>	<td>Av. Alguma, 10</td>	<td>(34) 3100-0000</td>	<td>maria@gmail.com</td> <td>Feminino</td> <td>Solteira</td> <td>Programadora WEB</td></tr>
					<tr>	<td>João Marcos</td>	<td>113.113.113-11</td>	<td>Av. Tal, 100</td><td>(34) 3300-0000</td> <td>joaomarcos@gmail.com</td> <td>Masculino</td> <td>Solteiro</td> <td>Desempregado</td></tr>
				</tbody>
			</table>
		</div>

		<div class="aba container" id="listImoveis">
			<div class="row">
				<div class="col-md-12">	
					<div class="form-group">
						<label for="tipoTabela" class="col-form-label">Tipo de Imóvel:</label>
						<select id="tipoTabela" name="tipoTabela" class="custom-select mb-3 form-control" onchange="testeTipoTabela(this)">
								<option selected value="C">Casa</option>
								<option value="A">Apartamento</option>
						</select>
					</div>
				</div>
			</div>

			<div  id="tabelaCasa" class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Área</th>
							<th>Endereço</th>
							<th>Quartos</th>
							<th>Suítes</th>
							<th>Salas de Estar</th>
							<th>Salas de Jantar</th>
							<th>Vagas na Garagem</th>
							<th>Armário Embutido</th>
							<th>Descrição</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>250</td>	<td>joao@gmail.com</td>	<td>(34) 3200-0000</td>	<td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> </tr>
						<tr><td>1000</td>	<td>maria@gmail.com</td>	<td>(34) 3100-0000</td>	<td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> </tr>
						<tr><td>3000</td>	<td>Av.Qualquer</td>	<td>(34) 3300-0000</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> </tr>
					</tbody>
				</table>
			</div>

			<div id="tabelaApartamento" class="table-responsive">
				<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Área</th>
								<th>Endereço</th>
								<th>Andar</th>
								<th>Valor do Condominio</th>
								<th>Quartos</th>
								<th>Suítes</th>
								<th>Salas de Estar</th>
								<th>Salas de Jantar</th>
								<th>Vagas na Garagem</th>
								<th>Armário Embutido</th>
								<th>Porteiro 24horas</th>
								<th>Descrição</th>
							</tr>
						</thead>
						<tbody>
							<tr><td>...</td> <td>...</td> <td>...</td>	<td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> </tr>
							<tr><td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> <td>...</td> </tr>
						</tbody>
					</table>
			</div>
		</div>

		<div class="aba container  table-responsive" id="listInteressados">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nome do Cliente</th>
						<th>Email</th>
						<th>Telefone contato</th>
						<th>Descrição da proposta</th>
						<th>Imóvel Correspondente</th>				
					</tr>
				</thead>
				<tbody>
					<tr>	<td>João João João</td>	<td>joao@gmail.com</td>	<td>(34) 3200-0000</td>	<td>...</td> <td>...</td> </tr>
					<tr>	<td>Maria Maria Maria</td>	<td>maria@gmail.com</td>	<td>(34) 3100-0000</td>	<td>...</td> <td>...</td></tr>
					<tr>	<td>João Marcos</td>	<td>joaomarcos@gmail.com</td>	<td>(34) 3300-0000</td> <td>...</td> <td>...</td></tr>
				</tbody>
			</table>
		</div>

		<?php include "footer.php"; ?>
		
</html>
