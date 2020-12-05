    <?php
      include_once("../conexao/conexao.php")
    ?>
    <?php
        //mostrar dados
        $mostrar_cesta = "SELECT PRODUTO.PRO_NOME, CESTA_COMPRA.CES_QUANTIDADE, CESTA_COMPRA.CES_VL_UNIDADE, cesta_compra.PEDIDO_CLIENTE_US_CNPJ_CPF, PRODUTO.PRO_CODIGO, CESTA_COMPRA_PRODUTO.PRODUTO_PRO_CODIGO, PRODUTO.PRO_IMAGEM  ";
        $mostrar_cesta .= " FROM produto INNER JOIN cesta_compra_produto ";
        $mostrar_cesta .= " ON cesta_compra_produto.PRODUTO_PRO_CODIGO = PRODUTO.PRO_CODIGO ";
        $mostrar_cesta .= " INNER JOIN CESTA_COMPRA ON CESTA_COMPRA.CES_VL_UNIDADE = PRODUTO.PRO_VALOR ";

        $cesta = mysqli_query($conecta,$mostrar_cesta);
    if( !$cesta){
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   

    <title>Minha Cesta - Cesta Feira</title>
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

      </header>

       <div id="area-principal" class="container">
         <div class="card w-75 mx-auto border-success" >
          <div style="text-align: center;">
            <h4 class="card-header border-success">Minha Cesta</h4>
            </div>
          <div class="card-body">

          <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <tr>

               <?php include_once("../php/funcoes.php")?>
               <?php
              
               while( $registro = mysqli_fetch_assoc($cesta)){
               

              ?>    
            <td><img src = <?php echo $registro["PRO_IMAGEM"] ?> width=80px></td>
            <td><?php echo $registro["PRO_NOME"] ?></td>
            <td><?php echo $registro["CES_QUANTIDADE"] ?></td>
            <td><?php echo real_format($registro["CES_VL_UNIDADE"]); ?></td>

          
           
            <td>
              <button type="button" class="btn btn-danger btn-sm">Excluir</button>
            </td>

        

            </tr>
           <?php
         
          
        }
                    ?>
              
              </div>
            </div>    
            </div>
            </div>

              </tbody>
              


              </table>
         
              <div>
              <?php 
                      $soma_valor = " SELECT sum(ces_vl_unidade * ces_quantidade) ";
                      $soma_valor .= " FROM cesta_compra ";

                      $total = mysqli_query($conecta,$soma_valor);
                      if(!$total){
                          die("falha na consulta ao banco");
                      } while( $dado = mysqli_fetch_assoc($total)){
                      

            ?>
          <div style="text-align: right">
            <h4 class="p-3">Valor Total: <?php echo real_format($dado["sum(ces_vl_unidade * ces_quantidade)"]); ?></h4>
                      </div>
          
            <?php       
          }
          ?>

            <div class="form-group col-md-4 ml-auto">
              <label for="inputState">Forma de pagamento:</label>
             <select id="inputState" class="form-control">
              <option selected>Escolha uma opção</option>
                <option>Dinheiro</option>
                <option>Cartão de Crédito</option>
                 </select>
                 </div>

          </div>
             <div>
              <a href="login.php" class="btn btn-success">Finalizar Compra</a>
              <a href="index.php" class="btn btn-danger">Cancelar</a>
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