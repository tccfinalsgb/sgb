<?php

class FornecedorController extends controller{
    
    public function __construct() {
        parent::__construct();
        
        $p = new Pessoa();
        $c = new Cliente();
        
        if ($p->isLogged() == false) {
            header("Location: ".HOME);
        }
        
        if ($_SESSION['c_Session'] != "func") {
            header("Location: ".HOME);
        }
        
    }
    
    public function index() {
        $dados = array();
        $f = new Funcionario();
        
        $func = $f->getFuncionarioById($_SESSION['c_User']);
        $dados['nivel'] = $func['nivel_acesso_Func'];                
        
        $dados['menu'] = "cadastro";
        ////////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['register-cnpj']) && !empty($_POST['register-cnpj'])) {
            $cnpj = preg_replace("/[^0-9]/", "", addslashes($_POST['register-cnpj']));
            $insc = preg_replace("/[^0-9]/", "", addslashes($_POST['register-insc']));
            $status = utf8_decode(addslashes($_POST['register-status']));
            $nome = utf8_decode(addslashes($_POST['register-name']));
            $telefone = preg_replace("/[^0-9]/", "", addslashes($_POST['register-telefone']));
            $endereco = utf8_decode(addslashes($_POST['register-endereco']));
            $email = utf8_decode(addslashes($_POST['register-username']));
            $situacao = addslashes($_POST['situacao']);
            
            $fornecedor = new Fornecedor();
            
            if (isset($situacao) && !empty($situacao)) {
                if ($situacao == "add") {
                    $fornecedor->addFornecedor($nome, $endereco, $telefone, $cnpj, $insc, $email, $status);
                    header("Location: ".HOME."/fornecedor");
                }elseif ($situacao == "update") {
                    if (isset($_POST['idForn']) && !empty($_POST['idForn'])) {
                        $idForn = addslashes($_POST['idForn']);
                        $fornecedor->editFornecedor($nome, $endereco, $telefone, $cnpj, $insc, $email, $status, $idForn);
                        header("Location: ".HOME."/fornecedor");
                    }
                }
            }
            
        }
                
        $this->loadTemplateFuncionario('cadastro_fornecedor', $dados);
    }
    
    public function del($idForn) {
        $fornecedor = new Fornecedor();
        $fornecedor->deletarFornecedor($idForn);
    }
    
}