<?php

/**
 * A classe 'cooperado' é responsável para efetiva comandos sql no banco de dados, como, insert, update, select, delete, count;
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2018, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package models
 * @example classe cooperado
 */
class cooperado extends model {

    /**
     * String $numRows - referente q quantidade de linhas obtidas no select;
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    private $numRows;

    /**
     * Está função tem como objetivo retorna a quantidade de registro encontrados armazenados na variavel $numRows
     * @access public
     * @return int
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function getNumRows() {
        return 0;
    }

    /**
     * Está função é responsável para cadastrar novos registros;
     * @param String $sql_command  - Comando SQL;
     * @param Array $data - Dados salvo em array para seres setados por um foreach;
     * @access public
     * @return boolean 
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function create($data) {
        try {
            $sql = $this->db->prepare('INSERT INTO sig_cooperado (cod_cooperado, cod_cooperativa, tipo, status, apelido, nome_completo, cpf, rg, cnh, cat, inss, estado_civil, nacionalidade, genero, data_nascimento, data_inscricao, pai, mae, conjugue, filhos, imagem) VALUES  (:cod_cooperado, :cod_cooperativa, :tipo, :status, :apelido, :nome_completo, :cpf, :rg, :cnh, :cat, :inss, :estado_civil, :nacionalidade, :genero, :data_nascimento, :data_inscricao, :pai, :mae, :conjugue, :filhos, :imagem)');
            $sql->bindValue(":cod_cooperado", $data['cooperado']['cod_cooperado']);
            $sql->bindValue(":cod_cooperativa", $data['cooperado']['cod_cooperativa']);
            $sql->bindValue(":tipo", $data['cooperado']['tipo']);
            $sql->bindValue(":status", $data['cooperado']['status']);
            $sql->bindValue(":apelido", $data['cooperado']['apelido']);
            $sql->bindValue(":nome_completo", $data['cooperado']['nome_completo']);
            $sql->bindValue(":cpf", $data['cooperado']['cpf']);
            $sql->bindValue(":rg", $data['cooperado']['rg']);
            $sql->bindValue(":cnh", $data['cooperado']['cnh']);
            $sql->bindValue(":cat", $data['cooperado']['cat']);
            $sql->bindValue(":inss", $data['cooperado']['inss']);
            $sql->bindValue(":estado_civil", $data['cooperado']['estado_civil']);
            $sql->bindValue(":nacionalidade", $data['cooperado']['nacionalidade']);
            $sql->bindValue(":genero", $data['cooperado']['genero']);
            $sql->bindValue(":data_nascimento", $data['cooperado']['data_nascimento']);
            $sql->bindValue(":data_inscricao", $data['cooperado']['data_inscricao']);
            $sql->bindValue(":pai", $data['cooperado']['pai']);
            $sql->bindValue(":mae", $data['cooperado']['mae']);
            $sql->bindValue(":conjugue", $data['cooperado']['conjugue']);
            $sql->bindValue(":filhos", $data['cooperado']['filhos']);
            $sql->bindValue(":imagem", $data['cooperado']['imagem']);
            //endereço
            $sql->execute();
            $sql = $this->db->prepare('INSERT INTO sig_cooperado_endereco (cod_cooperado, logradouro, numero, bairro, complemento, cidade, estado, cep) VALUES (:cod_cooperado, :logradouro, :numero, :bairro, :complemento, :cidade, :estado, :cep);');
            foreach ($data['endereco'] as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
            }
            $sql->execute();
            //contato
            $sql = $this->db->prepare('INSERT INTO sig_cooperado_contato (cod_cooperado, celular_1, celular_2, email) VALUES (:cod_cooperado, :celular_1, :celular_2, :email);');
            foreach ($data['contato'] as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
            }
            $sql->execute();
            //veiculo
            $sql = $this->db->prepare('INSERT INTO sig_cooperado_veiculo (cod_cooperado, nz, veiculo, cor, placa, ano_modelo) VALUES (:cod_cooperado, :nz, :veiculo, :cor, :placa, :ano_modelo)');
            foreach ($data['veiculo'] as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
            }
            $sql->execute();
            //carteira
            $sql = $this->db->prepare('INSERT INTO sig_cooperado_carteira (cod_cooperado, data_inicial, data_validade) VALUES (:cod_cooperado, :data_inicial, :data_validade)');
            foreach ($data['carteira'] as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
            }
            $sql->execute();
            return true;
        } catch (PDOException $ex) {
            echo '<script>alert("' . $ex->getMessage() . '")</script>';
        }
    }

    /**
     * Está função é responsável para consultas no banco e retorna os resultados obtidos;
     * @param String $sql_command  - Comando SQL;
     * @param Array $data - Dados salvo em array para seres setados por um foreach;
     * @access public
     * @return array $sql->fetchAll() [caso encontre] | bollean FALSE [caso contrário] 
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function read($sql_command, $data = array()) {
        if (!empty($data)) {
            $sql = $this->db->prepare($sql_command);
            foreach ($data as $indice => $valor) {
                $sql->bindValue(":" . $indice, $valor);
            }
            $sql->execute();
        } else {
            $sql = $this->db->query($sql_command);
        }
        if ($sql->rowCount() > 0) {
            $this->numRows = $sql->rowCount();
            return $sql->fetchAll();
        } else {
            $this->numRows = 0;
            return FALSE;
        }
    }

    /**
     * Está função é responsável para altera um registro específico;
     * @param String $sql_command  - Comando SQL;
     * @param Array $data - Dados salvo em array para seres setados por um foreach;
     * @access public
     * @return bollean TRUE ou FALSE
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function update($data) {
        $sql = $this->db->prepare('UPDATE sig_cooperado SET cod_cooperativa=:cod_cooperativa, tipo=:tipo, status=:status, apelido=:apelido, nome_completo=:nome_completo, cpf=:cpf, rg=:rg, cnh=:cnh, cat=:cat,inss=:inss, estado_civil=:estado_civil, nacionalidade=:nacionalidade, genero=:genero, data_nascimento=:data_nascimento, data_inscricao= :data_inscricao, pai=:pai, mae=:mae, conjugue=:conjugue, filhos=:filhos, imagem=:imagem WHERE cod_cooperado=:cod_cooperado');
        $sql->bindValue(":cod_cooperativa", $data['cooperado']['cod_cooperativa']);
        $sql->bindValue(":tipo", $data['cooperado']['tipo']);
        $sql->bindValue(":status", $data['cooperado']['status']);
        $sql->bindValue(":apelido", $data['cooperado']['apelido']);
        $sql->bindValue(":nome_completo", $data['cooperado']['nome_completo']);
        $sql->bindValue(":cpf", $data['cooperado']['cpf']);
        $sql->bindValue(":rg", $data['cooperado']['rg']);
        $sql->bindValue(":cnh", $data['cooperado']['cnh']);
        $sql->bindValue(":cat", $data['cooperado']['cat']);
        $sql->bindValue(":inss", $data['cooperado']['inss']);
        $sql->bindValue(":estado_civil", $data['cooperado']['estado_civil']);
        $sql->bindValue(":nacionalidade", $data['cooperado']['nacionalidade']);
        $sql->bindValue(":genero", $data['cooperado']['genero']);
        $sql->bindValue(":data_nascimento", $data['cooperado']['data_nascimento']);
        $sql->bindValue(":data_inscricao", $data['cooperado']['data_inscricao']);
        $sql->bindValue(":pai", $data['cooperado']['pai']);
        $sql->bindValue(":mae", $data['cooperado']['mae']);
        $sql->bindValue(":conjugue", $data['cooperado']['conjugue']);
        $sql->bindValue(":filhos", $data['cooperado']['filhos']);
        $sql->bindValue(":imagem", $data['cooperado']['imagem']);
        $sql->bindValue(":cod_cooperado", $data['cooperado']['cod_cooperado']);
        //endereço
        $sql->execute();
        $sql = $this->db->prepare('UPDATE sig_cooperado_endereco SET cod_cooperado=:cod_cooperado, logradouro=:logradouro, numero=:numero, bairro=:bairro, complemento=:complemento, cidade=:cidade, estado=:estado, cep=:cep WHERE cod_endereco=:cod_endereco');
        foreach ($data['endereco'] as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();
        //contato
        $sql = $this->db->prepare('UPDATE sig_cooperado_contato SET cod_cooperado=:cod_cooperado, celular_1=:celular_1, celular_2=:celular_2, email =:email WHERE cod_contato=:cod_contato');
        foreach ($data['contato'] as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();
        //veiculo
        $sql = $this->db->prepare('UPDATE sig_cooperado_veiculo SET cod_cooperado=:cod_cooperado, nz=:nz, veiculo=:veiculo, cor=:cor, placa=:placa, ano_modelo=:ano_modelo WHERE cod_veiculo=:cod_veiculo');
        foreach ($data['veiculo'] as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();
        //carteira
        $sql = $this->db->prepare('UPDATE sig_cooperado_carteira SET cod_cooperado=:cod_cooperado, data_inicial=:data_inicial, data_validade=:data_validade WHERE cod=:cod');
        foreach ($data['carteira'] as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();
        return true;
    }

    /**
     * Está é responsável excluir um registro específico
     * @param String $sql_command  - Comando SQL;
     * @param Array $data - Dados salvo em array para seres setados por um foreach;
     * @access public
     * @return boolean TRUE or FALSE
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function remove($sql_command, $data) {
        $sql = $this->db->prepare($sql_command);
        foreach ($data as $indice => $valor) {
            $sql->bindValue(":" . $indice, $valor);
        }
        $sql->execute();
        return true;
    }

    /**
     * Está função é responsável para salva uma imágem no diretório uploads/cooperados/
     * @access public
     * @return boolean TRUE or FALSE
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function save_image($file) {
        $imagem = array();
        $largura = 150;
        $altura = 200;
        $imagem['temp'] = $file['tmp_name'];
        $imagem['extensao'] = explode(".", $file['name']);
        $imagem['extensao'] = strtolower(end($imagem['extensao']));
        $imagem['name'] = md5(rand(1000, 900000) . time()) . '.' . $imagem['extensao'];
        $imagem['diretorio'] = 'uploads/cooperados';
        if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg' || $imagem['extensao'] == 'png') {

            list($larguraOriginal, $alturaOriginal) = getimagesize($imagem['temp']);


            $ratio = max($largura / $larguraOriginal, $altura / $alturaOriginal);
            $alturaOriginal = $altura / $ratio;
            $x = ($larguraOriginal - $largura / $ratio) / 2;
            $larguraOriginal = $largura / $ratio;


            $imagem_final = imagecreatetruecolor($largura, $altura);

            if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg') {
                $imagem_original = imagecreatefromjpeg($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, $x, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagejpeg($imagem_final, $imagem['diretorio'] . "/" . $imagem['name'], 90);
            } else if ($imagem['extensao'] == 'png') {
                $imagem_original = imagecreatefrompng($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, $x, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagepng($imagem_final, $imagem['diretorio'] . "/" . $imagem['name']);
            }
            return $imagem['diretorio'] . "/" . $imagem['name'];
        } else {
            return null;
        }
    }

    /**
     * Está é responsável excluir uma imagem de usuário;
     * @param String $url_image - diretório do arquivo;
     * @access private
     * @return boolean TRUE or FALSE
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function delete_image($url_image) {
        if (file_exists($url_image)) {
            unlink($url_image);
            return true;
        } else {
            FALSE;
        }
    }

}
