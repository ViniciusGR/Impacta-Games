<?php

include "conexao.php";
$login = $_POST['login'];
$senha = $_POST['senha'];

$refresh = '<meta http-equiv="refresh" content="1; url=index.php" />';


	$busca = mysqli_query($con, "SELECT * FROM cliente WHERE login='$login' and senha='$senha' LIMIT 1") or die(mysqli_error());		
	if (mysqli_num_rows($busca)==1)
	{
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		$linha = mysqli_fetch_array($busca);
		$_SESSION['sexo'] = $linha['sexo'];
		$_SESSION['id'] = $linha['ID'];
		$_SESSION['endereco'] = $linha['endereco'];
		$_SESSION['nome'] = $linha['nome'];
		$_SESSION['cidade'] = $linha['cidade'];
		$_SESSION['estado'] = $linha['estado'];
		$_SESSION['cep'] = $linha['cep'];
		echo '<script type="text/javascript">alert("Usuário(a) '.$linha['login'].' logado(a).")</script>';
		exit ($refresh);		
	} else {
		echo '<script type="text/javascript">alert("Usuário inexistente ou senha incorreta.")</script>';
		exit ($refresh);		
	}

?>
