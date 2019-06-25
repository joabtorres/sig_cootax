<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Manual</h2>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-book"></i> Manual</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Olá <strong><?php echo trim($_SESSION['usuario_sig_cootax']['nome']); ?></strong>, Deseja baixar o manual em <b>PDF</b> do SIGCOOT? Então <a  class="font-bold" href="<?php echo BASE_URL; ?>/assets/media/sigcoot_manual.pdf" download="MANUAL DO SIGCOOT.pdf">clique aqui</a>.
            </div>
        </div>
		
        <div class="col-xs-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-apresentacao">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 1. Introdução
                            </h4>
                        </a>
                    </div>
                    <div id="panel-apresentacao" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">1.1 Apresentação</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XfGL1IC3pqc"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                    <h3 class="text-center text-uppercase">1.2 Recuperando senha de acesso do sistema</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jrWo69wkSg0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-cadastros">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 2. Cadastros
                            </h4>
                        </a>
                    </div>
                    <div id="panel-cadastros" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">2.1 Cadastro de cooperado</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item"src="https://www.youtube.com/embed/1LSOalqfxXU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                    <h3 class="text-center text-uppercase">2.2 Cadastro de entrada, saída e investimento</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pW4p2kLNW6E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                    <h3 class="text-center text-uppercase">2.3 Cadastro de mensalidade e histórico</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vXax4GIHkkc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-relatorios">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 3. Relatorios
                            </h4>
                        </a>
                    </div>
                    <div id="panel-relatorios" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">3.1 Relatório de Cooperados</h3>

                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Uu8QCxG7RGU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                    <h3 class="text-center text-uppercase">3.2 Relatório de Entradas, Saídas, Investimento e Financeiro</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XnsY_iHrz-k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-cooperado">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 4. Cooperado
                            </h4>
                        </a>
                    </div>
                    <div id="panel-cooperado" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">4.1 Cooperado</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1phWRGhE4vg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-usuarios">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 5. Usuários
                            </h4>
                        </a>
                    </div>
                    <div id="panel-usuarios" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">5.1 Usuário (Cadastrar, Listar, Editar, Excluir, Recuperar e Nível de Acesso)</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7W6JBIAQf44" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-cooperativa">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 6. Cooperativa
                            </h4>
                        </a>
                    </div>
                    <div id="panel-cooperativa" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">6.1 Cooperativa</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/GJM2aryj1E0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-feedback">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 7. Feedback
                            </h4>
                        </a>
                    </div>
                    <div id="panel-feedback" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">7.1 Feedback</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MjsAtwoigWU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="panel panel-info">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#panel-aplicativo">
                            <h4 class="panel-title">
                                <i class="fa fa-share"></i> 8. Aplicativo
                            </h4>
                        </a>
                    </div>
                    <div id="panel-aplicativo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <h3 class="text-center text-uppercase">8 - Cadastrar, consultar, alterar e excluir conta do motorista no aplicativo</h3>
                                    <div class="embed-responsive embed-responsive-16by9 " >
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3ce20a3PO8o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--FIM .ROW-->
</div>