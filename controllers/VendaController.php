<?php

class VendasController extends controller{
    
    public function __construct() {
        parent::__construct();
        
        $func = new Funcionario();
        
        if ($func->isLogged() == FALSE) {
            header("Location: ".HOME);
        }
    }
    
    public function index() {
        $dados = array();
        $func = new Funcionario();
        $pessoa =  new Pessoa();
        $dados['funcionario'] = $func->getFuncionario();
        $dados['meusDados'] = $pessoa->getMeusDados($dados['funcionario']['Pessoa_idPessoa']);
        //////////////////////////////////////////////////////////////////////////////////////
        
        
        
        $this->loadTemplatePrincipal("vendas", $dados);
    }
    
    public function add() {
        $dados = array();
        $func = new Funcionario();
        $pessoa =  new Pessoa();
        $dados['funcionario'] = $func->getFuncionario();
        $dados['meusDados'] = $pessoa->getMeusDados($dados['funcionario']['Pessoa_idPessoa']);
        //////////////////////////////////////////////////////////////////////////////////////
        $produto = new Produto();
        
        $dados['produtos'] = $produto->getProdutos();
        $this->loadTemplate("vendas_add", $dados);
    }  
}
