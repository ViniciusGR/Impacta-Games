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
               <div id = "contatoSection">
			   
    <form  action="" method="POST" enctype="multipart/form-data" id = "formContato"> 
    Nome:<br> 
    <input name="nome" type="text" value="" size="30" required><br> 
    E-mail:<br> 
    <input name="email" type="email" value="" size="30" required><br><br> 
    Mensagem:<br> 
    <textarea name="msg" rows="7" cols="30" id = "textArea" required></textarea><br> 
    <input type="submit" id = "enviarMensagem" value="Enviar"/> 
    </form> 
	
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){	
require_once "PHPMailer-master/PHPMailerAutoload.php";
$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->setFrom("viniciuslawliet@outlook", "outlook.com");
$mail->addReplyTo("viniciuslawliet@outlook.com", "");
$mail->From = $_POST['email'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress("viniciuslawliet@outlook.com","Vinicius Ruas");
$mail->Subject = "Fale conosco";
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br /><b>E-mail:</b> ".$_POST['email']." <br /><br /><b>Mensagem:</b> ".$_POST['msg'];
if($mail->Send())
echo '<script type="text/javascript">alert("Mensagem enviada com sucesso!")</script>';
else
echo '<script type="text/javascript">alert("Erro ao enviar a mensagem.")</script>';
}	
?> 
				  
				  
				  
               </div>
            </div> 
            <footer id = "rodape">
               <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
               Av. Rudge, 315<br/>
            </footer> 
         </div>
      </body>
   </html>
