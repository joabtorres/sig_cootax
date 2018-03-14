<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Feedback</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-comment"></i> Feedback</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Envie seu feedback para os administradores do sistema, sobre o que você julgar necessário como, por exemplo, falhas, críticas e sugestões de melhorias observadas.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form autocomplete="off" method="POST" id="myFormFinanca">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-comments pull-left"></i> Feedback</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <input type="hidden" name="nCod" value="<?php echo!empty($financa['cod']) ? $financa['cod'] : 0; ?>"/>
                            <div class="col-md-12 form-group">
                                <label for='iUsuario'>Usuário:* </label>
                                <input type="text" id="iUsuario" name="nUsuario" class="form-control" placeholder="Exemplo: Usuário" disabled="disabled" value="<?php echo $_SESSION['usuario_sig_cootax']['nome'] . ' ' . $_SESSION['usuario_sig_cootax']['sobrenome']; ?>"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for='iSugestao' >Descrição: </label>
                                <textarea class="form-control" id="iSugestao" name="nDescricao" rows="5"></textarea>
                            </div>
                        </div>
                    </article>
                </section>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Enviar </button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>