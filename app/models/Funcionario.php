<?php

class Funcionario extends Model
{

    public function buscarFunc($email)
    {
        $sql = "SELECT * FROM tbl_funcionario WHERE email_funcionario = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getContarFuncionario()
    {

        $sql = "SELECT COUNT(*) AS total_funcionarios FROM tbl_funcionario";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
    public function getListarFuncionario()
    {

        $sql = "SELECT *
                FROM tbl_funcionario 
                ORDER BY nome_funcionario ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function addFuncionario($dados)
    {

        $sql = " INSERT INTO tbl_funcionario (
                nome_funcionario,                      
                email_funcionario, 
                senha_funcionario, 
                cpf_funcionario
         
            
                ) VALUES (
                :nome_funcionario, 
                :email_funcionario, 
                :senha_funcionario,          
                :cpf_funcionario)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':senha_funcionario', $dados['senha_funcionario']);
        $stmt->bindValue(':cpf_funcionario', $dados['cpf_funcionario']);


        $stmt->execute();
        return $this->db->lastInsertId();
    }


}
