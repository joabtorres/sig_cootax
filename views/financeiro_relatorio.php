<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Financeiro</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-dollar-sign"></i> Relatório Financeiro</li>
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

                                <div class="col-md-2 form-group">
                                    <label for='iDataInicial'>De: </label>
                                    <input type="text" id="iDataInicial" name="nDataInicial" class="form-control input-data" placeholder="01/01/2017">
                                </div>

                                <div class="col-md-2 form-group">
                                    <label for='iDatafinal'>Até: </label>
                                    <input type="text" id="iDatafinal" name="nDatafinal" class="form-control input-data" placeholder="31/01/2017">
                                </div>

                                <div class="form-group col-md-2"></br>
                                    <button type="submit" name="nBuscar" value="Buscar" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label>Gera PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Modo de Exibição:</label><br/>
                                    <label><input type="radio" name="nModoExibicao" value="1" checked="checked" /> Resumido </label>
                                    <label><input type="radio" name="nModoExibicao" value="2"/> Estendido </label>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
        <?php
        if (!empty($lucro['valor']) || !empty($despesa['valor']) || !empty($investimento['valor'])) {
            ?>
            <!--modelos de resultado-->
            <div class="col-md-12">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="pull-left fa fa-chart-bar"></i>Resultado Financeiro</h4>
                    </header>
                    <article class="panel-body">
                        <canvas id="grafico_status_financeiro"  height="80vh" ></canvas>
                        <p class="text-right">Entradas: <?php echo $this->formatDinheiroView($lucro['valor']) ?></p>
                        <p class="text-right">Saídas: <?php echo $this->formatDinheiroView($despesa['valor']) ?></p>
                        <p class="text-right">Investimentos: <?php echo $this->formatDinheiroView($investimento['valor']) ?></p>
                        <hr/>
                        <h4 class="text-right">Valor Total: <?php echo $this->formatDinheiroView($valorTotalGrafico) ?></h4>
                    </article>
                </section>
            </div>
            <?php
            if ($modo_exibicao == 2) {
                ?>
                <?php if (!empty($financas['lucro'])): ?>
                    <div class = "col-md-12">
                        <section class = "panel panel-black">
                            <header class = "panel-heading">
                                <h4 class = "panel-title"><i class="pull-left fa fa-dollar-sign"></i>Entradas (R$)</h4>
                            </header>
                            <article class = "panel-body">
                                <h4 class = "text-right">Valor Total: <?php echo $this->formatDinheiroView($lucro['valor']) ?></h4>
                                <hr/>
                            </article>
                            <article class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                    <?php
                                    $qtd = 1;
                                    foreach ($financas['lucro'] as $financa):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?></td>
                                        </tr>
                                        <?php
                                        ++$qtd;
                                    endforeach;
                                    ?>
                                </table>
                            </article>
                        </section>
                    </div>
                    <?php
                endif;
                if (!empty($financas['despesa'])):
                    ?>

                    <div class = "col-md-12">
                        <section class = "panel panel-black">
                            <header class = "panel-heading">
                                <h4 class = "panel-title"><i class = "pull-left fa fa-dollar-sign"></i>Saídas (R$)</h4>
                            </header>
                            <article class = "panel-body">
                                <h4 class = "text-right">Valor Total: <?php echo $this->formatDinheiroView($despesa['valor']) ?></h4>
                                <hr/>
                            </article>
                            <article class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                    <?php
                                    $qtd = 1;
                                    foreach ($financas['despesa'] as $financa):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?></td>
                                        </tr>
                                        <?php
                                        ++$qtd;
                                    endforeach;
                                    ?>
                                </table>
                            </article>
                        </section>
                    </div>
                    <?php
                endif;
                if (!empty($financas['investimento'])):
                    ?>

                    <div class = "col-md-12">
                        <section class = "panel panel-black">
                            <header class = "panel-heading">
                                <h4 class = "panel-title"><i class="pull-left fa fa-dollar-sign"></i>Investimentos (R$)</h4>
                            </header>
                            <article class = "panel-body">
                                <h4 class = "text-right">Valor Total: <?php echo $this->formatDinheiroView($investimento['valor']) ?></h4>
                                <hr/>
                            </article>
                            <article class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                    <?php
                                    $qtd = 1;
                                    foreach ($financas['investimento'] as $financa):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?></td>
                                            <td><?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?></td>
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
                endif;
            }
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

<script src="<?php echo BASE_URL ?>/assets/js/Chart.min.js"></script>
<?php
echo "<script>var lucro = '" . $lucro['valor'] . "'; var despesa = '" . $despesa['valor'] . "'; var investimento='" . $investimento['valor'] . "' </script>";
?>

<script type="text/javascript">
    graficoFinanca(lucro, despesa, investimento);
    function graficoFinanca(lucro, despesa, investimento) {
        var horizontalBarChartData = {
            labels: [],
            datasets: [{
                    label: 'Entrada',
                    backgroundColor: "#56d798",
                    borderColor: "#56d798",
                    borderWidth: 1,
                    data: [
                        lucro, 0
                    ]
                }, {
                    label: 'Saída',
                    backgroundColor: "#f38b4a",
                    borderColor: "#f38b4a",
                    data: [
                        despesa, 0
                    ]
                }, {
                    label: 'Investimento',
                    backgroundColor: "#dd4b39",
                    borderColor: "#dd4b39",
                    data: [
                        investimento, 0
                    ]
                }]

        };
        var option = {

            elements: {
                rectangle: {
                    borderWidth: 2,
                }
            },
            responsive: true,
            legend: {
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'GRÁFICO FINANCEIRO'
            }
        };
        window.onload = function () {
            var ctx = document.getElementById('grafico_status_financeiro').getContext('2d');
            window.myHorizontalBar = new Chart(ctx, {
                type: 'horizontalBar',
                data: horizontalBarChartData,
                options: option
            });
        };
    }
</script>