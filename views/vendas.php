<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Nova Venda</h1>
					</div>
				</div>
			</div>
		</div>
<table border="0" width="100%" class="tabela">
    <thead>
        <tr>
            <th align="left">Produto</th>
            <th align="left">Valor</th>
            <th align="left">Ação</th>
        </tr>
    </thead>
    
    <?php foreach($produtos as $prod): ?>
    <tr>
        <td><?= $prod['descricao_Produto']; ?></td>
        <td><?= "R$ ".number_format($prod['valor_ItemEntrada'], 2, ",", "."); ?></td>
        <td><a href="<?= HOME; ?>/vendas/carrinho/<?= $prod['idProduto']; ?>" class="bt-cad bt-blue">Adicionar Produto no Carrinho</a></td>
    </tr>
    <?php endforeach; ?>
</table>

				</div>
			</div>
	    </div>