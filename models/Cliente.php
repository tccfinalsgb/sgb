<?php
class Cliente extends model{
    
    public function addCliente($login, $senha, $idPessoa) {
                
        $sql = $this->db->prepare("INSERT INTO Cliente SET login_Cliente = :login, senha_Cliente = :senha, Pessoa_idPessoa = :id");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
        
        $_SESSION['c_User'] = $this->db->lastInsertId();
        
    }
    
    public function fazerLoginCliente($login, $senha) {
        $array  = array();
        
        $sql = $this->db->prepare("SELECT * FROM Cliente WHERE login_Cliente = :login AND senha_Cliente = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $_SESSION['c_User'] = $array['idCliente'];
            $_SESSION['c_Session'] = 'cli';
            return true;
        }else{
            $sql = $this->db->prepare("SELECT * FROM Funcionario WHERE login_Func = :login AND senha_Func = :senha");
            $sql->bindValue(":login", $login);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                $_SESSION['c_User'] = $array['idFuncionario'];
                $_SESSION['c_Session'] = 'func';
                return true;
            }else{
                return false;
            }
        }
        
    }
    
}