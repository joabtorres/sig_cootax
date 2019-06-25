<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2> Cooperados</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Relatório de Cooperados</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                    </header>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for='iTipo'>Categoria: </label>
                                    <select id="iTipo" name="nTipo" class="form-control">
                                        <option checked='checked' value="" >Todos</option>
                                        <option value="Permissionário">Permissionário</option>
                                        <option  value="Participativo">Participativo</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iStatus'>Status: </label>
                                    <select id="iStatus" name="nStatus" class="form-control">
                                        <option checked='checked' value="" >Todos</option>
                                        <option  value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iPor'>Por: </label>
                                    <select id="iPor" name="nPor" class="form-control">
                                        <option value="" checked='checked'>Todos</option>
                                        <option value="NZ" >NZ</option>
                                        <option value="Apelido">Apelido</option>
                                        <option value="Nome Completo">Nome Completo</option>
                                        <option value="Ano de Inscrição">Ano de Inscrição</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iBuscar'>Buscar: </label>
                                    <input type="text" id="iBuscar" name="nBuscar" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Modo de exibição em:</label><br/>
                                    <label><input type="radio" checked="checked" name="nModoExibicao" value="1"/> Tabela </label>
                                    <label><input type="radio" name="nModoExibicao" value="2"/> Bloco </label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Gerar PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <?php
    if (isset($cooperados) && is_array($cooperados)) {
        if ($modo_exebicao == 1) {
            ?>
            <div class="row">
                <!--modelos de resultado-->
                <div class="col-md-12">
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title">Resultados Encontrados</h4>
                        </header>
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h4 >
                                </div>
                            </div>
                        </article>
                        <article class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <th>#</th>
                                    <th>Apelido</th>
                                    <th>Nome Completo</th>
                                    <th>NZ</th>
                                    <th>Inscrição</th>
                                    <?php if ($this->checkUser() >= 2) : ?>
                                        <th>Ação</th>
                                    <?php endif; ?>
                                </tr>

                                <?php
                                $qtd = 1;
                                foreach ($cooperados as $cooperado) :
                                    ?>
                                    <tr>
                                        <td><a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>" class="text-uppercase"><?php echo $qtd; ?></a></td>
                                        <td><a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>" class="text-uppercase"><?php echo!empty($cooperado['apelido']) ? $cooperado['apelido'] : '' ?></a></td>
                                        <td><a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>" class="text-uppercase"><?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?></a></td>
                                        <td><a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>" class="text-uppercase"><?php echo!empty($cooperado['nz']) ? $cooperado['nz'] : '' ?></a></td>
                                        <td><a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>" class="text-uppercase"><?php echo!empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '' ?></a></td>
                                        <td class="table-acao text-center">
                                            <?php if ($this->checkUser() >= 2) { ?>
                                                <a class="btn btn-primary btn-xs" href="<?php echo BASE_URL . '/editar/cooperado/' . $cooperado['cod_cooperado']; ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                                <?php if ($this->checkUser() >= 3) { ?>
                                                    <button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_cooperado_<?php echo $cooperado['cod_cooperado']; ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
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
            </div>
        <?php } else { ?>
            <!--modo de exibição em bloco-->
            <?php
            $qtd = 1;
            $row = 1;
            foreach ($cooperados as $cooperado) :
                echo ($row == 1) ? ' <div class="row">' : '';
                ?>
                <div class="col-md-4">
                    <div class=" thumbnail">
                        <a href="<?php echo BASE_URL . '/cooperado/index/' . $cooperado['cod_cooperado'] ?>">
                            <img src="<?php echo!empty($cooperado['imagem']) ? BASE_URL . '/' . $cooperado['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png' ?>" alt="SGL - Usuáio" class="img-responsive img-rounded"/>
                        </a>
                        <p class="text-center text-uppercase font-bold"><?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?> <?php echo!empty($cooperado['nz']) ? '- ' . $cooperado['nz'] : '' ?></p>
                        <p class="text-center text-capitalize">Categoria: <?php echo!empty($cooperado['tipo']) ? $cooperado['tipo'] : '' ?></p>
                        <p class="text-center text-capitalize">Inscrição: <?php echo!empty($cooperado['data_inscricao']) ? $this->formatDateView($cooperado['data_inscricao']) : '' ?></p>
                        <div class="caption text-center">
                            <?php if ($this->checkUser() >= 2) { ?>
                                <a href="<?php echo BASE_URL . '/editar/cooperado/' . $cooperado['cod_cooperado'] ?>" class="btn btn-primary btn-block btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i> Editar</a> 
                                <?php if ($this->checkUser() >= 3) { ?>
                                    <button type="button"  class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#modal_cooperado_<?php echo $cooperado['cod_cooperado']; ?>" title="Excluir"> <i class="fa fa-trash"></i> Excluir</button>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                echo ($row == 3) ? '</div>' : '';
                if ($row >= 3) {
                    $row = 1;
                } else {
                    $row++;
                }
                ++$qtd;
            endforeach;
            ?>
            <!--fim modo de exibição em bloco-->
            <?php
        }
    } else {
        echo '<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>
            </div>';
    }
    ?>
</div>


<?php
if (isset($cooperados) && is_array($cooperados)) :
    foreach ($cooperados as $cooperado) :
        ?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_cooperado_<?php echo $cooperado['cod_cooperado'] ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 >Deseja remover este registro?</h4>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Código: </b> <?php echo!empty($cooperado['cod_cooperado']) ? $cooperado['cod_cooperado'] : '' ?>;</li>
                            <li><b>NZ: </b> <?php echo!empty($cooperado['nz']) ? $cooperado['nz'] : 'Não registrado' ?>;</li>
                            <li><b>Apelido: </b> <?php echo!empty($cooperado['apelido']) ? $cooperado['apelido'] : '' ?>;</li>
                            <li><b>Nome Completo: </b> <?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '' ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Se você remove o cooperado, será removido todos os respectivos dados como, por exemplo, endereço,  contato e históricos.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . '/excluir/cooperado/' . $cooperado['cod_cooperado'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>