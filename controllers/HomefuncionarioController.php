<?php
class HomefuncionarioController extends controller{
    
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
        
        $dados['menu'] = "home";
        ////////////////////////////////////////////////////////////////////////////
                
        $this->loadTemplateFuncionario('home_funcionario', $dados);
    }
    
    public function logout() {
        unset($_SESSION['c_User']);
        unset($_SESSION['c_Session']);
        header("Location: ".HOME);
    }
}