
<?php
class HomeclienteController extends controller{
    
    public function __construct() {
        parent::__construct();
        
        $p = new Pessoa();
        $c = new Cliente();
        
        if (!$p->isLogged()) {
            header("Location: ".HOME);
        }
        
        if ($_SESSION['c_Session'] != "cli") {
            header("Location: ".HOME);
        }
        
    }
    
    public function index() {
        $dados = array();
        $dados['menu'] = "home";
        ////////////////////////////////////////////////////////////////////////////
        
        $this->loadTemplateCliente('home_cliente', $dados);
    }
    
    public function produtos() {
        $dados = array();
        $dados['menu'] = "produtos";
        ////////////////////////////////////////////////////////////////////////////
        $produto = new Produto();
        
        $dados['produtos'] = $produto->getProdutos(9);
//        print_r($dados['produtos']);exit;
        $this->loadTemplateCliente('produtos_cliente', $dados);
    }
    
    public function carrinho() {
       $dados = array();
        $dados['menu'] = "car_prods";
        ////////////////////////////////////////////////////////////////////////////
        
        $this->loadTemplateCliente('carrinho', $dados);
    }
    
    public function historico() {
       $dados = array();
       $dados['menu'] = "hist_compras";
        ////////////////////////////////////////////////////////////////////////////
        
       $this->loadTemplateCliente('historico_compras', $dados);
    }
    
    
    public function logout() {
        unset($_SESSION['c_User']);
        unset($_SESSION['c_Session']);
        header("Location: ".HOME);
    }
    
}