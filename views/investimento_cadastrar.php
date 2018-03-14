<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cadastrar Investimento</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-plus-square"></i> Investimento</li>
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
                        <h4 class="panel-title"><i class="fa fa-dollar-sign pull-left"></i>Investimento</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <input type="hidden" name="nCod" value="<?php echo !empty($financa['cod']) ? $financa['cod'] : 0;?>"/>
                            <div class="col-md-12 form-group">
                                <label for='iDescricao'>Descrição:* </label>
                                <input type="text" id="iDescricao" name="nDescricao" class="form-control" placeholder="Exemplo: Contribuição de parceiros" value="<?php echo (!empty($financa['descricao'])) ? $financa['descricao'] : ''; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for='iValor'>Valor:* </label>
                                <input type="text" id="iValor" name="nValor" class="form-control money-bank" placeholder="Exemplo: R$ 1.000,00" value="<?php echo (!empty($financa['valor'])) ? $financa['valor'] : ''; ?>"/>
                            </div>
                             <div class="col-md-6 form-group">
                                <label for='iData'>Data:* </label>
                                <input type="text" id="iData" name="nData" class="form-control input-data" placeholder="Exemplo: 15/05/2018" value="<?php echo (!empty($financa['data'])) ? $financa['data'] : ''; ?>"/>
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