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
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- sig -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/estilo.min.css">
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

    <body onload="mostrarConteudo()"> 
        <div id="tela_load">
            <img src="<?php BASE_URL ?>/assets/imagens/loading.gif" style="display: block; margin: auto; margin-top: 300px;">
        </div>
        <div id="interface_login">
            <div class="container">
                <div class="row">
                    <div class="col-md--12">
                        <img src="<?php echo BASE_URL ?>/assets/imagens/404-error-page.png" class="img-center img-responsive">
                        <p class="text-center"><a href="<?php echo BASE_URL ?>/home" class="btn btn-primary">Página Inicial</a></p>
                    </div> 
                </div>
            </div>
        </div>
    </body>

</html>
