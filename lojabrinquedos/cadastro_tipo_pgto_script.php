<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css.map" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Cadastro</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <?php

       include "conexao.php";

       
        $tipo_pgto = $_POST['tipo_pgto'];
        $parcela = $_POST['parcela'];
      

        $sql = "INSERT INTO `tipo_pgto`(`desc_tipo_pgto`, `parcela` ) VALUES ('$tipo_pgto', '$parcela')";

        if(mysqli_query($connection, $sql)){
          mensagem (" Tipo de pagamento $tipo_pgto cadastrado com sucesso.", 'sucess');
        }

        else mensagem ("Erro ao cadastrar o tipo de pagamento $tipo_pgto.", 'danger');

       ?>

        <a href = "tipo_pgto.php" class = "btn btn-primary"> Voltar </a>


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