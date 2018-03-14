<?php

/**
 * A classe 'editarController' é responsável para fazer o gerenciamento na edição  de cooperados, historico, carteirinha, mensalidade, lucro, despesa, investimento e usuario
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe editarController
 */
class EditarController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é chama a função cooperado();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index($cod_cooperado) {
        $this->cooperado($cod_cooperado);
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de edição no cooperado  e valida os campus preenchidos via formulário.
     * @param int $cod _cooperado- código do cooperado registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function cooperado($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $viewName = "cooperado_editar";
            $dados = array();
            $cooperado = array();
            $cooperadoModel = new cooperado();
            $dados['cooperado']['cooperado'] = $cooperadoModel->read('SELECT * FROM sig_cooperado WHERE cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['cooperado'] = $dados['cooperado']['cooperado'][0];
            $dados['cooperado']['endereco'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_endereco WHERE cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['endereco'] = $dados['cooperado']['endereco'][0];
            $dados['cooperado']['contato'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_contato WHERE cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['contato'] = $dados['cooperado']['contato'][0];
            $dados['cooperado']['veiculo'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_veiculo WHERE cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['veiculo'] = $dados['cooperado']['veiculo'][0];
            $dados['cooperado']['carteira'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_carteira WHERE cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['carteira'] = $dados['cooperado']['carteira'][0];

            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {

                $cooperado['cooperado']['cod_cooperado'] = addslashes($_POST['nCodCooperado']);
                //cooperativa
                $cooperado['cooperado']['cod_cooperativa'] = $this->getCodCooperativa();
                //categoria de cooperado
                $cooperado['cooperado']['tipo'] = addslashes($_POST['nTipo']);
                //status
                $cooperado['cooperado']['status'] = addslashes($_POST['nStatus']);
                //apelido
                if (!empty($_POST['nApelido']) && isset($_POST['nApelido'])) {
                    $cooperado['cooperado']['apelido'] = addslashes($_POST['nApelido']);
                } else {
                    $dados['cooperado_error']['apelido']['msg'] = 'Informe o Apelido';
                    $dados['cooperado_error']['apelido']['class'] = 'has-error';
                }
                //nome completo
                if (!empty($_POST['nNomeCompleto']) && isset($_POST['nNomeCompleto'])) {
                    $cooperado['cooperado']['nome_completo'] = addslashes($_POST['nNomeCompleto']);
                } else {
                    $dados['cooperado_error']['nome_completo']['msg'] = 'Informe o Nome Completo';
                    $dados['cooperado_error']['nome_completo']['class'] = 'has-error';
                }

                //cpf
                if (!empty($_POST['nCPF']) && isset($_POST['nCPF'])) {
                    $cooperado['cooperado']['cpf'] = addslashes($_POST['nCPF']);
                } else {
                    $dados['cooperado_error']['cpf']['msg'] = 'Informe o CPF';
                    $dados['cooperado_error']['cpf']['class'] = 'has-error';
                }

                //rg
                if (!empty($_POST['nRG']) && isset($_POST['nRG'])) {
                    $cooperado['cooperado']['rg'] = addslashes($_POST['nRG']);
                } else {
                    $dados['cooperado_error']['rg']['msg'] = 'Informe o RG';
                    $dados['cooperado_error']['rg']['class'] = 'has-error';
                }

                //cnh
                if (!empty($_POST['nCNH']) && isset($_POST['nCNH'])) {
                    $cooperado['cooperado']['cnh'] = addslashes($_POST['nCNH']);
                } else {
                    $dados['cooperado_error']['cnh']['msg'] = 'Informe o CNH';
                    $dados['cooperado_error']['cnh']['class'] = 'has-error';
                }
                //cat
                if (!empty($_POST['nCAT']) && isset($_POST['nCAT'])) {
                    $cooperado['cooperado']['cat'] = addslashes($_POST['nCAT']);
                } else {
                    $dados['cooperado_error']['cat']['msg'] = 'Informe a Categoria';
                    $dados['cooperado_error']['cat']['class'] = 'has-error';
                }
                //inss
                $cooperado['cooperado']['inss'] = addslashes($_POST['nINSS']);
                //rg
                if (!empty($_POST['nEstadoCivil']) && isset($_POST['nEstadoCivil'])) {
                    $cooperado['cooperado']['estado_civil'] = addslashes($_POST['nEstadoCivil']);
                } else {
                    $dados['cooperado_error']['estado_civil']['msg'] = 'Informe o Estado Cívil';
                    $dados['cooperado_error']['estado_civil']['class'] = 'has-error';
                }
                //nacionalidade
                if (!empty($_POST['nNacionalidade']) && isset($_POST['nNacionalidade'])) {
                    $cooperado['cooperado']['nacionalidade'] = addslashes($_POST['nNacionalidade']);
                } else {
                    $dados['cooperado_error']['nacionalidade']['msg'] = 'Informe a Nacionalidade';
                    $dados['cooperado_error']['nacionalidade']['class'] = 'has-error';
                }
                //genero
                $cooperado['cooperado']['genero'] = addslashes($_POST['nGenero']);
                //daca de nascimento
                if (!empty($_POST['nDataNascimento']) && isset($_POST['nDataNascimento'])) {
                    $cooperado['cooperado']['data_nascimento'] = addslashes($_POST['nDataNascimento']);
                } else {
                    $dados['cooperado_error']['data_nascimento']['msg'] = 'Informe a Data de Nascimento';
                    $dados['cooperado_error']['data_nascimento']['class'] = 'has-error';
                }
                //daca de nascimento
                if (!empty($_POST['nDataInscricao']) && isset($_POST['nDataInscricao'])) {
                    $cooperado['cooperado']['data_inscricao'] = addslashes($_POST['nDataInscricao']);
                } else {
                    $dados['cooperado_error']['data_inscricao']['msg'] = 'Informe a Data de Inscrição';
                    $dados['cooperado_error']['data_inscricao']['class'] = 'has-error';
                }
                //familiares
                $cooperado['cooperado']['pai'] = addslashes($_POST['nPai']);
                $cooperado['cooperado']['mae'] = addslashes($_POST['nMae']);
                $cooperado['cooperado']['conjugue'] = addslashes($_POST['nConjuge']);
                $cooperado['cooperado']['filhos'] = $_POST['nFilhos'];

                //imagem
                if ((isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) && (!isset($dados['cooperado_error']))) {
                    $cooperado['cooperado']['imagem'] = $cooperadoModel->save_image($_FILES['tImagem-1']);
                    if (!empty($_POST['nImagemCooperado'])) {
                        $cooperadoModel->delete_image($_POST['nImagemCooperado']);
                    }
                } else {
                    $cooperado['cooperado']['imagem'] = addslashes($_POST['nImagemCooperado']);
                }

                //endereço
                $cooperado['endereco'] = array(
                    'cod_cooperado' => $cooperado['cooperado']['cod_cooperado'],
                    'logradouro' => addslashes($_POST['nLogradouro']),
                    'numero' => $_POST['nNumero'],
                    'bairro' => addslashes($_POST['nBairro']),
                    'complemento' => addslashes($_POST['nComplementos']),
                    'cidade' => addslashes($_POST['nCidade']),
                    'estado' => addslashes($_POST['nEstado']),
                    'cep' => addslashes($_POST['nCEP']),
                    'cod_endereco' => addslashes($_POST['nCodEndereco'])
                );
                //contato
                $cooperado['contato'] = array(
                    'cod_cooperado' => $cooperado['cooperado']['cod_cooperado'],
                    'celular_1' => addslashes($_POST['nTelefone']),
                    'celular_2' => addslashes($_POST['nCelular']),
                    'email' => addslashes($_POST['nEmail']),
                    'cod_contato' => addslashes($_POST['nCodContato'])
                );
                //veiculo
                $cooperado['veiculo'] = array(
                    'cod_cooperado' => $cooperado['cooperado']['cod_cooperado'],
                    'nz' => addslashes($_POST['nNZ']),
                    'veiculo' => addslashes($_POST['nVeiculo']),
                    'cor' => addslashes($_POST['nCor']),
                    'placa' => $_POST['nPlaca'],
                    'ano_modelo' => $_POST['nAnoModelo'],
                    'cod_veiculo' => $_POST['nCodVeiculo']
                );
                //carteira
                $cooperado['carteira'] = array(
                    'cod_cooperado' => $cooperado['cooperado']['cod_cooperado'],
                    'data_inicial' => $_POST['nDataInicial'],
                    'data_validade' => $_POST['nDataValidade'],
                    'cod' => addslashes($_POST['nCodCarteira']),
                );


                if (isset($dados['cooperado_error']) && !empty($dados['cooperado_error'])) {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                } else {
                    $cooperado['cooperado']['data_nascimento'] = $this->formatDateBD($cooperado['cooperado']['data_nascimento']);
                    $cooperado['cooperado']['data_inscricao'] = $this->formatDateBD($cooperado['cooperado']['data_inscricao']);
                    $cooperado['carteira']['data_inicial'] = (!empty($cooperado['carteira']['data_inicial'])) ? $this->formatDateBD($cooperado['carteira']['data_inicial']) : NULL;
                    $cooperado['carteira']['data_validade'] = (!empty($cooperado['carteira']['data_validade'])) ? $this->formatDateBD($cooperado['carteira']['data_validade']) : NULL;
                    $_POST = array();
                    $cadCooperado = $cooperadoModel->update($cooperado);
                    if ($cadCooperado) {
                        $_SESSION['cooperado_categoria'] = array();
                        $_SESSION['cooperado_status'] = array();
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
                    }
                }
                $dados['cooperado'] = $cooperado;
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            header('Location: /home');
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de editar históricos do cooperado e valida os campus preenchidos via formulário.
     * @access public
     * @param int $cod - código do lucro registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function historico($cod) {
        if ($this->checkUser() >= 2 && intval($cod) > 0) {
            $viewName = "historico_editar";
            $dados = array();
            $crudModel = new crud_db();
            $dados['cooperado']['historico'] = $crudModel->read('SELECT hist.*, user.usuario_usuario, coop.nome_completo FROM sig_cooperado_historico as hist INNER JOIN sig_usuario as user INNER JOIN sig_cooperado as coop WHERE coop.cod_cooperado=hist.cod_cooperado AND user.cod_usuario=hist.cod_usuario AND hist.cod_historico=:cod;', array('cod' => addslashes($cod)));
            $dados['cooperado']['historico'] = $dados['cooperado']['historico'][0];

            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $dados['coopeado']['historico'] = array(
                    'descricao_historico' => addslashes($_POST['nDescricao']),
                    'cod_historico' => addslashes($_POST['nCodHistorico'])
                );
                $cadHistorico = $crudModel->update("UPDATE sig_cooperado_historico SET descricao_historico=:descricao_historico WHERE cod_historico=:cod_historico", $dados['coopeado']['historico']);
                if ($cadHistorico) {
                    $_SESSION['historico_acao'] = true;
                    header("Location: /editar/historico/" . $cod);
                }
            } else if (isset($_SESSION['historico_acao']) && !empty($_SESSION['historico_acao'])) {
                $_SESSION['historico_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
            }

            $this->loadTemplate($viewName, $dados);
        } else {
            header('Location: /home');
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de editar mensalidade do cooperado e valida os campus preenchidos via formulário.
     * @access public
     * @param int $cod - código da mensalidade registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function mensalidade($cod) {
        if ($this->checkUser() >= 2 && intval($cod) > 0) {
            $viewName = "mensalidade_editar";
            $dados = array();
            $cooperadoModel = new crud_db();
            $dados['cooperado']['mensalidade'] = $cooperadoModel->read('SELECT men.*, coop.nome_completo FROM sig_cooperado_mensalidade as men INNER JOIN sig_cooperado as coop WHERE coop.cod_cooperado=men.cod_cooperado AND men.cod_mensalidade=:cod', array('cod' => addslashes($cod)));
            $dados['cooperado']['mensalidade'] = $dados['cooperado']['mensalidade'][0];
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                if (isset($_POST['nAno']) && !empty($_POST['nAno'])) {
                    $dados['mensalidade'] = array(
                        'cod_cooperado' => addslashes($_POST['nCodCooperado']),
                        'ano' => addslashes($_POST['nAno']),
                        'janeiro' => !empty($_POST['nJaneiro']) ? $this->formatDinheiroBD($_POST['nJaneiro']) : 0,
                        'fevereiro' => !empty($_POST['nFevereiro']) ? $this->formatDinheiroBD($_POST['nFevereiro']) : 0,
                        'marco' => !empty($_POST['nMarco']) ? $this->formatDinheiroBD($_POST['nMarco']) : 0,
                        'abril' => !empty($_POST['nAbril']) ? $this->formatDinheiroBD($_POST['nAbril']) : 0,
                        'maio' => !empty($_POST['nMaio']) ? $this->formatDinheiroBD($_POST['nMaio']) : 0,
                        'junho' => !empty($_POST['nJunho']) ? $this->formatDinheiroBD($_POST['nJunho']) : 0,
                        'julho' => !empty($_POST['nJulho']) ? $this->formatDinheiroBD($_POST['nJulho']) : 0,
                        'agosto' => !empty($_POST['nAgosto']) ? $this->formatDinheiroBD($_POST['nAgosto']) : 0,
                        'setembro' => !empty($_POST['nSetembro']) ? $this->formatDinheiroBD($_POST['nSetembro']) : 0,
                        'outubro' => !empty($_POST['nOutubro']) ? $this->formatDinheiroBD($_POST['nOutubro']) : 0,
                        'novembro' => !empty($_POST['nNovembro']) ? $this->formatDinheiroBD($_POST['nNovembro']) : 0,
                        'dezembro' => !empty($_POST['nDezembro']) ? $this->formatDinheiroBD($_POST['nDezembro']) : 0,
                        'cod_mensalidade' => addslashes($_POST['nCodMensalidade'])
                    );
                    $cadMensalidade = $cooperadoModel->update("UPDATE sig_cooperado_mensalidade SET cod_cooperado=:cod_cooperado, ano=:ano, janeiro=:janeiro, fevereiro=:fevereiro, marco=:marco, abril=:abril, maio=:maio, junho=:junho, julho=:julho, agosto=:agosto, setembro=:setembro, outubro=:outubro, novembro=:novembro, dezembro=:dezembro where cod_mensalidade=:cod_mensalidade", $dados['mensalidade']);
                    if ($cadMensalidade) {
                        $_SESSION['mensalidade_acao'] = true;
                        header("Location: /editar/mensalidade/" . $cod);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios, ANO não foi informado");
                }
            } else if (isset($_SESSION['mensalidade_acao']) && !empty($_SESSION['mensalidade_acao'])) {
                $_SESSION['mensalidade_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
            }

            $this->loadTemplate($viewName, $dados);
        } else {
            header('Location: /home');
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de edotar um lucro da cooperativa e valida os campus preenchidos via formulário.
     * @param int $cod - código do lucro registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function lucro($cod) {
        if ($this->checkUser() >= 2 && intval($cod) > 0) {
            $viewName = "lucro_editar";
            $dados = array();
            $crudModel = new crud_db();
            $financa_db = $crudModel->read('SELECT * FROM sig_lucro WHERE cod=:cod', array('cod' => $cod));
            $dados['financa'] = array(
                'cod' => $financa_db[0]['cod'],
                'cod_cooperativa' => $financa_db[0]['cod_cooperativa'],
                'descricao' => $financa_db[0]['descricao'],
                'valor' => $this->formatDinheiroView($financa_db[0]['valor']),
                'data' => $this->formatDateView($financa_db[0]['data'])
            );
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData']),
                    'cod' => addslashes($_POST['nCod'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->update('UPDATE sig_lucro SET cod_cooperativa=:cod_cooperativa, descricao=:descricao, valor=:valor, data=:data WHERE cod=:cod', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        header("Location: /editar/lucro/" . $cod);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de editar uma despesa da cooperativa e valida os campus preenchidos via formulário.
     * @param int $cod - código do despesa registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function despesa($cod) {
        if ($this->checkUser() >= 2 && intval($cod) > 0) {
            $viewName = "despesa_editar";
            $dados = array();
            $crudModel = new crud_db();
            $financa_db = $crudModel->read('SELECT * FROM sig_despesa WHERE cod=:cod', array('cod' => $cod));
            $dados['financa'] = array(
                'cod' => $financa_db[0]['cod'],
                'cod_cooperativa' => $financa_db[0]['cod_cooperativa'],
                'descricao' => $financa_db[0]['descricao'],
                'valor' => $this->formatDinheiroView($financa_db[0]['valor']),
                'data' => $this->formatDateView($financa_db[0]['data'])
            );
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData']),
                    'cod' => addslashes($_POST['nCod'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->update('UPDATE sig_despesa SET cod_cooperativa=:cod_cooperativa, descricao=:descricao, valor=:valor, data=:data WHERE cod=:cod', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        header("Location: /editar/despesa/" . $cod);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de editar um investimento da cooperativa e valida os campus preenchidos via formulário.
     * @param int $cod - código do investimento registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function investimento($cod) {
        if ($this->checkUser() >= 2 && intval($cod) > 0) {
            $viewName = "investimento_editar";
            $dados = array();
            $crudModel = new crud_db();
            $financa_db = $crudModel->read('SELECT * FROM sig_investimento WHERE cod=:cod', array('cod' => $cod));
            $dados['financa'] = array(
                'cod' => $financa_db[0]['cod'],
                'cod_cooperativa' => $financa_db[0]['cod_cooperativa'],
                'descricao' => $financa_db[0]['descricao'],
                'valor' => $this->formatDinheiroView($financa_db[0]['valor']),
                'data' => $this->formatDateView($financa_db[0]['data'])
            );
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData']),
                    'cod' => addslashes($_POST['nCod'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->update('UPDATE sig_investimento SET cod_cooperativa=:cod_cooperativa, descricao=:descricao, valor=:valor, data=:data WHERE cod=:cod', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        header("Location: /editar/investimento/" . $cod);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Alteração realizada com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            header('Location: /home');
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controle nas ações de editar usuario e valida os campus preenchidos via formulário.
     * @param int $cod - código do usuario registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function usuario($cod) {

        if (($this->checkUser() && $cod == $_SESSION['usuario_sig_cootax']['cod']) || ($this->checkUser() == 3)) {
            $view = "usuario_editar";
            $dados = array();
            $usuarioModel = new usuario();
            //pesquisa usuário
            $result_usuario = $usuarioModel->read_specific("SELECT * FROM sig_usuario WHERE cod_usuario=:cod", array('cod' => addslashes(trim($cod))));
            if ($result_usuario) {

                $dados['usuario'] = $result_usuario;

                if (isset($_POST['nSalvar'])) {
                    //codigo
                    $usuario = array('cod_usuario' => addslashes(trim($_POST['nCodUsuario'])));
                    //nome
                    if (!empty($_POST['nNome'])) {
                        $usuario['nome_usuario'] = addslashes($_POST['nNome']);
                    } else {
                        $dados['usuario_erro']['nome']['msg'] = 'Informe o nome';
                        $dados['usuario_erro']['nome']['class'] = 'has-error';
                    }
                    //sobrenome
                    if (!empty($_POST['nSobrenome'])) {
                        $usuario['sobrenome_usuario'] = addslashes($_POST['nSobrenome']);
                    } else {
                        $dados['usuario_erro']['sobrenome']['msg'] = 'Informe o sobrenome';
                        $dados['usuario_erro']['sobrenome']['class'] = 'has-error';
                    }
                    //sobrenome
                    if (!empty($_POST['nUsuario'])) {
                        $usuario['usuario_usuario'] = addslashes($_POST['nUsuario']);
                        if ($usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE usuario_usuario=:usuario AND cod_usuario != :cod ', array('usuario' => $usuario['usuario_usuario'], 'cod' => $usuario['cod_usuario']))) {
                            $dados['usuario_erro']['usuario']['msg'] = 'usuário já cadastrado';
                            $dados['usuario_erro']['usuario']['class'] = 'has-error';
                            $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível alterar um usuario para um nome de usuário já cadastrado, por favor informe outro nome de usuário';
                            $dados['erro']['class'] = 'alert-danger';
                            $usuario['usuario'] = null;
                        }
                    } else {
                        $dados['usuario_erro']['usuario']['msg'] = 'Informe o usuário';
                        $dados['usuario_erro']['usuario']['class'] = 'has-error';
                    }
                    //senha
                    if (!empty($_POST['nSenha']) && !empty($_POST['nRepetirSenha'])) {
                        //senha
                        if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                            $usuario['senha_usuario'] = addslashes($_POST['nSenha']);
                        } else {
                            $dados['usuario_erro']['senha']['msg'] = "Os campos 'Nova Senha' e 'Repetir Nova Senha' não estão iguais! ";
                            $dados['usuario_erro']['senha']['class'] = 'has-error';
                        }
                    }
                    //cargo
                    if (!empty($_POST['nCargo'])) {
                        $usuario['cargo_usuario'] = addslashes($_POST['nCargo']);
                    } else {
                        $dados['usuario_info']['cargo']['msg'] = 'Informe o cargo, senão não será exibido o cargo';
                        $dados['usuario_info']['cargo']['class'] = 'has-warning';
                    }
                    //sexo
                    $usuario['genero_usuario'] = addslashes($_POST['nSexo']);

                    //nivel de acesso
                    if (!empty($_POST['tNivelDeAcesso'])) {
                        $usuario['nivel_acesso_usuario'] = addslashes($_POST['tNivelDeAcesso']);
                    } else {
                        $usuario['nivel_acesso_usuario'] = $result_usuario['nivel_acesso_usuario'];
                    }
                    //status
                    if (isset($_POST['nStatuUsuario']) && !empty($_POST['nStatuUsuario'])) {
                        $usuario['status_usuario'] = addslashes($_POST['nStatuUsuario']);
                    } else {
                        $usuario['status_usuario'] = 0;
                    }


                    //imagem
                    if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                        $usuario['imagem_usuario'] = $_FILES['tImagem-1'];
                        $usuario['img_atual'] = $result_usuario['imagem_usuario'];
                    } else if (!empty($_POST['nImagem-user'])) {
                        $usuario['imagem_usuario'] = addslashes($_POST['nImagem-user']);
                    } else {
                        $usuario['imagem_usuario'] = $result_usuario['imagem_usuario'];
                        $usuario['delete_img'] = true;
                    }

                    if (isset($dados['usuario_erro']) && !empty($dados['usuario_erro'])) {
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha todos os campos obrigatórios (*).';
                        $dados['erro']['class'] = 'alert-danger';
                    } else {
                        $resultado = $usuarioModel->update($usuario);
                        $dados['usuario'] = $resultado;

                        //SE O USUÁRIO EM EDIÇÃO E O MESMO QUE ESTÁ LOGADO NO SITEMA ELE VAI ALTERAR OS DADOS DO USUÁRIO LOGADO
                        if ($cod == $_SESSION['usuario_sig_cootax']['cod'] && !empty($resultado)) {
                            //nome
                            $_SESSION['usuario_sig_cootax']['nome'] = $resultado['nome_usuario'];
                            //sobrenome
                            $_SESSION['usuario_sig_cootax']['sobrenome'] = $resultado['sobrenome_usuario'];
                            //cargo
                            $_SESSION['usuario_sig_cootax']['cargo'] = $resultado['cargo_usuario'];
                            //img
                            $_SESSION['usuario_sig_cootax']['imagem'] = $resultado['imagem_usuario'];
                            //nivel
                            $_SESSION['usuario_sig_cootax']['nivel'] = $resultado['nivel_acesso_usuario'];
                            //statu
                            $_SESSION['usuario_sig_cootax']['statu'] = $resultado['status_usuario'];
                        }

                        $dados['erro']['msg'] = '<i class="fa fa-check" aria-hidden="true"></i> Alteração realizada com sucesso!';
                        $dados['erro']['class'] = 'alert-success';
                        $_POST = array();
                    }
                }
                $this->loadTemplate($view, $dados);
            } else {
                header('Location: /home');
            }
        } else {
            header('Location: /home');
        }
    }

}
