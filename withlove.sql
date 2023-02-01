DROP DATABASE IF EXISTS withlove;
CREATE DATABASE IF NOT EXISTS `withlove` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `withlove`;

  CREATE TABLE `cliente` (
  `cpf` char(12) NOT NULL PRIMARY KEY,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` int(11) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `senha` varchar(30) NOT NULL);

  CREATE TABLE `funcionario` (
  `matriculafunc` INTEGER PRIMARY KEY auto_increment,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` char(12) NOT NULL,
  `qualificacao` varchar(30) NOT NULL,
  `experiencia` varchar(20) NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` int(11) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `status` char(1) DEFAULT NULL);

  CREATE TABLE `pet` (
  `matriculapet` INTEGER PRIMARY KEY auto_increment,
  `cpf` char(12) NOT NULL,
  `idatendimento` INTEGER,
  FOREIGN KEY (cpf) REFERENCES cliente (cpf),
  FOREIGN KEY (idatendimento) REFERENCES atendimento (idatendimento));

  CREATE TABLE `atendimento` (
  `idatendimento` INTEGER PRIMARY KEY auto_increment,
  `matriculapet` INTEGER NOT NULL,
  `matriculafunc` INTEGER NOT NULL,
  `idservico` INTEGER NOT NULL,
  `precototal` DOUBLE NOT NULL,
  `formapg` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `horaentrada` varchar(30) NOT NULL,
  `horasaida` varchar (30) NOT NULL,
  FOREIGN KEY (matriculapet) REFERENCES pet (matriculapet),
  FOREIGN KEY (matriculafunc) REFERENCES funcionario (matriculafunc),
  FOREIGN KEY (idservico) REFERENCES servico (idservico));

  CREATE TABLE `servico` (
  `idservico` INTEGER PRIMARY KEY auto_increment,
  `descricao` varchar(50) NOT NULL,
  `preco` double NOT NULL
  `matriculafunc` INTEGER NOT NULL,
  `idatendimento` INTEGER NOT NULL,
  FOREIGN KEY (matriculafunc) REFERENCES funcionario(matriculafunc),
  FOREIGN KEY (idatendimento) REFERENCES atendimento (idatendimento));

  CREATE TABLE `compra` (
  `idcompra` INTEGER PRIMARY KEY auto_increment,
  `cpf` char(12) NOT NULL,
  `iditem` INTEGER NOT NULL,
  FOREIGN KEY (cpf) REFERENCES cliente (cpf),
  FOREIGN KEY (iditem) REFERENCES itens (iditem));

  CREATE TABLE `itens` (
  `iditem` INTEGER PRIMARY KEY auto_increment,
  `quantidade` int(250) NOT NULL,
  `idcompra` INTEGER NOT NULL,
  `codproduto` INTEGER NOT NULL,
  FOREIGN KEY (idcompra) REFERENCES compra (idcompra),
  FOREIGN KEY (codproduto) REFERENCES produto (codproduto));

  CREATE TABLE `produto` (
  `codproduto` INTEGER PRIMARY KEY auto_increment,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(35) NOT NULL,
  `quantidade` int(250) NOT NULL,
  `preco` double NOT NULL);
