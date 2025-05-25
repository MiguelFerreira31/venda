<?php

class Produto extends Model
{



    public function getListarProduto()
    {

        $sql = "SELECT *
                FROM tbl_produto 
                ORDER BY nome_produto ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function addProduto($dados)
    {

        $sql = "INSERT INTO tbl_produto (nome_produto, descricao_produto, preco_produto)
                 VALUES (
                :nome_produto, 
                :descricao_produto, 
                :preco_produto)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_produto', $dados['nome_produto']);
        $stmt->bindValue(':descricao_produto', $dados['descricao_produto']);
        $stmt->bindValue(':preco_produto', $dados['preco_produto']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }


    public function buscarPorNome($nome)
    {
        $stmt = $this->db->prepare("SELECT id_produto, nome_produto FROM tbl_produto WHERE nome_produto LIKE ? LIMIT 10");
        $stmt->execute(["%" . $nome . "%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $stmt = $this->db->prepare("SELECT id_produto, nome_produto, descricao_produto, preco_produto FROM tbl_produto WHERE id_produto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getContarProduto()
    {

        $sql = "SELECT COUNT(*) AS total_produtos FROM tbl_produto";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
