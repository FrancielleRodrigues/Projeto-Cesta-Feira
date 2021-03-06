    <?php
      include_once("../conexao/conexao.php")
    ?>
    <?php
      session_start();
      if ( isset($_POST["cpf_cnpj"])){
        $cpf_cnpj = $_POST["cpf_cnpj"];
        $senha    = $_POST["senha"];

        $login = "SELECT * ";
        $login .= "FROM usuario ";
        $login .= "WHERE US_CNPJ_CPF = '{$cpf_cnpj}' and US_SENHA = '{$senha}' ";

        $acesso = mysqli_query($conecta, $login);

        if ( !$acesso ){
            die("falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);

        if ( empty($informacao) ){
            $mensagem = "CNPJ/CPF ou senha inválido";
        } else {
            $_SESSION["user_portal"] = $informacao["US_CNPJ_CPF"];
            header("location:endereco.php");
        }
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
   

    <title>Entrar - Cesta Feira</title>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav" style="background-color: #467302;">
      <div class="container">
        <div>
            <a href="index.php" class="navbar-brand">
                  <img src="imagens/logo-p.png" width="100">
            </a>
        </div>
      </div>
    </nav>

   
    
    <div id="area-principal4" class="container">


                  <?php
                  if( isset($mensagem)){
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERRO! </strong><?php echo $mensagem; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                  }
                ?>

    <div class="card w-50 mx-auto border-success" >
    <div style="text-align: center;">
          <h4 class="card-header border-success">Fazer Login</h4>
          </div>
      <div class="card-body">
        
        <form action = "login.php" method= "post" >
          <div class="form-row ml-auto mr-auto pt-2">
            <div class="form-group col-md-6 offset-md-3">
              <label for="inputNome">CPF ou CNPJ</label>
              <input type="text" class="form-control" name = "cpf_cnpj" placeholder="Ex.: 11222333444455">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Digite somente números
              </small>
            </div>
            </div>
            <div class="form-row ml-auto mr-auto">
              <div class="form-group col-md-6 offset-md-3">
                <label for="inputNome">Senha</label>
                <input type="password" class="form-control" name = "senha" placeholder="Senha">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Digite sua senha
                </small>
                <br>
                  <a href="#" target="_blank">Esqueceu a senha?</a>
              </div>
            </div>
              <div class="form-row ml-auto mr-auto">
                <div class="form-groupcol-md-6 offset-md-3">
                <input class="btn btn-success" type="submit" value="login">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                  
              </div>
              <div class="form-row mx-auto p-3">
                <h6>Ainda não tem cadastro? </h6> <a href="cadastro-pf.html">Cadastre-se</a>
              </div>
              </div>
              
        </form>

        </div>
      </div>
      
   </div>
 
   <?php
     
      
    ?>
    
          
    

    
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>