<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2 class="text-uppercase"><?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list-alt"></i> Cooperados</a></li>
                <li class="active text-uppercase"><i class="fa fa-user"></i> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="col-md-12 clear">
        <p class="text-right">
            <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/cooperado/' . $cooperado['cooperado']['cod_cooperado']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
        </p>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/operacao/carteira/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>" target="_blank">
                            <div class="col-xs-12">
                                <i class="fa fa-address-card  fa-3x pull-left"> </i> 
                                <div class="font-bold"> Carteira</div>
                                <div>Cooperado</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/operacao/recibo_taxi/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>" target="_blank" >
                            <div class="col-xs-12">
                                <i class="fa fa-clipboard-list fa-3x pull-left"></i>
                                <div class="font-bold">Táxi</div>
                                <div> Recibo</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/operacao/recibo_mensalidade/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>" target="_blank">
                            <div class="col-xs-12">
                                <i class="fa fa-clipboard-list fa-3x pull-left"></i>                               
                                <div class="font-bold">Mensalidade</div>
                                <div>Recibo</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-black">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/operacao/cartao_visita/<?php echo!empty($cooperado['cooperado']['cod_cooperado']) ? $cooperado['cooperado']['cod_cooperado'] : '' ?>" target="_blank">
                            <div class="col-xs-12">
                                <i class="fa fa-address-card fa-3x pull-left" ></i>
                                <div class="font-bold"> Cartão de Visita </div>
                                <div>Disk Táxi</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 clear">

            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-user pull-left"></i> Dados Pessoais</h4>
                </header>
                <article class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo!empty($cooperado['cooperado']['imagem']) ? BASE_URL . '/' . $cooperado['cooperado']['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png' ?>" class="img-responsive img-rounded img-center"/>
                        </div>
                        <div class="col-md-10">
                            <!--inicio row-->
                            <div class="row">
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Apelido:</span> <?php echo!empty($cooperado['cooperado']['apelido']) ? $cooperado['cooperado']['apelido'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Nome:</span> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Categoria:</span> <?php echo!empty($cooperado['cooperado']['tipo']) ? $cooperado['cooperado']['tipo'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 "> 
                                    <p><span class="text-destaque">Status:</span> <?php echo(!empty($cooperado['cooperado']['status']) && $cooperado['cooperado']['status'] == 1) ? 'Ativo' : 'Inativo' ?></p>
                                </div>
                            </div>
                            <!--fim row-->
                            <!--inicio row-->
                            <div class="row">
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">RG:</span> <?php echo!empty($cooperado['cooperado']['rg']) ? $cooperado['cooperado']['rg'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">CPF:</span> <?php echo!empty($cooperado['cooperado']['cpf']) ? $cooperado['cooperado']['cpf'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">CNH:</span> <?php echo!empty($cooperado['cooperado']['cnh']) ? $cooperado['cooperado']['cnh'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">CAT:</span> <?php echo!empty($cooperado['cooperado']['cat']) ? $cooperado['cooperado']['cat'] : '' ?></p>
                                </div>
                            </div>
                            <!--fim row-->
                            <!--inicio row-->
                            <div class="row">
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">INSS:</span> <?php echo!empty($cooperado['cooperado']['inss']) ? $cooperado['cooperado']['inss'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Estado Cívil:</span> <?php echo!empty($cooperado['cooperado']['estado_civil']) ? $cooperado['cooperado']['estado_civil'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Nacionalidade:</span> <?php echo!empty($cooperado['cooperado']['nacionalidade']) ? $cooperado['cooperado']['nacionalidade'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Gênero:</span> <?php echo!empty($cooperado['cooperado']['genero']) ? $cooperado['cooperado']['genero'] : '' ?></p>
                                </div>

                            </div>
                            <!--fim row-->
                            <!--inicio row-->
                            <div class="row">
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Data de Nascimento:</span> <?php echo!empty($cooperado['cooperado']['data_nascimento']) ? $this->formatDateView($cooperado['cooperado']['data_nascimento']) : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Data de Inscrição:</span> <?php echo!empty($cooperado['cooperado']['data_inscricao']) ? $this->formatDateView($cooperado['cooperado']['data_inscricao']) : '' ?></p>
                                </div>

                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Celular 1:</span> <?php echo!empty($cooperado['contato']['celular_1']) ? $cooperado['contato']['celular_1'] : '' ?></p>
                                </div>
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Celular 2:</span> <?php echo!empty($cooperado['contato']['celular_2']) ? $cooperado['contato']['celular_2'] : '' ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3 ">
                                    <p><span class="text-destaque">Email:</span> <?php echo!empty($cooperado['contato']['email']) ? $cooperado['contato']['email'] : '' ?></p>
                                </div>
                            </div>
                            <!--fim row-->
                        </div>
                    </div>
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-users pull-left"></i> Familiares</h4>
                </header>
                <article class="panel-body">
                    <!--inicio row-->
                    <div class="row">
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Pai:</span> <?php echo!empty($cooperado['cooperado']['pai']) ? $cooperado['cooperado']['pai'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Mãe:</span> <?php echo!empty($cooperado['cooperado']['mae']) ? $cooperado['cooperado']['mae'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Cônjuge:</span> <?php echo!empty($cooperado['cooperado']['conjugue']) ? $cooperado['cooperado']['conjugue'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Filhos:</span> <?php echo!empty($cooperado['cooperado']['filhos']) ? $cooperado['cooperado']['filhos'] : '' ?></p>
                        </div>
                    </div>
                    <!--fim row-->
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-map-marker-alt  pull-left"></i> Endereço</h4>
                </header>
                <article class="panel-body">
                    <!--inicio row-->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-uppercase"><span class="text-destaque text-capitalize">Endereço:</span> <?php echo!empty($cooperado['endereco']['logradouro']) ? $cooperado['endereco']['logradouro'] : '' ?>, <?php echo!empty($cooperado['endereco']['numero']) ? 'nº ' . $cooperado['endereco']['numero'] : 'S/N' ?>, <?php echo!empty($cooperado['endereco']['bairro']) ? 'bairro ' . $cooperado['endereco']['bairro'] : '' ?>, <?php echo!empty($cooperado['endereco']['complemento']) ? $cooperado['endereco']['complemento'] : '' ?> - <?php echo!empty($cooperado['endereco']['cidade']) ? $cooperado['endereco']['cidade'] : '' ?>  - <?php echo!empty($cooperado['endereco']['estado']) ? $cooperado['endereco']['estado'] : '' ?> <?php echo!empty($cooperado['endereco']['cep']) ? ' - CEP: ' . $cooperado['endereco']['cep'] : '' ?></p>
                        </div>
                    </div>
                    <!--fim row-->
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-id-card  pull-left"></i> Validade da Carteira</h4>
                </header>
                <article class="panel-body">
                    <!--inicio row-->
                    <div class="row">
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Data de Emissão:</span> <?php echo!empty($cooperado['carteira']['data_inicial']) ? $this->formatDateView($cooperado['carteira']['data_inicial']) : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Data de Validade:</span> <?php echo!empty($cooperado['carteira']['data_validade']) ? $this->formatDateView($cooperado['carteira']['data_validade']) : '' ?></p>
                        </div>
                    </div>
                    <!--fim row-->
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->

        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-car pull-left"></i> Veículo</h4>
                </header>
                <article class="panel-body">
                    <!--inicio row-->
                    <div class="row">
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">NZ:</span> <?php echo!empty($cooperado['veiculo']['nz']) ? $cooperado['veiculo']['nz'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Veículo:</span> <?php echo!empty($cooperado['veiculo']['veiculo']) ? $cooperado['veiculo']['veiculo'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Placa:</span> <?php echo!empty($cooperado['veiculo']['veiculo']) ? $cooperado['veiculo']['placa'] : '' ?></p>
                        </div>
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Cor:</span> <?php echo!empty($cooperado['veiculo']['cor']) ? $cooperado['veiculo']['cor'] : '' ?></p>
                        </div>
                    </div>
                    <!--fim row-->
					<!--inicio row-->
					<div class="row">
                        <div class="col-sm-6 col-md-3 ">
                            <p><span class="text-destaque">Ano Modelo:</span> <?php echo!empty($cooperado['veiculo']['ano_modelo']) ? $cooperado['veiculo']['ano_modelo'] : '' ?></p>
                        </div>
					</div>
					<!-- fim row-->
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-calendar-alt  pull-left"></i> Mensalidade</h4>
                </header>
                <article class="panel-body">
                    <span class="pull-right"><a href="<?php echo BASE_URL . '/cadastrar/mensalidade/' . $cooperado['cooperado']['cod_cooperado'] ?>" class="btn btn-sm btn-warning" title="Adicionar Mensalidade"><i class="fa fa-plus-circle"></i> Adicionar</a></span>
                </article>
                <article class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th>Ano</th>
                            <th>Janeiro</th>
                            <th>Fevereiro</th>
                            <th>Março</th>
                            <th>Abril</th>
                            <th>Maio</th>
                            <th>Junho</th>
                            <th>Julho</th>
                            <th>Agosto</th>
                            <th>Setembro</th>
                            <th>Outubro</th>
                            <th>Novembro</th>
                            <th>Dezembro</th>
                            <th>Ação</th>
                        </tr>
                        <?php
                        if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])):
                            foreach ($cooperado['mensalidades'] as $mensalidade):
                                ?>
                                <tr>
                                    <td><?php echo!empty($mensalidade['ano']) ? $mensalidade['ano'] : '' ?></td>
                                    <td><?php echo!empty($mensalidade['janeiro']) ? $this->formatDinheiroView($mensalidade['janeiro']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['fevereiro']) ? $this->formatDinheiroView($mensalidade['fevereiro']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['marco']) ? $this->formatDinheiroView($mensalidade['marco']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['abril']) ? $this->formatDinheiroView($mensalidade['abril']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['maio']) ? $this->formatDinheiroView($mensalidade['maio']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['junho']) ? $this->formatDinheiroView($mensalidade['junho']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['julho']) ? $this->formatDinheiroView($mensalidade['julho']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['agosto']) ? $this->formatDinheiroView($mensalidade['agosto']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['setembro']) ? $this->formatDinheiroView($mensalidade['setembro']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['outubro']) ? $this->formatDinheiroView($mensalidade['outubro']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['novembro']) ? $this->formatDinheiroView($mensalidade['novembro']) : '' ?></td>
                                    <td><?php echo!empty($mensalidade['dezembro']) ? $this->formatDinheiroView($mensalidade['dezembro']) : '' ?></td>
                                    <td class="table-acao text-center">
                                        <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/mensalidade/' . $mensalidade['cod_mensalidade']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                        <?php if ($this->checkUser() >= 3) : ?>
                                            <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_mensalidade_<?php echo $mensalidade['cod_mensalidade'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>

                    </table>
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-list-ul  pull-left"></i> Histórico</h4>
                </header>
                <article class="panel-body">
                    <span class="pull-right"><a href="<?php echo BASE_URL . '/cadastrar/historico/' . $cooperado['cooperado']['cod_cooperado'] ?>" class="btn btn-sm btn-warning" title="Adicionar Histórico"><i class="fa fa-plus-circle"></i> Adicionar</a></span>
                </article>
                <article class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th>Usuario</th>
                            <th>Descrição / Atendimento</th>
                            <th>Ação</th>
                        </tr>
                        <?php
                        if (isset($cooperado['historicos']) && !empty($cooperado['historicos'])):
                            $qtd = 1;
                            foreach ($cooperado['historicos'] as $historico):
                                ?>
                                <tr>
                                    <td><?php echo $qtd ?></td>
                                    <td><?php echo $historico['data_historico'] ?></td>
                                    <td><?php echo $historico['usuario'] ?></td>
                                    <td><?php echo $historico['descricao_historico'] ?></td>
                                    <td class="table-acao text-center">
                                        <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/historico/' . $historico['cod_historico']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                        <?php if ($this->checkUser() >= 3) : ?>
                                            <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_historico_<?php echo $historico['cod_historico'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
                                ++$qtd;
                            endforeach;
                        endif;
                        ?>
                    </table>
                </article>
            </section>
        </div>
        <!--fim col-md-12 clea-->
    </div>
</div>


<?php
if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])):
    foreach ($cooperado['mensalidades'] as $mensalidade):
        ?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_mensalidade_<?php echo $mensalidade['cod_mensalidade'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($mensalidade['cod_mensalidade']) ? $mensalidade['cod_mensalidade'] : '' ?>;</li>
                            <li><b>Ano: </b> <?php echo!empty($mensalidade['ano']) ? $mensalidade['ano'] : 'Não registrado' ?>;</li>
                            <li><b>Nome Completo: </b> <?php echo!empty($cooperado['cooperado']['nome_completo']) ? $cooperado['cooperado']['nome_completo'] : '' ?></li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Se você remove este registro, o mesmo deixará de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/mensalidade/' . $cooperado['cooperado']['cod_cooperado'] . '/' . $mensalidade['cod_mensalidade'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>

<?php
if (isset($cooperado['historicos']) && !empty($cooperado['historicos'])):
    foreach ($cooperado['historicos'] as $historico):
        ?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_historico_<?php echo $historico['cod_historico'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($historico['cod_historico']) ? $historico['cod_historico'] : '' ?>;</li>
                            <li><b>Data: </b> <?php echo!empty($historico['data_historico']) ? $historico['data_historico'] : '' ?></li>
                            <li><b>Descrição: </b> <?php echo!empty($historico['descricao_historico']) ? $historico['descricao_historico'] : 'Não registrado' ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Se você remove este registro, o mesmo deixará de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/historico/' . $cooperado['cooperado']['cod_cooperado'] . '/' . $historico['cod_historico'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>