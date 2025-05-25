<?php
class Venda extends Model
{
    public function criarVenda($idCliente, $total, $numParcelas)
    {
        $sql = "INSERT INTO tbl_compras (id_cliente, total, num_parcelas, data_compra) 
                VALUES (:id_cliente, :total, :num_parcelas, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $idCliente, PDO::PARAM_INT);
        $stmt->bindValue(':total', $total);
        $stmt->bindValue(':num_parcelas', $numParcelas, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function adicionarItem($idVenda, $idProduto, $quantidade, $precoProduto, $subtotal)
    {
        $produto = $this->buscarProdutoPorId($idProduto);
        if (!$produto) {
            throw new Exception("Produto não encontrado");
        }

        $sql = "INSERT INTO tbl_itens_compra 
                (id_compra, id_produto, nome_produto, descricao, preco_unitario, quantidade, subtotal)
                VALUES (:id_compra, :id_produto, :nome_produto, :descricao, :preco_unitario, :quantidade, :subtotal)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_compra', $idVenda, PDO::PARAM_INT);
        $stmt->bindValue(':id_produto', $idProduto, PDO::PARAM_INT);
        $stmt->bindValue(':nome_produto', $produto['nome_produto']);
        $stmt->bindValue(':descricao', $produto['descricao_produto']);
        $stmt->bindValue(':preco_unitario', $precoProduto);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->bindValue(':subtotal', $subtotal);

        return $stmt->execute();
    }

    public function adicionarParcela($idVenda, $valor, $vencimento, $numeroParcela)
    {
        $sql = "INSERT INTO tbl_parcelas_compra 
                (id_compra, numero_parcela, valor, data_vencimento, pago)
                VALUES (:id_compra, :numero_parcela, :valor, :data_vencimento, 0)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_compra', $idVenda, PDO::PARAM_INT);
        $stmt->bindValue(':numero_parcela', $numeroParcela, PDO::PARAM_INT);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':data_vencimento', $vencimento);

        return $stmt->execute();
    }

    private function buscarProdutoPorId($idProduto)
    {
        $sql = "SELECT nome_produto, descricao_produto 
                FROM tbl_produto 
                WHERE id_produto = :id_produto 
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_produto', $idProduto, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function clienteExiste($idCliente)
    {
        $sql = "SELECT COUNT(*) FROM tbl_cliente WHERE id_cliente = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function produtoExiste($idProduto)
    {
        $sql = "SELECT COUNT(*) FROM tbl_produto WHERE id_produto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $idProduto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function iniciarTransacao()
    {
        return $this->db->beginTransaction();
    }

    public function commitTransacao()
    {
        return $this->db->commit();
    }

    public function rollbackTransacao()
    {
        return $this->db->rollBack();
    }

    public function getContarVenda()
    {

        $sql = "SELECT COUNT(*) AS total_vendas FROM tbl_compras";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getListarVenda()
    {

        $sql = "SELECT 
                    c.*,
                    cli.nome_cliente
                    FROM tbl_compras c
                    JOIN tbl_cliente cli ON c.id_cliente = cli.id_cliente
                    ORDER BY c.data_compra DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirVenda($id)
    {
        try {
            $this->iniciarTransacao();


            $sqlParcelas = "DELETE FROM tbl_parcelas_compra WHERE id_compra = :id";
            $stmt = $this->db->prepare($sqlParcelas);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();


            $sqlItens = "DELETE FROM tbl_itens_compra WHERE id_compra = :id";
            $stmt = $this->db->prepare($sqlItens);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $sqlCompra = "DELETE FROM tbl_compras WHERE id_compra = :id";
            $stmt = $this->db->prepare($sqlCompra);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $this->commitTransacao();
            return true;
        } catch (Exception $e) {
            $this->rollbackTransacao();
            error_log('Erro ao excluir venda: ' . $e->getMessage());
            return false;
        }
    }

    public function getVendaById($id)
    {
        $sql = "SELECT 
        c.id_compra,
        c.id_cliente,
        cli.nome_cliente,
        c.data_compra,
        c.total,
        c.num_parcelas,

        i.id_item,
        i.id_produto,
        i.nome_produto,
        i.descricao AS descricao_produto,
        i.preco_unitario,
        i.quantidade,
        i.subtotal,

        p.id_parcela,
        p.numero_parcela,
        p.valor AS valor_parcela,
        p.data_vencimento,
        p.pago

    FROM tbl_compras c
    INNER JOIN tbl_cliente cli ON c.id_cliente = cli.id_cliente
    LEFT JOIN tbl_itens_compra i ON c.id_compra = i.id_compra
    LEFT JOIN tbl_parcelas_compra p ON c.id_compra = p.id_compra

    WHERE c.id_compra = :id
    ORDER BY i.id_item, p.numero_parcela";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getParcelaById($id)
    {
        $sql = "SELECT * FROM tbl_parcelas_compra WHERE id_compra = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getItemById($id)
    {
        $sql = "SELECT * FROM tbl_itens_compra WHERE id_compra = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function atualizarVenda($idCompra, $idCliente, $total, $dataCompra)
    {
        $sql = "UPDATE tbl_compras SET id_cliente = :id_cliente, total = :total, data_compra = :data_compra WHERE id_compra = :id_compra";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $idCliente, PDO::PARAM_INT);
        $stmt->bindValue(':total', $total);
        $stmt->bindValue(':data_compra', $dataCompra);
        $stmt->bindValue(':id_compra', $idCompra, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function atualizarItem($idItem, $nomeProduto, $descricao, $precoUnitario, $quantidade, $subtotal)
    {
        $sql = "UPDATE tbl_itens_compra SET nome_produto = :nome_produto, descricao = :descricao, preco_unitario = :preco_unitario, quantidade = :quantidade, subtotal = :subtotal WHERE id_item = :id_item";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_produto', $nomeProduto);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':preco_unitario', $precoUnitario);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->bindValue(':subtotal', $subtotal);
        $stmt->bindValue(':id_item', $idItem, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function atualizarParcela($idParcela, $numeroParcela, $valor, $dataVencimento, $pago)
    {
        $sql = "UPDATE tbl_parcelas_compra SET numero_parcela = :numero_parcela, valor = :valor, data_vencimento = :data_vencimento, pago = :pago WHERE id_parcela = :id_parcela";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':numero_parcela', $numeroParcela, PDO::PARAM_INT);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':data_vencimento', $dataVencimento);
        $stmt->bindValue(':pago', $pago, PDO::PARAM_INT);
        $stmt->bindValue(':id_parcela', $idParcela, PDO::PARAM_INT);

        return $stmt->execute();
    }




    
}
