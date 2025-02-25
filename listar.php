<?php
  require './App/Classes/Usuario.php';


  $objUser = new Usuario();

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
                <a class="nav-link" href="#">Listar</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    <div class="p-5 bg-dark text-white rounded">
        <h1>SysCad</h1>
    </div>
    <div class="container">
        <h1 class="mt-4 text-center">Listar Usuario </h1>
    </div>
    
    <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Foto</th>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">E-mail</th>
              <th scope="col">Id Perfil</th>
              <th scope="col">Editar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>

          <tbody>
            <?php
              foreach($dados as $usuario){
                echo '
                <tr>
                  <th scope="row">'.$usuario->id_usuario.'</th>
                  <td ><img src='.$usuario->foto.' style="width: 100px;"></td>
                  <td>'.$usuario->nome.'</td>
                  <td>'.$usuario->cpf.'</td>
                  <td>'.$usuario->email.'</td>
                  <td>'.$usuario->id_perfil.'</td>
                  <td><a class="btn btn-primary" href="./editar_usuario.php?id_user='.$usuario->id_usuario.'"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a class="btn btn-danger" href="./excluir_usuario.php?id_user='.$usuario->id_usuario.'" ><i class="bi bi-trash3"></i></a></td>

                </tr>
                ';
              }
            ?>

          </tbody>
        </table>
    </div>

</body>
</html>