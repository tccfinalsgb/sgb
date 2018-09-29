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
        
        if (isset($_SESSION['pedido']) && !empty($_SESSION['pedido'])) {
            
            $pedido = $_SESSION['pedido'];

            $dados['pedido'] = $c->getPedidoById($pedido);
            $dados['itens'] = $c->getItemPedidoByPedido($pedido);
            
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
            $_SESSION['pedido'] = $pedido;
        }else{
            $idPedido = $c->addPedido($prod['valor']*1.3);
            $c->addItemPedido($id, $idPedido, $prod['valor']*1.3);
            $_SESSION['pedido'] = $idPedido;
        }
                
        header("Location: ".HOME."/carrinho");
    }
    
    public function delProd($idSessao) {
        unset($_SESSION['car_prods']['idProd'][$idSessao]);
        header("Location: ".HOME."/carrinho");
    }
    
}