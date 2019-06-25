<?php

class cootaxiappController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para carregar a view "lista_motoristas.php";
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        if ($this->checkUser() >= 3) {
            $view = "cootaxiapp_motorista_relatorios";
            $dados = array();
            $this->loadTemplate($view, $dados);
        } else {
            header("Location: /home");
        }
    }

}
