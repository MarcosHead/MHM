<nav class="navbar navbar-inverse menu">
	<div class="navbar-collapse">

		<div class="navbar-header" style="float: left; ">
	      <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
				<li class="active"><a class="navLink" href="#" onclick="mostraAba('Home', this);">Home</a></li>
				<li><a class="navLink" href="#" onclick="mostraAba('Busca', this);">Busca por Imóveis</a></li>
			</ul>
		</div>
		<ul class="login">
			<!-- Modal -->
			<button class="btn btn-success"  data-toggle="modal" data-target="#modalLogin">Login</button>	
			<div class="modal fade" id="modalLogin" role="dialog">
	  			<div class="modal-dialog modal-xl" role="document">
	    			<div class="modal-content">
	      				<div class="modal-header modal-laranja">
	      					<button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Fechar">
	          					<span aria-hidden="true">&times;</span>
	        				</button>
	       					<h4 class="modal-title centralizar">LOGIN</h4>
	     				</div>

	     				<form  action="login.php" method="post">	
		      			<div class="modal-body form-group">
		      				<label class="form-control centralizar" for="user">Usuário: </label>
		      				<input class="form-control" placeholder="Informe seu usuário" type="text" name="user" required>
		      				<br>
		      				<label class="form-control centralizar" for="senha">Senha: </label>
							<input class="form-control" placeholder="Informe sua senha" type="password" name="senha" required>		      				
		      			</div>
		      			

		     	 		<div class="modal-footer centralizar">
		     	 			<input type="submit" class="btn btn-success" value="Entrar">
		        			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		     			</div>
		     			</form>

	   				</div>
	  			</div>
			</div>
		</ul>
	</div>
</nav>