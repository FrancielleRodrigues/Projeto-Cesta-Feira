    <?php
      include_once("../conexao/conexao.php")
    ?>
    
    <?php
      session_start();

      //teste de segurança
      if ( !isset($_SESSION["user_portal"])){
          header("location: login.php");
      }
      //inserção de dados
      

      //seleção de estados
      $select = "SELECT UF_CODIGO, UF_NOME ";
      $select .= " FROM unidade_federativa ";
      $lista_estado = mysqli_query($conecta,$select);
      if( !$lista_estado) {
          die("Erro no banco");
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
    <?php
                        if( isset($_POST["CEP"])){
                          print_r($_POST);
                        }
                        
                      ?>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav" style="background-color: #467302;">
        <div class="container">
          <div>
              <a href="index.php" class="navbar-brand">
                    <img src="imagens/logo-p.png" width="100">
              </a>
          </div>
        </div>
        <?php //include_once("../php/saudacao.php")?>
        <?php //echo mostrarnome($nome);?>
      </nav>

      </header>

       <div id="area-principal2" class="container">
         <div class="card w-75 mx-auto border-success" >
          <div style="text-align: center;">
            <h4 class="card-header border-success">Cadastrar Endereço</h4>
            </div>
          <div class="card-body">
            
            <form action="inserir_endereco.php" method="post">
              <div class="form-row ml-auto mr-auto">
                <div class="form-group col-md-4">
                  <label for="inputNome">*CEP</label>
                  <div class="input-group  mx-auto">
                    <input type="text" name="CEP" class="form-control"  placeholder="Ex.: 11222333">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-success">
                      <img src="imagens/procurar.png">
                      </button>

                  </div>
                  </div>
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Digite somente números
                  </small>
                  
                </div>
                <div class="form-group col-md-4">
                  <br>
                  <br>
                  <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" target="_blank">Não sei meu CEP</a>
                </div>
                </div>

                <div class="form-row ml-auto mr-auto">
                  <div class="form-group col-md-6">
                    <label for="inputNome">*Logradouro</label>
                    <input type="text" name="logradouro" class="form-control" placeholder="Ex.: Rua das flores">
                    
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputNome">Número</label>
                    <input type="text" name="numero" class="form-control" placeholder="Ex.: 20">
                    
                  </div>
                  </div>

                  <div class="form-row ml-auto mr-auto">
                    <div class="form-group col-md-6">
                      <label for="inputNome">*Bairro</label>
                      <input type="text" name="bairro" class="form-control" placeholder="Ex.: Jardim Encantado">
                      
                    </div>
                  </div>

                  <div class="form-row ml-auto mr-auto">
                    <div class="form-group col-md-8">
                      <label for="inputNome">Complemento</label>
                      <input type="text" name="complemento" class="form-control" placeholder="Ex.: Casa/Apartamento">
                      
                    </div>
                  </div>

                  <div class="form-row ml-auto mr-auto">
                    <div class="form-group col-md-6">
                      <label for="inputNome">*Cidade</label>
                      <input type="text" name="cidade" class="form-control" placeholder="Ex.: Casa/Apartamento">
                      
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputNome">*Estado</label>
                      <select name="unidade_federativa"class="form-control">
                        <?php
                          while($linha = mysqli_fetch_assoc($lista_estado)){
                        ?>
                        <option value="<?php echo $linha["UF_CODIGO"] ?>">
                        <?php echo $linha["UF_NOME"] ?>
                        </option>
                        <?php
                          }
                        ?>
                      </select>
                     
                    </div>
                  </div>
                  
                  

            </form>
              
              <div class="pb-2">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  *Campos Obrigatórios
                </small>
              </div>
              <div>
              <input type="submit" value="Cadastrar" class="btn btn-success"></input>
              <a href="index.php" class="btn btn-danger">Cancelar</a>
              
            </div>

            </div>
            </div>
            
            </div>
      
           
          
            
            
    
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>