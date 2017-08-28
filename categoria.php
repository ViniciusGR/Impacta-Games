      <!DOCTYPE HTML>
      <html>
         <head>
            <meta charset = 'utf-8' >
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
                  <?php include "verticalMenu.php"; ?>
               </div>
      		 
      		 
               <div id = "direita">
                  <div id = "search">
                     <form>
                        <input type = "text" name = "search" id = "searchspace">
                        <input type = "submit" value = "Pesquisar" id = "searchbutton">
                     </form>
                  </div>
                  <br/>
      			
      			
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
      			
      			
      			
      			
                  <br/> 
               </div>
   <div id = "conteudo">











   </div>
               <footer id = "rodape">
                  <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
                  Av. Rudge, 315<br/>
               </footer> 
            </div>
         </body>
      </html>
