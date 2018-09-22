<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Nossos Produtos</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <?php $cont = 1; ?>
        <?php foreach($produtos as $prod): ?>
            <?php if($cont%3==0): ?>
                <div class="row">
            <?php endif; ?>

                <div class="col-sm-4">
                    <!-- Product -->
                        <div class="shop-item">
                            <!-- Product Image -->
                            <div class="image">
                                <img height="200" width="200" src="<?= HOME; ?>/assets/img/prods/<?= $prod['img']; ?>" alt="Item Name">
                            </div>
                            <!-- Product Title -->
                            <div class="title">
                                <h3><a href="page-product-details.html"><?= utf8_encode($prod['titulo']); ?></a></h3>
                            </div>
                            <!-- Product Available Colors-->
                            
                            <!-- Product Price-->
                            <div class="price">
                                    R$ 999.99
                            </div>
                            <!-- Product Description-->
                            <div class="description">
                                    <p><?= utf8_encode($prod['descricao_Produto']); ?></p>
                            </div>
                            <!-- Add to Cart Button -->
                            <div class="actions">
                                    <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i>Adicionar ao carrinho</a>
                            </div>
                        </div>
                    <!-- End Product -->
                </div>
                    
            <?php if($cont%3==0): ?>
                </div>
            <?php endif; ?>
        <?php $cont++; ?>
        <?php endforeach; ?>
        
<!--            <div class="row">
                    <div class="col-sm-4">
                             Product 
                            <div class="shop-item">
                                     Product Image 
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="img/product1.jpg" alt="Item Name"></a>
                                    </div>
                                     Product Title 
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                                    </div>
                                     Product Available Colors
                                    <div class="colors">
                                            <span class="color-white"></span>
                                            <span class="color-black"></span>
                                            <span class="color-blue"></span>
                                            <span class="color-orange"></span>
                                            <span class="color-green"></span>
                                    </div>
                                     Product Price
                                    <div class="price">
                                            <span class="price-was">$959.99</span> $999.99
                                    </div>
                                     Product Description
                                    <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio.</p>
                                    </div>
                                     Add to Cart Button 
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                                    </div>
                            </div>
                             End Product 
                    </div>
                    <div class="col-sm-4">
                            <div class="shop-item">
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="img/product2.jpg" alt="Item Name"></a>
                                    </div>
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                                    </div>
                                    <div class="colors">
                                            <span class="color-white"></span>
                                            <span class="color-black"></span>
                                    </div>
                                    <div class="price">
                                            $999.99
                                    </div>
                                    <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio.</p>
                                    </div>
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                                    </div>
                            </div>
                    </div>
                    <div class="col-sm-4">
                            <div class="shop-item">
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="img/product3.jpg" alt="Item Name"></a>
                                    </div>
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                                    </div>
                                    <div class="colors">
                                            <span class="color-white"></span>
                                            <span class="color-black"></span>
                                            <span class="color-blue"></span>
                                    </div>
                                    <div class="price">
                                            $999.99
                                    </div>
                                    <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio.</p>
                                    </div>
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                                    </div>
                            </div>
                    </div>
            </div>-->
<!--            <div class="row">
                    <div class="col-sm-4">
                            <div class="shop-item">
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="img/product4.jpg" alt="Item Name"></a>
                                    </div>
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                                    </div>
                                    <div class="colors">
                                            <span class="color-white"></span>
                                            <span class="color-black"></span>
                                            <span class="color-blue"></span>
                                    </div>
                                    <div class="price">
                                            $999.99
                                    </div>
                                    <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio.</p>
                                    </div>
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                                    </div>
                            </div>
                    </div>
                    <div class="col-sm-4">
                            <div class="shop-item">
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="img/product5.jpg" alt="Item Name"></a>
                                    </div>
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                                    </div>
                                    <div class="colors">
                                            <span class="color-white"></span>
                                            <span class="color-black"></span>
                                            <span class="color-blue"></span>
                                    </div>
                                    <div class="price">
                                            $999.99
                                    </div>
                                    <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio.</p>
                                    </div>
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                                    </div>
                            </div>
                    </div>
                    <div class="col-sm-4">
                            <div class="shop-item">
                                    <div class="image">
                                            <a href="page-product-details.html"><img src="<?= HOME; ?>/assets/img/brinquedos.jpg"></a>
                                    </div>
                                    <div class="title">
                                            <h3><a href="page-product-details.html">Balde 5lt</a></h3>
                                    </div>
                                    <div class="price">
                                            R$4,99
                                    </div>
                                    <div class="description">
                                            <p align="center">Um bom utensilio para sua casa.</p>
                                    </div>
                                    <div class="actions">
                                            <a href="<?= HOME; ?>/homecliente/carrinho/" class="btn"><i class="icon-shopping-cart icon-white"></i> Adicionar ao Carrinho</a>
                                    </div>
                            </div>
                    </div>
            </div>-->

    </div>
</div>
<div class="pagination-wrapper ">
    <ul class="pagination pagination-lg">
        <li class="disabled"><a href="#">Previous</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li><a href="#">10</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
<!--                </div>
            </div>-->