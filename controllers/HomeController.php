<?php
class HomeController extends controller{
    
    public function __construct() {
        parent::__construct();
        
        $p = new Pessoa();
        $c = new Cliente();
        
        if ($p->isLogged()) {
            if (isset($_SESSION['c_Session']) && !empty($_SESSION['c_Session'])) {
                if ($_SESSION['c_Session'] == "cli") {
                    header("Location: ".HOME."/homecliente");
                }else if($_SESSION['c_Session'] == "func");
                    header("Location: ".HOME."/homefuncionario");
            }
        }
    }
    
    public function index() {
        $dados = array();
        $dados['menu'] = "home";
        ////////////////////////////////////////////////////////////////////////////
        
        $this->loadTemplate('home', $dados);
    }
    
    public function cadastro() {
        $dados = array();
        $p = new Pessoa();
        $c = new Cliente();
        
        $dados['menu'] = "cadastro";
        ////////////////////////////////////////////////////////////////////////////
        
        if (isset($_POST['register-cpf']) && !empty($_POST['register-cpf'])) {
            
            $cpf_cnpj = preg_replace("/[^0-9]/", "", addslashes($_POST['register-cpf']));
            $nome = utf8_decode(addslashes($_POST['register-name']));
            $endereco = utf8_decode(addslashes($_POST['register-endereco']));
            $telefone = preg_replace("/[^0-9]/", "", addslashes($_POST['register-telefone']));
            $email = addslashes($_POST['register-username']);
            $senha = addslashes($_POST['register-password']);
            $senha2 = addslashes($_POST['register-password2']);
            
            if ($senha == $senha2) {
                if (strlen($cpf_cnpj) == 11 && $p->validaCPF($cpf_cnpj)) {
                    $idPessoa = $p->addPessoa($cpf_cnpj, $nome, $endereco, $telefone, $email);
                    $c->addCliente($email, $senha, $idPessoa);
                 }else if(strlen($cpf_cnpj) == 14 && $p->validar_cnpj($cpf_cnpj)){
                    $idPessoa = $p->addPessoa($cpf_cnpj, $nome, $endereco, $telefone, $email);
                    $c->addCliente($email, $senha, $idPessoa);
                 }else{
                     $dados['erro'] = "CPF e/ou CNPJ Inválido!";
                 }
            }else{
                $dados['erro'] = "Senha Diferentes!";
            }
            
        }
        
        $this->loadTemplate('cadastro_cliente', $dados);
    }
    
    public function sobre() {
        $dados = array();
        $dados['menu'] = "sobre";
        ////////////////////////////////////////////////////////////////////////////
        
        $this->loadTemplate('sobre', $dados);
    }
    
    public function login() {
        $dados = array();
        
        $c = new Cliente();
        
        if (isset($_POST['login-password']) && !empty('login-password')) {
            $login = addslashes($_POST['login-username']);
            $senha = addslashes($_POST['login-password']);
            
            if ($c->fazerLoginCliente($login, $senha) == true) {
                if ($_SESSION['c_Session'] == "cli") {
                    header("Location: ".HOME."/homecliente");
                }else if($_SESSION['c_Session'] == "func"){
                    header("Location: ".HOME."/homefuncionario");
                }
            }else{
                $dados['erro'] = "Usuário e/ou senha inválido!!";
            }
            
        }
        
        $this->loadTemplate('login', $dados);
    }
    
}