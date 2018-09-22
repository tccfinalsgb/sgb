<?php
class ProdutoController extends controller{
    
    public function __construct(){
        parent::__construct();
        $pessoa = new Pessoa();
        
        if ($pessoa->isLogged() == true) {
            if (isset($_SESSION['func_User']) && !empty($_SESSION['func_User'])) {
            header("Location: ".HOME."/funcionario");
            }
        }
    }
    
    public function index() {
        $dados = array(
            'cargoUser' => 'C',
            'meusDados' => array()
        );
        $cliente = new Cliente();
        $pessoa = new Pessoa();
        $produto = new Produto();
        
        if ($pessoa->isLogged()) {
            $dados['cliente'] = $cliente->getCliente();
            $dados['meusDados'] = $pessoa->getMeusDados($dados['cliente']['Pessoa_idPessoa']);
        }
        
        $dados['produtos'] = $produto->getProdutos();
        
        $this->loadTemplate("produtos_cliente", $dados);
    }
}