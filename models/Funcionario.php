<?php
class Funcionario extends model{
    
    public function isLogged() {
        if (isset($_SESSION['c_User']) && !empty($_SESSION['c_User'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getFuncionarioByIdPessoa($idPessoa) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM funcionario WHERE Pessoa_idPessoa = :idPessoa");
        $sql->bindValue(":idPessoa", $idPessoa);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function delFuncionarioByIdPessoa($idPessoa) {
        $sql = $this->db->prepare("DELETE FROM funcionario WHERE Pessoa_idPessoa = :id");
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
    }
    
    public function cadFuncionario($login_Func, $senha_Func, $cargo_Func, $idPessoa, $nivel_acesso_Func = "medio") {
        
        if ($cargo_Func == "Gerente" || $cargo_Func == "gerente") {
            $nivel_acesso_Func = "alto";
        }
        
        $sql = $this->db->prepare("INSERT INTO funcionario SET login_Func = :login, senha_Func = :senha, nivel_acesso_Func = :acesso, cargo_Func = :cargo, Pessoa_idPessoa = :id");
        $sql->bindValue(":login", $login_Func);
        $sql->bindValue(":senha", md5($senha_Func));
        $sql->bindValue(":acesso", $nivel_acesso_Func);
        $sql->bindValue(":cargo", $cargo_Func);
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
    }
    
    public function ediFuncionario($login_Func, $cargo_Func, $idPessoa, $nivel_acesso_Func = "medio") {
        
        if ($cargo_Func == "Gerente" || $cargo_Func == "gerente") {
            $nivel_acesso_Func = "alto";
        }
        
        $sql = $this->db->prepare("UPDATE funcionario SET login_Func = :login, nivel_acesso_Func = :acesso, cargo_Func = :cargo WHERE Pessoa_idPessoa = :id");
        $sql->bindValue(":login", $login_Func);
        $sql->bindValue(":acesso", $nivel_acesso_Func);
        $sql->bindValue(":cargo", $cargo_Func);
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
    }
    
    public function alteraSenha($senha, $idPessoa) {
        $sql = $this->db->prepare("UPDATE funcionario SET senha_Func = :senha WHERE Pessoa_idPessoa = :id");
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
    }
    
    public function isHere() {
        $id = $_SESSION['c_User'];
        
        $sql = $this->db->prepare("SELECT * FROM Funcionario WHERE idPessoa = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function fazerLoginFunc($login, $senha) {
        $array  = array();
        
        $sql = $this->db->prepare("SELECT * FROM Funcionario WHERE login_Func = :login AND senha_Func = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $_SESSION['c_User'] = $array['idFuncionario'];
            $_SESSION['func_User'] = $array['login_Func'];
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getFuncionario() {
        $array = array();
        
        if (isset($_SESSION['c_User']) && !empty($_SESSION['c_User'])) {
            $id = $_SESSION['c_User'];
        
            $sql = $this->db->prepare("SELECT * FROM Funcionario WHERE idFuncionario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
            
        }
        
        return $array;
    }
    
    public function getFuncionarioById($id) {
        $array = array();        
            $sql = $this->db->prepare("SELECT * FROM Funcionario WHERE idFuncionario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
         
        return $array;
    }
    
    public function getDadosFuncionarioId($id) {
        $array = array();        
            $sql = $this->db->prepare("SELECT "
                    . "* (select * from Pessoa where Pessoa.idPessoa = Funcionario.Pessoa_idPessoa) as pessoa"
                    . "FROM Funcionario WHERE idFuncionario = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
         
        return $array;
    }   
}