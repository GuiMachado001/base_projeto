<?php
  require './App/Classes/Usuario.php';

  // $objUser = new Usuario();

  if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];


    // ----------- manipulando arquivos com php
    // print_r($_FILES);
    $arquivo = $_FILES['foto'];
    if($arquivo['error']) die ("Falha ao enviar a foto");
    $pasta = './uploads/fotos/';
    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
    if($extensao != 'png' && $extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'svg'  ) die ("Arquivo Inválido!");
    $path = $pasta . $novo_nome . '.'. $extensao;
    $foto = move_uploaded_file($arquivo['tmp_name'], $path);

    // echo "MOVED: ".$foto;

      // ----------validar tamanho do arquivo
    // $tamanho = $arquivo['size'];
    // if($tamanho > 500){
    //   echo "Tamanho inválido";
    // }

    // -----------


    $objUser = new Usuario();

    $objUser->nome = $nome;
    $objUser->cpf = $cpf;
    $objUser->senha = password_hash($senha, PASSWORD_DEFAULT);
    $objUser->email = $email;
    $objUser->foto = $path;
    $objUser->id_perfil = $perfil;

    $res = $objUser->cadastrar();

    if($res){
      echo "<script>alert('Cadastrado com Sucesso') </script>";
    }else{
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
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
        <h1 class="mt-4 text-center">Cadastro de Usuario</h1>
    </div>
    
    <div class="container">
        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

              
            <div class="mb-3">
                <label for="cpf" class="form-label">cpf</label>
                <input type="cpf" class="form-control" id="cpf" name="cpf">
            </div>

              
            <div class="mb-3">
                <label for="senha" class="form-label">senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>

            <div class="mb-3">
              <select class="form-select" name="perfil" aria-label="Default select example">
                <option selected>Selecione o ID</option>
                <option value="1">ADM</option>
                <option value="2">Supervisor</option>
                <option value="3">Usuario</option>
              </select>
            </div>
                

            <button type="reset" class="btn btn-danger">Cancelar</button>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>

          </form>
    </div>

</body>
</html>