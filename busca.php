<?php
	require "funcoes.php";
	$saida = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$proposito  = filtraEntrada($_POST["proposito"]);
		$bairro     = filtraEntrada($_POST["bairro"]);
		$valorMin   = filtraEntrada($_POST["valorMin"]);
		$valorMax   = filtraEntrada($_POST["valorMax"]);
		$descricao  = filtraEntrada($_POST["descricao"]);

		if($valorMin == "")
			$valorMin = 0;
		if($valorMax == "")
			$valorMax = 99999999;
		
		try
		{    
			$conn = conectaAoMySQL();
			$sql = "SELECT * FROM IMOVEL WHERE status_imovel='$proposito' and bairro='$bairro' and valor>=$valorMin and valor<=$valorMax";

			if (! $result = $conn->query($sql))
				throw new Exception('Ocorreu uma falha ao buscar os imoveis: ' . $conn->error);
			
			// Navega pelas linhas do resultado
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_assoc())
				{
					$saida .="
					<div class='descricao'>
						<div class='row' style='border:1px solid black; border-radius: 10px; margin: 2% 1%!important;'>
							<h2 class='centralizar col-sm-12'><b>".$row["tipo"]."</b></h2>
						</div>
						<div class='row'>
							<div class='col-sm-4'>
						 		<table class='table table-striped table-hover'>
						 			<tbody>
										<tr><td><b>Preço:  </b></td><td>R$ ".$row["valor"]." .</td></tr>
										<tr><td><b>Área:   </b></td><td>".$row["area"]." m² .</td></tr>
										<tr><td><b>CEP:    </b></td><td>".$row["cep"]." .</td></tr>
										<tr><td><b>Número: </b></td><td>".$row["nro_casa"]." .</td></tr>
									</tbody>
								</table>
						 		<button type='button' class='btn btn-primary btn-block botao botao-azul' onclick='buscaDetalhe(".$row["id_imovel"].")'>Detalhes</button>

						 		<button type='button' class='btn btn-primary btn-block botao botao-laranja'  onclick='buscaAtribui(".$row["id_imovel"].")'  data-toggle='modal' data-target='#modalInteresse' >Tenho interesse</button>

								<!-- Modal de Destalhes -->
								<div class='modal fade' id='detalhe' tabindex='-1' role='dialog' aria-labelledby='ModalDetalhe' aria-hidden='false'>
						  			<div class='modal-dialog modal-lg' role='document'>
						    			<div class='modal-content'>
						      				<div class='modal-header modal-laranja centralizar'>
						       					<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
						          					<span aria-hidden='true'>&times;</span>
						        				</button>
						       					<h4 class='modal-title' id='ModalDetalhe'>Detalhes do Imóvel</h4>
						     				</div>

							      			<div class='modal-body' id='infoDetalhes'>
							      			</div>
							      			
							      			<ul class='navbar-button'>
								     	 		<div class='modal-footer'>
								        			<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>	
								     			</div>
							     			</ul>
						   				</div>
						  			</div>
								</div>

								<!-- Modal de Interessados -->
								<div class='modal fade' id='modalInteresse' tabindex='-1' role='dialog' aria-labelledby='ModalInteresse' aria-hidden='true'>
						  			<div class='modal-dialog' role='document'>
						    			<div class='modal-content'>
						      				<div class='modal-header centralizar modal-laranja'>
						        				<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
						          					<span  aria-hidden='true'>&times;</span>
						        				</button>
						        				<h4 class='modal-title' id='ModalInteresse'>Faça uma Proposta</h4>
											</div>
											<form name='formInteressados' method='POST'>
							      				<div class='modal-body'>
							      					<div class='row' hidden>
				  										<div class='col-md-12'>
			      											<div class='form-group'>
				        										<label for='id' class='col-form-label'>ID Imóvel:</label>
				        										<input disabled type='number' value='' name='idImovel' class='form-control'>
			      											</div>
				      									</div>
													</div>
													<div class='row'>
				  										<div class='col-md-12'> 
			  												<div class='form-group'>
				        										<label for='nome' class='col-form-label'>Nome:</label>
				        										<input type='text' name='nome' class='form-control' required>
			      											</div>
				      									</div>
													</div>

													<div class='row'>
				  										<div class='col-md-6'> 
				  											<div class='form-group'>
				        										<label for='email' class='col-form-label'>E-mail:</label>
				        										<input type='email' name='email' class='form-control' required>
				  											</div>
				  										</div>
				  										<div class='col-md-2'>
				  											<div class='form-group'>
				        										<label for='ddd' class='col-form-label'>DDD:</label>
				        										<input type='number' name='ddd' class='form-control' pattern='[0-9]{2}' required>
				  											</div>
				  										</div>
				  										<div class='col-md-4'> 	
				  											<div class='form-group'>
				        										<label for='telefone' class='col-form-label'>Telefone:</label>
				        										<input type='number' name='telefone' class='form-control' min='8' max='9' required>
				  											</div>
				      									</div>
													</div>

			          								<div class='form-group'>
			            								<label for='message-text' class='col-form-label'>Descrição da proposta:</label>
			            								<textarea class='form-control' name='descricaoProposta' maxlength='180' required></textarea>
			          								</div>
						      					</div>

						      					<div id='resultadoCadastro' class='centralizar'>
						      					</div>

								      			<div class='modal-footer centralizar'>
				        							<button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
				        							<button type='button' class='btn btn-success' onclick='buscaInteressados()'>Enviar</button>
				      							</div>
				      						</form>
						   				</div>
						  			</div>
								</div>
							</div>

							<div class='col-sm-8'>
						 		<p align='center'>  
						 			<img class='fotos' src='imagens/apart.jpg'>
						 			<img class='fotos' src='imagens/apart2.jpg'>
						 			<img class='fotos' src='imagens/apart3.jpg'> 
						 		</p>
							</div>
						</div>
					</div>
					";

				}
			}
			else{
				$saida = "
					<div  class='centralizar'> 
						<b class='text-danger bg-danger'>Não foram encontrados registros correspondentes aos filtros da pesquisa.</b>
					</div>
				";
			}

			echo $saida;
		}
		catch (Exception $e)
		{
			http_response_code(500); 
	
			$msgErro = "<b class='text-danger centralizar'>".$e->getMessage()."</b>";
			echo $msgErro;
		}
	}
?>
