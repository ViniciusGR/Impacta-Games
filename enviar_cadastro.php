<!Doctype html>
<html>
<head>
<meta charset = "UTF-8">
<title>Documento sem título</title>
</head>
<body>
<?php
include "conexao.php";
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco']." - ".$_POST['numero'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];
$refresh = '<meta http-equiv="refresh" content="1; url=cadastro.php" />';

$pesquisar = mysqli_query($con, "SELECT * FROM `cliente` WHERE login = '$login'") or die(mysqli_error());
$contagem = mysqli_num_rows($pesquisar);

$errors = "";

if ( $contagem == 1 ) {
  $errors .= " O nome de usuario que você escolheu já está cadastrado.";
  }

if ( $senha != $senha2 ) {
  $errors .= " As duas senhas não correspondem.";
  }
  
if ( $errors == "" ) {
  $cadastrar = mysqli_query($con,"INSERT INTO `cliente` (nome, nascimento, sexo, tel, cel, email, cpf, endereco, bairro, cep, cidade, estado, login, senha)
    VALUES ('$nome','$nascimento','$sexo','$tel','$cel','$email','$cpf','$endereco','$bairro','$cep','$cidade','$estado','$login','$senha')");

    if ( $cadastrar == 1 ) {
	 $refresh = '<meta http-equiv="refresh" content="1; url=index.php" />';
      echo '<script type="text/javascript">alert("Cadastro feito com sucesso!")</script>';
		exit ($refresh);
      } else {
	    echo '<script type="text/javascript">alert("Ocorreu um erro no servidor ao tentar se cadastrar.")</script>';
		}
  } else {
echo '<script type="text/javascript">alert("'.$errors.'")</script>';
		exit ($refresh);	
	}
?>
</body>
</html>
