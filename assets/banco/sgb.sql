-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.34-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sgb
CREATE DATABASE IF NOT EXISTS `sgb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sgb`;

-- Copiando estrutura para tabela sgb.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.categoria: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`) VALUES
	(7, 'Brinquedos'),
	(8, 'Roupas'),
	(9, 'Eletrônicos'),
	(10, 'Casa');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `login_Cliente` varchar(45) NOT NULL,
  `senha_Cliente` varchar(45) NOT NULL,
  `Pessoa_idPessoa` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_Cliente_Pessoa_idx` (`Pessoa_idPessoa`),
  CONSTRAINT `fk_Cliente_Pessoa` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.cliente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idCliente`, `login_Cliente`, `senha_Cliente`, `Pessoa_idPessoa`) VALUES
	(2, 'carlos@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
	(3, 'teste@teste', '202cb962ac59075b964b07152d234b70', 4),
	(4, 'beltrano@mail.com', '202cb962ac59075b964b07152d234b70', 5);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Forn` varchar(45) DEFAULT NULL,
  `endereco_Forn` varchar(45) DEFAULT NULL,
  `tel_Forn` bigint(20) DEFAULT NULL,
  `cnpj_Forn` bigint(20) DEFAULT NULL,
  `insc_est_Forn` varchar(45) DEFAULT NULL,
  `email_Forn` varchar(45) DEFAULT NULL,
  `status_Forn` varchar(45) NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.fornecedor: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`idFornecedor`, `nome_Forn`, `endereco_Forn`, `tel_Forn`, `cnpj_Forn`, `insc_est_Forn`, `email_Forn`, `status_Forn`) VALUES
	(1, 'Nestle', 'Rua Grande', 2127526578, 123456789, 'INSCRI2018', 'nestle@mail.com', ''),
	(2, 'Dragon ball', 'Rua Flores', 214549848, 123456789, 'INSCR2018', 'dragon@mail.com', ''),
	(4, 'Apple', 'Apple Inc.', 0, 21665, '55.766.30-4', 'support@apple.com', ''),
	(5, 'Samsung', 'Samsung Tecnologia', 0, 17866, '17.866.598/0001-07', 'samsung@mail.com', ''),
	(6, 'Fornecedor Ativo', 'Rua do Fornecedor Nova', 2122334466, 1234567890, '12345', 'fornecedorNovo@mail.com', 'ATIVO');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `login_Func` varchar(45) NOT NULL,
  `senha_Func` varchar(45) NOT NULL,
  `nivel_acesso_Func` varchar(45) DEFAULT NULL,
  `cargo_Func` varchar(45) DEFAULT NULL,
  `Pessoa_idPessoa` int(11) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `fk_Funcionário_Pessoa1_idx` (`Pessoa_idPessoa`),
  CONSTRAINT `fk_Funcionário_Pessoa1` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`idFuncionario`, `login_Func`, `senha_Func`, `nivel_acesso_Func`, `cargo_Func`, `Pessoa_idPessoa`) VALUES
	(1, 'fulano@mail.com', '202cb962ac59075b964b07152d234b70', 'alto', 'Gerente', 1);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.itementrada
CREATE TABLE IF NOT EXISTS `itementrada` (
  `idItemEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `data_ItemEntrada` date DEFAULT NULL,
  `lote_ItemEntrada` int(11) DEFAULT NULL,
  `qtd_ItemEntrada` int(11) DEFAULT NULL,
  `data_Pedido_ItemEntrada` date DEFAULT NULL,
  `valor_ItemEntrada` float DEFAULT NULL,
  `Fornecedor_idFornecedor` int(11) NOT NULL,
  `Produto_idProduto` int(11) NOT NULL,
  PRIMARY KEY (`idItemEntrada`,`Fornecedor_idFornecedor`,`Produto_idProduto`),
  KEY `fk_ItemEntrada_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  KEY `fk_ItemEntrada_Produto1_idx` (`Produto_idProduto`),
  CONSTRAINT `fk_ItemEntrada_Fornecedor1` FOREIGN KEY (`Fornecedor_idFornecedor`) REFERENCES `fornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_ItemEntrada_Produto1` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.itementrada: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `itementrada` DISABLE KEYS */;
INSERT INTO `itementrada` (`idItemEntrada`, `data_ItemEntrada`, `lote_ItemEntrada`, `qtd_ItemEntrada`, `data_Pedido_ItemEntrada`, `valor_ItemEntrada`, `Fornecedor_idFornecedor`, `Produto_idProduto`) VALUES
	(1, '2018-07-07', 1234, 2, '2018-07-07', 5490.9, 5, 5),
	(2, '2018-07-07', 1234, 2, '2018-07-07', 5490.9, 5, 5),
	(3, '2018-07-07', 4567, 8, '2018-07-07', 2980.9, 5, 6);
/*!40000 ALTER TABLE `itementrada` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.itempedido
CREATE TABLE IF NOT EXISTS `itempedido` (
  `Produto_idProduto` int(11) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `qtd_ItemPedido` int(11) DEFAULT NULL,
  `valor_ItemPedido` float DEFAULT NULL,
  PRIMARY KEY (`Produto_idProduto`,`Pedido_idPedido`),
  KEY `fk_Produto_has_Pedido_Pedido1_idx` (`Pedido_idPedido`),
  KEY `fk_Produto_has_Pedido_Produto1_idx` (`Produto_idProduto`),
  CONSTRAINT `fk_Produto_has_Pedido_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Produto_has_Pedido_Produto1` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.itempedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itempedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itempedido` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.notafiscal
CREATE TABLE IF NOT EXISTS `notafiscal` (
  `idNotaFiscal` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total_NotaFiscal` float DEFAULT NULL,
  `data_NotaFiscal` datetime DEFAULT NULL,
  `qtd_produtos_NotaFiscal` int(11) DEFAULT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `Pedido_Cliente_idCliente` int(11) NOT NULL,
  `Pedido_Funcionário_idFuncionário` int(11) NOT NULL,
  PRIMARY KEY (`idNotaFiscal`,`Pedido_idPedido`,`Pedido_Cliente_idCliente`,`Pedido_Funcionário_idFuncionário`),
  KEY `fk_NotaFiscal_Pedido1_idx` (`Pedido_idPedido`,`Pedido_Cliente_idCliente`,`Pedido_Funcionário_idFuncionário`),
  CONSTRAINT `fk_NotaFiscal_Pedido1` FOREIGN KEY (`Pedido_idPedido`, `Pedido_Cliente_idCliente`, `Pedido_Funcionário_idFuncionário`) REFERENCES `pedido` (`idPedido`, `Cliente_idCliente`, `Funcionário_idFuncionário`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.notafiscal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `notafiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `notafiscal` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `data_Pedido` date DEFAULT NULL,
  `valor_total_Pedido` float DEFAULT NULL,
  `status_Pedido` varchar(45) DEFAULT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Funcionário_idFuncionário` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`,`Cliente_idCliente`,`Funcionário_idFuncionário`),
  KEY `fk_Pedido_Cliente1_idx` (`Cliente_idCliente`),
  KEY `fk_Pedido_Funcionário1_idx` (`Funcionário_idFuncionário`),
  CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_Pedido_Funcionário1` FOREIGN KEY (`Funcionário_idFuncionário`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Pessoa` varchar(45) NOT NULL,
  `end_Pessoa` varchar(45) DEFAULT NULL,
  `email_Pessoa` varchar(45) DEFAULT NULL,
  `status_Pessoa` tinyint(1) DEFAULT NULL,
  `tel_Pessoa` bigint(20) DEFAULT NULL,
  `sexo_Pessoa` varchar(45) DEFAULT NULL,
  `cpf_Pessoa` bigint(20) DEFAULT NULL,
  `cnpj_Pessoa` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.pessoa: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`idPessoa`, `nome_Pessoa`, `end_Pessoa`, `email_Pessoa`, `status_Pessoa`, `tel_Pessoa`, `sexo_Pessoa`, `cpf_Pessoa`, `cnpj_Pessoa`) VALUES
	(1, 'Fulano', 'Rua Tal', 'fulano@mail.com', 1, 21987651245, 'F', 90038217040, NULL),
	(3, 'Carlos Eduardo Rocha', 'Rua Ptolomeu Qd 0', 'carlos@gmail.com', 1, 2127526598, 'M', 98765432114, 0),
	(4, 'Teste', 'teste', 'teste@teste', 1, 21, 'M', 11122233344, 0),
	(5, 'Beltrano da Sailva', 'Rua Talk', 'beltrano@mail.com', 1, 21, 'M', 11122233344, 0);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- Copiando estrutura para tabela sgb.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_Produto` varchar(45) DEFAULT NULL,
  `qtd_min_Produto` int(11) DEFAULT NULL,
  `qtd_max_Produto` int(11) DEFAULT NULL,
  `status_Produto` varchar(20) DEFAULT NULL,
  `img` varchar(64) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `codigoBarra` varchar(30) NOT NULL,
  `qtd_Produto` int(11) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sgb.produto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idProduto`, `descricao_Produto`, `qtd_min_Produto`, `qtd_max_Produto`, `status_Produto`, `img`, `categoria`, `titulo`, `codigoBarra`, `qtd_Produto`) VALUES
	(1, 'Tester describe', 0, 0, '0', 'default.jpg', 7, 'Teste', '1234', 0),
	(2, 'Descrição do Produto', 1, 9, '0', 'cam.PNG', 7, 'Produto', '1234', 0),
	(3, 'Goku Action Figure', 5, 20, 'ATIVO', 'f49e8ed344d3870f399af879d02c72bc.jpg', 7, 'Goku', '2015', 0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;