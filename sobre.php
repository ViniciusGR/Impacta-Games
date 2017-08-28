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
               <div id = "aboutSection">
			   <div id = "aboutUsSection">Quem somos?</div>
			   <p>Esta loja virtual é parte do projeto desenvolvido pelo curso de Análise e Desenvolvimento de Sistemas da Faculdade Impacta de Tecnologia e não tem qualquer fim lucrativo.</p>
	
	  
				  
				  
               </div>
            </div> 
            <footer id = "rodape">
               <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
               Av. Rudge, 315<br/>
            </footer> 
         </div>
      </body>
   </html>
