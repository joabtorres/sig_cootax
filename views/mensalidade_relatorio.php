<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2> Mensalidades</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Relatório de Mensalidades</li>
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
                                    <label>Gera PDF:</label><br/>
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
    <div class="row">
        <?php
        if (isset($cooperados) && !empty($cooperados)) {
            foreach ($cooperados as $cooperado):
                ?>
                <div class="col-md-12">
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title text-upercase"> <?php echo !empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : '';?>  <?php echo !empty($cooperado['nz']) ? "- NZ ".$cooperado['nz'] : '';?> </h4>
                        </header>

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
                                    <th>Total</th>
                                </tr>
                                
                                <?php
                                if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])):
                                    $total = 0;
                                    foreach ($cooperado['mensalidades'] as $mensalidade):
                                        $total = $mensalidade['janeiro'] + $mensalidade['fevereiro'] + $mensalidade['marco'] + $mensalidade['abril'] + $mensalidade['maio'] + $mensalidade['junho'] + $mensalidade['julho'] + $mensalidade['agosto'] + $mensalidade['setembro'] + $mensalidade['outubro'] + $mensalidade['novembro'] + $mensalidade['dezembro'];
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
                                            <td class="table-acao">
                                                <?php echo!empty($total) ? $this->formatDinheiroView($total) : '' ?>
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
                <?php
            endforeach;
        }else {
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
