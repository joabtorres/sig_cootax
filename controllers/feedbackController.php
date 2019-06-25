<?php

class feedbackController extends controller {

    public function index() {
        if ($this->checkUser() >= 1) {
            $viewName = "feedback";
            $dados = array();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                if (!empty($_POST['nDescricao'])) {
                    $cruddb = new usuario();
                    $usuario = $cruddb->read_specific("SELECT * FROM sig_usuario WHERE cod_usuario=:cod", array('cod' => $_SESSION['usuario_sig_cootax']['cod']));
                    $email = array(
                        'nome' => $usuario['nome_usuario'] . ' ' . $usuario['sobrenome_usuario'],
                        'email' => $usuario['email_usuario'],
                        'mensagem' => $_POST['nDescricao']
                    );
                    if ($this->email($email)) {
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
                    } else {
                         $dados['erro'] = array('class' => 'alert-danger', 'msg' => "ERRO NO ENVIO DO E-MAIL!");
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Informe uma descrição!");
                }
            }
            $this->loadTemplate($viewName, $dados);
        }
    }

    private function email($mensagem) {
        $assunto = 'Feedback de - ' . $mensagem['nome'];
        $destinatario = 'contato@cootax.com.br';
        $mensagem = '<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<title>' . $assunto . '</title>
			</head>
			<body>
				<div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: sans-serif, Arial;border : 2px solid #357ca5;">
				<h3 style="background: #357ca5;color: white;padding: 10px;margin: 0;">' . $assunto . '</h3>
					<p style="padding: 10px;line-height: 30px;">
                                            DE: <b>' . $mensagem['nome'] . '</b> <br/>
                                            DE: <b>' . $mensagem['email'] . '</b> <br/>
                                            Mensagem: <br/>' . $mensagem['mensagem'] . '
					</p>
				</div>
			</body>
			</html>';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $assunto . ' <contato@cootax.com.br>' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        if (mail($destinatario, $assunto, $mensagem, $headers)) {
            return true;
        } else {
            return false;
        }
    }

}

?>