<?php

require '../DB/Database.php';

class Usuario{
    public string $nome;
    public string $email;
    public string $cpf;
    public string $senha;
    public int $id_perfil;

    public function cadastrar(){
        $db = new Database('usuario');

        $db->insert(
                [
                    'nome'=> $this->nome,
                    'email'=> $this->email,
                    'cpf'=> $this->cpf,
                    'senha'=> $this->senha,
                    'id_perfil'=> $this->id_perfil,
                ]
            );
        return true;
    }

    public function buscar(){
        return (new Database('usuario'))->select()->fetchAll(PDO::FETCH_CLASS,self::class);
    }

}


$user = new Usuario;

//Pegando os dados do forms

$user->nome = "Teste";
$user->cpf = "00000000004";
$user->email = "teste@email.com";
$user->senha = "123456";
$user->id_perfil = 1;

print_r($user);

// $res = $user->cadastrar();
// echo $res;

$usuarios = $user->buscar();

echo '<pre>';
print_r($usuarios);
echo '</pre>';

foreach($usuarios as $usuario){
    echo '<br>';
    echo $usuario->nome ;
}