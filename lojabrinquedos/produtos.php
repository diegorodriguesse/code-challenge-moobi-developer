<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Cadastro de produtos</title>
  </head>
  <body>

    <?php
 
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";
    $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$pesquisa%' ";
    $dados = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM categoria ORDER BY nome_categoria";
    $dados1= mysqli_query($connection, $sql1);
            
    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastro de Produtos</h1>

            <form action = 'cadastro_produto_script.php' method="POST">
              <div class="form-group">
               <label for="nomeProduto" class="form-label">Nome do Produto</label>
               <input type="text" class="form-control" id="nomeProduto" size="100" name="nome_produto" required>
             </div>

              <div> <br> </div>              

            <form>
              <div class="form-group">
               <label for="tipoProduto" class="form-label">Categoria</label>
               <!--<input type="text" class="form-control" id="tipoProduto" size="100" name = "categoria" required> -->
               <select name = categoria class="form-select" > 
                  <option>Selecione a categoria:</option>
                   <?php
                      while ($linha1 = mysqli_fetch_assoc($dados1)) { ?>
                        <option value="<?php echo $linha1['nome_categoria']; ?> "> <?php echo $linha1['nome_categoria']; ?> </option> <?php 
                      } 
                      ?>                        
               </select>
             </div>



              <div> <br> </div>              

            <form>
              <div class="form-group">
               <label for="qtdeProduto" class="form-label">Quantidade no Estoque</label>
               <input type="number" class="form-control" id="qtdeProduto" size="10" name = "qtde_produto" required>
             </div>

             <form>
              <div class="form-group">
               <label for="valorProduto" class="form-label">Valor (R$)</label>
               <input type="number" step="0.01" class="form-control" id="valorProduto" size="10" name = "valor_produto" required>
             </div>

            <form>
              <div class="form-group">
               <label for="ativo" class="form-label">Ativo</label>
               <select class="form-select" aria-label="Default select example">
                 <option value="SIM">SIM</option>
                 <option value="NAO">NÃO</option>
               </select>
             </div>

              <div> <br> </div>              

             <form>
               <div class="form-group">
                <input type="submit" class="btn-sucess">
              </div>

              <div> <br> </div>              
         

            </form>

            <div>
            <h3> Pesquisar produtos no estoque</h3>
            </div>

            <nav class="navbar navbar-light bg-light">
              <div class="container-fluid">
                <form class="d-flex" action="produtos.php" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Pesquisar Produto" aria-label="Search" name = "busca">
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
              </div>
            </nav>

            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome do Produto</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Quantidade (UNID.)</th>
                  <th scope="col">Valor R$</th>
                  <th scope="col">Ativo</th>
                  <th scope="col">Opções</th>



                </tr>
              </thead>
              <tbody>
                
                    <?php
                      while ($linha = mysqli_fetch_assoc($dados)) {
                        $id = $linha['id'];
                        $nome_produto = $linha['nome_produto'];
                        $categoria = $linha['categoria'];
                        $qtde_produto = $linha['qtde_produto'];
                        $valor_produto = $linha['valor_produto'];
                        $ativo = $linha['ativo'];
                        
                        echo "<tr>
                                <th scope='row'>$id</th>
                                <td>$nome_produto</td>
                                <td>$categoria</td>
                                <td>$qtde_produto</td>
                                <td>$valor_produto</td>
                                <td>$ativo</td>
                                <td width=150px>
                                        <a href='produtos_edit.php?id=$id' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                                        onclick=" .'"' ."pegar_dados($id, '$nome_produto')" .'"' .">Excluir</a>
                                    </td>
                              </tr>";
                      }

                    ?>


              </tbody>
            </table>


             <a href = "gerenciador.php" class = "btn btn-danger"> Voltar para o Início </a>


        </div>
      </div>
    </div>

    <!-- Modal -->
    
    <div class="modal fade" id="confirma_exclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirme a Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action = 'excluir_produto.php' method="POST">
            <p>Deseja excluir esse produto? <b id = "nome_produto">Produto</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_pro" value="">
              <input type="hidden" name="id" id="id" value="">
            <input type="submit" class="btn btn-danger" value='Sim'>
          </form>
          </div> 
        </div>
      </div>
    </div>
    

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_produto').innerHTML = nome;
        document.getElementById('nome_pro').value = nome;
        document.getElementById('id').value = id;
      }
    </script>
  



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>



</html>