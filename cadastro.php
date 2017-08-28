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
 <?php include "search.php"; ?>
         </div>
         <div id = "conteudo">
		 <div id = "register">
<form action="enviar_cadastro.php" method="post" name="cadastro" id="cadastro"  onSubmit="return valida();">

<div id = "registerSection">Dados Pessoais</div><br>
<label for "nome">Nome completo:<span id = "required">*</span></label>
<input name="nome" id = "nome" type="text" size="20" maxlength="40" required><br/>
<label for = "nascimento">Nascimento:<span id = "required">*</span></label>
<input type="date" name="nascimento" max="2015-12-31" min = "1900-01-01" required><br/>
<label for = "sexo">Sexo:<span id = "required">*</span></label>
<select name="sexo" id="sexo">
<option value="Feminino" selected>Feminino</option>
<option value="Masculino">Masculino</option>
</select><br/>
<label for "tel">Telefone:<span id = "required">*</span></label>
<input type="text" size="20" maxlength="15" name="tel" placeholder="(XX) XXXX-XXXX" id = "tel" pattern="\([0-9]{2}\) [0-9]{4}-[0-9]{4}$" title = "Use o seguinte formato: (XX) XXXX-XXXX" required><br/>
<label for "cel">Celular:<span id = "required">*</span></label>
<input name="cel" type="text" id="cel" placeholder="(XX) XXXX-XXXX" title = "Use o seguinte formato: (XX) XXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" size="20" maxlength="15" required><br/>
<label for "email">E-mail:<span id = "required">*</span></label>
<input name="email" type="email" id="email" placeholder="nome@site.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" size="20" maxlength="40" title = "Você deve inserir um e-mail válido"required><br/>
<label for "cpf">CPF:<span id = "required">*</span></label>
<input type="text" name="cpf" id = "cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder = "XXX.XXX.XXX-XX" size="20" maxlength="40" title = "Use o seguinte formato: XXX.XXX.XXX-XX" required><br/><br/>

<div id = "registerSection">Dados Residenciais</div><br/>
<label for = "endereco">Endereço:<span id = "required">*</span></label> 
<input name="endereco" type="text" id="endereco" size="20" maxlength="50" required><br/>
<label for = "numero">Número:<span id = "required">*</span></label>
<input type = "text" width = "5" name = "numero" id = "numero" title = "Número da residência" pattern="[0-9]{1,}" required><br/>
<label for = "bairro">Bairro:<span id = "required">*</span></label> 
<input name="bairro" type="text" id="bairro" size="20" maxlength="30" required><br/> 
<label for = "cep">CEP:<span id = "required">*</span></label> 
<input name="cep" type="text" id="cep" size="20" maxlength="20" pattern= "\d{5}-?\d{3}" required title = "Use o seguinte formato: XXXXX-XXX"><br/>
<label for = "cidade">Cidade:<span id = "required">*</span></label> 
<input name="cidade" type="text" id="cidade" size="20" maxlength="30" required><br/>
<label for = "estado">Estado:<span id = "required">*</span></label> 
 <select name="estado" id="estado" type="text">
            <option value="AC" selected>AC</option>
            <option value="AL">AL</option>
            <option value="AM">AM</option>
            <option value="AP">AP</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MG">MG</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
          </select><br/><br/>
		  
<div id = "registerSection">Dados de Login</div><br/>
<Label for = "login">Nome de usuário:<span id = "required">*</span></label>
<input name="login" type="text" id="login" size="20" maxlength="15" pattern="[A-Za-z0-9]{5,15}$" title = "Você deve escolher um nome de usuário formado por letras ou números de 5 a 15 caracteres." required><br/>
<label for = "senha">Senha:<span id = "required">*</span></label>
<input type="password" name="senha" id = "senha" pattern=".{6,}" title="A senha deve possuir 6 ou mais caracteres" size="20" maxlength="15" required><br/>
<label for = "senha">Confirme sua senha:<span id = "required">*</span></label> 
<input name="senha2" type="password" id="senha" size="20" maxlength="15" required><br/><br/>

<div id = "confirm">
<input type="submit" name="Submit" value="Enviar" id = "confirmReg">
<input type="reset" name="Submit2" value="Limpar" id = "confirmReg">
</div>
  </form>
</div>
         </div> 
         <footer id = "rodape">
            <a href = "http://www.impacta.edu.br">Faculdade Impacta de Tecnologia</a><br/>
            Av. Rudge, 315<br/>
         </footer> 
      </div>
   </body>
</html>
