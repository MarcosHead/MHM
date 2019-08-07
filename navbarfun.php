<nav class="navbar navbar-inverse menu">
			<div class="navbar-header" style="float: left; ">
	      <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav row">
					<li class="active col-lg"><a class="navLink" href="#" onclick="mostraAba('cadFuncionarios', this);">Cadastro de Funcionários</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('cadClientes', this);">Cadastro de Clientes</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('cadImoveis', this);">Cadastro de Imóveis</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('listFuncionarios', this);">Listagem de Funcionários</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('listClientes', this);">Listagem de Clientes</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('listImoveis', this);">Listagem de Imóveis</a></li>
					<li class="col-lg"><a class="navLink" href="#" onclick="mostraAba('listInteressados', this);">Listagem de Interessados</a></li>
				</ul>
				<ul class="login">
					<form action="logout.php" method="post">
					<button type="submit" class="btn btn-danger"  data-toggle="modal" data-target="#modalLogin"">SAIR</button>
					</form>
				</ul>
			</div>
</nav>