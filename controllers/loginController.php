<?php

/**
 * A classe 'loginController' é responsável por fazer validação de login para que tenha acesso ao sistema, podendo verifica se o e-mail e valido e exibindo a opção de recupera senha, 
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe loginController
 */
class loginController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel por carrega a view  presente no diretorio views/login.php, além disso, ela faz validações de usuário, tenha digitado corretamento todos os campos do login e o usuário esteja registrado no banco será criado um array $_SESSION['usuario_sig_cootax'] com os seguintes dados: nome, url da foto, nível de acesso e usuário ativo e chama a função recupera,caso usuário deseja recupera a senha.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com
     */
    public function index() {
        $view = "login";
        $dados = array();
        $_SESSION = array();
        if (isset($_POST['nEntrar']) && !empty($_POST['nEntrar'])) {
            //recaptcha validando
            /*$captcha_data = $_POST['g-recaptcha-response'];

            if ($captcha_data != '') {
                $secreto = '6LfoeUwUAAAAAEwDAsbWlmlkZZkrrrj4m98BlVGZ';
                $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secreto . "&response=" . $captcha_data . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                $resposta = json_decode($var, true);
            }

            if ($resposta['success']) {
                if (!empty($_POST['nSerachUsuario']) && !empty($_POST['nSearchSenha'])) {

                    $usuario = array('usuario' => addslashes($_POST['nSerachUsuario']), 'senha' => md5(sha1($_POST['nSearchSenha'])));
                    $dominio = strstr($usuario['usuario'], '@');
                    $usuarioModel = new usuario();
                    if ($dominio) {
                        $resultado = $usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE email_usuario=:usuario AND senha_usuario=:senha AND status_usuario = 1', $usuario);
                        if (!$resultado) {
                            $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha está incorreto!';
                        }
                    } else {
                        $resultado = $usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE usuario_usuario=:usuario AND senha_usuario=:senha AND status_usuario = 1', $usuario);
                        if (!$resultado) {
                            $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha está incorreto!';
                        }
                    }
                    if (!isset($dados['erro']) && empty($dados['erro'])) {
                        //inicando sessao
                        $_SESSION['usuario_sig_cootax'] = array();
                        //codigo
                        $_SESSION['usuario_sig_cootax']['cod'] = $resultado['cod_usuario'];
                        //cod cooperativa
                        $_SESSION['usuario_sig_cootax']['cod_cooperativa'] = $resultado['cod_cooperativa'];
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
                        header("location: /home");
                    }
                } else {
                    $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha não está preenchido!';
                }
            } else {
                $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> reCAPTCHA não foi selecionado!';
            }*/
            if (!empty($_POST['nSerachUsuario']) && !empty($_POST['nSearchSenha'])) {

                $usuario = array('usuario' => addslashes($_POST['nSerachUsuario']), 'senha' => md5(sha1($_POST['nSearchSenha'])));
                $dominio = strstr($usuario['usuario'], '@');
                $usuarioModel = new usuario();
                if ($dominio) {
                    $resultado = $usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE email_usuario=:usuario AND senha_usuario=:senha AND status_usuario = 1', $usuario);
                    if (!$resultado) {
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha está incorreto!';
                    }
                } else {
                    $resultado = $usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE usuario_usuario=:usuario AND senha_usuario=:senha AND status_usuario = 1', $usuario);
                    if (!$resultado) {
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha está incorreto!';
                    }
                }
                if (!isset($dados['erro']) && empty($dados['erro'])) {
                    //inicando sessao
                    $_SESSION['usuario_sig_cootax'] = array();
                    //codigo
                    $_SESSION['usuario_sig_cootax']['cod'] = $resultado['cod_usuario'];
                    //cod cooperativa
                    $_SESSION['usuario_sig_cootax']['cod_cooperativa'] = $resultado['cod_cooperativa'];
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
                    header("location: /home");
                }
            } else {
                $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário ou Senha não está preenchido!';
            }
        }
        $this->loadView($view, $dados);

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

    /**
     * Está função verifica se o usuário está cadastrado no sistema, se ele estive será criado uma nova senha e enviado para o respectivo email
     * @return bollean 
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     * 
     */
    private function recuperar($email) {
        $usuarioModel = new usuario();
        $senha = $usuarioModel->newpassword($email);
        if ($senha) {
            // envia email ao usuário
            $assunto = 'Sistema de Informacao Gerencial - Nova Senha';
            $destinatario = $email;
            $mensagem = '<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<title>' . $assunto . '</title>
			</head>
			<body>
				<div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: sans-serif, Arial;border : 2px solid #357ca5;">
				<h3 style="background: #357ca5;color: white;padding: 10px;margin: 0;">Nova Senha! <br/> <small>' . $assunto . '</small></h3>
					<p style="padding: 10px;line-height: 30px;">
                                            Você solicitou uma nova senha de acesso ao <b>SIG</b> (' . $assunto . '), confira abaixo sua nova senha de acesso: <br/>
                                            <span style="font-weight:bold">Email: </span><span style="color: #357ca5;">' . $email . '</span><br/>
                                            <span style="font-weight:bold">Nova Senha: </span> <span style="color: #357ca5;">' . $senha . '</span><br/>
                                                 <a href="' . BASE_URL . '" style="text-decoration: none;">Carregar Página</a>
					</p>
				</div>
			</body>
			</html>';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: ' . $assunto . ' <contato@kananda.imb.br>' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            mail($destinatario, $assunto, $mensagem, $headers);
            return true;
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

}
