<?php
class Pessoa extends model{
    
    public function isLogged() {
        if (isset($_SESSION['c_User']) && !empty($_SESSION['c_User'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getPessoaByCPF($cpf) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE cpf_Pessoa = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function addPessoa($cpf_cnpj, $nome, $sexo, $endereco, $telefone, $email, $status = '1') {
        
        if (strlen($cpf_cnpj) == 11) {
            $sql = $this->db->prepare("INSERT INTO Pessoa SET nome_Pessoa = :nome, sexo_Pessoa = :sexo, end_Pessoa = :end, email_Pessoa = :email, status_Pessoa = :status, tel_Pessoa = :tel, cpf_Pessoa = :cpf");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":end", $endereco);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":status", $status);
            $sql->bindValue(":tel", $telefone);
            $sql->bindValue(":cpf", $cpf_cnpj);
            
        }elseif(strlen($cpf_cnpj) == 14){
            $sql = $this->db->prepare("INSERT INTO Pessoa SET nome_Pessoa = :nome, sexo_Pessoa = :sexo, end_Pessoa = :end, email_Pessoa = :email, status_Pessoa = :status, tel_Pessoa = :tel, cnpj_Pessoa = :cnpj");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":end", $endereco);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":status", $status);
            $sql->bindValue(":tel", $telefone);
            $sql->bindValue(":cnpj", $cpf_cnpj);
        }
        $sql->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function editPessoa($cpf_cnpj, $nome, $sexo, $endereco, $telefone, $email, $idPessoa) {
        
        if (strlen($cpf_cnpj) == 11) {
            $sql = $this->db->prepare("UPDATE Pessoa SET nome_Pessoa = :nome, sexo_Pessoa = :sexo, end_Pessoa = :endereco, email_Pessoa = :email, tel_Pessoa = :tel, cpf_Pessoa = :cpf WHERE idPessoa = :id");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $idPessoa);
            $sql->bindValue(":tel", $telefone);
            $sql->bindValue(":cpf", $cpf_cnpj);
            
        }elseif(strlen($cpf_cnpj) == 14){
            $sql = $this->db->prepare("UPDATE Pessoa SET nome_Pessoa = :nome, sexo_Pessoa = :sexo, end_Pessoa = :endereco, email_Pessoa = :email, tel_Pessoa = :tel, cnpj_Pessoa = :cnpj WHERE idPessoa = :id");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $idPessoa);
            $sql->bindValue(":tel", $telefone);
            $sql->bindValue(":cnpj", $cpf_cnpj);
        }
        $sql->execute();        
    }
    
    public function delPessoa($id) {
        $sql = $this->db->prepare("DELETE FROM pessoa WHERE idPessoa = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    //------------------------------------//
    
    // Método de validação CPF e CPNJ
    
    function validaCPF($cpf = null) {
	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}
	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}
		return true;
	}
    }
    
    function validar_cnpj($cnpj)    {
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
    
}