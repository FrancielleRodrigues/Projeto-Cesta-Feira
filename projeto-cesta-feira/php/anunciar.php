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
   

    <title>Área do Fornecedor - Cesta Feira</title>
  </head>
  <body>
    <header><!--Inicio Cabecalho-->

      <nav class="navbar fixed-top navbar-expand-lg navbar-dark nav" style="background-color: #467302;">
        <div class="container">
          <div>
              <a href="index.php" class="navbar-brand">
                    <img src="imagens/logo-p.png" width="100">
              </a>
          </div>
        </div>
      </nav>

      </header>

       <div id="area-principal2" class="container">
         <div class="card  border-success w-75  mx-auto" >
          <div>
            <h4 class="card-header border-success" style="text-align: center;">Área do Fornecedor</h4>
            </div>
          <div class="card-body">
            <form>
              <div class="form-row ml-auto mr-auto pt-2">
              
                <div class="form-row">
                  <div class="form-group col-md">
                    <div class="dropdown">
                      <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item"  data-toggle="collapse" href="#collapseProduto" role="button" aria-expanded="false" aria-controls="collapseExample">Novo Produto</a>
                        <a class="dropdown-item" href="cadastro-pf.html">Mostrar Produtos</a>
                      </div>
                    </div>
                  </div>
                    <div class="form-group col-md">
                    <div class="dropdown">
                      <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pedidos
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="produto.html">Mostrar Pedidos</a>
                   
                      </div>
                    </div>
                    </div>
                    <div class="form-group col-md">
                      <div class="dropdown">
                        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Entrega
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="produto.html">Entregas agendadas</a>
                          <a class="dropdown-item" href="cadastro-pf.html">Entregas finalizadas</a>
                        </div>
                      </div>
                      </div>
                      <div class="form-group col-md">
                        <div class="dropdown">
                          <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Avaliações
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="produto.html">Avaliação Produto</a>
                            <a class="dropdown-item" href="cadastro-pf.html">Avaliação Entrega</a>
                          </div>
                        </div>
                        </div>
                    
                      
                  </div>
                </div>

                <div class="collapse" id="collapseProduto">
                  <div class="card card-body border-success ">
                    <div class="mr-auto">
                      <h4>Cadastro de Produto</h4>
                      </div>
          
                      <form>
                        <div class="form-row mr-auto pt-2">
                          <div class="form-group col-md-6">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" placeholder="Ex.: Maçã Argentina">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputNome">Unidade de venda</label>
                            <input type="text" class="form-control" placeholder="Ex.: Kg">
                          </div>
                          </div>
          
                          <div class="form-row mr-auto">
                              <div class="form-group col-md-5">
                                  <label for="inputNome">Preço</label>
                                  <input type="text" class="form-control" placeholder="Ex.: R$ 9,99">
                                </div>
                            <div class="form-group col-md-5">
                              <label for="inputEstado">Categoria</label>
                              <select id="inputEstado" class="form-control">
                                <option selected>Selecione</option>
                                <option>Fruta</option>
                                <option>Verdura</option>
                                <option>Hortaliça</option>
                                <option>Legume</option>
                              </select>
                            </div>
                          </div>
          
                          <div class="form-row mr-auto">
                            <div class="form-group col-md">
                              <label for="exampleFormControlFile1">Imagem</label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                          </div>
          
                         
          
                          <div class="form-row mr-auto pt-2">
                            <div class="form-group col-md-20">
                              <label for="exampleFormControlTextarea1">Descrição</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                          </div>
          
                          <div class="form-row mr-auto">
                            <div class="form-group col-md">
                            <button class="btn btn-success" type="submit">Cadastrar</button>
                            <a href="index.html" class="btn btn-danger">Cancelar</a>
                              
                          </div>
                          </div>
                          
          
                         
                            
                          
                      </form>
                  </div>
                </div>
                    
                
                </div>
                

               
                  
                
            </form>
            </div><!--Fim do Card-->
            </div>
            </div>
      


    
    
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>