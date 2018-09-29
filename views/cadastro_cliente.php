<!-- Page Title -->
<div class="section section-breadcrumbs">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h1>Cadastre-se</h1>
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
                                    <?php if(isset($erro) && !empty($erro)): ?>
                                        <div id="error" style="background-color: darkred; color: #FFF; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px; display: none;">CPF ou CNPJ Inválido</div>
                                    <?php endif ?>
                                        <div id="error" style="background-color: darkred; color: #FFF; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 10px; display: none;">CPF ou CNPJ Inválido</div>
                                    <div class="form-group">
                                    <label for="register-cpf"><i class="icon-user"></i> <b>CPF / CNPJ</b></label>
                                    <input class="form-control mascara-cpfcnpj" id="register-cpf" name="register-cpf" type="text" style="width:400px;" placeholder="">
                                    </div>
                                    <div class="form-group">
                                    <label for="register-name"><i class="icon-user"></i> <b>Nome</b></label>
                                            <input class="form-control" name="register-name" id="register-name" type="text" style="width:400px;" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-sexo"><i class="icon-user"></i> <b>Sexo</b></label><br>
                                        <input class="radio-inline" id="register-sexo" name="register-sexo" checked="checked" type="radio" value="M">&nbsp;Masculino &nbsp;&nbsp;
                                        <input class="radio-inline" id="register-sexo" name="register-sexo" type="radio" value="F">&nbsp;Feminino
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
                                    </div>
                                    <div class="form-group">
                                    <label for="register-password"><i class="icon-lock"></i> <b>Digite a Senha</b></label>
                                    <input class="form-control" name="register-password" id="register-password" type="password" style="width:400px;" placeholder="">
                                    </div>
                                    <div class="form-group">
                                    <label for="register-password2"><i class="icon-lock"></i> <b>Digite a Senha Novamente</b></label>
                                    <input class="form-control" name="register-password2" id="register-password2" type="password" style="width:400px;" placeholder="">
                                    </div>

                                    <div class="form-group">
					<button type="submit" class="btn btn-blue">Salvar</button>
					<!--<div class="clearfix"></div>-->
					<!--</div>-->
					<!--<input type="hidden" value="add" name="situacao" id="situacao"/>-->
                                        <!--<input type="hidden" value="0" name="idP" id="idP"/>-->
                                        <!--<div class="form-group">-->
                                        <button onclick="javascript:history.go(-1);" class="btn btn-green">Voltar</button>
                                        <!--><a href="#" class="btn btn-red" id="botaoExcluir" name="excluir" style="visibility: hidden;" data-confirm="Tem Certeza que Deseja Excluir o Funcionario Selecionado?">Excluir</a>
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
    
$(function (){
        $("#register-telefone").mask("(00) 00000-0000");


        var cpfMascara = function (val) {
            return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
         },
         cpfOptions = {
            onKeyPress: function(val, e, field, options) {
               field.mask(cpfMascara.apply({}, arguments), options);
            }
         };
         $('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);
    
    $("#register-cpf").on("change", function(){
        var pessoa = $("#register-cpf").val();
        
//        if ($(this).val().length == 11) {
//            $(this).mask("999.999.999-99");
//        } else if ($(this).val().length == 14) {
//            $(this).mask("99.999.999/9999-99");
//        }
        
        $.ajax({
             url:'http://localhost/sgb/ajax/clienteCPF',
            type: 'POST',
            data:{pessoa:pessoa},
            dataType: 'json',
            success:function(json){
                if (json.erro === true){
                    $("#error").css('display', 'block');
                }
            }
        });
    });
    
});
</script>