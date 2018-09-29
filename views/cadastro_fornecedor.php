 <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Cadastro de Fornecedor</h1>
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
                                                <div id="error" style="background-color: darkred; color: #FFF; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px; display: none;">CNPJ Inválido</div>
                                                        <div class="form-group">
                                                            <label for="register-cnpj"><i class="icon-user"></i> <b>CNPJ</b></label>
                                                            <input class="form-control" name="register-cnpj" id="register-cnpj" type="text" style="width:400px;" placeholder="">
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label for="register-insc"><i class="icon-user"></i> <b>Inscrição Estadual</b></label>
                                                            <input class="form-control" name="register-insc" id="register-insc" type="text" style="width:400px;" placeholder="">
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                        <label for="register-status"><i class="icon-user"></i> <b>Status</b></label>
                                                        <select name="register-status" id="register-status" class="form-control" style="width:400px;">
                                                            <option value="ATIVO">ATIVO</option>
                                                            <option value="INATIVO">INATIVO</option>
                                                        </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="register-name"><i class="icon-user"></i> <b>Nome Completo</b></label>
                                                        <input class="form-control" name="register-name" id="register-name" type="text" style="width:400px;" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="register-endereco"><i class="icon-user"></i> <b>Endereço</b></label>
                                                        <input class="form-control" name="register-endereco" id="register-endereco" type="text" style="width:400px;" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="register-telefone"><i class="icon-user"></i> <b>Telefone</b></label>
                                                        <input class="form-control" name="register-telefone" id="register-telefone" type="text" style="width:400px;" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
                                                        <input class="form-control" name="register-username" id="register-username" type="text" style="width:400px;" placeholder="">
                                                                <br>					
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-blue">Salvar</button>
                                                                <!--<div class="clearfix"></div>-->
                                                                <!--</div>-->
                                                                    <!--<input type="hidden" value="add" name="situacao" id="situacao"/>
                                                                    <!--<input type="hidden" value="0" name="idP" id="idP"/>
                                                                <!--<div class="form-group">-->
                                                            <button onclick="javascript:history.go(-1);" class="btn btn-green">Voltar</button>
<!--                                                            <a href="#" class="btn btn-red" id="botaoExcluir" name="excluir" style="visibility: hidden;" data-confirm="Tem Certeza que Deseja Excluir o Funcionario Selecionado?">Excluir</a>-->
                                                            <input type="hidden" value="add" name="situacao" id="situacao"/>
                                                            
                                                            <span id="fornC"></span>
                                                    </div> 
                                                </form>
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
        <script type="text/javascript" src="<?= HOME; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?= HOME; ?>/assets/js/jquery.mask.min.js"></script> 
<script>
    
    $("#register-cnpj").mask("00.000.000/0000-00"); 
    $("#register-telefone").mask("(00)00000-0000");
    
    $("#register-cnpj").on("change", function(){
    var fornecedor = $("#register-cnpj").val();
    $.ajax({
        url: 'http://localhost/sgb/ajax/fornecedorCNPJ',
        type: 'POST',
        data: {fornecedor:fornecedor},
        dataType: 'json',
        success:function(json){
            if (json.erro === false) {
                $("#register-cnpj").val(json.cnpj);
                $("#register-name").val(json.nome);
                $("#register-insc").val(json.insc);
                $("#register-telefone").val(json.telefone);
                $("#register-endereco").val(json.endereco);
                $("#register-status").val(json.status);
                $("#register-username").val(json.username);
                $("#situacao").val("update");

                $("#fornC").append('<input type="hidden" value="'+ json.id +'" name="idForn" id="idForn"/>');

                $('#botaoExcluir').css('visibility', 'visible');

                    $('#botaoExcluir').attr("href", "http://localhost/sgb/fornecedor/del/" + json.id);

                    $('a[data-confirm]').click(function(){
                        var href = $(this).attr('href');

                        if (!$('#confirm-delete').length) {
                            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Fornecedor<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Fornecedor?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
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
    
    $("#register-insc").on('change', function(){
        var fornecedor = $("#register-insc").val();
        
        $.ajax({
            url: 'http://localhost/sgb/ajax/fornecedorINSC',
            type: 'POST',
            data: {fornecedor:fornecedor},
            dataType: 'json',
            success:function(json){
                if (json.erro === false) {
                    $("#register-cnpj").val(json.cnpj);
                    $("#register-name").val(json.nome);
                    $("#register-insc").val(json.insc);
                    $("#register-telefone").val(json.telefone);
                    $("#register-endereco").val(json.endereco);
                    $("#register-status").val(json.status);
                    $("#register-username").val(json.username);
                    $("#situacao").val("update");
                    
                    $("#fornC").append('<input type="hidden" value="'+ json.id +'" name="idForn" id="idForn"/>');
                    
//                    $('#botaoExcluir').css('visibility', 'visible');
                        
//                        $('#botaoExcluir').attr("href", "http://localhost/sgb/fornecedor/del/" + json.id);
//                        
//                        $('a[data-confirm]').click(function(){
//                            var href = $(this).attr('href');
//                            
//                            if (!$('#confirm-delete').length) {
//                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Fornecedor<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Fornecedor?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
//                            }
//                            $('#dataConfirmOk').attr('href', href);
//                            $('#confirm-delete').modal({show:true});
//                            return false;
//                        });
                    
                }
            }
        });
        
    });
</script>