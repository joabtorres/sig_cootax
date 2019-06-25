-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25-Jun-2019 às 17:36
-- Versão do servidor: 5.7.24
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigcoot_demo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado`
--

DROP TABLE IF EXISTS `sig_cooperado`;
CREATE TABLE IF NOT EXISTS `sig_cooperado` (
  `cod_cooperado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperativa` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `apelido` varchar(20) NOT NULL,
  `nome_completo` varchar(200) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `cnh` varchar(30) DEFAULT NULL,
  `cat` varchar(5) DEFAULT NULL,
  `inss` varchar(30) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `nacionalidade` varchar(20) NOT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `data_inscricao` date NOT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `conjugue` varchar(255) DEFAULT NULL,
  `filhos` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_cooperado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado`
--

INSERT INTO `sig_cooperado` (`cod_cooperado`, `cod_cooperativa`, `tipo`, `status`, `apelido`, `nome_completo`, `cpf`, `rg`, `cnh`, `cat`, `inss`, `estado_civil`, `nacionalidade`, `genero`, `data_nascimento`, `data_inscricao`, `pai`, `mae`, `conjugue`, `filhos`, `imagem`) VALUES
(1, 1, 'Permissionário', 1, 'João', 'João Gonzaga', '111.111.111-11', '1545451 pc/pa', '5456454646546', 'AB', '3546546', 'Solteiro', 'BRASILEIRO', 'Masculino', '1993-08-15', '2019-04-11', 'João Gonzagas', 'Maria Gonzaga', '', '', 'uploads/cooperados/4a7785e6175b33536204ce244fa701fd.jpg'),
(2, 1, 'Permissionário', 0, 'Pedro', 'Pedro Vieira', '222.222.222-22', '1545451 pc/pa', '5456454646546', 'AB', '3546546', 'Solteiro', 'BRASILEIRO', 'Masculino', '1950-01-15', '2019-04-11', 'Carlos Viera', 'Lucia Viera', '', '', 'uploads/cooperados/a32a06a793c79380f15bb4f9228180f3.jpg'),
(3, 1, 'Participativo', 0, 'Roberto', 'Roberto Alves', '333.333.333-33', '1545451 pc/pa', '5456454646546', 'AB', '', 'CASADO', 'BRASILEIRO', 'Masculino', '1954-04-15', '2019-04-11', 'Carlos Viera Alves', 'Maria Alves', 'Thaise Pedrosa', '', 'uploads/cooperados/7eb7d3144f37a58713fd9ab942c1bac3.jpg'),
(4, 1, 'Permissionário', 1, 'Carlos', 'Carlos Arthur Rodrigues', '444.444.444-44', '1545451 pc/pa', '6545646', 'AB', '5544441', 'Solteiro', 'BRASILEIRO', 'Masculino', '1933-09-15', '2019-04-11', '', '', '', '', 'uploads/cooperados/853b90a2f4075217d6d64d14421dba34.jpg'),
(5, 1, 'Participativo', 1, 'Rogerio', 'Rogerio Gonzaga', '555.555.555-55', '1545451 pc/pa', '5456454646546', 'AB', '5544441', 'Solteiro', 'BRASILEIRO', 'Masculino', '1954-02-19', '2019-04-11', '', '', '', '', 'uploads/cooperados/dc691328146d30de2ca1fc20114b84b8.jpg'),
(6, 1, 'Permissionário', 1, 'Bean', 'Mr Bean Alves', '666.666.666-66', '1545451 pc/pa', '5456454646546', 'AB', '3546546', 'CASADO', 'BRASILEIRO', 'Masculino', '1954-02-19', '2019-04-11', 'Carlos Bean Alves', 'Lucia Bean Alves', 'Maria Rodrigues Alves', '', 'uploads/cooperados/dfa3e6a3ae6c66238f1c60d438624c2c.jpg'),
(7, 1, 'Permissionário', 1, 'Carla', 'Carla Nascimento', '777.777.777-77', '1545451 pc/pa', '5456454646546', 'AB', '3546546', 'Casada', 'BRASILEIRA', 'Masculino', '2014-08-15', '2019-04-11', 'Carlos nascimento', 'Lucia Alves nacimento', 'Roberto Gaspar', '', 'uploads/cooperados/f2afae4c938dd267c9d54f10aabcceff.jpg');

--
-- Acionadores `sig_cooperado`
--
DROP TRIGGER IF EXISTS `tg_remove_cooperado`;
DELIMITER $$
CREATE TRIGGER `tg_remove_cooperado` BEFORE DELETE ON `sig_cooperado` FOR EACH ROW BEGIN
DELETE FROM sig_cooperado_carteira WHERE cod_cooperado = OLD.cod_cooperado;
DELETE FROM sig_cooperado_contato WHERE cod_cooperado = OLD.cod_cooperado;
DELETE FROM sig_cooperado_endereco WHERE cod_cooperado = OLD.cod_cooperado;
DELETE FROM sig_cooperado_historico WHERE cod_cooperado = OLD.cod_cooperado;
DELETE FROM sig_cooperado_mensalidade WHERE cod_cooperado = OLD.cod_cooperado;
DELETE FROM sig_cooperado_veiculo WHERE cod_cooperado = OLD.cod_cooperado;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_carteira`
--

DROP TABLE IF EXISTS `sig_cooperado_carteira`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_carteira` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperado` int(11) NOT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  PRIMARY KEY (`cod`,`cod_cooperado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_carteira`
--

INSERT INTO `sig_cooperado_carteira` (`cod`, `cod_cooperado`, `data_inicial`, `data_validade`) VALUES
(1, 1, '2019-04-11', '2020-04-01'),
(2, 2, '2019-04-11', '2020-04-01'),
(3, 3, '2019-04-11', '2020-04-01'),
(4, 4, '2019-04-11', '2020-04-01'),
(5, 5, '2019-04-11', '2020-04-01'),
(6, 6, '2019-04-11', '2020-04-01'),
(7, 7, '2019-04-11', '2020-04-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_contato`
--

DROP TABLE IF EXISTS `sig_cooperado_contato`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_contato` (
  `cod_contato` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperado` int(11) NOT NULL,
  `celular_1` varchar(20) DEFAULT NULL,
  `celular_2` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_contato`
--

INSERT INTO `sig_cooperado_contato` (`cod_contato`, `cod_cooperado`, `celular_1`, `celular_2`, `email`) VALUES
(1, 1, '(93) 99999-9999', '(92) 99999-9999', 'email@mail.com'),
(2, 2, '(92) 99999-9999', '(93) 99999-9999', 'bugados01@gmail.com'),
(3, 3, '(93) 99999-9999', '(92) 99999-9999', 'bugados01@gmail.com'),
(4, 4, '(93) 99999-9999', '', 'bugados01@gmail.com'),
(5, 5, '', '', ''),
(6, 6, '(93) 99999-9999', '(92) 99999-9999', 'email@mail.com'),
(7, 7, '', '(99) 99999-9999', 'email@mail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_endereco`
--

DROP TABLE IF EXISTS `sig_cooperado_endereco`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_endereco` (
  `cod_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperado` int(11) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(12) NOT NULL,
  PRIMARY KEY (`cod_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_endereco`
--

INSERT INTO `sig_cooperado_endereco` (`cod_endereco`, `cod_cooperado`, `logradouro`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `cep`) VALUES
(1, 1, '15 rua', '1554', 'Liberdade', '', 'Itaituba', 'PA', ''),
(2, 2, '15 rua', '1002', 'Bom remédio', '', 'Itaituba', 'PA', '68484-444'),
(3, 3, '15 rua', '1002', 'Bom remédio', '', 'Itaituba', 'PA', '68484-444'),
(4, 4, '15 rua', '1554', 'Bom remédio', '', 'Itaituba', 'PA', '68484-444'),
(5, 5, '', '', '', '', 'Itaituba', 'PA', ''),
(6, 6, '10 rua', '1554', 'Bom remédio', '', 'Itaituba', 'PA', '68484-444'),
(7, 7, '10 rua', '1554', 'Liberdade', '', 'Itaituba', 'PA', '68484-444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_historico`
--

DROP TABLE IF EXISTS `sig_cooperado_historico`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_historico` (
  `cod_historico` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_cooperado` int(11) NOT NULL,
  `descricao_historico` text,
  `data_historico` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_historico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_historico`
--

INSERT INTO `sig_cooperado_historico` (`cod_historico`, `cod_usuario`, `cod_cooperado`, `descricao_historico`, `data_historico`) VALUES
(1, 6, 2, 'ficou inativo', '2019-04-11 09:27:29'),
(2, 6, 7, 'quitou suas mensalidades', '2019-04-11 09:29:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_mensalidade`
--

DROP TABLE IF EXISTS `sig_cooperado_mensalidade`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_mensalidade` (
  `cod_mensalidade` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperado` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `janeiro` double UNSIGNED DEFAULT NULL,
  `fevereiro` double UNSIGNED DEFAULT NULL,
  `marco` double UNSIGNED DEFAULT NULL,
  `abril` double UNSIGNED DEFAULT NULL,
  `maio` double UNSIGNED DEFAULT NULL,
  `junho` double UNSIGNED DEFAULT NULL,
  `julho` double UNSIGNED DEFAULT NULL,
  `agosto` double UNSIGNED DEFAULT NULL,
  `setembro` double UNSIGNED DEFAULT NULL,
  `outubro` double UNSIGNED DEFAULT NULL,
  `novembro` double UNSIGNED DEFAULT NULL,
  `dezembro` double UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`cod_mensalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_mensalidade`
--

INSERT INTO `sig_cooperado_mensalidade` (`cod_mensalidade`, `cod_cooperado`, `ano`, `janeiro`, `fevereiro`, `marco`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`) VALUES
(1, 7, 2018, 10, 10, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(2, 1, 2019, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0),
(3, 2, 2019, 10, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0),
(4, 3, 2018, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10),
(5, 3, 2019, 10, 10, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(6, 4, 2017, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10),
(7, 4, 2018, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 5, 2019, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 6, 2017, 20, 20, 20, 2, 20, 20, 20, 20, 20, 20, 20, 20),
(10, 6, 2018, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperado_veiculo`
--

DROP TABLE IF EXISTS `sig_cooperado_veiculo`;
CREATE TABLE IF NOT EXISTS `sig_cooperado_veiculo` (
  `cod_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperado` int(11) NOT NULL,
  `nz` varchar(20) DEFAULT NULL,
  `veiculo` varchar(20) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `ano_modelo` varchar(15) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_veiculo`,`cod_cooperado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperado_veiculo`
--

INSERT INTO `sig_cooperado_veiculo` (`cod_veiculo`, `cod_cooperado`, `nz`, `veiculo`, `cor`, `placa`, `ano_modelo`, `imagem`) VALUES
(1, 1, 'nz 5544', 'Gol 2.0', 'Branco', 'asd 4455', '2012/2013', NULL),
(2, 2, 'nz 5544', 'Gol 2.0', 'Branco', 'asd 4455', '2012/2013', NULL),
(3, 3, 'nz 5544 aux', '', '', '', '', NULL),
(4, 4, 'nz 0010', 'Fiat Mobi', 'Branco', 'nas 44444', '2012/2013', NULL),
(5, 5, 'nz 0010 aux', '', '', '', '', NULL),
(6, 6, 'nz 0050', 'voyage', 'branco', 'asd 555', '2012/2013', NULL),
(7, 7, 'nz 0041', 'Siena Fiat', 'Branco', 'ass 4545', '2012/2013', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperativa`
--

DROP TABLE IF EXISTS `sig_cooperativa`;
CREATE TABLE IF NOT EXISTS `sig_cooperativa` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome_siglas` varchar(20) DEFAULT NULL,
  `nome_completo` varchar(200) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `url_site` varchar(255) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperativa`
--

INSERT INTO `sig_cooperativa` (`cod`, `nome_siglas`, `nome_completo`, `cnpj`, `endereco`, `cep`, `telefone`, `email`, `url_site`) VALUES
(1, 'COOTAX', 'Cooperativa dos Taxistas de Itaituba', '08.223.742/0001-98', 'TRAVESSA JOÃO PESSOA, Nº 215, BAIRRO CENTRO - ITAITUBA - PARÁ - BRASIL - CEP: 68180-650', '68180-650', '(93) 3518-0254', 'cootax.itb@gmail.com', 'www.cootax.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_despesa`
--

DROP TABLE IF EXISTS `sig_despesa`;
CREATE TABLE IF NOT EXISTS `sig_despesa` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_despesa`
--

INSERT INTO `sig_despesa` (`cod`, `cod_cooperativa`, `descricao`, `valor`, `data`, `data_cadastro`) VALUES
(1, 1, 'exemplo de saida', 5000, '2019-04-15', '2019-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_investimento`
--

DROP TABLE IF EXISTS `sig_investimento`;
CREATE TABLE IF NOT EXISTS `sig_investimento` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_investimento`
--

INSERT INTO `sig_investimento` (`cod`, `cod_cooperativa`, `descricao`, `valor`, `data`, `data_cadastro`) VALUES
(1, 1, 'Exemplo de investimento', 4000, '2019-04-15', '2019-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_lucro`
--

DROP TABLE IF EXISTS `sig_lucro`;
CREATE TABLE IF NOT EXISTS `sig_lucro` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_lucro`
--

INSERT INTO `sig_lucro` (`cod`, `cod_cooperativa`, `descricao`, `valor`, `data`, `data_cadastro`) VALUES
(1, 1, 'Exemplo de entrada', 10000, '2019-04-15', '2019-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_usuario`
--

DROP TABLE IF EXISTS `sig_usuario`;
CREATE TABLE IF NOT EXISTS `sig_usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cooperativa` int(11) NOT NULL,
  `nome_usuario` varchar(20) NOT NULL,
  `sobrenome_usuario` varchar(100) NOT NULL,
  `usuario_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL,
  `cargo_usuario` varchar(45) NOT NULL,
  `genero_usuario` varchar(10) DEFAULT NULL,
  `nivel_acesso_usuario` int(1) UNSIGNED NOT NULL,
  `status_usuario` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `imagem_usuario` varchar(255) DEFAULT NULL,
  `data_cadastro_usuario` date DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `usuario_usuario_UNIQUE` (`usuario_usuario`),
  UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_usuario`
--

INSERT INTO `sig_usuario` (`cod_usuario`, `cod_cooperativa`, `nome_usuario`, `sobrenome_usuario`, `usuario_usuario`, `email_usuario`, `senha_usuario`, `cargo_usuario`, `genero_usuario`, `nivel_acesso_usuario`, `status_usuario`, `imagem_usuario`, `data_cadastro_usuario`) VALUES
(6, 1, 'Usuário', 'Admin', 'admin', 'bugados01@gmail.com', 'c996d7b593437305e45bf727fc545b4a', 'Administrador', 'M', 4, 1, 'uploads/usuarios/user_masculino.png', '2018-04-05'),
(7, 1, 'Joab', 'Torres', 'joab.alencar', 'joabtorres1508@gmail.com', '960577346051901650648e4a0112ebd1', 'Participante', 'M', 1, 1, 'uploads/usuarios/28560b3bc12814e80a399460a94723f2.jpg', '2019-04-11');

--
-- Acionadores `sig_usuario`
--
DROP TRIGGER IF EXISTS `tg_remove_usuario`;
DELIMITER $$
CREATE TRIGGER `tg_remove_usuario` BEFORE DELETE ON `sig_usuario` FOR EACH ROW BEGIN
DELETE FROM sig_cooperado_historico WHERE cod_usuario = OLD.cod_usuario;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
