    <?php
      include_once("../conexao/conexao.php")
    ?>
<?php
    //consulta ao bnaco de dados
    $consulta_ofertas = "SELECT  PRO_NOME, PRO_CODIGO, PRO_DESCRICAO, PRO_UNIDADE, PRO_IMAGEM, PRO_VALOR, CAT_CODIGO ";
    $consulta_ofertas .= " FROM produto ";
    $consulta_ofertas .= " ORDER BY PRO_VALOR ";
    if( isset($_GET["produto"])) {
      $pro_nome = $_GET["produto"];
      $consulta_ofertas .= " WHERE PRO_NOME LIKE '%{$pro_nome}%' ";
    }

    $ofertas = mysqli_query($conecta,$consulta_ofertas);
    if( !$ofertas){
        die("falha na consulta ao banco");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   

    <title>Frutas - Cesta Feira</title>
  </head>
  <body>
   
    <header><!--Inicio Cabecalho-->

      <nav class="nav fixed-top navbar-expand-lg navbar-dark nav" style="background-color: #467302;">
        <div id="area-cabecalho" class="container-fluid">
          
          <div class="row ">
            
            <div class="p-2">
              <a href="index.php">
                <img src="imagens/logo-p.png">
              </a>
            </div>

        
          <!--Campo de Busca-->
          <div class=" mx-auto pt-3">
            <form action="ofertas.php" method="get" class="form-ij nline col-lg-offset-7">
              <div class="input-group">
                  <input class="form-control" type="text" name="produto" placeholder="Pesquisar produtos...">
                <div class="input-group-append">
                  <input type="image" name="pesquisa" src="imagens/lupa.png" width=50px class="btn btn-light"></input>
                </div>
            </div>
            </form>
          </div>

          <div class=" p-3">
            <!--Menu Hamburguer-->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target">
             <span class="navbar-toggler-icon"></span>
          </button>
             </div>
        
       <div class="mr-auto">
        <div>
         <ul class="navbar-nav pt-3">
          <li class="nav-item">
            <div class="dropdown">
              <a class="btn btn-sm btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: small;">
                <img src="imagens/user.png">
                Olá,
                Entre ou cadastre-se
              </a>
            
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="login.php">Entrar</a>
                <a class="dropdown-item" href="cadastro-pf.php">Cadastre-se</a>
                <a class="dropdown-item" href="cadastro-pj.php">Cadastre sua empresa</a>
                <a class="dropdown-item" href="endereco.php">Meu Endereço</a>
                <a class="dropdown-item" href="tela_pedido.php">Meus Pedidos</a>
                <a class="dropdown-item" href="cesta.php">Minha Cesta</a>
                <a class="dropdown-item" href="anunciar.php">Vender</a>
              </div>
            </div>
          </li>
          <div class="collapse navbar-collapse">
          <li class="nav-item">
            <a href="endereco.php" class="btn ml-1 btn-sm"  style="color: #ffffff; font-size: small;">
              <img src="imagens/local.png">
              Meu Endereço

            </a>
          </li>
          <li class="nav-item">
            <a href="tela_pedido.php" class="btn ml-1 btn-sm"  style="color: #ffffff; font-size: small;">
              <img src="imagens/caixa.png">
              Meus pedidos

            </a>
          </li>
          <li class="nav-item">
            <a href="cesta.php" class="btn ml-1 btn-sm" style="color: #ffffff; font-size: small;">
              <img src="imagens/cesta.png">
              Minha cesta

            </a>
          </li>
           <li class="nav-item">
             <a href="anunciar.php" class="btn btn-sm btn-outline-light" style="font-size: small;">
              <img src="imagens/vender.png">
               Vender
              </a>
           </li>
          </div>
           </ul>
         </div>
       </div>
      
       </div>
      

         <!--navegacao-->
         <div id="area-menu">
       <div class="collapse navbar-collapse" id="nav-target">
         <ul class="navbar-nav mx-auto pb-2 pt-2">
           <li class="nav-item">
             <a href="index.php" class="nav-link">Home</a>
           </li>
           <li class="nav-item">
             <a href="ofertas.php" class="nav-link">Ofertas</a>
           </li>
           <li class="nav-item">
             <a href="frutas.php" class="nav-link">Frutas</a>
           </li>
           <li class="nav-item">
             <a href="verduras.php" class="nav-link">Verduras</a>
           </li>
           <li class="nav-item">
             <a href="legumes.php" class="nav-link">Legumes</a>
           </li>
           <li class="nav-item">
             <a href="hortalicas.php" class="nav-link">Hortaliças</a>
           </li>
           </ul>
         </div>
        </div>
          

          </div><!--fim container-->
           
    </nav>
  </header><!--Fim Cabecalho-->


    <div id="area-principal3" class="container">
        
        <!--abertura postagem-->
           <h2 class="p-2" style="text-align: center;">Principais Ofertas</h2>

            
            <?php include_once("../php/funcoes.php")?>
        <?php
            while( $registro = mysqli_fetch_assoc($ofertas)){
        ?>    

            <div class="col-md-3 float-left pb-3">
            <div class="card-deck">
            <div class="card border-success">
            <a href="detalhe.php?codigo=<?php echo $registro["PRO_CODIGO"]?>">
                <div class="card-img-top"><img src = <?php echo $registro["PRO_IMAGEM"] ?> width=200px></div>
            </a>
            <div class="card-body mx-auto">
            <h4><?php echo $registro["PRO_NOME"] ?></h4>
            <h4><?php echo real_format($registro["PRO_VALOR"]) ?></h4>
            Quantidade disponível: <h5><?php echo $registro["PRO_UNIDADE"] ?></h5>
            <button class="btn btn-success" type="submit">Adicionar</button>
          </div>
          </div>
            </div>
            </div>
            
            

            
            

        <?php
            }
        ?>
        <?php
            mysqli_free_result($ofertas);
        ?>
        
        
          
         
    
      
    </div><!--fechamento postagem-->


    
    <div class="pt-5">
      <div id="rodape">
        Todos os direitos reservados
     </div>
    </div>
    
   

    
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
<?php
    mysqli_close($conecta);
?>