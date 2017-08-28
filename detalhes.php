<?php
include "conexao.php";
$idProduto = $_GET['idProduto'];
$query = "SELECT * FROM produto WHERE id = $idProduto";
$dados = mysqli_query($con, $query) or die(mysqli_error());
$dados2 = mysqli_query($con,"SELECT plataforma.nome AS plataforma FROM plataforma JOIN produto ON plataforma.id = produto.id_plataforma WHERE produto.id = $idProduto;") or die(mysqli_error());
$linha = mysqli_fetch_assoc($dados);
$linha2 = mysqli_fetch_assoc($dados2);
$preco = implode(",", explode(".", $linha['preco']));
?>
<!DOCTYPE HTML>
<html>
   <head>
      <meta charset = 'utf-8' >
	  <link rel="icon" href="icon.jpg" type="image/gif">
      <link rel="stylesheet" type="text/css" href="estilo.css">
      <title>Impacta Games</title>
   </head>
   <body>
      <div id = "geral">
         <div id = "cabeçalho">
            <img src = "banner.png">
         </div>
         <?php include "menu.php";?>
         <br/>
		 
		 <!-- <p>Esquerda</p> -->
         <div id = "esquerda">
                       <div id = "login">
    <?php 
			   session_start();
			   if(!isset($_SESSION['login']) AND !isset($_SESSION['senha'])){
			   include 'login.php'; }
			   else{
				include 'logado.php';
                }
			   ?>
            </div>
         </div>
		 
		 
         <div id = "direita">
<?php
include 'search.php';
?>
            <br/> 
         </div>
         <div id = "conteudo">
         <div id = "productNameDetails"><?php echo $linha['nome']." - ".$linha2['plataforma'];?></div> 
		 <div id = "productSectionDetails">
		 <img src="<?php echo $linha['imageProduto']; ?>" />
		 </div>
		 <div id = "techSection">
		 <div id = "techDetails"><span>Título: <?php echo $linha['nome'];?></span></div>
		 <div id = "techDetails"><span>Plataforma: <?php echo $linha2['plataforma'];?></span></div>
		 <div id = "techDetails"><span>Idioma: <?php echo $linha['idioma'];?></span></div>
		 <div id = "techDetails"><span>Desenvolvedor: <?php echo $linha['desenvolvedor'];?></span ></div>
		 <div id = "techDetails"><span>Faixa Etária: <?php echo $linha['faixaEtaria'];?></span></div>
		 <div id = "techDetails"><span>Gênero: <?php echo $linha['genero'];?></span></div>
		 <div id = "priceDetails"><?php echo "R$ " . $preco; ?>
		 <div id = "buySection">
		 <?php echo '<a id = "cartLink" href="carrinho.php?acao=add&id='.$linha['id'].'">Comprar</a>'; ?>
		 </div>
         </div>		 
		 </div>
		 <div id = "description">Descrição</div> 
		 <div id = "descriptionSection"><p><?php echo $linha['descricao'];?></p></div>		 
         </div> 
         <footer id = "rodape">
            <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
            Av. Rudge, 315<br/>
         </footer> 
      </div>
   </body>
</html>