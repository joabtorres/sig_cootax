<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cadastrar Cooperado</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-plus-square"></i> Cadastrar Cooperado</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar uma cooperado já registrado.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form method="POST" enctype="multipart/form-data" autocomplete="off" id="form_cooperado">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"> <i class="fa fa-user-circle pull-left"></i> Cooperado</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['apelido']['class'])) ? $cooperado_error['apelido']['class'] : ''; ?>">
                                <label for="iApelido" class="control-label">Apelido:* <?php echo (isset($cooperado_error['apelido']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['apelido']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iApelido" name="nApelido" placeholder="Exemplo: João" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['apelido'])) ? $cooperado['cooperado']['apelido'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="iTipo" class="control-label">Categoria:* </label><br/>
                                <?php
                                if (isset($cooperado['cooperado']['tipo'])) {
                                    $status = array(array('tipo' => 'Permissionário'), array('tipo' => 'Participativo'));
                                    foreach ($status as $statu) {
                                        if ($statu['tipo'] == $cooperado['cooperado']['tipo']) {
                                            echo '<label><input type="radio" id="iTipo" name="nTipo" value="' . $statu['tipo'] . '" checked="true"/> ' . $statu['tipo'] . '</label> ';
                                        } else {
                                            echo '<label><input type="radio" id="iTipo" name="nTipo" value="' . $statu['tipo'] . '"/> ' . $statu['tipo'] . '</label> ';
                                        }
                                    }
                                } else {
                                    echo ' <label><input type="radio" id="iTipo" name="nTipo" value="Permissionário" checked="true"/> Permissionário</label>
                                <label><input type="radio" id="iTipo" name="nTipo" value="Participativo" /> Participativo</label>';
                                }
                                ?>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="iStatus" class="control-label">Status:* </label><br/>
                                <?php
                                if (isset($cooperado['cooperado']['status'])) {
                                    $status = array(array('valor' => 1, 'tipo' => 'Ativo'), array('valor' => 0, 'tipo' => 'Inativo'));
                                    foreach ($status as $statu) {
                                        if ($statu['valor'] == $cooperado['cooperado']['status']) {
                                            echo '<label><input type="radio" id="iStatus" name="nStatus" value="' . $statu['valor'] . '" checked="true"/> ' . $statu['tipo'] . ' </label> ';
                                        } else {
                                            echo '<label><input type="radio" id="iStatus" name="nStatus" value="' . $statu['valor'] . '"/> ' . $statu['tipo'] . '</label> ';
                                        }
                                    }
                                } else {
                                    echo ' <label><input type="radio" id="iStatus" name="nStatus" value="1" checked="true"/> Ativo</label>
                                <label><input type="radio" id="iStatus" name="nStatus" value="0" /> Inativo</label>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group <?php echo (isset($cooperado_error['nome_completo']['class'])) ? $cooperado_error['nome_completo']['class'] : ''; ?>">
                                <label for="iNomeCompleto" class="control-label">Nome Completo:* <?php echo (isset($cooperado_error['nome_completo']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['nome_completo']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iNomeCompleto" name="nNomeCompleto" placeholder="Exemplo: João da Silva Alves" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['nome_completo'])) ? $cooperado['cooperado']['nome_completo'] : ''; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['cpf']['class'])) ? $cooperado_error['cpf']['class'] : ''; ?>">
                                <label for="iCPF" class="control-label">CPF:* <?php echo (isset($cooperado_error['cpf']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['cpf']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iCPF" name="nCPF" placeholder="Exemplo: 065.378.444-50" class="form-control input-cpf" value="<?php echo (!empty($cooperado['cooperado']['cpf'])) ? $cooperado['cooperado']['cpf'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['rg']['class'])) ? $cooperado_error['rg']['class'] : ''; ?>">
                                <label for="iRG" class="control-label">RG:* <?php echo (isset($cooperado_error['rg']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['rg']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iRG" name="nRG" placeholder="Exemplo: 6846565 PC/PA" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['rg'])) ? $cooperado['cooperado']['rg'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['cnh']['class'])) ? $cooperado_error['cnh']['class'] : ''; ?>">
                                <label for="iCNH" class="control-label">CNH:* <?php echo (isset($cooperado_error['cnh']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['cnh']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iCNH" name="nCNH" placeholder="Exemplo: 87226981480" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['cnh'])) ? $cooperado['cooperado']['cnh'] : ''; ?>"/>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-md-3 form-group <?php echo (isset($cooperado_error['cat']['class'])) ? $cooperado_error['cat']['class'] : ''; ?>">
                                <label for="iCAT" class="control-label">CAT:* <?php echo (isset($cooperado_error['cat']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['cat']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iCAT" name="nCAT" placeholder="Exemplo: AB" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['cat'])) ? $cooperado['cooperado']['cat'] : ''; ?>"/>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="iINSS" class="control-label">INSS: </label>
                                <input type="text" id="iINSS" name="nINSS" placeholder="Exemplo: 26729115210" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['inss'])) ? $cooperado['cooperado']['inss'] : ''; ?>"/>
                            </div>
                            <div class="col-md-3 form-group <?php echo (isset($cooperado_error['estado_civil']['class'])) ? $cooperado_error['estado_civil']['class'] : ''; ?>">
                                <label for="iEstadoCivil" class="control-label">Estado Cívil:* <?php echo (isset($cooperado_error['estado_civil']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['estado_civil']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iEstadoCivil" name="nEstadoCivil" placeholder="Exemplo: Casado" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['estado_civil'])) ? $cooperado['cooperado']['estado_civil'] : ''; ?>"/>
                            </div>                            
                            <div class="col-md-3 form-group <?php echo (isset($cooperado_error['nacionalidade']['class'])) ? $cooperado_error['nacionalidade']['class'] : ''; ?>">
                                <label for="iNacionalidade" class="control-label">Nacionalidade:* <?php echo (isset($cooperado_error['nacionalidade']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['nacionalidade']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iNacionalidade" name="nNacionalidade" placeholder="Exemplo: Brasileiro" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['nacionalidade'])) ? $cooperado['cooperado']['nacionalidade'] : 'BRASILEIRO'; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['genero']['class'])) ? $cooperado_error['genero']['class'] : ''; ?>">
                                <label for="iGenero" class="control-label">Genero:* <?php echo (isset($cooperado_error['genero']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['genero']['msg'] . ' </small>' : ''; ?></label><br/>
                                <select id="iGenero" name="nGenero" class="form-control">

                                    <?php
                                    if (isset($cooperado['cooperado']['genero'])) {
                                        $generos = array(array('genero' => 'Masculino'), array('genero' => 'Feminino'));
                                        foreach ($generos as $genero) {
                                            if ($genero['genero'] == $cooperado['cooperado']['genero']) {
                                                echo '<option value="' . $genero['genero'] . '" checked="checked">' . $genero['genero'] . '</option>';
                                            } else {
                                                echo '<option value="' . $genero['genero'] . '">' . $genero['genero'] . '</option>';
                                            }
                                        }
                                    } else {
                                        echo '<option value="Masculino" checked="checked">Masculino</option> <option value="Feminino">Feminino</option> ';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['data_nascimento']['class'])) ? $cooperado_error['data_nascimento']['class'] : ''; ?>">
                                <label for="iDataNascimento" class="control-label">Data de Nascimento:* <?php echo (isset($cooperado_error['data_nascimento']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['data_nascimento']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iDataNascimento" name="nDataNascimento" placeholder="Exemplo: 10/02/1985" class="form-control input-data" value="<?php echo (!empty($cooperado['cooperado']['data_nascimento'])) ? $cooperado['cooperado']['data_nascimento'] : ''; ?>"/>
                            </div>                            
                            <div class="col-md-4 form-group <?php echo (isset($cooperado_error['data_inscricao']['class'])) ? $cooperado_error['data_inscricao']['class'] : ''; ?>">
                                <label for="iDataInscricao" class="control-label">Data de Inscrição:* <?php echo (isset($cooperado_error['data_inscricao']['msg'])) ? '<small><span class="glyphicon glyphicon-remove"></span> ' . $cooperado_error['data_inscricao']['msg'] . ' </small>' : ''; ?></label>
                                <input type="text" id="iDataInscricao" name="nDataInscricao" placeholder="Exemplo: 15/08/2018" class="form-control input-data" value="<?php echo (!empty($cooperado['cooperado']['data_inscricao'])) ? $cooperado['cooperado']['data_inscricao'] : date('d/m/o'); ?>"/>
                            </div>
                            
                        </div>
                    </article>
                </section> <!-- fim panel Cooperado-->
                <!--panel familiares-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-users pull-left"></i> Familiares</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="iPai" class="control-label">Pai: </label>
                                <input type="text" id="iPai" name="nPai" placeholder="Exemplo: João da Silva Barbosa" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['pai'])) ? $cooperado['cooperado']['pai'] : ''; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="iMae" class="control-label">Mãe:</label>
                                <input type="text" id="iMae" name="nMae" placeholder="Exemplo: Maria Antonia Alves" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['mae'])) ? $cooperado['cooperado']['mae'] : ''; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="iConjuge" class="control-label">Cônjuge: </label>
                                <input type="text" id="iConjuge" name="nConjuge" placeholder="Exemplo: Bernardete Pereira Alves" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['conjugue'])) ? $cooperado['cooperado']['conjugue'] : ''; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="iFilhos" class="control-label">Filhos:</label>
                                <input type="text" id="iFilhos" name="nFilhos" placeholder="Exemplo: Pedro da Silva Alves e Carlos da Silva Alves" class="form-control" value="<?php echo (!empty($cooperado['cooperado']['filhos'])) ? $cooperado['cooperado']['filhos'] : ''; ?>"/>
                            </div>
                        </div>
                    </article>
                </section> <!-- fim panel familiares-->
                <!--panel endereco-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-map-marker-alt pull-left"></i> Endereço</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="iLogradouro" class="control-label">Logradouro: </label>
                                <input type="text" id="iLogradouro" name="nLogradouro" placeholder="Exemplo: Trav. Raimundo Preto" class="form-control" value="<?php echo (!empty($cooperado['endereco']['logradouro'])) ? $cooperado['endereco']['logradouro'] : ''; ?>"/>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="iNumero" class="control-label">Número:</label>
                                <input type="text" id="iNumero" name="nNumero" placeholder="Exemplo: 1065" class="form-control" value="<?php echo (!empty($cooperado['endereco']['numero'])) ? $cooperado['endereco']['numero'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="iBairro" class="control-label">Bairro: </label>
                                <input type="text" id="iBairro" name="nBairro" placeholder="Exemplo: Bom Remédio" class="form-control" value="<?php echo (!empty($cooperado['endereco']['bairro'])) ? $cooperado['endereco']['bairro'] : ''; ?>"/>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-md-3 form-group">
                                <label for="iComplemento" class="control-label">Complemento:</label>
                                <input type="text" id="iComplemento" name="nComplementos" placeholder="Exemplo: Próximo ao supermercado Pague Menos" class="form-control" value="<?php echo (!empty($cooperado['endereco']['complemento'])) ? $cooperado['endereco']['complemento'] : ''; ?>"/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="iCEP" class="control-label">CEP:</label>
                                <input type="text" id="iCEP" name="nCEP" placeholder="Exemplo: 68180-662" class="form-control" value="<?php echo (!empty($cooperado['endereco']['cep'])) ? $cooperado['endereco']['cep'] : ''; ?>"/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="iCidade" class="control-label">Cidade:</label>
                                <input type="text" id="iCidade" name="nCidade" placeholder="Exemplo: Itaituba" class="form-control" value="<?php echo (!empty($cooperado['endereco']['cidade'])) ? $cooperado['endereco']['cidade'] : 'Itaituba'; ?>"/>
                            </div>                        
                            <div class="col-md-3 form-group">
                                <label for="iEstado" class="control-label">Estado:</label>
                                <input type="text" id="iEstado" name="nEstado" placeholder="Exemplo: PA" class="form-control" value="<?php echo (!empty($cooperado['endereco']['estado'])) ? $cooperado['endereco']['estado'] : 'PA'; ?>"/>
                            </div>                            
                        </div>
                    </article>
                </section> <!-- fim panel endereco-->
                <!--panel contato-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-user-circle pull-left"></i> Contato</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="iTelefone" class="control-label">Celular 1:</label>
                                <input type="text" id="iTelefone" name="nTelefone" placeholder="Exemplo: (93) 99205-6868" class="form-control input-celular" value="<?php echo (!empty($cooperado['contato']['celular_2'])) ? $cooperado['contato']['celular_2'] : ''; ?>"/>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="iCelular" class="control-label">Celular 2: </label>
                                <input type="text" id="iCelular" name="nCelular" placeholder="Exemplo: (93) 98155-1122" class="form-control input-celular" value="<?php echo (!empty($cooperado['contato']['celular_1'])) ? $cooperado['contato']['celular_1'] : ''; ?>"/>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="iEmail" class="control-label">Email: </label>
                                <input type="text" id="iEmail" name="nEmail" placeholder="Exemplo: joao.alves@gmail.com" class="form-control" value="<?php echo (!empty($cooperado['contato']['email'])) ? $cooperado['contato']['email'] : ''; ?>"/>
                            </div>
                        </div>
                    </article>
                </section> <!-- fim panel contato-->
                <!--panel foto-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-image pull-left"></i> Foto</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <p class="text-center" id="fotos">
                                    <img src="<?php echo (isset($cooperado['cooperado']['imagem']) && !empty($cooperado['cooperado']['imagem'])) ? BASE_URL . '/' . $cooperado['cooperado']['imagem'] : BASE_URL . '/assets/imagens/foto_ilustrato3x4.png'; ?>" class="img-center" alt="Usuario" id="viewImagem-1"/>
                                    <input type="hidden" name="qtd_fotos" value="1">
                                    <label class="btn btn-success" for="cFileImagem">Escolher Imagem</label>
                                    <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/><br/><br/>
                                    <input type="hidden" name="nImagemCooperado"  value="<?php echo isset($cooperado['cooperado']['imagem']) ? $cooperado['cooperado']['imagem'] : null; ?>"/>
                                    <span>Observação: Carregue somente imagens na proporção 3x4, caso contrário a imagem ficará distorcida.</span>
                                </p>
                            </div>
                        </div>
                    </article>
                </section> <!-- fim panel foto-->
                <!--panel veículo-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-car pull-left"></i> Veículo</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="iNZ" class="control-label">NZ:</label>
                                <input type="text" id="iNZ" name="nNZ" placeholder="Exemplo: 0452" class="form-control" value="<?php echo (!empty($cooperado['veiculo']['nz'])) ? $cooperado['veiculo']['nz'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="iVeiculo" class="control-label">Veículo: </label>
                                <input type="text" id="iVeiculo" name="nVeiculo" placeholder="Exemplo: Gol 2.0" class="form-control" value="<?php echo (!empty($cooperado['veiculo']['veiculo'])) ? $cooperado['veiculo']['veiculo'] : ''; ?>"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="iCor" class="control-label">Cor: </label>
                                <input type="text" id="iCor" name="nCor" placeholder="Exemplo: Branco" class="form-control" value="<?php echo (!empty($cooperado['veiculo']['cor'])) ? $cooperado['veiculo']['cor'] : ''; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="iPlaca" class="control-label">Placa: </label>
                                <input type="text" id="iPlaca" name="nPlaca" placeholder="Exemplo: SNG-5466" class="form-control" value="<?php echo (!empty($cooperado['veiculo']['placa'])) ? $cooperado['veiculo']['placa'] : ''; ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="iAnoModelo" class="control-label">Ano Modelo: </label>
                                <input type="text" id="iAnoModelo" name="nAnoModelo" placeholder="Exemplo: 2012/2013" class="form-control" value="<?php echo (!empty($cooperado['veiculo']['ano_modelo'])) ? $cooperado['veiculo']['ano_modelo'] : ''; ?>"/>
                            </div>
                        </div>
                    </article>
                </section> <!-- fim panel veículo-->
                <!--panel veículo-->
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-address-card pull-left"></i> Carteira</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="iDataInicial" class="control-label">Data Emissão:</label>
                                <input type="text" id="iDataInicial" name="nDataInicial" placeholder="Exemplo: 01/01/2018" class="form-control input-data" value="<?php echo (!empty($cooperado['carteira']['data_inicial'])) ? $cooperado['carteira']['data_inicial'] : date('d/m/o'); ?>"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="iDataValidade" class="control-label">Data Validade: </label>
                                <input type="text" id="iDataValidade" name="nDataValidade" placeholder="Exemplo: 31/12/2018" class="form-control input-data" value="<?php echo (!empty($cooperado['carteira']['data_validade'])) ? $cooperado['carteira']['data_validade'] : '01/' . date('m') . '/' . (intval(date('o')) + 1) ?>"/>
                            </div>
                        </div>
                    </article>
                </section> <!-- fim panel veículo-->
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--fim row-->
</div>
