<?php
class FuncionarioController extends controller{
    
   public function __construct() {
        parent::__construct();
        
        $p = new Pessoa();
        $c = new Cliente();
        $f = new Funcionario();
        
        if ($p->isLogged() == false) {
            header("Location: ".HOME);
        }
        
        if ($_SESSION['c_Session'] != "func") {
            header("Location: ".HOME);
        }
        
        $func = $f->getFuncionarioById($_SESSION['c_User']);
        if (!($func['nivel_acesso_Func'] == "alto" && ($func['cargo_Func'] == "Gerente" || $func['cargo_Func'] == "gerente"))) {
            header("Location: ".HOME."/homefuncionario");
        }
        
    }
    
    public function index() {
        $dados = array();
        $f = new Funcionario();
        
        $func = $f->getFuncionarioById($_SESSION['c_User']);
        $dados['nivel'] = $func['nivel_acesso_Func'];                
        
        $dados['menu'] = "cadastro";
        ////////////////////////////////////////////////////////////////////////////
        
        $p = new Pessoa();
        $f = new Funcionario();
        
        if (isset($_POST['register-cpf']) && !empty($_POST['register-cpf'])) {
            $cpf = preg_replace("/[^0-9]/", "", addslashes($_POST['register-cpf']));
            $cargo = utf8_decode(addslashes($_POST['register-cargo']));
            $nome = utf8_decode(addslashes($_POST['register-name']));
            $endereco = utf8_decode(addslashes($_POST['register-endereco']));
            $email = utf8_decode(addslashes($_POST['register-username']));
            $telefone = preg_replace("/[^0-9]/", "", addslashes($_POST['register-telefone']));
            $sexo = addslashes($_POST['register-sexo']);
            $senha = addslashes($_POST['register-password']);
            $senha2 = addslashes($_POST['register-password2']);
            $situacao = addslashes($_POST['situacao']);
            
            
            if ($situacao == "add") {
                if ($senha == $senha2) {
                    $idPessoa = $p->addPessoa($cpf, $nome, $sexo, $endereco, $telefone, $email);
                    $f->cadFuncionario($email, $senha, $cargo, $idPessoa);
                }else{
                    $dados['erro'] = "As senhas não coincidem!!!";
                }
            }else if($situacao == "update"){
                
                if(isset($_POST['idP']) && !empty($_POST['idP'])):
                    $idPF = addslashes($_POST['idP']);
                    $p->editPessoa($cpf, $nome, $sexo, $endereco, $telefone, $email, $idPF);
                    $f->ediFuncionario($email, $cargo, $idPF);
                    
                    if (isset($senha) && !empty($senha)) {
                        if ($senha == $senha2) {
                            $f->alteraSenha($senha, $idPF);
                        }
                    }else{
                        $dados['erro'] = "As senhas não coincidem!!!";
                    }
                    
                endif;
            }
            
        }
                
        $this->loadTemplateFuncionario('cadastro_funcionario', $dados);
    }
    
    public function del($idPessoa) {
        $f = new Funcionario();
        $p = new Pessoa();
        
        $f->delFuncionarioByIdPessoa($idPessoa);
        $p->delPessoa($idPessoa);
        
        header("Location: ".HOME."/funcionario");
    }
}