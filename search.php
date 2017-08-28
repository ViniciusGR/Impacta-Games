<?php
include "conexao.php";
?>
<form name = "search_form" method = "GET" action = "resultado.php">
<input type = "text" name = "busca" id = "searchPlataforma" />
<select name = "plataforma" id = "selectPlataforma">
<?php
$query = "SELECT * FROM plataforma ";
$dados = mysqli_query($con, $query) or die(mysqli_error());
while($line = mysqli_fetch_array($dados)){
	$plataforma = $line['nome'];
	$plataforma_id = $line['id'];
	echo "<option value = '$plataforma_id'>$plataforma</option>";
}

 ?>
</select>
<input type = "submit" name = "submit" value = "Pesquisar" id = "selectPlataformaButton">
</form>