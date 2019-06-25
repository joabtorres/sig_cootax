<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Editar Motorista</h2>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-user"></i> Editar Motorista do Aplicativo</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off" name="nEditarMotorista" id="form_motorista_editar">
                <input type="hidden" id="codMotorista" value='<?php echo isset($motorista['id']) ? $motorista['id'] : ""; ?>'/>
                <input type="hidden" name="nEmail" id="iEmail" value='<?php echo isset($motorista['email']) ? $motorista['email'] : ""; ?>'/>
                <input type="hidden" name="nSenha" id="iSenha" value='<?php echo isset($motorista['senha']) ? $motorista['senha'] : ""; ?>'/>
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <p class="panel-title"><i class="fa fa-user"></i> Motorista</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['nome']['class'])) ? $motorista_erro['nome']['class'] : ''; ?>">
                                        <label for="iNomeCompleto" class="control-label">Nome Completo: * <?php echo (isset($motorista_erro['nome']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['nome']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="text" name="nNomeCompleto" id="iNomeCompleto" class=" form-control" placeholder="Joab Torres Alencar" value='<?php echo isset($motorista['nome']) ? $motorista['nome'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['email']['class'])) ? $motorista_erro['email']['class'] : ''; ?>">
                                        <label for="iEmail" class="control-label">Email: * <?php echo (isset($motorista_erro['email']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['email']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="email" name="nEmail2" id="iEmail2" disabled="disable" class=" form-control text-lowercase" value='<?php echo isset($motorista['email']) ? $motorista['email'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="iNovaSenha" class="control-label">Senha Atual: * </label>
                                        <input type="text" disabled="true" id="iSenha2" class="form-control" value='<?php echo isset($motorista['senha']) ? $motorista['senha'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="iNovaSenha" class="control-label">Nova Senha: * </label>
                                        <input type="password" name="nNovaSenha" id="iNovaSenha" class=" form-control" placeholder="*********" value='<?php echo isset($motorista['senha']) ? $motorista['senha'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['repetirSenha']['class'])) ? $motorista_erro['repetirSenha']['class'] : ''; ?>">
                                        <label for="iRepetirSenha" class="control-label">Repetir Nova Senha: * <?php echo (isset($motorista_erro['repetirSenha']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['repetirSenha']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="password" name="nRepetirSenha" id="iRepetirSenha" class=" form-control" placeholder="*********" value='<?php echo isset($motorista['senha']) ? $motorista['senha'] : ""; ?>'/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-5">
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['nz']['class'])) ? $motorista_erro['nz']['class'] : ''; ?>">
                                        <label for="iNz" class="control-label">NZ: * <?php echo (isset($motorista_erro['nz']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['nz']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="text" name="nNz" id="iNz" class=" form-control text-upercase" placeholder="NZ 0041" value='<?php echo isset($motorista['nz']) ? $motorista['nz'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['mod_veiculo']['class'])) ? $motorista_erro['mod_veiculo']['class'] : ''; ?>">
                                        <label for="imodVeiculo" class="control-label">Modelo do Veículo - COR: * <?php echo (isset($motorista_erro['mod_veiculo']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['mod_veiculo']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="text" name="nModVeiculo" id="imodVeiculo" class=" form-control text-upercase" placeholder="Gol - BRANCO" value='<?php echo isset($motorista['mod_veiculo']) ? $motorista['mod_veiculo'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 <?php echo (isset($motorista_erro['placa_veiculo']['class'])) ? $motorista_erro['placa_veiculo']['class'] : ''; ?>" >
                                        <label for="iPlacaVeiculo" class="control-label">Placa do Veículo: * <?php echo (isset($motorista_erro['placa_veiculo']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $motorista_erro['placa_veiculo']['msg'] . ' </small>' : ''; ?></label>
                                        <input type="text" name="nPlacaVeiculo" id="iPlacaVeiculo" class=" form-control text-upercase" placeholder="XGH 5544" value='<?php echo isset($motorista['placa_veiculo']) ? $motorista['placa_veiculo'] : ""; ?>'/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12" class="control-label">
                                        <span>Status da conta:</span><br/>
                                        <label><input type="radio" name="nStatus" value="ativa"/> Ativa</label>
                                        <label><input type="radio" name="nStatus" value="inativa"/> Inativa</label>                                                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fim .panel--> 
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!--FIM .ROW-->
</div>