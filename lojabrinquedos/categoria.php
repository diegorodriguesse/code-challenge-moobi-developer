<?php

    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";
    $sql = "SELECT * FROM categoria WHERE nome_categoria LIKE '%$pesquisa%' ";
    $dados = mysqli_query($connection, $sql);
            
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Cadastro de  Categoria de Produtos</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastro de Categoria de Produtos</h1>

            <form action = 'conexao_categoria_script.php' method="POST">
              <div class="form-group">
               <label for="categoria" class="form-label">Categoria</label>
               <input type="text" class="form-control" id="categoria" size="100" name = "categoria" required>
             </div>

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-sucess">
              </div>

              <div> <br> </div>              
         

            </form>

            <h3>Categorias Cadastradas</h3>


             <nav class="navbar navbar-light bg-light">
              <div class="container-fluid">
                <form class="d-flex" action="categoria.php" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Pesquisar Categoria" aria-label="Search" name = "busca">
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
              </div>
            </nav>

            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
                
                    <?php
                      while ($linha = mysqli_fetch_assoc($dados)) {
                        $id_categoria = $linha['id_categoria'];
                        $nome_categoria = $linha['nome_categoria'];
                        
                           echo "<tr>
                                    <th scope='row'>$id_categoria</th>
                                    <td>$nome_categoria</td>
                                    <td width=150px>
                                        <a href='categoria_edit.php?id=$id_categoria' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                                        onclick=" .'"' ."pegar_dados($id_categoria, '$nome_categoria')" .'"' .">Excluir</a>
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
            <form action = 'excluir_categoria.php' method="POST">
            <p>Deseja excluir essa categoria? <b id = "nome_categ">Categoria</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_cat" value="">
              <input type="hidden" name="id" id="id_categoria" value="">
            <input type="submit" class="btn btn-danger" value='Sim'>
          </form>
          </div> 
        </div>
      </div>
    </div>
    

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_categ').innerHTML = nome;
        document.getElementById('nome_cat').value = nome;
        document.getElementById('id_categoria').value = id;
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