<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Editar Usuário</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-user"></i> Editar Usuário</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <article class="clear" id="container-usuario-form">
        <div class="row">
            <?php if (isset($erro['class'])) : ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                        <button class="close" data-hide="alert">&times;</button>
                        <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : ' <i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um usuário com e-email já cadastrado.'; ?></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <form method="POST" enctype="multipart/form-data" autocomplete="off">
            <section class="panel panel-black">
                <header class="panel-heading"><p class="panel-title"> <i class="fa fa-user pull-left"></i>Usuário</p></header>
                <article class="panel-body">
                    <div class="col-md-6">
                        <input type="hidden" name="nCodUsuario" value="<?php echo isset($usuario['cod_usuario']) ? $usuario['cod_usuario'] : ""; ?>"/>
                        <div class="form-group <?php echo (isset($usuario_erro['nome']['class'])) ? $usuario_erro['nome']['class'] : ''; ?>">
                            <label for="cNome" class="control-label">Nome: * <?php echo (isset($usuario_erro['nome']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['nome']['msg'] . ' </small>' : ''; ?></label>
                            <input type="text" name="nNome" id="cNome" class="form-control" placeholder="Exemplo: Joab" value='<?php echo isset($usuario['nome_usuario']) ? $usuario['nome_usuario'] : ""; ?>'/>
                        </div>
                        <div class="form-group <?php echo (isset($usuario_erro['sobrenome']['class'])) ? $usuario_erro['sobrenome']['class'] : ''; ?>">
                            <label for="cSobrenome" class="control-label">Sobrenome:* <?php echo (isset($usuario_erro['sobrenome']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['sobrenome']['msg'] . ' </small>' : ''; ?></label>
                            <input type="text" name="nSobrenome" id="cSobrenome" class="form-control" placeholder="Exemplo:Torres Alencar" value='<?php echo isset($usuario['sobrenome_usuario']) ? $usuario['sobrenome_usuario'] : ""; ?>'/>
                        </div>
                        <div class="form-group <?php echo (isset($usuario_erro['usuario']['class'])) ? $usuario_erro['usuario']['class'] : ''; ?>">
                            <label for="cUsuario" class="control-label">Usuário:* <?php echo (isset($usuario_erro['usuario']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['usuario']['msg'] . ' </small>' : ''; ?></label>
                            <input type="text" name="nUsuario" id="cUsuario" class="form-control" placeholder="Exemplo: joab.alencar" value='<?php echo isset($usuario['usuario_usuario']) ? $usuario['usuario_usuario'] : ""; ?>'/>
                        </div>
                        <div class="form-group <?php echo (isset($usuario_erro['email']['class'])) ? $usuario_erro['email']['class'] : ''; ?>">
                            <label for="cEmail" class="control-label">E-mail:* <?php echo (isset($usuario_erro['email']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['email']['msg'] . ' </small>' : ''; ?></label>
                            <input type="email" name="nEmail" id="cEmail" class="form-control" placeholder="Exemplo: joab.alencar@gmail.com" value='<?php echo isset($usuario['email_usuario']) ? $usuario['email_usuario'] : ""; ?>' disabled="true"/>
                        </div>
                        <div class="form-group <?php echo (isset($usuario_erro['senha']['class'])) ? $usuario_erro['senha']['class'] : ''; ?>">
                            <label for="cSenha" class="control-label">Nova Senha: <?php echo (isset($usuario_erro['senha']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['senha']['msg'] . ' </small>' : ''; ?></label>
                            <input type="password" name="nSenha" id="cSenha" class="form-control"/>
                        </div>
                        <div class="form-group <?php echo (isset($usuario_erro['senha']['class'])) ? $usuario_erro['senha']['class'] : ''; ?>">
                            <label for="cRepetirSenha" class="control-label">Repetir Nova Senha: <?php echo (isset($usuario_erro['senha']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $usuario_erro['senha']['msg'] . ' </small>' : ''; ?></label>
                            <input type="password" name="nRepetirSenha" id="cRepetirSenha" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo (isset($usuario_info['cargo']['class'])) ? $usuario_info['cargo']['class'] : ''; ?>">
                            <label for="iCargo" class="control-label">Cargo: <?php echo (isset($usuario_info['cargo']['msg'])) ? '<small><span class="fa fa-info-circle"></span> ' . $usuario_info['cargo']['msg'] . ' </small>' : ''; ?></label>
                            <input type="text" name="nCargo" id="iCargo" class="form-control"  placeholder="Exemplo: Cooperado" value="<?php echo isset($usuario['cargo_usuario']) ? $usuario['cargo_usuario'] : ""; ?>"/>
                        </div>
                        <div class="form-group">
                            <span>Sexo:</span><br/>

                            <?php
                            if (!empty($usuario['genero_usuario'])) {

                                $sexos = array(array('genero' => 'Masculino', 'sigla' => 'M'), array('genero' => 'Feminino', 'sigla' => 'F'));
                                foreach ($sexos as $sexo) {
                                    if ($usuario['genero_usuario'] == $sexo['sigla']) {
                                        echo '<label><input type="radio" name="nSexo" value="' . $sexo["sigla"] . '" checked /> ' . $sexo["genero"] . ' </label> ';
                                    } else {
                                        echo '<label><input type="radio" name="nSexo" value="' . $sexo["sigla"] . '" /> ' . $sexo["genero"] . ' </label>';
                                    }
                                }
                            } else {
                                echo '<label><input type="radio" name="nSexo" value="M" checked /> Masculino</label>';
                                echo '<label><input type="radio" name="nSexo" value="F" /> Feminino</label>';
                            }
                            ?>                                                               
                        </div>
                        <?php if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $_SESSION['usuario_sig_cootax']['nivel'] == 3 && $usuario['cod_usuario'] != $_SESSION['usuario_sig_cootax']['cod'] ) : ?>
                            <div class="form-group">
                                <span>Nível de Acesso:</span><br/>
                                <?php
                                if (!empty($usuario['nivel_acesso_usuario'])) {

                                    $niveis = array(array('nivel' => '1', 'nome' => 'Participante'), array('nivel' => '2', 'nome' => 'Moderador'), array('nivel' => '3', 'nome' => 'Administrador'));
                                    foreach ($niveis as $nivel) {
                                        if ($usuario['nivel_acesso_usuario'] == $nivel['nivel']) {
                                            echo ' <label><input type="radio" name="tNivelDeAcesso" value="' . $nivel['nivel'] . '" checked/> ' . $nivel['nome'] . '</label> ';
                                        } else {
                                            echo ' <label><input type="radio" name="tNivelDeAcesso" value="' . $nivel['nivel'] . '" /> ' . $nivel['nome'] . '</label>';
                                        }
                                    }
                                } else {
                                    echo '<label><input type="radio" name="tNivelDeAcesso" value="0" checked/> Usuário</label>';
                                    echo '<label><input type="radio" name="tNivelDeAcesso" value="1"/> Administrador</label>';
                                }
                                ?>                                 
                            </div>
                            <?php
                        endif;
                        if (isset($_SESSION['usuario_sig_cootax']['nivel']) && $usuario['cod_usuario'] != $_SESSION['usuario_sig_cootax']['cod'] && $_SESSION['usuario_sig_cootax']['nivel'] == 3) {
                            ?>
                            <div class="form-group">
                                <span>Status:</span><br/>
                                <?php
                                if (isset($usuario['status_usuario'])) {
                                    $status = array(array('nome' => 'Ativo', 'valor' => '1'), array('nome' => 'Inativo', 'valor' => '0'));
                                    foreach ($status as $statu) {
                                        if ($usuario['status_usuario'] == $statu['valor']) {
                                            echo ' <label><input type="radio" name="nStatuUsuario" value="' . $statu['valor'] . '" checked /> ' . $statu['nome'] . '</label> ';
                                        } else {
                                            echo ' <label><input type="radio" name="nStatuUsuario" value="' . $statu['valor'] . '" /> ' . $statu['nome'] . '</label> ';
                                        }
                                    }
                                } else {
                                    echo 111;
                                    echo ' <label><input type="radio" name="nStatuUsuario" value="1"/> Ativa</label> ';
                                    echo ' <label><input type="radio" name="nStatuUsuario" value="0" checked/> Inativo </label> ';
                                }
                                ?>                                  

                            </div>
                            <?php
                        } else {
                            echo '<input type="hidden" name="nStatuUsuario" value="1"/>';
                        }
                        ?>
                        <p class="text-center" style="margin-top: 10%;" id="fotos">
                            <img src="<?php echo BASE_URL . '/' . $usuario['imagem_usuario'] ?>" class="img-center" alt="Usuario" id="viewImagem-1"/>
                            <input type="hidden" name="qtd_fotos" value="1">
                            <label class="btn btn-warning" onclick="readDefaultURL()">Padrão</label>
                            <label class="btn btn-success" for="cFileImagem">Escolher Imagem</label>
                            <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/>
                            <input type="hidden" name="nImagem-user" id="iImagem-user" value="<?php echo isset($usuario['imagem_usuario']) ? $usuario['imagem_usuario'] : ""; ?>"/>
                        </p>

                    </div>
                </article>
            </section>
            <div class="row">
                <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                    <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                </div>
            </div>
        </form>
    </article><!--FIM CONTAINER-USUARIO-->
    <!--FIM .ROW-->

</div>
<!-- /#section-container -->