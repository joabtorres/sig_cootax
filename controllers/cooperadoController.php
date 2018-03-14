<?php

/**
 * A classe 'unidadeController' é responsável para fazer o carregamento da unidade de forma detalhada
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe unidadeController
 */
class cooperadoController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel por carrega a view  presente no diretorio views/cooperado_detalhe.php com seus respectivos dados;
     * @param int $cod_unidade - código da unidade
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index($cod_cooperado) {
        if ($this->checkUser()>=2 && intval($cod_cooperado) > 0) {
            $view = "cooperado_detalhado";
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
            $dados['cooperado']['mensalidades'] = $cooperadoModel->read('SELECT * FROM sig_cooperado_mensalidade WHERE cod_cooperado=:cod ORDER BY ano ASC', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['historicos'] = $cooperadoModel->read('SELECT *, usuario.usuario_usuario as usuario FROM sig_cooperado_historico as historico INNER JOIN sig_usuario as usuario WHERE historico.cod_usuario=usuario.cod_usuario and historico.cod_cooperado=:cod ORDER BY historico.cod_historico DESC', array('cod' => addslashes($cod_cooperado)));
            $this->loadTemplate($view, $dados);
        }else{
            header('Location: /home');
        }
    }

}
