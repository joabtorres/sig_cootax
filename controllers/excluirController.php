<?php

/**
 * A classe 'excluirrController' é responsável para fazer o gerenciamento na exclusão  de cooperados, historico, mensalidade, lucro, despesa, investimento e usuario
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe excluirController
 */
class excluirController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é chama a função cooperado();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index($cod_cooperado) {
        $this->cooperado($cod_cooperado);
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de excluir no cooperado.
     * @param int $cod _cooperado- código do cooperado registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function cooperado($cod_cooperado) {
        if ($this->checkUser() >= 3 && intval($cod_cooperado) > 0) {
            $coopeadoModel = new cooperado();
            $cooperado = $coopeadoModel->read('SELECT * FROM sig_cooperado WHERE cod_cooperado =:cod', array('cod' => addslashes($cod_cooperado)));
            $cooperado = $cooperado[0];
            $coopeadoModel->delete_image($cooperado['imagem']);
            $coopeadoModel->remove("DELETE FROM sig_cooperado WHERE cod_cooperado=:cod", array('cod' => addslashes($cod_cooperado)));
            $_SESSION['cooperado_categoria'] = array();
            $_SESSION['cooperado_status'] = array();
            header("Location: /relatorio/cooperados");
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de excluir históricos do cooperado.
     * @access public
     * @param int $cod_cooperado - código do historico registrada no banco
     * @param int $cod - código do historico registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function historico($cod_cooperado, $cod) {
        if ($this->checkUser() >= 3 && intval($cod) > 0) {
            $crudModel = new crud_db();
            $removeFinanca = $crudModel->remove("DELETE FROM sig_cooperado_historico WHERE cod_historico=:cod", array('cod' => addslashes($cod)));
            if ($removeFinanca) {
                header("Location: /cooperado/index/" . $cod_cooperado);
            }
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de excluir mensalidade do cooperado.
     * @access public
     * @param int $cod_cooperado - código do cooperado registrada no banco
     * @param int $cod - código da mensalidade registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function mensalidade($cod_cooperado, $cod) {
        if ($this->checkUser() >= 3 && intval($cod) > 0) {
            $crudModel = new crud_db();
            $removeFinanca = $crudModel->remove("DELETE FROM sig_cooperado_mensalidade WHERE cod_mensalidade=:cod", array('cod' => addslashes($cod)));
            if ($removeFinanca) {
                header("Location: /cooperado/index/" . $cod_cooperado);
            }
        } else {
            header("Location: /home");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de edotar um lucro da cooperativa.
     * @param int $cod - código do lucro registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function lucro($cod) {
        if ($this->checkUser() >= 3 && intval($cod) > 0) {
            $crudModel = new crud_db();
            $removeFinanca = $crudModel->remove("DELETE FROM sig_lucro WHERE cod=:cod", array('cod' => addslashes($cod)));
            if ($removeFinanca) {
                $_SESSION['financa_atual'] = array();
                header("Location: /relatorio/lucros");
            }
        } else {
            header("Location: /relatorio/lucros");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de excluir uma despesa da cooperativa.
     * @param int $cod - código do despesa registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function despesa($cod) {
        if ($this->checkUser() >= 3 && intval($cod) > 0) {
            $crudModel = new crud_db();
            $removeFinanca = $crudModel->remove("DELETE FROM sig_despesa WHERE cod=:cod", array('cod' => addslashes($cod)));
            if ($removeFinanca) {
                $_SESSION['financa_atual'] = array();
                header("Location: /relatorio/despesas");
            }
        } else {
            header("Location: /relatorio/investimentos");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de excluir um investimento da cooperativa.
     * @param int $cod - código do investimento registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function investimento($cod) {
        if ($this->checkUser() >= 3 && intval($cod) > 0) {
            $crudModel = new crud_db();
            $removeFinanca = $crudModel->remove("DELETE FROM sig_investimento WHERE cod=:cod", array('cod' => addslashes($cod)));
            if ($removeFinanca) {
                $_SESSION['financa_atual'] = array();
                header("Location: /relatorio/investimentos");
            }
        } else {
            header("Location: /relatorio/investimentos");
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controle nas ações de excluir usuario.
     * @param int $cod_usuario - código do usuario registrada no banco
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function usuario($cod_usuario) {
        if ($this->checkUser() >= 3 && intval($cod_usuario) > 0) {
            $usuarioModel = new usuario();
            $usuarioModel->remove(array('cod' => addslashes($cod_usuario)));
            header("Location: /usuario/index");
        } else {
            header("Location: /usuario/index");
        }
    }

}
