<?php
 
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";
    $sql = "SELECT * FROM tipo_pgto WHERE desc_tipo_pgto LIKE '%$pesquisa%' ";
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
          <!--

          <h1>Cadastro de Tipos de Pagamento</h1>

            <form action = 'cadastro_tipo_pgto_script.php' method="POST">
              <div class="form-group">
               <label for="tipo_pgto" class="form-label">Tipo de Pagamento</label>
               <input type="text" class="form-control" id="tipo_pgto" size="100" name = "tipo_pgto" required>
             </div>

             <div class="form-group">
               <label for="parcela" class="form-label">Parcelas</label>
               <input type="number" class="form-control" id="parcela" size="100" name = "parcela" required>
             </div>

             <form>
               <div class="form-group">
                <input type="submit" class="btn-sucess">
              </div>

              <div> <br> </div>              
         
            </form>

-->
            <br><br><br>
            <h3>Tipos de Pagamento</h3>

<!--
             <nav class="navbar navbar-light bg-light">
              <div class="container-fluid">
                <form class="d-flex" action="tipo_pgto.php" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Pesquisar Tipo de Pagamento" aria-label="Search" name = "busca">
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
              </div>
            </nav>
-->

            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tipo de Pagamento</th>
                  <th scope="col">Parcelas</th>


                </tr>
              </thead>
              <tbody>
                
                    <?php
                      while ($linha = mysqli_fetch_assoc($dados)) {
                        $id_tipo_pgto = $linha['id_tipo_pgto'];
                        $desc_tipo_pgto = $linha['desc_tipo_pgto'];
                        $parcela = $linha['parcela'];

                        echo "<tr>
                                <th scope='row'>$id_tipo_pgto</th>
                                <td>$desc_tipo_pgto</td>
                                <td>$parcela</td>
                              </tr>";
                      }

                    ?>


           </tbody>
         </table>

                <a href = "gerenciador.php" class = "btn btn-danger"> Voltar para o Início </a>


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