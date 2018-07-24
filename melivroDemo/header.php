<?php
require_once(DBAPI);

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MeLivro Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <script src="js/bootstrap.js"></script>

</head>



<body>
    <div class="armacao">
        <br></br>
          <a href="index.php"><img src="imagem/logo1.png" alt="logo" title="MeLivro" height="95px" ></a>
        <div class="cabecalho">
                      <a href="#"> <button class="button button1">Minhas Vendas</button></a>
                      <a href="#"><button class="button button2">Historico</button></a>
                      <a href="#"><button class="button button3">Cadastre-se</button></a>
                      <a href="#"><button class="button button4">Entrar</button></a>
                      
                   
           </div>

        <div class="corpo">
            
            <div class="menuContainer">
                
                <ul class="menu">
                    
                    <li>
                        <a href="buscaLivros.html">Livros</a>
                    </li>
                    
                    <li>
                        <a href="buscaRevista.html">Revistas</a>
                    </li>
                    
                    <li>
                        <a href="buscaRevista.html">Artigos</a>
                    </li>
                    
                </ul>
            </div>

            </li></li>
            <br></br>

            <div class="busca">
                    <form class="form-inline mt-2 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" size="95" placeholder="Digite o produto desejado">
                     
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >
                                <img src="imagem/searchicon.png"alt="busca" title="search"  height="15px"/>
                            </button>
                
                            <button class="btn btn-outline-success my-3 my-sm-0" type="submit" >
                                    
                                    <a href="carrinho.html"><img src="imagem/carrinho.png"alt="carrinho" title="carrinho"  height="15px"/></a> 
                                </button>
                        </form>
                </div>
            </div>