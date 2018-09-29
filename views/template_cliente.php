<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bazar Cherburgo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?= HOME; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= HOME; ?>/assets/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?= HOME; ?>/assets/css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?= HOME; ?>/assets/css/main.css">

        <script src="<?= HOME; ?>/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
						
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
                                            <li class="logo-wrapper"><a href="<?= HOME; ?>/homecliente"><img src="<?= HOME; ?>/assets/img/logo.png" style="margin-top: -15px;" alt="Multipurpose Twitter Bootstrap Template"></a></li>
						<li class="<?= ($viewData['menu'] == 'home')?'active':''; ?>">
                                                    <a href="<?= HOME; ?>/homecliente">Home</a>
						</li>
                                                <li class="<?= ($viewData['menu'] == 'produtos')?'active':''; ?>">
                                                    <a href="<?= HOME; ?>/homecliente/produtos">Nossos Produtos</a>
						</li>
						
                                                </li>
                                                <li class="<?= ($viewData['menu'] == 'carrinho')?'active':''; ?>">
                                                    <a href="<?= HOME; ?>/carrinho">Carrinho</a>
						</li>
                                                
						<li class="<?= ($viewData['menu'] == 'hist_compras')?'active':''; ?>">
							<a href="<?= HOME; ?>/homecliente/historico_compras">Histórico de Compras</a>
						</li>
						<li>
							<a href="<?= HOME; ?>/homecliente/logout/">Sair</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

        <!-- Homepage Slider -->
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <!-- Homepage Slider -->

	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
		    		
		    		<div class="col-footer col-md-4 col-xs-6">
		    			<h3>Contato</h3>
		    			<p class="contact-us-details">
	        				<b>Endereço:</b> Rua Cherburgo, 305 - Padre Miguel, Rio de Janeiro<br/>
	        				<b>Telefone:</b> (21) 3159-0568<br/>
	        				<b>Email:</b> <a href="contato@bazarcherburgo.com">contato@bazarcherburgo.com</a><br/>
							<b>CEP:</b> 21875-020<br/>
	        			</p>
		    		</div>
		   	</div>
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; Desenvolvido por Roberto Galdino, Vitor Hugo Soares e Suelio Sousa.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?= HOME; ?>/assets/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.fitvids.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.sequence-min.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.bxslider.js"></script>
        <script src="<?= HOME; ?>/assets/js/main-menu.js"></script>
        <script src="<?= HOME; ?>/assets/js/template.js"></script>

    </body>
</html>