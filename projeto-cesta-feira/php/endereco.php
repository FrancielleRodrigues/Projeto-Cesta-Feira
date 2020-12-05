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
      
      $confirmar_endereco = "SELECT ENDERECO.END_CODIGO, ENDERECO.END_LOGRADOURO, ENDERECO.END_NUMERO, ENDERECO.END_COMPLEMENTO, ENDERECO.END_BAIRRO, ENDERECO.END_CEP, ENDERECO.US_CNPJ_CPF, CIDADE.CID_NOME, UNIDADE_FEDERATIVA.UF_NOME ";
      $confirmar_endereco .= " FROM ENDERECO, unidade_federativa, CIDADE ";
      $confirmar_endereco .= " WHERE ENDERECO.CID_CODIGO = CIDADE.CID_CODIGO ";
      $confirmar_endereco .= " AND endereco.UF_CODIGO = unidade_federativa.UF_CODIGO ";

      $endereco = mysqli_query($conecta,$confirmar_endereco);
    if( !$endereco ){
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
   

    <title>Meu Endereço - Cesta Feira</title>
  </head>
  <body>
    <header><!--Inicio Cabecalho-->

      <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav" style="background-color: #467302;">
        <div class="container">
          <div>
              <a href="index.php" class="navbar-brand">
                    <img src="imagens/logo-p.png">
              </a>
          </div>
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
      <div class="ml-auto text-white p-2"><h5>Bem vindo, <?php echo $nome ?></h5></div>
    <?php
        }
    ?>
        
      </nav>

      </header>

       <div id="area-principal2" class="container">
         <div class="card w-100 mx-auto border-success" >
          <div style="text-align: center;">
            <h4 class="card-header border-success">Confirmar Endereço</h4>
            </div>

            <?php
            while( $registro = mysqli_fetch_assoc($endereco)){
            ?>   

          <div class="card-body">

          <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">CEP</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
                <tr>

                <td> <img src = "imagens/localizacao-v.png"></td>
                <td> <?php echo $registro["END_CEP"] ?></td>
                <td> <?php echo $registro["END_LOGRADOURO"] ?></td>
                <td> <?php echo $registro["END_NUMERO"] ?></td>
                <td> <?php echo $registro["END_COMPLEMENTO"] ?></td>
                <td> <?php echo $registro["END_BAIRRO"] ?></td>
                <td> <?php echo $registro["CID_NOME"] ?></td>
                <td> <?php echo $registro["UF_NOME"] ?></td>
            

                </tbody>
              </table>
              </div>
              <div class="p-2">
              <a href="tela_pedido.php" class="btn btn-success">Confirmar</a>
              <a href="index.php" class="btn btn-danger">Cancelar</a>
              <a href="inserir_endereco.php" class="btn btn btn-primary ml-auto">Novo Endereço</a>
           
            </div>

            </div>
            </div>

            </div>
      
            <?php
            }
        ?>
        <?php
            mysqli_free_result($endereco);
        ?>
          
            
            
    
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
<?php
    mysqli_close($conecta);
?>