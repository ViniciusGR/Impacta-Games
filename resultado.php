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
			include "search.php";
			?>
            </div>
			
			
                  <div id = "conteudo">
				 
				 
				 
				 <?php 
				 $plataforma = $_GET['plataforma'];
				 $busca = $_GET['busca'];
				 ?>
				 <?php
				 $query = "SELECT * FROM produto WHERE id_plataforma = '$plataforma' AND nome LIKE '%".$busca."%'";
				 $dados = mysqli_query($con, $query) or die(mysqli_error());
				 $resultado = mysqli_num_rows($dados);
				 if($resultado>0){
					 while($linha = mysqli_fetch_array($dados)){
						 $id = $linha['id'];
						 $plataforma = $linha['nome'];
						 $image = $linha['imageProduto'];
						 $preco = implode(",", explode(".", $linha['preco']));
						 echo "<div id = 'vitrine'>
						 <ul id = 'productBox'><li id = 'productName'><a href = detalhes.php?idProduto=$id>$plataforma</a></li>
						 <li id = 'productSection'><img src = '$image'/></li>
						 <li id = 'priceSection'>R$ $preco</li>
						 </ul>
						 </div>";
					 }
				 }else{
					  echo '<script type="text/javascript">alert("Nenhum resultado encontrado.")</script>';
				 }
				 ?>
				 
			   
			   
            </div> 
            <footer id = "rodape">
               <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
               Av. Rudge, 315<br/>
            </footer> 
         </div>
      </body>
   </html>
