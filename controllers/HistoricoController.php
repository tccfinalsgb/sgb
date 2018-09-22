<?php

class CarrinhoController extends controller {
    public function __construct(){
        parent::__construct();
        
        $func = new Funcionario();
        
        if ($func->isLogged() == FALSE) {
            header("Location: ".HOME);
        }
    }
    
    public function index() {
        $dados = array();
        $cli = new Cliente();
        $pessoa =  new Pessoa();
        $dados['cliente'] = $cli->getCliente();
        $dados['meusDados'] = $pessoa->getMeusDados($dados['cliente']['Pessoa_idPessoa']);
        //////////////////////////////////////////////////////////////////////////////////////
        
        $produto = new Produto();
        
//        if (isset($_SESSION['car_prods']) && !empty($_SESSION['car_prods'])) {
            $dados['produtos'] = $produto->getProdutos($_SESSION['hist_compras']);
//        }
        
//        print_r($_SESSION['car_prods']);exit;
        
        $this->loadTemplateCliente("historico_compras", $dados);
    }
 
}