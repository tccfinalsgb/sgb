<?php
class Venda extends model{
    
    public function delVenda($id) {
        $sql = $this->db->prepare("DELETE FROM venda WHERE Pedido_idPedido = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function addVenda($prod_id_prod, $ped_id_ped, $valor_itemp, $qtd_itemp){
                
        $sql = $this->db->prepare("INSERT INTO venda SET Produto_idproduto = :prod_id_prod, Pedido_idPedido = :ped_id_ped, qtd_ItemPedido = :qtd_itemp, valor_ItemPedido = :valor_itemp");
        $sql->bindValue(":Produto_idproduto", $prod_id_prod);
        $sql->bindValue(":Pedido_idpedido", $ped_id_ped);
        $sql->bindValue(":qtd_ItemPedido", $qtd_itemp);
        $sql->bindValue(":valor_ItemPedido", $valor_itemp);
        $sql->execute();
                
    }
    
    public function editVenda($prod_id_prod, $ped_id_ped, $valor_itemp, $qtd_itemp) {
                
        $sql = $this->db->prepare("UPDATE venda SET Produto_idproduto = :prod_id_prod, Pedido_idPedido = :ped_id_ped, qtd_ItemPedido = :qtd_itemp, valor_ItemPedido = :valor_itemp");
        $sql->bindValue(":Produto_idproduto", $prod_id_prod);
        $sql->bindValue(":Pedido_idpedido", $ped_id_ped);
        $sql->bindValue(":qtd_ItemPedido", $qtd_itemp);
        $sql->bindValue(":valor_ItemPedido", $valor_itemp);
        $sql->execute();
                
    }
}