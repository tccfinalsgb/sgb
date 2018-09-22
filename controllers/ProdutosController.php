
<?php
class ProdutosController extends controller{
    
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
        
        $produto = new Produto();
        
        if (isset($_POST['register-cod']) && !empty($_POST['register-cod'])) {
            $cod = addslashes($_POST['register-cod']);
            $titulo = utf8_decode(addslashes($_POST['register-titulo']));
            $descricao = utf8_decode(addslashes($_POST['register-desc']));
            $qtd = addslashes($_POST['register-qtdmin']);
            $status = utf8_decode(addslashes($_POST['register-status']));
            $categoria = addslashes($_POST['register-categoria']);
            $situacao = addslashes($_POST['situacao']);
             
            if (isset($situacao) && !empty($situacao)) {
                
                if ($situacao == "add") {
                    if (isset($_FILES['register-img']) && !empty($_FILES['register-img']['tmp_name'])) {
            
                        $formatos = array('image/jpeg', 'image/png', 'image/jpg');
                        if (in_array($_FILES['register-img']['type'], $formatos)) {
                            $img = md5($_FILES['register-img']['name'].time().rand(0,999)).'.jpg';
                            move_uploaded_file($_FILES['register-img']['tmp_name'], 'assets/img/prods/'.$img);
                        }
                    }else{
                        $img = "cam.PNG";
                    }
                    
                    $produto->addProduto($descricao, $qtd, $cod, $titulo, $status, $categoria, $img);
                    header("Location: ".HOME."/produtos");
                }elseif ($situacao == "update") {
                    if (isset($_POST['idProd']) && !empty($_POST['idProd'])) {
                        $idProd = addslashes($_POST['idProd']);
                        
                        if (isset($_FILES['register-img']) && !empty($_FILES['register-img']['tmp_name'])) {
                            
                            $formatos = array('image/jpeg', 'image/png', 'image/jpg');
                            if (in_array($_FILES['register-img']['type'], $formatos)) {
                               
                                    $img = md5($_FILES['register-img']['name'].time().rand(0,999)).'.jpg';
                                    move_uploaded_file($_FILES['register-img']['tmp_name'], 'assets/img/prods/'.$img);
                                    $produto->editIMG($img, $idProd);
                            }
                        }
                        
                        $produto->editProduto($descricao, $qtd, $cod, $titulo, $status, $categoria, $idProd);
                        header("Location: ".HOME."/produtos");
                        
                    }
                    
                }
            }
            
        }
        
        $dados['categorias'] = $produto->getCategorias();
                
        $this->loadTemplateFuncionario('cadastro_produto', $dados);
    }
    
    public function entrada() {
        $dados = array();
        $f = new Funcionario();
        
        $func = $f->getFuncionarioById($_SESSION['c_User']);
        $dados['nivel'] = $func['nivel_acesso_Func'];                
        
        $dados['menu'] = "cadastro";
        ////////////////////////////////////////////////////////////////////////////
        
        $produto = new Produto();
        $fornecedor = new Fornecedor();
        
//        item_dataEntrada
//        lote_entrada
//        qtd_entrada
//        data_pedido
//        valor_item
//        fornecedor
//        produto
        
        if (isset($_POST['register-lote']) && !empty('register-lote')) {
            $lote = addslashes($_POST['register-lote']);
            $qtd = addslashes($_POST['register-qtd']);
            $dataPedido = addslashes($_POST['register-dataPedido']);
            $dataEntrada = addslashes($_POST['register-entrada']);
            $prod = utf8_decode(addslashes($_POST['register-produto']));
            $forn = utf8_decode(addslashes($_POST['register-fornecedor']));
            $valor = addslashes($_POST['register-valor']);
            $situacao = addslashes($_POST['situacao']);
            
            $p = $produto->getProdutoByName($prod);
            $f = $fornecedor->getFornecedorByName($forn);
            
            if (isset($situacao) && !empty($situacao)) {
                if ($situacao == "add") {
                    $produto->addItemEntrada($dataEntrada, $lote, $qtd, $dataPedido, $valor, $f['idFornecedor'], $p['idProduto']);
//                    header("Location: ".HOME."/produtos/entrada");
                }elseif ($situacao == "update") {
                    
                }
            }
            
        }
        
        $dados['produtos'] = $produto->getTodosProdutos();
        $dados['fornecedores'] = $fornecedor->getFornecedoresAtivo();
        $this->loadTemplateFuncionario('entrada_produto', $dados);
    }
   
    public function del($idProd) {
        $produto = new Produto();
        $produto->delProduto($idProd);
        header("Location: ".HOME."/produtos");
    }
    
}