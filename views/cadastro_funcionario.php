        <!-- Page Title -->
                <div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Cadastro de Funcionário</h1>
                                        </div>
                                </div>
			</div>
		</div>
         <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="basic-login">
                                                    <form role="form" method="post">
                                                         <div id="error" style="background-color: darkred; color: #FFF; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px; display: none;">CPF Inválido</div>
								<div class="form-group">
		        				 	<label for="register-cpf"><i class="icon-user"></i> <b>CPF</b></label>
                                                                <input class="form-control" name="register-cpf" id="register-cpf" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-cargo"><i class="icon-user"></i> <b>Cargo</b></label>
                                                                <input class="form-control" name="register-cargo" id="register-cargo" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-name"><i class="icon-user"></i> <b>Nome Completo</b></label>
                                                                <input class="form-control" name="register-name" id="register-name" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-endereco"><i class="icon-user"></i> <b>Endereço</b></label>
                                                                <input class="form-control" name="register-endereco" id="register-endereco" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-telefone"><i class="icon-user"></i> <b>Telefone</b></label>
                                                                <input class="form-control" name="register-telefone" id="register-telefone" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
                                                                <input class="form-control" name="register-username" id="register-username" type="text" placeholder="">
								</div>
                                                                <div class="form-group">
                                                                    <label for="register-sexo"><i class="icon-user"></i> <b>Sexo</b></label><br>
                                                                    <input class="radio-inline" id="register-sexo" name="register-sexo" checked="checked" type="radio" value="M">&nbsp;Masculino &nbsp;&nbsp;
                                                                <input class="radio-inline" id="register-sexo" name="register-sexo" type="radio" value="F">&nbsp;Feminino
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Digite a Senha</b></label>
                                                                <input class="form-control" name="register-password" id="register-password" type="password" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Digite a Senha Novamente</b></label>
                                                                <input class="form-control" name="register-password2" id="register-password2" type="password" placeholder="">
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-blue">Salvar</button>
									<!--<div class="clearfix"></div>-->
								<!--</div>-->
							
                                                                <input type="hidden" value="add" name="situacao" id="situacao"/>
                                                                <input type="hidden" value="0" name="idP" id="idP"/>
                                                        
								<!--<div class="form-group">-->
                                                                    <button onclick="javascript:history.go(-1);" class="btn btn-green">Voltar</button>
                                                                    <a href="#" class="btn btn-red" id="botaoExcluir" name="excluir" style="visibility: hidden;" data-confirm="Tem Certeza que Deseja Excluir o Funcionario Selecionado?">Excluir</a>
									<!--<div class="clearfix"></div>-->
								</div>

							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
            <script type="text/javascript" src="<?= HOME; ?>/assets/js/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="<?= HOME; ?>/assets/js/jquery.mask.min.js"></script>   
<script>
    
     $("#register-cpf").mask("000.000.000-00");
     $("#register-telefone").mask("(00)00000-0000");
    
    $("#register-cpf").on("change", function(){
        var pessoa = $("#register-cpf").val();

        $.ajax({
             url:'http://localhost/sgb/ajax/funcionario',
            type: 'POST',
            data:{pessoa:pessoa},
            dataType: 'json',
            success:function(json){
                if (json.erro === false){
                    $("#register-cpf").val(json.cpf);
                    $("#register-cargo").val(json.cargo);
                    $("#register-name").val(json.nome);
                    $("#register-endereco").val(json.endereco);
                    $("#register-username").val(json.username);
                    $("#register-telefone").val(json.telefone);
                    $("#idP").val(json.idPF);
                    $("#register-sexo:radio:checked").val(json.sexo); // LEMBRAR DE ACERTAR
                    
                    $("#botaoExcluir").css('visibility', 'visible');
                    $('#botaoExcluir').attr("href", "http://localhost/sgb/funcionario/del/" + json.idPF);
                    
                    $("#situacao").val("update");
                    
                    $('a[data-confirm]').click(function(){
                        var href = $(this).attr('href');
                        if (!$('#confirm-delete').length) {
                            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Funcionário<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Funcionário?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-red text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                        }
                        $('#dataConfirmOk').attr('href', href);
                        $('#confirm-delete').modal({show:true});
                        return false;
                    });

                }else{
                    $("#error").css('display', 'block');
                }
            }
        });
    });

</script>