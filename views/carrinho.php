<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Carrinho de Compras</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($itens) && !empty($itens) && count($itens) > 0): ?>
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> ATUALIZAR</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> COMPRAR</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                    <!-- Shopping Cart Item -->
                    
                    <?php foreach($itens as $item): ?>
                    <tr>
                        <!-- Shopping Cart Item Image -->
                        <td class="image"><a href="#"><img src="<?= HOME; ?>/assets/img/prods/<?= $item['imagem']; ?>" alt="Item Name"></a></td>
                        <!-- Shopping Cart Item Description & Features -->
                        <td>
                            <div class="cart-item-title"><a href="page-product-details.html"><?= utf8_encode($item['titulo']); ?></a></div>
                            
                            <div class="feature">Qtd em Estoque: <b><?= $item['qtd']; ?></b></div>
                        </td>
                        <!-- Shopping Cart Item Quantity -->
                        <td class="quantity">
                            <input class="form-control input-sm input-micro" type="number" value="1">
                        </td>
                        <!-- Shopping Cart Item Price -->
                        <td class="price"><?= number_format(($item['valor_ItemPedido']), 2, ',', '.'); ?></td>
                        <!-- Shopping Cart Item Actions -->
                        <td class="actions">
                            <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="<?= HOME; ?>/carrinho/delItem/<?= $item['Produto_idProduto']."-".$item['Pedido_idPedido'];?>" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    
                    <?php endforeach; ?>
                    
                    
                    <!-- End Shopping Cart Item -->
                    
                </table>
                <!-- End Shopping Cart Items -->
            </div>
        </div>
        <div class="row">
            <!-- Promotion Code -->
            <div class="col-md-4  col-md-offset-0 col-sm-6 col-sm-offset-6">
                <div class="cart-promo-code">
                    <h6><i class="glyphicon glyphicon-gift"></i> Tem código promocional?</h6>
                    <div class="input-group">
                        <input class="form-control input-sm" id="appendedInputButton" type="text" value="">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-grey" type="button">Aplicar</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Shipment Options -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <div class="cart-shippment-options">
                    <h6><i class="glyphicon glyphicon-plane"></i>Opções de Entrega</h6>
                    <div class="input-append">
                        <select class="form-control input-sm">
                            <option value="1">GRÁTIS - Até 05 dias úteis</option>
                            <option value="2">ENTREGA RÁPIDA - R$20.00</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <tr>
                        <td><b>Entrega</b></td>
                        <td>Grátis</td>
                    </tr>
                    <tr>
                        <td><b>Desconto</b></td>
                        <td>- R$ 0,00</td>
                    </tr>
                    <tr class="cart-grand-total">
                        <td><b>Total</b></td>
                        <td><b><?= number_format($pedido['valor_total_Pedido'], 2, ',', '.'); ?></b></td>
                    </tr>
                    
                </table>
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> ATUALIZAR</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> COMPRAR</a>
                </div>
                <?php else: ?>
                <div class="alert alert-warning" style="border-radius: 10px;">
                    <h2>Não há itens no seu carrinho!</h2>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/jquery.sequence-min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/main-menu.js"></script>
<script src="js/template.js"></script>

</body>
</html>