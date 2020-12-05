    <?php
      include_once("../conexao/conexao.php")
    ?>
<?php
    //iniciar sessão
    session_start();
    //teste de segurança
    if ( !isset($_SESSION["user_portal"])){
      header("location: login.php");
    }
    
    //consulta ao bnaco de dados
    $consulta_entrega = "SELECT produto.PRO_NOME, cesta_compra.CES_QUANTIDADE, fornecedor.FORN_NM_FANTASIA, pedido.PED_DATA, pedido.PED_VALOR_TOTAL, entrega.ENT_DATA, entrega.ENT_HORARIO, entrega.ENT_STATUS, forma_pagamento.FPG_DESCRICAO ";
    $consulta_entrega .= " FROM PRODUTO, CESTA_COMPRA, FORNECEDOR, PEDIDO, ENTREGA, FORMA_PAGAMENTO, cesta_compra_produto ";
    $consulta_entrega .= " WHERE PRODUTO.PRO_CODIGO = cesta_compra_produto.PRODUTO_PRO_CODIGO ";
    $consulta_entrega .= " AND cesta_compra_produto.CESTA_COMPRA_CES_CODIGO = cesta_compra.CES_CODIGO ";
    $consulta_entrega .= " AND cesta_compra.PEDIDO_PED_CODIGO = pedido.PED_CODIGO ";
    $consulta_entrega .= " AND entrega.CESTA_COMPRA_CES_CODIGO = cesta_compra.CES_CODIGO ";
    $consulta_entrega .= " AND fornecedor.US_CNPJ_CPF = produto.US_CNPJ_CPF ";
    $consulta_entrega .= " AND pedido.ped_codigo = forma_pagamento.pedido_ped_codigo ";

    $entrega = mysqli_query($conecta,$consulta_entrega);
    if( !$entrega){
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
   
    <title>Tela do Pedido</title>
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
            <?php
        //SAUDAÇÃO
        if ( isset($_SESSION['user_portal']) ){
          $user = $_SESSION['user_portal'];

          $saudacao = "SELECT CLI_NOME ";
          $saudacao .= " FROM cliente ";
          $saudacao .= " WHERE US_CNPJ_CPF = {$user} ";

          $saudacao_login = mysqli_query($conecta, $saudacao);

          if ( !$saudacao_login ){
              die("falha na consulta");
          }

          $saudacao_login = mysqli_fetch_assoc($saudacao_login);
          $nome = $saudacao_login["CLI_NOME"];
    ?>
        <div id="header_saudacao" class="ml-auto text-white p-3"><h5>Bem vindo, <?php echo $nome ?></h5></div>
    <?php
        }
    ?>
        

          
    </nav>
  </header><!--Fim Cabecalho-->


    <div id="area-principal3" class="container">
        
        <!--abertura postagem-->
        <div class="card w-100 mx-auto border-success" >
          <div style="text-align: center;">
          <h4 class="card-header border-success">Meus Pedidos</h4>
          </div>

            
            

          <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Produto</th>
                 <th scope="col">Quantidade</th>
                <th scope="col">Fornecedor</th>
               <th scope="col">Data</th>
                 <th scope="col">Valor Total</th>
                 <th scope="col">Forma de Pagamento</th>
                <th scope="col">Data Entrega</th>
                 <th scope="col">Horario Entrega</th>
                <th scope="col">Status</th>
                <th scope="col">Avaliação</th>
               </tr>
            </thead>
           <tbody>
             <tr>

             <?php include_once("../php/funcoes.php")?>
            <?php include_once("../php/data.php")?>
            <?php include_once("../php/hora.php")?>
            <?php include_once("../php/datapedido.php")?>
        <?php
            while( $registro = mysqli_fetch_assoc($entrega)){
               
        ?>    

            <td><?php echo $registro["PRO_NOME"] ?></td>
            <td><?php echo $registro["CES_QUANTIDADE"] ?></td>
            <td><?php echo $registro["FORN_NM_FANTASIA"] ?></td>
            <td><?php echo date('d/m/Y', strtotime(($registro["PED_DATA"])));?></td>
            <td><?php echo real_format($registro["PED_VALOR_TOTAL"]) ?></td>
            <td><?php echo $registro["FPG_DESCRICAO"] ?></td>
            <td><?php echo date('d/m/Y', strtotime(($registro["ENT_DATA"]))); ?></td>
            <td><?php echo date('H:i', strtotime(($registro["ENT_HORARIO"]))); ?></td>
            <td><?php echo $registro["ENT_STATUS"] ?></td>
            
            
            
           
            
            </tr>

            <?php
            }
        ?>
                </tbody>
              </table>
              </div>
              </div>
              </div>

        
        <?php
            mysqli_free_result($entrega);
        ?>
        
    </div><!--fechamento postagem-->

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
<?php
    mysqli_close($conecta);
?>