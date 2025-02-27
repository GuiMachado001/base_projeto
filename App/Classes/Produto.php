<?php
require './App/DB/Database.php';

class Produto{
    public int $id_produto;
    public string $nome;
    public string $descricao;
    public string $preco;
    public string $foto;

    public function cadastrar(){
        $db = new Database('produto');

        $res = $db->insert(
                [
                    'nome'=> $this->nome,
                    'descricao'=> $this->descricao,
                    'preco'=> $this->preco,
                    "foto" => $this->foto,
                ]
            );
        return $res;
    }

    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('produto');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id){
        $db = new Database('produto');

        $obj = $db->select('id_produto ='.$id)->fetchObject(self::class);
        return $obj; //retorna um obj da classe usuario
    }

    public function atualizar(){
        $db = new Database('produto');

        $res = $db->update("id_produto =".$this->id_produto,
                            [
                                "nome" => $this->nome,
                                "descricao" => $this->descricao,
                                "preco" => $this->preco,
                                "foto" => $this->foto,
                            ]
                        );

        return $res;
    }


    public function excluir(){
        $db = new Database('produto');

        $res = $db->delete('id_produto ='.$this->id_produto);
        return $res;
    }
}