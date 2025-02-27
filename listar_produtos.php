<?php
  require './App/Classes/Produto.php';


  $objUser = new Produto();

  $dados = $objUser->buscar();

  // print_r($dados);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listar.php">Listar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastrar_produto.php">Cadastrar Produto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listar_produtos.php">Listar Produtos</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    <div class="p-5 bg-dark text-white rounded">
        <h1>SysCad</h1>
    </div>
    <div class="container">
        <h1 class="mt-4 text-center">Listar Produto </h1>
    </div>
    
    <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Foto</th>
              <th scope="col">Nome</th>
              <th scope="col">Descricao</th>
              <th scope="col">Preco</th>
            </tr>
          </thead>

          <tbody>
            <?php
              foreach($dados as $produto){
                echo '
                <tr>
                  <th scope="row">'.$produto->id_produto.'</th>
                  <td ><img src='.$produto->foto.' style="width: 100px;"></td>
                  <td>'.$produto->nome.'</td>
                  <td>'.$produto->descricao.'</td>
                  <td><a class="btn btn-primary" href="./editar_produto.php?id_prod='.$produto->id_produto.'"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a class="btn btn-danger" href="./excluir_produto.php?id_prod='.$produto->id_produto.'"><i class="bi bi-trash3"></i></a></td>

                </tr>
                ';
              }
            ?>

          </tbody>
        </table>
    </div>

</body>
</html>