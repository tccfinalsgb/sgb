<?php
class Produto extends model{
        
    public function delProduto($id) {
        
        $sql = $this->db->prepare("DELETE FROM itementrada WHERE Produto_idProduto = :idProd");
        $sql->bindValue(":idProd", $id);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM produto WHERE idProduto = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function addProduto($desc, $qtd, $cod, $titulo, $status, $cat, $img) {
                
        $sql = $this->db->prepare("INSERT INTO produto SET descricao_Produto = :descricao, status_Produto = :statusP, img = :img, categoria = :cat, titulo = :titulo, codigo = :barra, qtd_Produto = :qtd");
        $sql->bindValue(":descricao", $desc);
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":statusP", $status);
        $sql->bindValue(":img", $img);
        $sql->bindValue(":cat", $cat);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":barra", $cod);
        $sql->execute();
                
    }
    
    public function editProduto($desc, $qtd, $cod, $titulo, $status, $cat, $idProd) {
                
        $sql = $this->db->prepare("UPDATE produto SET descricao_Produto = :descricao, qtd_Produto = :qtd, status_Produto = :statusP, categoria = :cat, titulo = :titulo, codigo = :barra WHERE idProduto = :id");
        $sql->bindValue(":descricao", $desc);
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":statusP", $status);
        $sql->bindValue(":cat", $cat);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":barra", $cod);
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":id", $idProd);
        $sql->execute();
                
    }
    
    public function editIMG($img, $idProd) {
        $sql = $this->db->prepare("UPDATE produto SET img = :img WHERE idProduto = :id");
        $sql->bindValue(":img", $img);
        $sql->bindValue(":id", $idProd);
        $sql->execute();
    }
    
    public function getProdutosByCodigo($barra) {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM produto WHERE codigo = :cod");
        $sql->bindValue(":cod", $barra);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array  =   $sql->fetch();
        }
        
        return $array;
    }
    
    public function get_produtos_by_id($prods) {
        $array = array();
        if (is_array($prods) && count($prods) > 0) {
                $sql = $this->db->prepare("SELECT * FROM produto WHERE id IN (".implode(',', $prods).")");
                $sql->execute();
                
                if ($sql->rowCount() > 0) {
                        $array  =   $sql->fetchAll();
                }
        }
        return $array;
    }
    
    public function pesquisaProduto($item) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM Produto WHERE descricao_Produto LIKE '%$item%'");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
                        
            $sql = $this->db->prepare("SELECT * FROM itementrada WHERE Produto_idProduto = :id");
            $sql->bindValue(":id", $array['idProduto']);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array['item'] = $sql->fetch();
            }
            
        }
                
        return $array;
    }
    
    public function getProduto($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, (select MAX(itementrada.valor_ItemEntrada) as valorVenda from itementrada where itementrada.Produto_idProduto = produto.idProduto) as valor FROM Produto WHERE idProduto = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            
        }
        return $array;
    }
    
    public function lastId() {
        $sql = $this->db->prepare("SELECT idProduto FROM Produto ORDER BY idProduto DESC LIMIT 1");
        $sql->execute();
        return $sql->fetch()['idProduto'];
    }
    
    public function getProdutoByName($name) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM produto WHERE titulo = :titulo");
        $sql->bindValue(":titulo", $name);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function addItemEntrada($dataEntrada, $lote, $qtd, $dataPedido, $valor, $fornecedor, $produto) {
        $sql = $this->db->prepare("INSERT INTO itementrada SET data_ItemEntrada = :data, lote_ItemEntrada = :lote, qtd_ItemEntrada = :qtd, data_Pedido_ItemEntrada = :dataPedido, valor_ItemEntrada = :valor, Fornecedor_idFornecedor = :fornecedor, Produto_idProduto = :produto");
        $sql->bindValue(":data", $dataEntrada);
        $sql->bindValue(":lote", $lote);
        $sql->bindValue(":qtd", $qtd);
        $sql->bindValue(":dataPedido", $dataPedido);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":fornecedor", $fornecedor);
        $sql->bindValue(":produto", $produto);
        $sql->execute();
        
        $prod = $this->getProduto($produto);
        
        $somaProd = $qtd+$prod['qtd_Produto'];
        
        $sql  = $this->db->prepare("UPDATE produto SET qtd_Produto = :qtdProd WHERE idProduto = :prod");
        $sql->bindValue(":qtdProd", $somaProd);
        $sql->bindValue(":prod", $produto);
        $sql->execute();
    }
    
    public function getProdutos($limit = '0') {
        $array = array();
                
        
        $sql = $this->db->prepare("SELECT *, (select MAX(itementrada.valor_ItemEntrada) as valorVenda from itementrada where itementrada.Produto_idProduto = produto.idProduto) as valor FROM produto LIMIT $limit");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            
        }
        
        return $array;
        
    }
    
    public function getTodosProdutos() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM produto");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            
        }
        
        return $array;
    }
        
    public function selecioneProduto() {
        $array = array();
                
        $sql = $this->db->prepare("SELECT * FROM produto");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            
        }
        
        return $array;
    }
    
    public function editarProduto($id, $desc, $min, $max) {        
        $sql = $this->db->prepare("UPDATE Produto SET descricao_Produto = :desc, qtd_min_Produto = :min, qtd_max_Produto = :max WHERE idProduto = :id");
        $sql->bindValue(":desc", $desc);
        $sql->bindValue(":min", $min);
        $sql->bindValue(":max", $max);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function deletarProduto($id) {
       
        $sql = $this->db->prepare("DELETE FROM itementrada WHERE Produto_idProduto = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM produto WHERE idProduto = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
    }
    
    public function getCategorias() {
        $argc = array();
        
        $sql = $this->db->query("SELECT * FROM categoria");
        
        if ($sql->rowCount() > 0) {
            $argc = $sql->fetchAll();
        }
        
        return $argc;
    }
    
}