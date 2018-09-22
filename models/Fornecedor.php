<?php
class Fornecedor extends model{
    
    public function getFornecedorByName($name) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM fornecedor WHERE nome_Forn = :nome");
        $sql->bindValue(":nome", $name);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function addFornecedor($nome, $endereco, $tel, $cnpj, $insc, $email, $status) {
        
        $sql = $this->db->prepare("INSERT INTO Fornecedor SET nome_Forn = :nome, endereco_Forn = :end, tel_Forn = :tel, cnpj_Forn = :cnpj, insc_est_Forn = :insc, email_Forn = :email, status_Forn = :forn");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":end", $endereco);
        $sql->bindValue(":tel", $tel);
        $sql->bindValue(":cnpj", $cnpj);
        $sql->bindValue(":insc", $insc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":forn", $status);
        $sql->execute();
    }
    
    public function editFornecedor($nome, $endereco, $tel, $cnpj, $insc, $email, $status, $idForn) {
        
        $sql = $this->db->prepare("UPDATE Fornecedor SET nome_Forn = :nome, endereco_Forn = :end, tel_Forn = :tel, cnpj_Forn = :cnpj, insc_est_Forn = :insc, email_Forn = :email, status_Forn = :forn WHERE idFornecedor = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":end", $endereco);
        $sql->bindValue(":tel", $tel);
        $sql->bindValue(":cnpj", $cnpj);
        $sql->bindValue(":insc", $insc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":forn", $status);
        $sql->bindValue(":id", $idForn);
        $sql->execute();
    }
    
    public function getFornecedoresAtivo() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM Fornecedor WHERE status_Forn = 'ATIVO'");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getFornecedor($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM Fornecedor WHERE idFornecedor = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getFornecedorByCNPJ($cnpj) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM Fornecedor WHERE cnpj_Forn = :id");
        $sql->bindValue(":id", $cnpj);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getFornecedorByINSC($insc) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM Fornecedor WHERE insc_est_Forn = :id");
        $sql->bindValue(":id", $insc);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function deletarFornecedor($id) {
        $sql = $this->db->prepare("DELETE FROM Fornecedor WHERE idFornecedor = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
}