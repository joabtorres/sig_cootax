<?php

/**
 * A classe 'homeController' é responsável para fazer o carregamento da página home do sistema
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe homeController
 */
class homeController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel por carrega a view  presente no diretorio views/home.php, desde que o usuário esteja logado no sistema
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        if ($this->checkUser() >= 1) {
            $view = "home";
            $dados = array();
            $crudModel = new crud_db();
            $dados['financa'] = $this->checkFinancaAtual();
            $dados['cooperado_tipo'] = $this->checkCategoriaCooperado();
            $dados['cooperado_status'] = $this->checkStatusCooperado();
            $dados['cooperativa'] = $crudModel->read("SELECT * FROM sig_cooperativa WHERE cod=:cod", array('cod' => $this->getCodCooperativa()));
            $dados['cooperativa'] = $dados['cooperativa'][0];
            $this->loadTemplate($view, $dados);
        } else {
            $_SESSION = array();
            header('location: /login');
        }
    }

}
