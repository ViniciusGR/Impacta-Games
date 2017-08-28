<?php       
session_start();
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){			 
            if(@is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
      }
       
       
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
include 'search.php';
?>
         </div>
         <div id = "conteudo">
		 <div id = "cartSection">
<table id = "cart">
    <thead>
          <tr>
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Preço</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="2"><input type="submit" value="Atualizar Carrinho" id = "continue"/></td>
			<td colspan="3"><a href="index.php">Continuar Comprando</a></td>
    </tfoot>
      
    <tbody>
               <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produtos no carrinho</td></tr>';
                     }else{
                        require("conexao.php");
                                                               $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $sql   = "SELECT *  FROM produto WHERE id = '$id'";
                              $qr    = mysqli_query($con, $sql) or die(mysqli_error($con));
                              $ln    = mysqli_fetch_assoc($qr);			  
                              $nome  = $ln['nome'];
                              $preco = implode(",", explode(".", $ln['preco']));
                              $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               
                              $total += $ln['preco'] * $qtd;
							  $_SESSION['total'] = $total; 
                            
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text"size="3" id = "qtd" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                           $total = number_format($total, 2, ',', '.');
                           echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
               ?>
     </tbody>
        </form>
</table><br/>

<form action = "finalizar.php">
<input type = "submit" value = "Finalizar compra" id = "finalizarCompra">
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