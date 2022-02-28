
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Editar Produto</title>
  </head>
  <body>
    <?php

        include "conexao.php";

        $id = $_GET['id'] ?? '';
        $sql = "SELECT * from produtos where id = '$id'";
        $dados = mysqli_query($connection, $sql);
        $linha = mysqli_fetch_assoc($dados);

        $sql1 = "SELECT * FROM categoria ORDER BY nome_categoria";
        $dados1= mysqli_query($connection, $sql1);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Categoria de Produtos</h1>

            <form action = 'produtos_edit.php' method="POST">
              <div class="form-group">
               <label for="nome_produto" class="form-label">Nome do Produto</label>
               <input type="text" class="form-control" name = "nome_produto" required value="<?php echo $linha['nome_produto'];?>">
             </div>

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


            <form>
              <div class="form-group">
               <label for="qtdeProduto" class="form-label">Quantidade no Estoque</label>
               <input type="number" class="form-control" id="qtdeProduto" size="10" name = "qtde_produto" required value="<?php echo $linha['qtde_produto'];?>>
             </div>

             <form>
              <div class="form-group">
               <label for="valorProduto" class="form-label">Valor (R$)</label>
               <input type="number" step="0.01" class="form-control" id="valorProduto" size="10" name = "valor_produto" required  value="<?php echo $linha['valor_produto'];?>>
             </div>

            <form>
              <div class="form-group">
               <label for="ativo" class="form-label">Ativo</label>
               <select class="form-select" aria-label="Default select example">
                 <option value="0">SIM</option>
                 <option value="1">NÃO</option>
               </select>
             </div>

            </form>

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Salvar Alterações">
                <input type="hidden" name="id" value= "<?php echo $linha['id_categoria'] ?>">
              </div>

              <div> <br> </div>              
         

            </form>

           </tbody>
         </table>

             <a href = "produtos.php" class = "btn btn-danger"> Voltar</a>


        </div>
      </div>
    </div>
    
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