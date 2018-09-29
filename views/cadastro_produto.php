<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cadastro de Produto</h1>
            </div>
        </div>
    </div>
</div>
        
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="basic-login">
                    <form role="form" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="register-cod"><i class="icon-user"></i> <b>Código do Produto</b></label>
                            <input class="form-control" id="register-cod" name="register-cod" type="text" style="width:400px;" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="register-titulo"><i class="icon-user"></i> <b>Título</b></label>
                            <input class="form-control" id="register-titulo" name="register-titulo" type="text" style="width:400px;" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="register-desc"><i class="icon-user"></i> <b>Descrição</b></label>
                            
                            <textarea class="form-control" id="register-desc" name="register-desc" style="width:400px;"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="register-qtdmin"><i class="icon-user"></i> <b>Quantidade</b></label>
                            <input class="form-control" id="register-qtdmin" name="register-qtdmin" type="number" style="width:400px;" placeholder="">
                        </div>
                                               
                        <div class="form-group">
                            <label for="register-status"><i class="icon-user"></i> <b>Status</b></label>
                            <select name="register-status" id="register-status" class="form-control" style="width:400px;">
                                <option value="ATIVO">ATIVO</option>
                                <option value="INATIVO">INATIVO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="register-categoria"><i class="icon-user"></i> <b>Categoria</b></label>
                            <select name="register-categoria" id="register-categoria" class="form-control" style="width:400px;">
                                <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat['idCategoria']; ?>"><?= utf8_encode($cat['nomeCategoria']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="register-img"><i class="icon-user"></i> <b>Imagem</b></label>
                            <input class="form-control" id="register-img" name="register-img" type="file" style="width:400px;" placeholder="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-blue">Salvar</button>
                                <!--<div class="clearfix"></div>-->
<!--                        </div>
                        <div class="form-group">-->
                            <button onclick="javascript:history.go(-1);" class="btn btn-green">Voltar</button>
                            <!--<div class="clearfix"></div>-->
                            <!--<a href="#" class="btn btn-red" id="botaoExcluir" name="excluir" style="visibility: hidden;" data-confirm="Tem Certeza que Deseja Excluir o Funcionario Selecionado?">Excluir</a>-->
                        </div>
                        
                        <span id="prodC"></span>
                        <input type="hidden" value="add" id="situacao" name="situacao">
                        <span id="idP"></span>
                        <span id="imgView" style="width: 120px;">
                        </span>
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
          
  $("#register-cod").on('change', function(){
      
      var codigo = $("#register-cod").val();
      
      $.ajax({
            url: 'http://localhost/sgb/ajax/produto',
            type: 'POST',
            data: {codigo:codigo},
            dataType: 'json',
            success:function(json){
                if (json.erro === false) {
                    $("#register-cod").val(json.codigo);
                    $("#register-titulo").val(json.titulo);
                    $("#register-desc").val(json.descricao);
                    $("#register-qtdmin").val(json.qtd);
                    $("#register-categoria").val(json.categoria);
                    $("#register-status").val(json.status);
                    $("#imgView").append('<img src="<?= HOME; ?>/assets/img/prods/'+json.img+'" width="100%" class="img-rounded"/>');
                    $("#situacao").val("update");
                    
                    $("#prodC").append('<input type="hidden" value="'+ json.id +'" name="idProd" id="idProd"/>');
                    
//                    $('#botaoExcluir').css('visibility', 'visible');
                        
//                        $('#botaoExcluir').attr("href", "http://localhost/sgb/produtos/del/" + json.id);
                        
//                        $('a[data-confirm]').click(function(){
//                            var href = $(this).attr('href');
//                            
//                            if (!$('#confirm-delete').length) {
//                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Produto<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Produto?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger" id="dataConfirmOk">Excluir</a></div></div></div></div>');
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