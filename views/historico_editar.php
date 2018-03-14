<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Editar Histórico</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list-alt"></i> Cooperados</a></li>
                <li class="text-uppercase"><a href="<?php echo BASE_URL ?>/cooperado/index/<?php echo!empty($cooperado['historico']['cod_cooperado']) ? $cooperado['historico']['cod_cooperado'] : '' ?>"><i class="fa fa-user"></i> <?php echo!empty($cooperado['historico']['nome_completo']) ? $cooperado['historico']['nome_completo'] : '' ?></a></li>
                <li class="active"><i class="fa fa-edit"></i> Histórico</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off">
                <input type="hidden" name="nCodHistorico" value="<?php echo!empty($cooperado['historico']['cod_historico']) ? $cooperado['historico']['cod_historico'] : '' ?>"/>
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <p class="panel-title">Histórico</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-7 col-lg-8">
                                <label for="icadUnidade">Cooperado: </label>
                                <input type="hidden" name="nCodCooperado" value="<?php echo!empty($cooperado['historico']['cod_cooperado']) ? $cooperado['historico']['cod_cooperado'] : '' ?>"/>
                                <input type="text" name="ncadUnidade" id="icadUnidade" class=" form-control"  disabled="true" value="<?php echo!empty($cooperado['historico']['nome_completo']) ? $cooperado['historico']['nome_completo'] : '' ?>"/>
                            </div>
                            <div class="form-group col-sm-12 col-md-5 col-lg-4">
                                <label for="icadUsuario">Usuário: </label>
                                <input type="hidden" name="nCodUsuario" value="<?php echo!empty($cooperado['historico']['cod_usuario']) ? $cooperado['historico']['cod_usuario'] : '' ?>"/>
                                <input type="text" name="ncadUsuario" id="icadUsuario" class=" form-control"  disabled="true" value="<?php echo!empty($cooperado['historico']['usuario_usuario']) ? $cooperado['historico']['usuario_usuario'] : '' ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="icadDescricao">Descrição: </label>
                                <textarea name="nDescricao" id="icadDescricao" class="form-control" placeholder="Exemplo: Descrição do histórico..."><?php echo!empty($cooperado['historico']['descricao_historico']) ? $cooperado['historico']['descricao_historico'] : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fim .panel--> 
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>