<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cadastrar Mensalidade</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list-alt"></i> Cooperados</a></li>
                <li class="text-uppercase"><a href="<?php echo BASE_URL ?>/cooperado/index/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>"><i class="fa fa-user"></i> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></a></li>
                <li class="active"><i class="fa fa-plus-square"></i> Mensalidade</li>
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
            <form autocomplete="off" method="POST" id="myFormFinanca">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-dollar-sign pull-left"></i>Mensalidade</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <input type="hidden" name="nCodCooperado" value="<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : null; ?>"/>
                            <input type="hidden" name="nCodMensalidade" value="<?php echo!empty($cooperado['mensalidade']['cod_mensalidade']) ? $cooperado['mensalidade']['cod_mensalidade'] : null; ?>"/>
                            <div class="col-md-4 form-group">
                                <label for='iAno'>Ano:* </label>
                                <input type="text" id="iAno" name="nAno" class="form-control" placeholder="Exemplo: 2017" value="<?php echo!empty($cooperado['mensalidade']['ano']) ? $cooperado['mensalidade']['ano'] : '' ?>"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for='iDescricao'>Cooperado: </label>
                                <input type="text" id="iDescricao" name="nDescricao" class="form-control" value="<?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?>" disabled="disabled"/>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for='iJaneiro'>Janeiro: </label>
                                        <input type="text" id="iJaneiro" name="nJaneiro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['janeiro']) ? $this->formatDinheiroView($cooperado['mensalidade']['janeiro']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iFevereiro'>Fevereiro: </label>
                                        <input type="text" id="iFevereiro" name="nFevereiro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['fevereiro']) ? $this->formatDinheiroView($cooperado['mensalidade']['fevereiro']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iMarco'>Março: </label>
                                        <input type="text" id="iMarco" name="nMarco" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['marco']) ? $this->formatDinheiroView($cooperado['mensalidade']['marco']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iAbril'>Abril: </label>
                                        <input type="text" id="iAbril" name="nAbril" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['abril']) ? $this->formatDinheiroView($cooperado['mensalidade']['abril']) : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for='iMaio'>Maio: </label>
                                        <input type="text" id="iMaio" name="nMaio" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['maio']) ? $this->formatDinheiroView($cooperado['mensalidade']['maio']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iJunho'>Junho: </label>
                                        <input type="text" id="iJunho" name="nJunho" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['junho']) ? $this->formatDinheiroView($cooperado['mensalidade']['junho']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iJulho'>Julho: </label>
                                        <input type="text" id="iJulho" name="nJulho" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['julho']) ? $this->formatDinheiroView($cooperado['mensalidade']['julho']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iAgosto'>Agosto: </label>
                                        <input type="text" id="iAgosto" name="nAgosto" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['agosto']) ? $this->formatDinheiroView($cooperado['mensalidade']['agosto']) : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for='iSetembro'>Setembro: </label>
                                        <input type="text" id="iSetembro" name="nSetembro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['setembro']) ? $this->formatDinheiroView($cooperado['mensalidade']['setembro']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iOutubro'>Outubro: </label>
                                        <input type="text" id="iOutubro" name="nOutubro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['outubro']) ? $this->formatDinheiroView($cooperado['mensalidade']['outubro']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iNovembro'>Novembro: </label>
                                        <input type="text" id="iNovembro" name="nNovembro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['novembro']) ? $this->formatDinheiroView($cooperado['mensalidade']['novembro']) : '' ?>"/>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for='iDezembro'>Dezembro: </label>
                                        <input type="text" id="iDezembro" name="nDezembro" class="form-control money-bank" placeholder="Exemplo: R$ 10,00" value="<?php echo!empty($cooperado['mensalidade']['dezembro']) ? $this->formatDinheiroView($cooperado['mensalidade']['dezembro']) : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </article>
                </section>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>