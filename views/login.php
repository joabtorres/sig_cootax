<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>/assets/imagens/icon-cootax.png" sizes="32x32" />
        <meta property="ogg:title" content="COOTAX - SIGCOOT - Sistema de Informação Gerencial de Cooperativa de Táxi!">
        <meta property="ogg:description" content="COOTAX - SIGCOOT - Sistema de Informação Gerencial de Cooperativa de Táxi!">
        <title> SIGCOOT - Sistema de Informação Gerencial de Cooperativa de Táxi </title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/login.min.css">
        <!-- SGL -->        
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/fontawesome-all.min.css">
        <script>
            function mostrarConteudo() {
                var elemento = document.getElementById("tela_load");
                elemento.style.display = "none";
                var elemento = document.getElementById("interface_login");
                if (elemento) {
                    elemento.style.display = "block";
                }
            }
        </script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body onload="mostrarConteudo()"> 
        <div id="tela_load">
            <img src="<?php BASE_URL ?>/assets/imagens/loading.gif" style="display: block; margin: auto; margin-top: 300px;">
        </div>
        <div id="interface_login">
            <div class="container-fluid">
                <div class="row">
                    <!-- TELA LOGIN -->
                    <div class="col-sm-offset-1 col-sm-10 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4" id="tela_login">
                        <h4 class="text-center text-login text-uppercase">SIGCOOT - Sistema de Informação Gerencial de Cooperativa de Táxi</h4>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6"><img src="<?php echo BASE_URL; ?>/assets/imagens/logo_login_cootax.png" alt="Logotipo da cootax" class="img-center img-login"></div>

                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="iSerachUsuario">Usuário:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                            <input type="text" id="iSerachUsuario" name="nSerachUsuario" class="form-control" autofocus placeholder="Username / E-mail">
                                        </div>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="iSearchSenha">Senha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                            <input type="password" id="iSearchSenha" name="nSearchSenha" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6LfoeUwUAAAAAP2scgtDAOrb3hSeYkF056GyPhEB"></div>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        if (isset($erro)) {
                                            echo '<p class="bg-danger">' . $erro["msg"] . '</p>';
                                        }
                                        ?>
                                        <button type="submit" name="nEntrar" class="btn btn-success" value="Entrar"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> Fazer Login</button>
                                        <a data-toggle="modal" data-target=".modal-search-email"><span class="glyphicon glyphicon-lock"></span> Esqueceu a senha?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- FIM TELA LOGIN -->
                </div>
                <div class="row clear">
                    <div class="col-xs-12">
                       <hr/>
                        <p class="text-center text-uppercase">&copy; Copyright 2018 - Joab Torres Alencar.</p>
                    </div>
                </div>
            </div>
            <!--  MODEL -->
            <div class="modal fade modal-search-email" tabindex="-1" role="dialog" >
                <section class="modal-dialog modal-lg" role="document">
                    <article class="modal-content">
                        <header class="modal-header bg-primary">
                            <h4>Esqueceu a senha?</h4>
                        </header>
                        <section class="modal-body">

                            <div class="row">
                                <div class="col-md-5">
                                    <p class="text-justify">Forneça o endereço de email usado em sua conta do SIGCOOT.</p>
                                    <p class="text-justify">Será enviado um e-mail que redefine a sua senha.</p>
                                </div>
                                <div class="col-md-7">
                                    <div id="tela_recupera_senha">
                                        <form method="POST" >
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"> <i class="fa fa-envelope  fa-fw"></i></span>
                                                    <input type="email" name="nEmail" class="form-control" id="searchEmail" placeholder="Endereço de e-mail">
                                                </div>
                                            </div>
                                            <div class="form-group"><button type="submit" value="Enviar" name="nEnviar" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Enviar nova senha</button</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="modal-footer">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Fechar</button>
                        </footer>
                    </article>
                </section>
            </div>

            <!-- FIM MODEL -->

            <!--div model-->
            <div class="modal fade" id="modal_confirmacao_email" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4>Confirmação de e-mail</h4>
                        </div>
                        <div class="modal-body">
                            <p>Você receberá um e-mail com uma nova senha. Confira sua caixa de entrada.</p>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default pull-right"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>       
            <!--/div model-->

            <!--div model-->
            <div class="modal fade" id="modal_invalido_email" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4>E-mail Inválido</h4>
                        </div>
                        <div class="modal-body">
                            <p>Você informou um e-mail inválido.</p>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default pull-right"><i class="fa fa-close"></i> Fechar</button>
                        </div>
                    </div>
                </div>
            </div>       
            <!--/div model-->
        </div>
        <!--fim da interface_login-->

        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/sig.js"></script>
    </body>

</html>
