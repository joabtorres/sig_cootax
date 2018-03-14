<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Inicial</h2>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-tachometer-alt"></i> Inicial</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Olá <strong><?php echo trim($_SESSION['usuario_sig_cootax']['nome']); ?></strong>, bem-vindo ao Sistema de Informação Gerencial da <?php echo $cooperativa['nome_completo'] . ' - ' . $cooperativa['nome_siglas'] ?>.
            </div>
        </div>
        <?php if ($this->checkUser() >= 2) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/cadastrar/cooperado" >
                            <div class="col-xs-12">
                                <i class="fa fa-plus-square  fa-3x pull-left"> </i> 
                                <div class="font-bold"> Cadastrar</div>
                                <div>Cooperados</div>
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
                        <a href="<?php echo BASE_URL ?>/cadastrar/lucro" >
                            <div class="col-xs-12">
                                <i class="glyphicon glyphicon-usd fa-3x pull-left"></i>
                                <div class="font-bold">Cadastrar</div>
                                <div>Entradas</div>
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
                        <a href="<?php echo BASE_URL ?>/cadastrar/despesa" >
                            <div class="col-xs-12">
                                <i class="glyphicon glyphicon-usd  fa-3x pull-left"></i>                               
                                <div class="font-bold">Cadastrar</div>
                                <div>Despesas</div>
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
                        <a href="<?php echo BASE_URL ?>/cadastrar/investimento" >
                            <div class="col-xs-12">
                                <i class="glyphicon glyphicon-usd fa-3x pull-left" ></i>
                                <div class="font-bold">Cadastrar</div>
                                <div>Investimentos</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <a href="<?php echo BASE_URL ?>/relatorio/cooperados" >
                            <div class="col-xs-12">
                                <i class="fa fa-users  fa-3x pull-left"> </i> 
                                <div class="font-bold"> Relatório</div>
                                <div>Cooperados</div>
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
                        <a href="<?php echo BASE_URL ?>/relatorio/lucros" >
                            <div class="col-xs-12">
                                <i class="fa fa-clipboard-list fa-3x pull-left"></i>
                                <div class="font-bold">Relatório</div>
                                <div>Entradas</div>
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
                        <a href="<?php echo BASE_URL ?>/relatorio/despesas" >
                            <div class="col-xs-12">
                                <i class="fa fa-clipboard-list fa-3x pull-left"></i>                               
                                <div class="font-bold">Relatório</div>
                                <div>Despesas</div>
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
                        <a href="<?php echo BASE_URL ?>/relatorio/investimentos" >
                            <div class="col-xs-12">
                                <i class="fa fa-clipboard-list fa-3x pull-left" ></i>
                                <div class="font-bold">Relatório</div>
                                <div>Investimentos</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php }else { ?>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo BASE_URL ?>/relatorio/lucros" >
                                <div class="col-xs-12">
                                    <i class="fa fa-clipboard-list fa-3x pull-left"></i>
                                    <div class="font-bold">Relatório</div>
                                    <div>Lucros</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo BASE_URL ?>/relatorio/despesas" >
                                <div class="col-xs-12">
                                    <i class="fa fa-clipboard-list fa-3x pull-left"></i>                               
                                    <div class="font-bold">Relatório</div>
                                    <div>Despesas</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo BASE_URL ?>/relatorio/investimentos" >
                                <div class="col-xs-12">
                                    <i class="fa fa-clipboard-list fa-3x pull-left" ></i>
                                    <div class="font-bold">Relatório</div>
                                    <div>Investimentos</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--FIM .ROW-->
    <div class="row">
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Cooperados </h4>
                    <div>Cooperados Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_tipo_cooperado" width="100%"></canvas>
                </article>
            </section>
        </div>
        <div class="col-md-6">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-pie fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Cooperados </h4>
                    <div>Cooperados Registrados</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_status_cooperado" width="100%"></canvas>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class=" panel panel-black">
                <header class="panel-heading">
                    <i class="fa fa-chart-bar fa-3x pull-left" ></i>
                    <h4 class="panel-title font-bold">Financeiro </h4>
                    <div>Lucro, Despesa, Investimento</div>
                </header>
                <article class="panel-body">
                    <canvas id="grafico_status_financeiro"  height="80vh" ></canvas>
                </article>
            </section>
        </div>
    </div>
</div>
<!-- /#section-container -->

<script src="<?php echo BASE_URL ?>/assets/js/Chart.min.js"></script>
<?php echo "<script>lucro='" . $financa['lucro']['valor'] . "'</script>" ?>
<?php echo "<script>despesa='" . $financa['despesa']['valor'] . "'</script>" ?>
<?php echo "<script>investimento='" . $financa['investimento']['valor'] . "'</script>" ?>
<?php
echo "<script>"
 . "ativo='" . $cooperado_status['ativo'] . "';"
 . "inativo='" . $cooperado_status['inativo'] . "';"
 . " </script>"
?>
<?php
echo "<script>"
 . "permissionario='" . $cooperado_tipo['per'] . "';"
 . "participativo='" . $cooperado_tipo['par'] . "';"
 . " </script>"
?>

<script type="text/javascript">
    graficoStatusCooperados(ativo, inativo);
    graficoTipoCooperados(participativo, permissionario);
    graficoFinanca(lucro, despesa, investimento);
    function graficoTipoCooperados(participativos, permissionarios) {
        var data = {
            datasets: [{
                    data: [participativos, permissionarios],
                    backgroundColor: [
                        "#f38b4a",
                        "#56d798",
                    ],
                    hoverBackgroundColor: [
                        "#f38b4a",
                        "#56d798",
                    ]
                }],
            labels: [
                'Participativos',
                'Permissionários'
            ]
        };
        var option = {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Cooperados Registrados'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx = document.getElementById("grafico_tipo_cooperado");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: option
        });
    }

    function graficoStatusCooperados(ativos, inativos) {
        var data = {
            datasets: [{
                    data: [ativos, inativos],
                    backgroundColor: [
                        "#56d798",
                        "#ff8397",
                        "#f38b4a",
                        "#6970d5"
                    ],
                    hoverBackgroundColor: [
                        "#56d798",
                        "#ff8397",
                        "#f38b4a",
                        "#6970d5"
                    ]
                }],
            labels: [
                'Ativos',
                'Inativos'
            ]
        };
        var option = {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Cooperados Registrados'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var ctx = document.getElementById("grafico_status_cooperado");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: option
        });
    }
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
                    label: 'Despesa',
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
                text: 'CONTROLE FINANCEIRO DO MÊS'
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