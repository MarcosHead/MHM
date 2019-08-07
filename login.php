<?php session_start(); ?>
<?php

	require "funcoes.php";

	$user = filtraEntrada($_POST['user']);
	$senha = filtraEntrada($_POST['senha']);
	$conn = conectaAoMySQL();

	$query = "select PESSOA_cpf from FUNCIONARIO where login = '{$user}' and senha = md5('{$senha}')";

	$result = mysqli_query($conn, $query);

	$row = mysqli_num_rows($result);

	if($row == 1){
		$_SESSION['user'] = $user;

		echo "<script>
		window.open(\"funcionarios.php\", '_blank');
		</script>
		";

		echo "<script> location.replace(\"index.php\"); </script>";

		exit();
	}
	else{
		header('Location: index.php');
		exit();

	}



	
?>