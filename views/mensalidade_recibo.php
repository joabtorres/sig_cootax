<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Recibo de Mensalidade</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list-alt"></i> Cooperados</a></li>
                <li class="text-uppercase"><a href="<?php echo BASE_URL ?>/cooperado/index/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>"><i class="fa fa-user"></i> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Mensalidade</li>
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
        <div class="col-md-12">

            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title">Recibo de Mensalidade</h4>
                </header>
                <article class="panel-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="iAno">Ano:*</label>
                                <input class="form-control" type="text" name="nAno" id="iAno" placeholder="Exemplo: 2015">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="iValor">Valor:*</label>
                                <input class="form-control money-bank" type="text" name="nValor" id="iValor" placeholder="Exemplo: R$ 10,00">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="iDe">De:</label>
                                <select class="form-control" id="iDe" name="nDe">
                                    <option value="1" selected='selected'>Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value='8'>Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="iAte">Até:</label>
                                <select class="form-control" id="iAte" name="nAte">
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value='8'>Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12" selected="selected">Dezembro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-search" aria-hidden="true"></i> Gerar PDF</button>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </div>
    </div>
</div>