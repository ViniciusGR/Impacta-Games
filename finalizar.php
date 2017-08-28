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
				  <div id = "finish">
           <?php
include "conexao.php";	
if(!isset($_SESSION['login']) AND !isset($_SESSION['senha'])){
	header('Location: index.php');
}

if(empty($_SESSION['carrinho'])){
	header('Location: index.php');
}
		/**
     * Iremos nessa parte selecionar os produtos e adicionar
     */
 
    //Resgata os ID's, e transforma em string, separado por virgula
    $ids = implode(', ',array_keys($_SESSION['carrinho']));
 
    //Cria SQL para seleciona os produtos, filtrando pelo ID dos produtos
    //Dessa maneira irei realizar apenas uma consulta no banco de dados
    $sql   = sprintf("SELECT * FROM produto WHERE id IN (%s)", $ids);
 
    //Executa o SQL
    $query  = mysqli_query($con, $sql) or die (mysqli_error());
	
	$id_cliente = $_SESSION['id'];
	$total = $_SESSION['total'];
	date_default_timezone_set("Brazil/East");
	$data = date('d/m/y');
	$compra = mysqli_query($con,"INSERT INTO `compra` (id_cliente, data, total) 
	VALUES ('$id_cliente','$data','$total')") or die (mysqli_error());
	$idCompra = mysqli_insert_id($con);
	$_SESSION['idCompra'] = $idCompra;
 
 
    //Resgata os valores da tabela produtos
    while ($row = mysqli_fetch_assoc($query)){
        $id      = $row['id'];
        $qtd     = $_SESSION['carrinho'][$id];
        $preco   = $row['preco'];
		$registrar = mysqli_query($con,"INSERT INTO `compra_tem_produto` (id_compra, id_produto, qtd)
         VALUES ('$idCompra','$id','$qtd')") or die (mysqli_error($con));
    }
	$_SESSION['valorTotal'] = $_SESSION['total'];
 unset($_SESSION['carrinho']);
 unset($_SESSION['total']);
?>
		<img src = "stageclear.png" id = "stageclear">
		<form action = "boletophp-master/boleto_bradesco.php">
<input type = "submit" value = "Gerar boleto" id = "gerarBoleto">
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