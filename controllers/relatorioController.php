<?php

/**
 * A classe 'relatorioController' é responsável para fazer o carregamento das views relacionado a relatorios e validações de exibição de campos
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe relatorioController
 */
class relatorioController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela chama a  função cooperados();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        $this->cooperados();
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas os cooperados.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function cooperados($page = 1) {
        if ($this->checkUser() >= 2) {
            $view = "cooperado_relatorio_avancado";
            $dados = array();
            $cooperadoModel = new cooperado();
            $dados['modo_exebicao'] = 1;
            $campos_buscar = array();
            if (isset($_POST['nBuscarBT'])) {
                $sql = "SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado";
                $filtro = array();
                if (isset($_POST['nTipo']) && !empty($_POST['nTipo'])) {
                    $sql = $sql . " AND cooperado.tipo = :tipo ";
                    $filtro['tipo'] = addslashes($_POST['nTipo']);
                    $campos_buscar['tipo'] = addslashes($_POST['nTipo']);
                } else {
                    $campos_buscar['tipo'] = 'Todos';
                }
                if (isset($_POST['nStatus']) && !empty($_POST['nStatus'])) {
                    $sql = $sql . " AND cooperado.status = :status ";
                    $filtro['status'] = (addslashes($_POST['nStatus']) == 'Ativo') ? 1 : 0;
                    $campos_buscar['status'] = addslashes($_POST['nStatus']);
                } else {
                    $campos_buscar['status'] = 'Todos';
                }
                if (isset($_POST['nPor']) && !empty($_POST['nPor']) && !empty($_POST['nBuscar'])) {
                    switch ($_POST['nPor']) {
                        case 'NZ':
                            $sql = $sql . " AND veiculo.nz LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Apelido':
                            $sql = $sql . " AND cooperado.apelido LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Nome Completo':
                            $sql = $sql . " AND cooperado.nome_completo LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Ano de Inscrição':
                            $sql = $sql . " AND cooperado.data_inscricao LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        default :
                            break;
                    }
                    $campos_buscar['por'] = $_POST['nPor'];
                    $campos_buscar['campo'] = $_POST['nBuscar'];
                } else {
                    $campos_buscar['por'] = 'Todos';
                    $campos_buscar['campo'] = '';
                }
                $dados['cooperados'] = $cooperadoModel->read($sql, $filtro);
                //modo de exebição
                $dados['modo_exebicao'] = $_POST['nModoExibicao'];

                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "cooperado_relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['cooperados'] = $dados['cooperados'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'cooperados_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            } else {
                $dados['cooperados'] = $cooperadoModel->read('SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado');
            }
            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, responsável para fazer uma buscar rápida, por nz ou nome.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function buscarapida($page = 1) {
        if ($this->checkUser() >= 2) {
            $view = "cooperado_relatorio_busca_rapido";
            $dados = array();
            $cooperadoModel = new cooperado();
            $dados['modo_exebicao'] = 1;
            if (isset($_POST['nSerachCampo']) && !empty($_POST['nSerachCampo'])) {
                $sql = "SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado";
                switch ($_POST['nSearchFinalidade']) {
                    case 'nz':
                        $sql = $sql . " AND veiculo.nz LIKE '%" . addslashes($_POST['nSerachCampo']) . "%' ";
                        break;
                    default :
                        $sql = $sql . " AND cooperado.nome_completo LIKE '%" . addslashes($_POST['nSerachCampo']) . "%' ";
                        break;
                }
                $dados['cooperados'] = $cooperadoModel->read($sql);
            } else {
                $dados['cooperados'] = $cooperadoModel->read('SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado');
            }
            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas as mensalidades.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function mensalidades($page = 1) {
        if ($this->checkUser() >= 2) {
            $viewName = "mensalidade_relatorio";
            $dados = array();
            $cooperadoModel = new cooperado();
            $cooperados = array();
            if (isset($_POST['nBuscarBT'])) {
                $sql = "SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado";
                $filtro = array();
                if (isset($_POST['nTipo']) && !empty($_POST['nTipo'])) {
                    $sql = $sql . " AND cooperado.tipo = :tipo ";
                    $filtro['tipo'] = addslashes($_POST['nTipo']);
                    $campos_buscar['tipo'] = addslashes($_POST['nTipo']);
                } else {
                    $campos_buscar['tipo'] = 'Todos';
                }
                if (isset($_POST['nStatus']) && !empty($_POST['nStatus'])) {
                    $sql = $sql . " AND cooperado.status = :status ";
                    $filtro['status'] = (addslashes($_POST['nStatus']) == 'Ativo') ? 1 : 0;
                    $campos_buscar['status'] = addslashes($_POST['nStatus']);
                } else {
                    $campos_buscar['status'] = 'Todos';
                }
                if (isset($_POST['nPor']) && !empty($_POST['nPor']) && !empty($_POST['nBuscar'])) {
                    switch ($_POST['nPor']) {
                        case 'NZ':
                            $sql = $sql . " AND veiculo.nz LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Apelido':
                            $sql = $sql . " AND cooperado.apelido LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Nome Completo':
                            $sql = $sql . " AND cooperado.nome_completo LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        case 'Ano de Inscrição':
                            $sql = $sql . " AND cooperado.data_inscricao LIKE '%" . addslashes($_POST['nBuscar']) . "%' ";
                            break;
                        default :
                            break;
                    }
                    $campos_buscar['por'] = $_POST['nPor'];
                    $campos_buscar['campo'] = $_POST['nBuscar'];
                } else {
                    $campos_buscar['por'] = 'Todos';
                    $campos_buscar['campo'] = '';
                }

                $cooperados = $cooperadoModel->read($sql, $filtro);
                if (!empty($cooperados)) {
                    foreach ($cooperados as $indice => $value) {
                        $cooperados[$indice]['mensalidades'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_mensalidade WHERE cod_cooperado=:cod ORDER BY ano ASC', array('cod' => addslashes($value['cod_cooperado'])));
                    }
                }

                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "mensalidade_relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = $campos_buscar;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['cooperados'] = $cooperados;
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'mensalidade_relatorio_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            } else {
                $cooperados = $cooperadoModel->read('SELECT cooperado.cod_cooperado, cooperado.cod_cooperativa, cooperado.apelido, cooperado.nome_completo, cooperado.data_inscricao, cooperado.imagem, cooperado.tipo, veiculo.nz FROM sig_cooperado as cooperado INNER JOIN sig_cooperado_veiculo AS veiculo WHERE cooperado.cod_cooperado = veiculo.cod_cooperado');
                if (!empty($cooperados)) {
                    foreach ($cooperados as $indice => $value) {
                        $cooperados[$indice]['mensalidades'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_mensalidade WHERE cod_cooperado=:cod ORDER BY ano ASC', array('cod' => addslashes($value['cod_cooperado'])));
                    }
                }
            }


            $dados['cooperados'] = $cooperados;
            $this->loadTemplate($viewName, $dados);
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas os lucros, podendo fazer a filtragem deste registro por periodo de data.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function lucros($page = 1) {
        if ($this->checkUser() >= 1) {
            $view = "lucro_relatorio";
            $dados = array();
            $crudModel = new crud_db();
            $dados['financas'] = $crudModel->read('SELECT * FROM sig_lucro WHERE cod_cooperativa=:cod', array('cod' => $this->getCodCooperativa()));
            $valor_total = 0;
            if (!empty($dados['financas'])) {
                foreach ($dados['financas'] as $financa) {
                    $valor_total += doubleval($financa['valor']);
                }
            }
            $dados['valor_total'] = $valor_total;
            if (isset($_POST['nBuscar']) && !empty($_POST['nBuscar'])) {
                $campo_buscar = array();
                if (!empty($_POST['nDataInicial']) && !empty($_POST['nDatafinal'])) {
                    $dados['financas'] = $crudModel->read("SELECT * FROM sig_lucro WHERE cod_cooperativa=:cod AND data BETWEEN '" . $this->formatDateBD($_POST['nDataInicial']) . "' AND '" . $this->formatDateBD($_POST['nDatafinal']) . "'", array('cod' => $this->getCodCooperativa()));
                    $valor_total = 0;
                    foreach ($dados['financas'] as $financa) {
                        $valor_total += doubleval($financa['valor']);
                    }
                    $dados['valor_total'] = $valor_total;
                    $campo_buscar['data_inicial'] = $_POST['nDataInicial'];
                    $campo_buscar['data_final'] = $_POST['nDatafinal'];
                }
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "lucro_relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = isset($campo_buscar) ? $campo_buscar : null;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['financas'] = $dados['financas'];
                    $dadosPDF['valor_total'] = $dados['valor_total'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'entradas_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            }

            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas as despesas, podendo fazer a filtragem deste registro por periodo de data.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function despesas($page = 1) {
        if ($this->checkUser() >= 1) {
            $view = "despesa_relatorio";
            $dados = array();
            $crudModel = new crud_db();
            $dados['financas'] = $crudModel->read('SELECT * FROM sig_despesa WHERE cod_cooperativa=:cod', array('cod' => $this->getCodCooperativa()));
            $valor_total = 0;
            if (!empty($dados['financas'])) {
                foreach ($dados['financas'] as $financa) {
                    $valor_total += doubleval($financa['valor']);
                }
            }
            $dados['valor_total'] = $valor_total;
            if (isset($_POST['nBuscar']) && !empty($_POST['nBuscar'])) {
                $campo_buscar = array();
                if (!empty($_POST['nDataInicial']) && !empty($_POST['nDatafinal'])) {
                    $dados['financas'] = $crudModel->read("SELECT * FROM sig_despesa WHERE cod_cooperativa=:cod AND data BETWEEN '" . $this->formatDateBD($_POST['nDataInicial']) . "' AND '" . $this->formatDateBD($_POST['nDatafinal']) . "'", array('cod' => $this->getCodCooperativa()));
                    $valor_total = 0;
                    foreach ($dados['financas'] as $financa) {
                        $valor_total += doubleval($financa['valor']);
                    }
                    $dados['valor_total'] = $valor_total;
                    $campo_buscar['data_inicial'] = $_POST['nDataInicial'];
                    $campo_buscar['data_final'] = $_POST['nDatafinal'];
                }
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "despesa_relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = isset($campo_buscar) ? $campo_buscar : null;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['financas'] = $dados['financas'];
                    $dadosPDF['valor_total'] = $dados['valor_total'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'saidas_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            }

            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todas os investimento, podendo fazer a filtragem deste registro por periodo de data.
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function investimentos($page = 1) {
        if ($this->checkUser() >= 1) {
            $view = "investimento_relatorio";
            $dados = array();
            $crudModel = new crud_db();
            $dados['financas'] = $crudModel->read('SELECT * FROM sig_investimento WHERE cod_cooperativa=:cod', array('cod' => $this->getCodCooperativa()));
            $valor_total = 0;
            if (!empty($dados['financas'])) {
                foreach ($dados['financas'] as $financa) {
                    $valor_total += doubleval($financa['valor']);
                }
            }
            $dados['valor_total'] = $valor_total;
            if (isset($_POST['nBuscar']) && !empty($_POST['nBuscar'])) {
                $campo_buscar = array();
                if (!empty($_POST['nDataInicial']) && !empty($_POST['nDatafinal'])) {
                    $dados['financas'] = $crudModel->read("SELECT * FROM sig_investimento WHERE cod_cooperativa=:cod AND data BETWEEN '" . $this->formatDateBD($_POST['nDataInicial']) . "' AND '" . $this->formatDateBD($_POST['nDatafinal']) . "'", array('cod' => $this->getCodCooperativa()));
                    $valor_total = 0;
                    foreach ($dados['financas'] as $financa) {
                        $valor_total += doubleval($financa['valor']);
                    }
                    $dados['valor_total'] = $valor_total;
                    $campo_buscar['data_inicial'] = $_POST['nDataInicial'];
                    $campo_buscar['data_final'] = $_POST['nDatafinal'];
                }
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "investimento_relatorio_pdf";
                    $dadosPDF = array();
                    $crudModel = new crud_db();
                    $dadosPDF['busca'] = isset($campo_buscar) ? $campo_buscar : null;
                    $dadosPDF['cidade'] = $crudModel->read('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    $dadosPDF['cidade'] = $dadosPDF['cidade'][0];
                    $dadosPDF['financas'] = $dados['financas'];
                    $dadosPDF['valor_total'] = $dados['valor_total'];
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'investimentos_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            }

            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

    public function financeiro($page = 1) {
        if ($this->checkUser() >= 1) {
            $view = "financeiro_relatorio";
            $dados = array();
            $crudModel = new crud_db();
            //modo de exebicao
            $dados['modo_exibicao'] = 1;
            $dados['lucro'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_lucro WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
            $dados['despesa'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_despesa WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
            $dados['investimento'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_investimento WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
            $dados['valorTotalGrafico'] = doubleval($dados['lucro']['valor']) - (doubleval($dados['despesa']['valor']) + doubleval($dados['investimento']['valor']));

            if (isset($_POST['nBuscar']) && !empty($_POST['nBuscar'])) {
                $campo_buscar = array();
                $campo_buscar['data_inicial'] = $this->formatDateView(date('o-m-01'));
                $campo_buscar['data_final'] = $this->formatDateView(date('o-m-31'));
                $campo_buscar['modo_exibicao'] = $dados['modo_exibicao'];
                $dados['modo_exibicao'] = $_POST['nModoExibicao'];
                if ($dados['modo_exibicao'] == 2) {
                    $dados['financas']['lucro'] = $crudModel->read('SELECT * FROM sig_lucro WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
                    $dados['financas']['despesa'] = $crudModel->read('SELECT * FROM sig_despesa WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
                    $dados['financas']['investimento'] = $crudModel->read('SELECT * FROM sig_investimento WHERE cod_cooperativa=:cod AND data BETWEEN "' . date('o-m-01') . '" AND "' . date('o-m-31') . '"', array('cod' => $this->getCodCooperativa()));
                }
                if (!empty($_POST['nDataInicial']) && !empty($_POST['nDatafinal'])) {
                    $dados['lucro'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_lucro WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                    $dados['despesa'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_despesa WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                    $dados['investimento'] = $crudModel->read_specific('SELECT SUM(valor) as valor FROM sig_investimento WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                    $dados['valorTotalGrafico'] = doubleval($dados['lucro']['valor']) - (doubleval($dados['despesa']['valor']) + doubleval($dados['investimento']['valor']));
                    if ($dados['modo_exibicao'] == 2) {
                        $dados['financas']['lucro'] = $crudModel->read('SELECT * FROM sig_lucro WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                        $dados['financas']['despesa'] = $crudModel->read('SELECT * FROM sig_despesa WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                        $dados['financas']['investimento'] = $crudModel->read('SELECT * FROM sig_investimento WHERE cod_cooperativa=:cod AND data BETWEEN "' . $this->formatDateBD($_POST['nDataInicial']) . '" AND "' . $this->formatDateBD($_POST['nDatafinal']) . '"', array('cod' => $this->getCodCooperativa()));
                    }
                    $campo_buscar['data_inicial'] = $_POST['nDataInicial'];
                    $campo_buscar['data_final'] = $_POST['nDatafinal'];
                    $campo_buscar['modo_exibicao'] = $dados['modo_exibicao'];
                }
                if ($_POST['nModoPDF'] == 1) {
                    $viewPDF = "financeiro_relatorio_pdf";
                    $dadosPDF = array();
                    $dadosPDF['busca'] = isset($campo_buscar) ? $campo_buscar : null;
                    $dadosPDF['modo_exibicao'] = $dados['modo_exibicao'];

                    if ($dados['modo_exibicao'] == 2) {
                        $dadosPDF['financas']['lucro'] = $dados['financas']['lucro'];
                        $dadosPDF['financas']['despesa'] = $dados['financas']['despesa'];
                        $dadosPDF['financas']['investimento'] = $dados['financas']['investimento'];
                    }

                    $dadosPDF['lucro'] = $dados['lucro'];
                    $dadosPDF['despesa'] = $dados['despesa'];
                    $dadosPDF['investimento'] = $dados['investimento'];


                    $lucro = !empty($dadosPDF['lucro']) ? $dadosPDF['lucro']['valor'] : 0;
                    $despesa = !empty($dadosPDF['despesa']) ? $dadosPDF['despesa']['valor'] : 0;
                    $investimento = !empty($dadosPDF['investimento']) ? $dadosPDF['investimento']['valor'] : 0;

                    $dadosPDF['valor_total'] = $lucro - ($despesa + $investimento);

                    $this->financaGraph($lucro, $despesa, $investimento);

                    $dadosPDF['cidade'] = $crudModel->read_specific('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
                    ob_start();
                    $this->loadView($viewPDF, $dadosPDF);
                    $html = ob_get_contents();
                    ob_end_clean();
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
                    $mpdf->WriteHTML($html);
                    $arquivo = 'financas_' . date('d_m_Y.') . 'pdf';
                    $mpdf->Output($arquivo, 'D');
                }
            }

            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }
    private function financaGraph($lucro, $despesa, $investimento) {
        require_once ('lib/jpgraph/src/jpgraph.php');
        require_once ('lib/jpgraph/src/jpgraph_bar.php');

        $datay = array($lucro, $despesa, $investimento);
        $file = 'uploads/financeiro/imagem.png';
        if (file_exists($file)) {
            unlink($file);
        }
        // Size of graph
        $width = 400;
        $height = 160;

        // Set the basic parameters of the graph
        $graph = new Graph($width, $height);
        $graph->clearTheme();
        $graph->SetScale('textlin');

        $top = 30;
        $bottom = 20;
        $left = 100;
        $right = 40;
        $graph->Set90AndMargin($left, $right, $top, $bottom);

        // Nice shadow
        $graph->SetShadow();

        // Setup labels
        $lbl = array("Entradas", "Saídas", "Investimentos");
        $graph->xaxis->SetTickLabels($lbl);

        // Label align for X-axis
        $graph->xaxis->SetLabelAlign('right', 'center', 'right');

        // Label align for Y-axis
        $graph->yaxis->SetLabelAlign('center', 'bottom');

        // Create a bar pot
        $bplot = new BarPlot($datay);
        $bplot->SetColor("black");
        $bplot->SetFillColor(array('#56d798', '#f38b4a', '#dd4b39'));
        $bplot->SetWidth(0.5);
        $bplot->SetYMin(0);

        $graph->Add($bplot);
        $graph->Stroke($file);
    }

}
