
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
    <?php

        include "conexao.php";

        $id = $_GET['id'] ?? '';
        $sql = "SELECT * from categoria where id_categoria = '$id'";
        $dados = mysqli_query($connection, $sql);
        $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Categoria de Produtos</h1>

            <form action = 'categoria_edit_script.php' method="POST">
              <div class="form-group">
               <label for="categoria" class="form-label">Categoria</label>
               <input type="text" class="form-control" name = "categoria" required value="<?php echo $linha['nome_categoria'];?>">
             </div>

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Salvar Alteração">
                <input type="hidden" name="id" value= "<?php echo $linha['id_categoria'] ?>">
              </div>

              <div> <br> </div>              
         

            </form>

           </tbody>
         </table>

             <a href = "categoria.php" class = "btn btn-danger"> Voltar</a>


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