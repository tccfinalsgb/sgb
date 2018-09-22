<?php
class AjaxController extends controller{
    
    public function clienteCPF() {
        
        $dados = array(
            'erro' => true
        );
        
        if (isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {
            $p = new Pessoa();
            
            $cpf_cnpj = preg_replace("/[^0-9]/", "", addslashes($_POST['pessoa']));
            
            if (strlen($cpf_cnpj) == 11 && $p->validaCPF($cpf_cnpj) == true) {
                $dados['erro'] = FALSE;
            }else if (strlen($cpf_cnpj) == 14 && $p->validar_cnpj($cpf_cnpj) == true) {
                $dados['erro'] = FALSE;
            }
        }
        
        echo json_encode($dados);
        exit;
    }
    
    public function funcionario() {
        
        $dados = array(
            'erro' => true
        );
        
        if (isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {
            $p = new Pessoa();
            $f = new Funcionario();
            
            $cpf = preg_replace("/[^0-9]/", "", addslashes($_POST['pessoa']));
            
            if (strlen($cpf) == 11 && $p->validaCPF($cpf) == true) {
                $pes = $p->getPessoaByCPF($cpf);
                $func = $f->getFuncionarioByIdPessoa($pes['idPessoa']);
                
                $dados['cpf'] = $pes['cpf_Pessoa'];
                $dados['idPF'] = $pes['idPessoa'];
                $dados['cargo'] = utf8_encode($func['cargo_Func']);
                $dados['nome'] = utf8_encode($pes['nome_Pessoa']);
                $dados['endereco'] = utf8_encode($pes['end_Pessoa']);
                $dados['username'] = utf8_encode($func['login_Func']);
                $dados['telefone'] = $pes['tel_Pessoa'];
                $dados['sexo'] = $pes['sexo_Pessoa'];
                
                $dados['erro'] = FALSE;
            }
        }
        
        echo json_encode($dados);
        exit;
    }
    
    public function fornecedorCNPJ() {
         $dados = array(
            'erro' => true
        );
        
        if (isset($_POST['fornecedor']) && !empty($_POST['fornecedor'])) {
            $f = new Fornecedor();
            $p = new Pessoa();
                   
            $cnpj = preg_replace("/[^0-9]/", "", addslashes($_POST['fornecedor']));
                
             if (strlen($cnpj) == 14 && $p->validar_cnpj($cnpj) == true) {
                $forn = $f->getFornecedorByCNPJ($cnpj);
              
                $dados['cnpj'] = $f['cnpj_Forn'];
                $dados['insc'] = $f['insc_est_Forn'];
                $dados['status'] = utf8_encode($f['status_Forn']);
                $dados['nome'] = utf8_encode($f['nome_Forn']);
                $dados['endereco'] = utf8_encode($f['endereco_Forn']);
                $dados['username'] = utf8_encode($f['email_Forn']);
                $dados['telefone'] = $f['tel_Forn'];
                $dados['id'] = $f['idFornecedor'];
                
                $dados['erro'] = FALSE;
        }
        echo json_encode($dados);
        exit;
        }
    }
    
    public function fornecedorINSC() {
         $dados = array(
            'erro' => true
        );
        
        if (isset($_POST['fornecedor']) && !empty($_POST['fornecedor'])) {
            $fornecedor = new Fornecedor();
            
            $insc = preg_replace("/[^0-9]/", "", addslashes($_POST['fornecedor']));
            
            $f = $fornecedor->getFornecedorByINSC($insc);
                
            $dados['cnpj'] = $f['cnpj_Forn'];
            $dados['insc'] = $f['insc_est_Forn'];
            $dados['status'] = utf8_encode($f['status_Forn']);
            $dados['nome'] = utf8_encode($f['nome_Forn']);
            $dados['endereco'] = utf8_encode($f['endereco_Forn']);
            $dados['username'] = utf8_encode($f['email_Forn']);
            $dados['telefone'] = $f['tel_Forn'];
            $dados['id'] = $f['idFornecedor'];
            $dados['erro'] = FALSE;
        }
        echo json_encode($dados);
        exit;
    }
    
    public function produto() {
         $dados = array(
            'erro' => true
        );
        
        if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
            $produto = new Produto();
            
            $barra = addslashes($_POST['codigo']);
            
            $p = $produto->getProdutosByCodigo($barra);
                
            $dados['codigo'] = $p['codigo'];
            $dados['titulo'] = utf8_encode($p['titulo']);
            $dados['descricao'] = utf8_encode($p['descricao_Produto']);
            $dados['qtd'] = $p['qtd_Produto'];
            $dados['status'] = utf8_encode($p['status_Produto']);
            $dados['categoria'] = $p['categoria'];
            $dados['img'] = $p['img'];
            $dados['id'] = $p['idProduto'];
            $dados['erro'] = FALSE;
        }
        echo json_encode($dados);
        exit;
    }
    
}