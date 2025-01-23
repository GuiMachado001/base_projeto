<?php

require './App/Classes/Usuario.php';

$user = new Usuario;

//Pegando os dados do forms

$user->nome = "Guilherme Machado";
$user->cpf = "00000000004";
$user->email = "guilherme@email.com";
$user->senha = "123456";
$user->id_perfil = 1;

print_r($user);