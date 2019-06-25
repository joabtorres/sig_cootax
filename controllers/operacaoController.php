<?php

/**
 * A classe 'operacaoController' é responsável para fazer o carregamento das views relacionado a operaçoes como gera carteira, recibo_taxi, carne da mensalidade, e cartao de vista.
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe operacaoController
 */
class operacaoController extends controller {

    public function index($cod_cooperado) {
        $this->carteira($cod_cooperado);
    }

    public function carteira($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'carteira_pdf';
            $crudModel = new crud_db();
            $dados['cidade'] = $crudModel->read_specific("SELECT * FROM sig_cooperativa WHERE cod=:cod", array('cod' => $this->getCodCooperativa()));
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.*, vei.nz, cart.data_inicial, cart.data_validade FROM sig_cooperado AS coop INNER JOIN sig_cooperado_veiculo AS vei INNER JOIN sig_cooperado_carteira AS cart WHERE coop.cod_cooperado=vei.cod_cooperado AND coop.cod_cooperado=cart.cod_cooperado AND coop.cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            if (!empty($dados['cidade']) && !empty($dados['cooperado'])) {
                $this->loadView($viewName, $dados);
            } else {
                header("Location: /home");
            }
        }else{
            header("Location: /home");
        }
    }

    public function recibo_taxi($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'recibo_taxi_pdf';
            $crudModel = new crud_db();
            $dados['cidade'] = $crudModel->read_specific("SELECT * FROM sig_cooperativa WHERE cod=:cod", array('cod' => $this->getCodCooperativa()));
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.nome_completo,coop.cpf, coop.cod_cooperado, vei.nz, vei.placa, con.celular_1 FROM sig_cooperado AS coop INNER JOIN sig_cooperado_veiculo AS vei INNER JOIN sig_cooperado_contato AS con WHERE coop.cod_cooperado=vei.cod_cooperado AND coop.cod_cooperado=con.cod_cooperado AND coop.cod_cooperado=:cod', array('cod' => addslashes($cod_cooperado)));
            if (!empty($dados['cidade']) && !empty($dados['cooperado'])) {
                $this->loadView($viewName, $dados);
            } else {
                header("Location: /home");
            }
        }else{
            header("Location: /home");
        }
    }

    public function recibo_mensalidade($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'mensalidade_recibo';
            $crudModel = new crud_db();
            $dados['cooperado'] = $crudModel->read('SELECT coop.cod_cooperado, coop.nome_completo, vei.nz FROM sig_cooperado as coop INNER JOIN sig_cooperado_veiculo as vei WHERE coop.cod_cooperado=vei.cod_cooperado AND coop.cod_cooperado=:cod', array('cod' => $cod_cooperado));
            $dados['cooperado']['cooperado'] = $dados['cooperado'][0];

            //buscar
            if (isset($_POST['nSalvar'])) {
                if (!empty($_POST['nValor']) && !empty($_POST['nAno'])) {
                    $recibo = array(
                        'cooperado' => $dados['cooperado']['cooperado']['nome_completo'],
                        'nz' => $dados['cooperado']['cooperado']['nz'],
                        'ano' => $_POST['nAno'],
                        'valor' => $_POST['nValor'],
                        'mes_inicial' => $_POST['nDe'],
                        'mes_final' => $_POST['nAte'],
                    );
                    $viewNamePDF = 'mensalidade_recibo_pdf';
                    $dadosPDF = array('recibo' => $recibo);
                    $this->loadView($viewNamePDF, $dadosPDF);
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios!");
                }
            }

            $this->loadTemplate($viewName, $dados);
        }else{
            header("Location: /home");
        }
    }

    public function cartao_visita($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'cartao_visita';
            $crudModel = new crud_db();
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.apelido, con.celular_1, con.celular_2 FROM sig_cooperado AS coop INNER JOIN sig_cooperado_contato as con WHERE coop.cod_cooperado=con.cod_cooperado AND coop.cod_cooperado=:cod', array('cod' => $cod_cooperado));
            $this->loadView($viewName, $dados);
        }else{
            header("Location: /home");
        }
    }
}
