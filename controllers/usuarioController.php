<?php

/**
 * A classe 'usuarioController' é responsável para fazer o carregamento da view/usuarios-lista.php
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe usuarioController
 */
class usuarioController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável para mostra todos os usuários registrados, com opção de buscar, usuário especifico.
     * 
     * OBS: Usuário cargo "Gerente do Núcleo" mostra somente usuário do seu núcleo e cargo Adminstradores do Sistema, exibi todos usuários.
     * 
     * @param int $page - paginação
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index($page = 1) {
        if ($this->checkUser()) {
            $view = "usuario_listar";
            $dados = array();
            $usuarioModel = new usuario();
            //consulta todos os usuários pertencente ao respecito núcleo
            $resultado_usuario = $usuarioModel->read('SELECT * FROM sig_usuario WHERE cod_cooperativa=:cod_cooperativa;', array('cod_cooperativa' => $this->getCodCooperativa()));
            if ($resultado_usuario) {
                $dados['usuarios'] = $resultado_usuario;
            }
            //PESQUISAR USUÁRIO
            if (isset($_POST['nBuscar'])) {
                $filtra_por = addslashes($_POST['nSelectBuscar']);
                $campo = addslashes($_POST['nCampo']);
                if ($filtra_por == "Código") {
                    $dados['usuarios'] = $usuarioModel->read('SELECT * FROM sig_usuario WHERE cod_cooperativa=:cod_coperativa AND cod_usuario LIKE :cod', array('cod_coperativa' => $this->getCodCooperativa(), 'cod' => "%" . $campo . "%"));
                } else {
                    $dados['usuarios'] = $usuarioModel->read('SELECT * FROM sig_usuario WHERE cod_cooperativa=:cod_coperativa AND email_usuario LIKE :campo', array('cod_coperativa' => $this->getCodCooperativa(), 'campo' => "%" . $campo . "%"));
                }
                $_POST = array();
            }
            $this->loadTemplate($view, $dados);
            //criando nova senha
            if (isset($_POST['nEnviar'])) {
                $email = addslashes(trim($_POST['nEmail']));
                $_POST = null;
                if ($this->validar_email($email) && $this->recuperar($email)) {
                    echo '<script>$("#modal_confirmacao_email").modal();</script>';
                } else {
                    echo '<script>$("#modal_invalido_email").modal();</script>';
                }
            }
        }
    }

    /**
     * Está função verifica se o usuário está cadastrado no sistema, se ele estive será criado uma nova senha e enviado para o respectivo email
     * @return bollean 
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     * 
     */
    private function recuperar($email) {
        if ($this->checkUser() != 4) {
            $usuarioModel = new usuario();
            $senha = $usuarioModel->newpassword($email);
            if ($senha) {
                // envia email ao usuário
                $assunto = 'Sistema de Informação Gerencial de Cooperativa de Táxi';
                $destinatario = $email;
                $mensagem = '<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<title>' . $assunto . '</title>
			</head>
			<body>
				<div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: sans-serif, Arial;border : 2px solid #357ca5;">
				<h3 style="background: #357ca5;color: white;padding: 10px;margin: 0;">Nova Senha! <br/> <small>' . $assunto . ' - Nova Senha</small></h3>
					<p style="padding: 10px;line-height: 30px;">
                                            Você solicitou uma nova senha de acesso ao <b>SIGCOOT</b> (' . $assunto . '), confira abaixo sua nova senha de acesso: <br/>
                                            <span style="font-weight:bold">Email: </span><span style="color: #357ca5;">' . $email . '</span><br/>
                                            <span style="font-weight:bold">Nova Senha: </span> <span style="color: #357ca5;">' . $senha . '</span><br/>
                                                 <a href="' . BASE_URL . '" style="text-decoration: none;">Carregar Página</a>
					</p>
				</div>
			</body>
			</html>';
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $headers .= 'From: ' . $assunto . ' <contato@cootax.com.br>' . "\r\n";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                mail($destinatario, $assunto, $mensagem, $headers);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Está função verifica  se o e-mail do usuário é valido, ou seja, se seu servido de email existe.
     * @param String $email
     * @return bollean 
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    private function validar_email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($usuario, $dominio) = explode("@", $email);
            if (checkdnsrr($dominio, 'MX')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável desloga o usuário do sistema, limpando a $_SESSION['user_sgl']
     * 
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function sair() {
        if (isset($_SESSION['usuario_sig_cootax'])) {
            $_SESSION = array();
            header('Location: /login');
        }
    }

}
