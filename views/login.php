        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
                                                    <form role="form" role="form" method="post">
                                                            <?php if(isset($erro) && !empty($erro)): ?>
                                                                <div id="error" style="background-color: darkred; color: #FFF; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px;"><?= $erro; ?></div>
                                                            <?php endif ?>
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Email</b></label>
                                                                <input class="form-control" name="login-username" id="login-username" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Senha</b></label>
                                                                <input class="form-control" name="login-password" id="login-password" type="password" placeholder="">
								</div>
								<div class="form-group">
									<label class="checkbox">
										<input type="checkbox"> Lembrar-me
									</label>
									<a href="page-password-reset.html" class="forgot-password">Esqueceu sua Senha?</a>
									<button type="submit" class="btn pull-right">Login</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-7 social-login">
						
						<div class="clearfix"></div>
						<div class="not-member">
							<p>Não é cadastrado?  <a href="<?= HOME; ?>/home/cadastro">Cadastre-se Aqui</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= HOME; ?>/assets/js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?= HOME; ?>/assets/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.fitvids.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.sequence-min.js"></script>
        <script src="<?= HOME; ?>/assets/js/jquery.bxslider.js"></script>
        <script src="<?= HOME; ?>/assets/js/main-menu.js"></script>
        <script src="<?= HOME; ?>/assets/js/template.js"></script>

    </body>
</html>