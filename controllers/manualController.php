<?php

/**
 * A classe "manualController"' é responsável para fazer o carregamento da manual do sistema
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2018, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe manualController
 */
class manualController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para carregar a view "manual.php";
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        if ($this->checkUser() >= 1) {
            $view = "manual";
            $dados = array();
            $this->loadTemplate($view, $dados);
        }else{
            header("Location: /home");
        }
    }

}
