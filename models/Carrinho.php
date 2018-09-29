<?php

class Carrinho extends model{
    
    public function addPedido($valor) {
        $sql = $this->db->prepare("INSERT INTO pedido SET data_Pedido = NOW(), status_Pedido = 'ANDAMENTO', Cliente_idCliente = :idCliente, valor_total_Pedido = :valor, Funcionario_idFuncionario = 1");
        $sql->bindValue(":idCliente", $_SESSION['c_User']);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function addItemPedido($produto, $pedido, $valor) {
        $sql = $this->db->prepare("INSERT INTO itempedido SET Produto_idProduto = :produto, Pedido_idPedido = :pedido, qtd_ItemPedido = 1, valor_ItemPedido = :valor");
        $sql->bindValue(":produto", $produto);
        $sql->bindValue(":pedido", $pedido);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
    }
    
    public function somaValor($pedido) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, SUM(valor_ItemPedido) as valores FROM itempedido WHERE Pedido_idPedido = :pedido AND status_Pedido = 'ANDAMENTO'");
        $sql->bindValue(":pedido", $pedido);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
                
        $soma = $array['valores'];
        
        $sql = $this->db->prepare("UPDATE pedido SET valor_total_Pedido = :valor WHERE status_Pedido = 'ANDAMENTO' AND idPedido = :id");
        $sql->bindValue(":id", $pedido);
        $sql->bindValue(":valor", $soma);
        $sql->execute();
    }
    
    public function getPedidoAndamento() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pedido WHERE Cliente_idCliente = :cliente AND status_Pedido = 'ANDAMENTO'");
        $sql->bindValue(":cliente", $_SESSION['c_User']);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPedidoById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pedido WHERE idPedido = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getItemPedidoByPedido($pedido) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM itempedido WHERE Pedido_idPedido = :id");
        $sql->bindValue(":id", $pedido);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
}
