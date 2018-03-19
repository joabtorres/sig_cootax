<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Entradas</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-dollar-sign"></i> Relatórios de Entradas</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <form method="POST">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                    </header>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <article class="panel-body">
                            <div class="row">

                                <div class="col-md-3 form-group">
                                    <label for='iDataInicial'>De: </label>
                                    <input type="text" id="iDataInicial" name="nDataInicial" class="form-control input-data" placeholder="15/01/2017">
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for='iDatafinal'>Até: </label>
                                    <input type="text" id="iDatafinal" name="nDatafinal" class="form-control input-data" placeholder="15/01/2017" value="<?php echo date('d/m/o') ?>">
                                </div>

                                <div class="form-group col-md-3"></br>
                                    <button type="submit" name="nBuscar" value="Buscar" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label>Gera PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
        <?php if (!empty($financas)) { ?>
            <!--modelos de resultado-->
            <div class="col-md-12">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title">Resultados Encontrados</h4>
                    </header>

                    <article class="panel-body">
                        <h4 class="text-right">Valor Total: <?php echo $this->formatDinheiroView($valor_total) ?></h4>
                        <hr/>
                    </article>
                    <article class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <?php if ($this->checkUser() >= 2) : ?>
                                    <th>Ação</th>
                                <?php endif; ?>
                            </tr>
                            <?php
                            $qtd = 1;
                            foreach ($financas as $financa):
                                ?>
                                <tr>
                                    <td><?php echo $qtd ?></td>
                                    <td><?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?></td>
                                    <td><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?></td>
                                    <td><?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?></td>
                                    <?php if ($this->checkUser() >= 2) { ?>
                                        <td class="table-acao">
                                            <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/lucro/' . $financa['cod']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                            <?php if ($this->checkUser() >= 3) { ?>
                                                <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_financa_<?php echo $financa['cod'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                                ++$qtd;
                            endforeach;
                            ?>
                        </table>
                    </article>
                </section>
            </div>
            <!--fim modelos de resultado-->

            <?php
        } else {
            echo '<div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>';
        }
        ?>
    </div>

</div>
<?php
if (isset($financas) && is_array($financas)) :
    foreach ($financas as $financa) :
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_financa_<?php echo $financa['cod'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($financa['cod']) ? $financa['cod'] : '' ?>;</li>
                            <li><b>Descrição: </b> <?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?>;</li>
                            <li><b>Valor: </b> <?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?>;</li>
                            <li><b>Data: </b><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/lucro/' . $financa['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-close-alt"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>