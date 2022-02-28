<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Cadastro</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <?php

       include "conexao.php";

        $nome_produto = $_POST['nome_produto'];
        $categoria = $_POST['categoria'];
        $qtde_produto = $_POST['qtde_produto'];
        $valor_produto = $_POST['valor_produto'];
        $ativo = $_POST['ativo'];




        $sql = "INSERT INTO `produtos`(`nome_produto`, `categoria`, `qtde_produto`, `valor_produto`, `ativo` ) VALUES ('$nome_produto','$categoria', '$qtde_produto', '$valor_produto', '$ativo')";

        if(mysqli_query($connection, $sql)){
          //echo "$nome_produto cadastrado com sucesso.";
          mensagem ("$nome_produto cadastrado com sucesso.", 'sucess');
        }

        //else echo "Erro ao cadastrar o produto $nome_produto.";;
        else mensagem ("Erro ao cadastrar o produto $nome_produto.", 'danger');

       ?>

        <a href = "produtos.php" class = "btn btn-danger"> Voltar </a>


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