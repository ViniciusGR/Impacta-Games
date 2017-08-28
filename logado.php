<?php 
?>
<div id = "logado">
<ul>
<li id = "boasVindas"><?php echo $_SESSION['login']; ?></li>
<li id = "photoProfile"><?php if($_SESSION['sexo'] == "Masculino"){
	echo "<img src = 'pics\Profile\Male.png'>";}
	else{
	echo "<img src = 'pics\Profile\Female.png'>";	
	} ?></li>
<a href='logout.php'><li id = "sair">Sair</li></a>
</ul>
</div>