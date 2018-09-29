<?php

class CarrinhoController extends controller {
    public function __construct(){
        parent::__construct();
        
        $p = new Pessoa();
        
        if (!$p->isLogged()) {
            header("Location: ".HOME);
        }
    }
    
    public function index() {
        $dados = array();
//        $cli = new Cliente();
//        $pessoa =  new Pessoa();
//        $dados['']
//        $dados['cliente'] = $cli->getCliente();
//        $dados['meusDados'] = $pessoa->getMeusDados($dados['cliente']['Pessoa_idPessoa']);
        //////////////////////////////////////////////////////////////////////////////////////
        
        $produto = new Produto();
        
        $c = new Carrinho();
        
        $pedido = $c->getPedidoByCliente();
        
        if (isset($pedido) && !empty($pedido) && count($pedido) > 0) {
            
            $c->somaValor($pedido['idPedido']);
            
            $dados['pedido'] = $c->getPedidoById($pedido['idPedido']);
            $dados['itens'] = $c->getItemPedidoByPedido($pedido['idPedido']);
            
        }
        
//        print_r($_SESSION);exit;
        
        $this->loadTemplateCliente("carrinho", $dados);
    }
    
    public function add($id) {
        
        $p = new Produto();
        $c = new Carrinho();
        
        $prod = $p->getProduto($id);
        $pedido = $c->getPedidoAndamento();
        
        if (count($pedido) > 0) {
            $c->addItemPedido($id, $pedido['idPedido'], $prod['valor']*1.3);
            $c->somaValor($pedido['idPedido']);
        }else{
            $idPedido = $c->addPedido($prod['valor']*1.3);
            $c->addItemPedido($id, $idPedido, $prod['valor']*1.3);
            $c->somaValor($idPedido);
        }
        
        
                
        header("Location: ".HOME."/carrinho");
    }
    
    public function delItem($item) {
        $item = explode('-', $item);
        
        $c = new Carrinho;
        
        $produto = $item[0];
        $pedido = $item[1];
        
        $c->delItem($produto, $pedido);
        
        header("Location: ".HOME."/carrinho");
    }
    
}