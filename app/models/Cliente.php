<?php

class Cliente extends Model
{


    public function buscarCliente($email)
    {

        $sql = "SELECT * FROM tbl_cliente WHERE email_cliente = :email ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getListarCliente()
    {

        $sql = "SELECT *
                FROM tbl_cliente 
                ORDER BY nome_cliente ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function addCliente($dados)
    {

        $sql = " INSERT INTO tbl_cliente (
                nome_cliente,                      
                email_cliente, 
                senha_cliente, 
                cpf_cliente
         
            
                ) VALUES (
                :nome_cliente, 
                :email_cliente, 
                :senha_cliente,          
                :cpf_cliente)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_cliente', $dados['nome_cliente']);
        $stmt->bindValue(':email_cliente', $dados['email_cliente']);
        $stmt->bindValue(':senha_cliente', $dados['senha_cliente']);
        $stmt->bindValue(':cpf_cliente', $dados['cpf_cliente']);


        $stmt->execute();
        return $this->db->lastInsertId();
    }


    public function buscarPorNome($nome)
    {
        $stmt = $this->db->prepare("SELECT id_cliente, nome_cliente FROM tbl_cliente WHERE nome_cliente LIKE ? LIMIT 10");
        $stmt->execute(["%" . $nome . "%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $stmt = $this->db->prepare("SELECT id_cliente, nome_cliente, email_cliente, cpf_cliente FROM tbl_cliente WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getContarCliente()
    {

        $sql = "SELECT COUNT(*) AS total_clientes FROM tbl_cliente";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getComprasCliente($id)
    {

        $sql = "SELECT 
    c.id_compra,
    c.data_compra,
    c.total,
    c.num_parcelas,
    
    ic.id_item,
    ic.id_produto,
    ic.nome_produto,
    ic.descricao,
    ic.preco_unitario,
    ic.quantidade,
    ic.subtotal,
    
    pc.id_parcela,
    pc.numero_parcela,
    pc.valor AS valor_parcela,
    pc.data_vencimento,
    pc.pago

FROM tbl_compras c

LEFT JOIN tbl_itens_compra ic ON c.id_compra = ic.id_compra
LEFT JOIN tbl_parcelas_compra pc ON c.id_compra = pc.id_compra

WHERE c.id_cliente = :id

ORDER BY c.id_compra, ic.id_item, pc.numero_parcela";
        $stmt = $this->db->query($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
