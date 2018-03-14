<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cooperativa</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-home"></i> Cooperativa</li>
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
            <form autocomplete="off" method="POST">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-home pull-left"></i>Cooperativa</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <label for='iNome'>Nome Completo:</label>
                                <input type="text" class="form-control" id="iNome" name="nNome" placeholder="Exemplo: Cooperativa dos Taxistas de Itaituba" value="<?php echo $cidade['nome_completo'] ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for='iAbrevicao'>Abreviação:</label>
                                <input type="text" class="form-control" id="iAbrevicao" name="nAbrevicao" placeholder="Exemplo: COOTAX" value="<?php echo $cidade['nome_siglas'] ?>">
                            </div>
                            <div class="col-md-8 form-group">
                                <label for='iEndereco'>Endereço:</label>
                                <input type="text" class="form-control" id="iEndereco" name="nEndereco" placeholder="Exemplo: Travessa João Pessoa, nº 215, bairro Vila Caçula - Itaituba - Pará - Brasil" value="<?php echo $cidade['endereco'] ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for='iCEP'>CEP:</label>
                                <input type="text" class="form-control" id="iCEP" name="nCEP" placeholder="Exemplo: 64180-544" value="<?php echo $cidade['cep'] ?>">
                            </div>                            
                            <div class="col-md-3 form-group">
                                <label for='iCNPJ'>CNPJ:</label>
                                <input type="text" class="form-control" id="iCNPJ" name="nCNPJ" placeholder="Exemplo: 08.223.742/0001-98" value="<?php echo $cidade['cnpj'] ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for='iTelefone'>Telefone:</label>
                                <input type="text" class="form-control" id="iTelefone" name="nTelefone" placeholder="Exemplo: (93) 3518-6664" value="<?php echo $cidade['telefone'] ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for='iEmail'>Email:</label>
                                <input type="text" class="form-control" id="iEmail" name="nEmail" placeholder="Exemplo: cootax.itb@gmail.com" value="<?php echo $cidade['email'] ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for='iUrl'>Endereço do Site:</label>
                                <input type="text" class="form-control" id="iUrl" name="nUrl" placeholder="Exemplo: www.cootax.com.br" value="<?php echo $cidade['url_site'] ?>">
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