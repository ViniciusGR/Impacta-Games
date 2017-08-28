 <?php
 include"conexao.php";
 session_start();
   if(!isset($_SESSION['login']) AND !isset($_SESSION['senha'])){
	header('Location: index.php');
}
 $query = mysqli_query($con, "SELECT * FROM `cliente` WHERE login='$_SESSION[login]'") or die (mysqli_error());
 $linha = mysqli_fetch_assoc($query);
$from = new DateTime($linha['nascimento']);
$to   = new DateTime('today');
$linha['nascimento'] = $from->diff($to)->y;
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
               <div id = "minhaContaSection">
			   <div id = "registerSection">Dados pessoais</div>
			   <div id = "conta">
                 <strong>Nome completo:</strong> <?php echo $linha['nome']; ?><br/>
				 <strong>Idade:</strong> <?php echo $linha['nascimento']. " anos"; ?><br/>
				 <strong>Sexo:</strong> <?php echo $linha['sexo']; ?><br/>
				 <strong>Telefone:</strong>  <?php echo $linha['tel']; ?><br/>
				 <strong>Celular:</strong>  <?php echo $linha['cel']; ?><br/>
				 <strong>E-mail:</strong>  <?php echo $linha['email']; ?><br/>
				 <strong>CPF:</strong>  <?php echo $linha['cpf']; ?><br/><br/>
				 </div>
				 <div id = "registerSection">Dados Residenciais</div>
				 <div id = "conta">
				 <strong>Endereço:</strong>  <?php echo $linha['endereco']; ?><br/>
				 <strong>Bairro:</strong>  <?php echo $linha['bairro']; ?><br/>
				 <strong>Cidade:</strong>  <?php echo $linha['cidade']; ?><br/>
				 <strong>Estado:</strong>  <?php echo $linha['estado']; ?><br/><br/>
				 </div>
				 <div id = "registerSection">Dados de login</div><br/>
				<form action = "" method = "POST">
				 <label id = "senhaAtual"><strong>Senha atual:</strong></label>
				 <input type = "password" id = "senhaAtual" class = "alterSenha" name = "senhaAtual" required><br/>
				 <label id = "senhaNova"><strong>Nova senha:</strong></label>
				 <input type="password" name="senhaNova" id = "senhaNova" class = "alterSenha" pattern=".{6,}" title="A senha deve possuir 6 ou mais caracteres." size="20" maxlength="15" required><br/><br/>
				 <div id = "altSenha">
				 <input type = "submit" value = "Alterar senha" id = "altSenhaButton">
				 </div>
				 </form>
				 <?php 
				 @$senha = $_POST['senhaAtual'];
				 @$senhaNova = $_POST['senhaNova'];
				 if(!empty($_POST['senhaNova']) && !empty($_POST['senhaNova'])){
					 if(@$senha == $_SESSION['senha']){
				 $query = mysqli_query($con,"UPDATE cliente SET senha = '$senhaNova' WHERE id = '$_SESSION[id]'");
			 echo '<script type="text/javascript">alert("Sua senha foi alterada com sucesso.")</script>';
			 }
			 else{
				 echo '<script type="text/javascript">alert("Senha incorreta!")</script>';
			 }
				 }
				 ?>
               </div>
			   </div>
            </div> 
            <footer id = "rodape">
               <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
               Av. Rudge, 315<br/>
            </footer> 
         </div>
      </body>
   </html>
