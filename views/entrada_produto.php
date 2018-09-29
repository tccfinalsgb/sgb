<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Entrada de Produto</h1>
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
                            <label for="register-lote"><i class="icon-user"></i> <b>Lote do Produto</b></label>
                            <input class="form-control" id="register-lote" name="register-lote" type="text" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="register-produto"><i class="icon-user"></i> <b>Produto</b></label>
                            <input class="form-control" id="register-produto" name="register-produto" list="prods" type="text" placeholder="">
                            <datalist id="prods">
                                <?php foreach ($produtos as $prod): ?>
                                    <option value="<?= utf8_encode($prod['titulo']); ?>"><?= $prod['codigo']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="register-qtd"><i class="icon-user"></i> <b>Quantidade</b></label>
                            <input class="form-control" id="register-qtd" name="register-qtd" type="number" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="register-valor"><i class="icon-user"></i> <b>Valor</b></label>
                            <input class="form-control" id="register-valor" name="register-valor" type="text" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="register-entrada"><i class="icon-user"></i> <b>Data de Entrada</b></label>
                            <input class="form-control" id="register-entrada" name="register-entrada" type="date" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="register-fornecedor"><i class="icon-user"></i> <b>Fornecedor</b></label>
                            <input class="form-control" id="register-fornecedor" name="register-fornecedor" list="forns" type="text" placeholder="">
                            <datalist id="forns">
                                <?php foreach ($fornecedores as $forn): ?>
                                    <option value="<?= utf8_encode($forn['nome_Forn']); ?>"><?= $forn['cnpj_Forn']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                        
                        <div class="form-group">
                            <label for="register-dataPedido"><i class="icon-user"></i> <b>Data do Pedido</b></label>
                            <input class="form-control" id="register-dataPedido" name="register-dataPedido" type="date" placeholder="">
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-blue" id="envio" data-toggle="modal" data-target="#cadastro">Salvar</button>
                                <!--<div class="clearfix"></div>-->
<!--                        </div>
                        <div class="form-group">-->
                            <button onclick="javascript:history.go(-1);" class="btn btn-green">Voltar</button>
<!--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="exampleModalLong">
                                Launch demo modal
                              </button>-->
                            <!--<div class="clearfix"></div>-->
                            <!--<a href="#" class="btn btn-success" id="botaoExcluir" name="excluir" data-confirm="Tem Certeza que Deseja Excluir o Funcionario Selecionado?">Excluir</a>-->
                        </div>
                        
                        <span id="prodC"></span>
                        <input type="hidden" value="add" id="situacao" name="situacao">
                        <span id="idP"></span>
                        <span id="imgView" style="width: 120px;">
                        </span>
                        
                        <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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
  $("#register-valor").mask('#.##0,00', {reverse: true});
      
  $("#register-lote").on('change', function(){
      
      var codigo = $("#register-lote").val();
      
      $.ajax({
            url: 'http://localhost/sgb/ajax/produto',
            type: 'POST',
            data: {codigo:codigo},
            dataType: 'json',
            success:function(json){
                if (json.erro === false) {
                    $("#register-lote").val(json.codigo);
                    $("#register-produto").val(json.titulo);
                    $("#register-desc").val(json.descricao);
                    $("#register-qtdmin").val(json.qtd);
                    $("#register-categoria").val(json.categoria);
                    $("#register-status").val(json.status);
                    $("#imgView").append('<img src="<?= HOME; ?>/assets/img/prods/'+json.img+'" width="100%" class="img-rounded"/>');
                    $("#situacao").val("update");
                    
                    $("#prodC").append('<input type="hidden" value="'+ json.id +'" name="idProd" id="idProd"/>');
                    
                    $('#botaoExcluir').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "http://localhost/sgb/produtos/del/" + json.id);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Produto<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Produto?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                    
                }
            }
        });
  });
        
//  $("#envio").on('click', function(){
//        var situacao = $("#situacao").val();
//        $("#exampleModalLong").modal({show:true});
//        if (situacao == "add") {
//                        
//            $('a[data-confirm]').click(function(){
//                var href = $(this).attr('href');
//
//                if (!$('#confirm-delete').length) {
//                    $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Cadastro de Entrada<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Cadastro Realizado com Sucesso</div><div class="modal-footer"><button type="submit" class="btn btn-success text-white" id="dataConfirmOk">Ok</button></div></div></div></div>');
//                }
//                $('#dataConfirmOk').attr('href', href);
//                $('#confirm-delete').modal({show:true});
//                return false;
//            });
//        }
        
//  });
  
//  $('#exampleModalLong').on('shown.bs.modal', function () {
//    $('#myInput').trigger('focus');
//    $("#exampleModalLong").modal({show:true});
//    return false;
//  });
    
</script>