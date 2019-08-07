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
		<?php include "navbar.php"; ?>

		<div class="aba container" id="Home">
			
			<div class="container">
				<img src="imagens/bem-vindo.jpg" class="img-fluid bem-vindo">
			</div>

			<div class="container centralizar">
				<img src="imagens/logo2.png" class="logo">
			</div>

			<div class="container">
				<h2 class="centralizar"><b>Missão da Empresa</b></h2>
				<p>A essência da MHM Imóveis é proporcionar uma variedade de imóveis de qualidade. Sabemos que vocês merecem os melhores lotes a um preço bacana, por isso nos dedicamos para o ajudar a realizar seu desejo de conseguir tal sonho. Tendo em vista que os gostos são variados procuramos diversificar as caracteristicas dos imovéis, para melhor atende-los, sendo possível selecionar tais caracteristicas em nossa aba de "Busca de Imóveis" por meio de filtros de pesquisa, com uma interface simples e fácil.</p>
			</div><br>
			
			<div class="container">
				<h2 class="centralizar"><b>Valores da Empresa</b></h2>
				<ol>
					<li>Transparência.</li>
					<li>Respeito.</li>
					<li>Comprometimento para/com o cliente.</li>
					<li>Performance.</li>
					<li>Eficâcia.</li>
				</ol>
			</div>
		</div>

		<div class="aba container" id="Busca">
			<h3>FILTROS DE PESQUISA</h3>
			<form method="POST" action="" name="busca">
				<div class="row">
      				<div class="col-lg-2">
  						<div class="form-group">
            				<label for="proposito" class="col-form-label">Propósito do usuário:</label>
            				<select class="custom-select mb-3 form-control" name="proposito" onchange="buscaBairro(this.value)">
  								<option value="C" class="select">Aquisição</option>
  								<option value="A">Locação</option>
							</select>
      					</div>
      				</div>

      				<div class="col-lg-2"> 
      					<div class="form-group">
            				<label for="bairro" class="col-form-label">Bairro:</label>
            				<select class="custom-select mb-3 form-control" name="bairro" id="bairro">
							</select>
      					</div>
      				</div>

      				<div class="col-lg-2"> 
          						<div class="form-group">
            						<label for="valorMin" class="col-form-label">Valor mínimo:</label>
            						<div class="input-group">
										<div class="input-group-addon">R$</div>
										<input type="number" name="valorMin" class="form-control">
									</div>
          						</div>
      				</div>

      				<div class="col-lg-2"> 
  						<div class="form-group">
    						<label for="valorMax" class="col-form-label">Valor máximo:</label>
    						<div class="input-group">
								<div class="input-group-addon">R$</div>
								<input type="number" name="valorMax" class="form-control">
							</div>
  						</div>
      				</div>

      				<div class="col-lg-3"> 
  						<div class="form-group">
    						<label for="descricao" class="col-form-label">Outras informações:</label>
    						<input type="text" name="descricao" class="form-control">
  						</div>
      				</div>
				
					<div class="col-lg-1">
						<div class="form-group">
							<button type="button" class="btn btn-block btn-primary botao-laranja botao-busca" onclick="buscar()">Buscar</button>
						</div>
      				</div>
				</div>
			</form>

			<br>
			<h3>RESULTADOS DA PESQUISA:</h3>
			<div id="resultadoBusca">
			</div>
		</div>
		
		<?php include "footer.php"; ?>
	
	</body>
</html>