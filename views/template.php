<?php ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>/assets/imagens/icon-cootax.png" sizes="32x32" />
        <meta property="ogg:title" content="COOTAX - SIG -Sistema de Informação Gerencial">
        <meta property="ogg:description" content="COOTAX - SIG -Sistema de Informação Gerencial!">
        <title> SIG - Sistema de Informação Gerencial (SIG) </title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/estilo.min.css">
        <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="<?php echo BASE_URL ?>/assets/js/jquery-3.1.1.min.js"></script>
        <script>
            function mostrarConteudo() {
                var elemento = document.getElementById("tela_load");
                elemento.style.display = "none";

                var elemento = document.getElementById("tela_sistema");
                if (elemento) {
                    elemento.style.display = "block";
                }

                var elemento = document.getElementById("interface_login");
                if (elemento) {
                    elemento.style.display = "block";
                }
            }
        </script>
    </head>

    <body>
        <div id="tela_load">
            <img src="<?php BASE_URL ?>/assets/imagens/loading.gif" style="display: block; margin: auto; margin-top: 300px;">
        </div>
        <div id="tela_sistema">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menu_sistema">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo BASE_URL ?>/"><img src="<?php echo BASE_URL ?>/assets/imagens/logo_menu.png" alt=""></a>
                </div>
                <!-- Top Menu Items -->

                <ul class="nav navbar-right top-nav">
                    <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] >= 2): ?>
                        <li>
                            <form action="<?php echo BASE_URL ?>/relatorio/buscarapida/1" class="navbar-form" method="POST" autocomplete="off" name="nSearchSGL">
                                <div class="form-group">
                                    <label ><input type="radio" name="nSearchFinalidade" value="Nome" checked> Nome</label>
                                    <label ><input type="radio" name="nSearchFinalidade" value="nz"> NZ</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" name="nSerachCampo" class="form-control">
                                    <span class="input-group-addon" onclick="submit_form_navbar()"><span class="fa fa-search"></span></span>
                                </div>
                                <input type="submit" name="nBuscar" vale="buscar" style="display: none;">
                            </form>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario_sig_cootax']['nome'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo BASE_URL ?>/editar/usuario/<?php echo $_SESSION['usuario_sig_cootax']['cod'] ?>"><i class="fa fa-user"></i> Editar Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo BASE_URL ?>/usuario/sair"><i class="fa fa-sign-out-alt "></i> Sair</a>
                            </li>

                        </ul>
                    </li>
                </ul>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <nav class="side-nav">
                        <figure>
                            <img src="<?php echo BASE_URL . '/' . $_SESSION['usuario_sig_cootax']['imagem']; ?>" class="pull-left img-circle" >
                            <figcaption>
                                <p class="text-uppercase"><?php echo $_SESSION['usuario_sig_cootax']['nome'] . ' ' . $_SESSION['usuario_sig_cootax']['sobrenome'] ?></p>
                                <p class="text-uppercase"><?php echo $_SESSION['usuario_sig_cootax']['cargo']; ?></p>
                            </figcaption>
                        </figure>
                        <ul class="nav navbar-nav">

                            <li >
                                <a href="<?php echo BASE_URL ?>"><i class="fa fa-tachometer-alt "></i> Inicial</a>
                            </li>
                            <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] >= 2) : ?>
                                <li>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#menu_cadastro"><i class="fa fa-plus-circle "></i> Cadastrar <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                                    <ul id="menu_cadastro" class="collapse">
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/cadastrar/cooperado"><i class="fa fa-plus-square"></i> Cooperado</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/cadastrar/lucro"><i class="fa fa-dollar-sign"></i> Entrada (R$)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/cadastrar/despesa"><i class="fa fa-dollar-sign"></i> Saída (R$)</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/cadastrar/investimento"><i class="fa fa-dollar-sign"></i> Investimento (R$)</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menu_relatorio"><i class="fa fa-list-ul"></i> Relatórios <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                                <ul id="menu_relatorio" class="collapse">
                                    <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] >= 2): ?>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list"></i> Cooperados</a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] >= 2): ?>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/relatorio/mensalidades"><i class="fa fa-list"></i> Mensalidades</a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/relatorio/lucros"><i class="fa fa-list"></i> Entradas (R$)</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/relatorio/despesas"><i class="fa fa-list"></i> Saídas (R$)</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/relatorio/investimentos"><i class="fa fa-list"></i> Investimentos (R$)</a>
                                    </li>
                                     <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] >= 2) : ?>
                                    <li>
                                        <a href="<?php echo BASE_URL ?>/relatorio/financeiro"><i class="fa fa-chart-bar"></i> Financeiro (R$)</a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#menu_usuario"><i class="fa fa-users"></i> Usuários <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                                <ul id="menu_usuario" class="collapse">
                                    <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] == 3): ?>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/cadastrar/usuario"><i class="fa fa-user-plus"></i> Novo Usuário</a>
                                        </li>
                                    <?php endif; ?>

                                    <li>
                                        <a href="<?php echo BASE_URL ?>/editar/usuario/<?php echo $_SESSION['usuario_sig_cootax']['cod'] ?>"><i class="fa fa-user"></i> Editar Perfil</a>
                                    </li>
                                    <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] == 3): ?>
                                        <li>
                                            <a href="<?php echo BASE_URL ?>/usuario/index"><i class="fa fa-users"></i> Lista Usuários</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] == 3): ?>
                                <li>
                                    <a href="<?php echo BASE_URL . '/cooperativa/index/' . $this->getCodCooperativa() ?>"><i class="fa fa-home"></i> Cooperativa</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo BASE_URL ?>/feedback"><i class="fa fa-comments"></i> Feedback</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>/manual"><i class="fa fa-book"></i> Manual</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>/usuario/sair"><i class="fa fa-sign-out-alt"></i> Sair</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- FIM SIDE-NAV-->
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="conteudo_sistema">
                <div class="container-fluid">
                    <?php $this->loadViewInTemplate($viewName, $viewData) ?>

                    <div id="rodape">
                        <p class="text-right text-uppercase">&copy; Copyright 2018 - Joab Torres Alencar.</p>
                    </div>
                    <!--FIM #rodape-->
                </div>
            </div>
            <!-- /#conteudo_sistema -->
        </div>
        <!-- /#tela_sistema -->



        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="<?php echo BASE_URL ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL ?>/assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo BASE_URL ?>/assets/js/jquery.maskMoney.js"></script>
        <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
        <script src="<?php echo BASE_URL ?>/assets/js/sig.js"  ></script>

        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_recupera" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-primary">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="panel-title">Mensagem</p>
                    </header>
                    <article class="modal-body">
                        <p class="text-justify">Lorem Ipsum Dolor!</p>
                    </article>
                    <footer class="modal-footer">
                        <button class="btn btn-default" type="button" data-dismiss="modal">Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <!--MODAL - ESTRUTURA BÁSICA-->
    </body>

</html>
