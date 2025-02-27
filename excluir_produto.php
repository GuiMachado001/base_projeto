<?php

require './App/Classes/Produto.php';

if(isset($_GET['id_prod'])){

  $id = $_GET['id_prod'];

  $objUser = new Produto;

  $user_delete = $objUser->buscar_por_id($id);

  // print_r($user_delete);

  $del = $user_delete->excluir();

  if($del){
    header('location: ./listar_produtos.php');
    exit();
  }
}