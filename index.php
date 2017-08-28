 <!DOCTYPE HTML>
   <html>
      <head>
         <meta charset = "UTF-8" >
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
               <div id = "vitrine">
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=1"><li id = "productName">The Witcher 3 - Xbox One</li></a>
                     <li id = "productSection"><img src = "pics\Xbox One\TheWitcher3.jpg"></li>
                     <li id = "priceSection">R$ 199,90</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=2"><li id = "productName">Assassins Creed: Syndicate - Xbox One</li></a>
                     <li id = "productSection"><img src = "pics\Xbox One\ACSyndicate.jpg"></li>
                     <li id = "priceSection">R$ 249,90</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=3"><li id = "productName">Fallout 4 - PS4</li></a>
                     <li id = "productSection"><img src = "pics\Playstation 4\Fallout4.jpg"></li>
                     <li id = "priceSection">R$ 199,90</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=4"><li id = "productName">FIFA 16 - PS4</li></a>
                     <li id = "productSection"><img src = "pics\Playstation 4\FIFA16.jpg"></li>
                     <li id = "priceSection">R$ 213,63</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=5"><li id = "productName">Mad Max - PC</li></a>
                     <li id = "productSection"><img src = "pics\PC\MadMax.jpg"></li>
                     <li id = "priceSection">R$ 97,42</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=6"><li id = "productName">Batman: Arkham Knight - PC</li></a>
                     <li id = "productSection"><img src = "pics\PC\BatmanArkhamKnight.jpg"></li>
                     <li id = "priceSection">R$ 93,67</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=7"><li id = "productName">Hyrule Warriors</li></a>
                     <li id = "productSection"><img src = "pics\Nintendo Wii U\HyruleWarriors.jpg"></li>
                     <li id = "priceSection">R$ 249,99</li>
                  </ul>
                  <ul id = "productBox">
                     <a href = "detalhes.php?idProduto=8"><li id = "productName">Super Smash Bros. - Wii U</li></a>
                     <li id = "productSection"><img src = "pics\Nintendo Wii U\SuperSmashBros.jpg"></li>
                     <li id = "priceSection">R$ 258,99</li>
                  </ul>
               </div>
            </div> 
            <footer id = "rodape">
               <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
               Av. Rudge, 315<br/>
            </footer> 
         </div>
      </body>
   </html>
