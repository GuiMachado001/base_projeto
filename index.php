<?php

require 'App/DB/Database.php';

$banco = new Database("usuario");

$users = $banco->select();

echo "<br>";
print_r($users);

for($i=0; $i<count($users); $i++){
    echo "<br>";
    echo $users[$i]['id_usuario']. ' '.$users[$i]['nome'];
}

// $del_user = $banco->delete('id_usuario = 7');

// if($del_user){
//     echo "<br>";
//     echo '<script> alert("Deletado com sucesso") </script>';
// }

$user_atualizar = $banco->select_by_id('id_usuario=1');

echo "<br>";
print_r($user_atualizar);

$user_atualizar['nome'] = "Novo Nome";
$user_atualizar['email'] = "novo@email.com";
$user_atualizar['cpf'] = '123456789';

echo "<br>";
echo `<pre>`;
print_r($user_atualizar);
echo `</pre>`;

$result = $banco->update('id_usuario = '.$user_atualizar['id_usuario'], $user_atualizar);