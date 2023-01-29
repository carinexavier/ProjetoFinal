DROP DATABASE IF EXISTS withlove;
CREATE DATABASE IF NOT EXISTS `withlove` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `withlove`;

  CREATE TABLE `endereco` (
  `cep` char(9) NOT NULL PRIMARY KEY,
  `rua` varchar(60) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` char(2) NOT NULL);

  CREATE TABLE `cliente` (
  `cpf` char(12) NOT NULL PRIMARY KEY,
  `nome` varchar(60) NOT NULL,
  `nomepet` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` int(11) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `senha` varchar(30) NOT NULL,
  FOREIGN KEY (cep) REFERENCES endereco (cep));

  CREATE TABLE `funcionario` (
  `matricula` INTEGER PRIMARY KEY auto_increment,
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
  `status` char(1) DEFAULT NULL,
  FOREIGN KEY (cep) REFERENCES endereco (cep));

  CREATE TABLE `servico` (
  `ordemservico` INTEGER PRIMARY KEY auto_increment,
  `descricao` varchar(100) NOT NULL,
  `formapg` varchar(20) NOT NULL,
  `valor` double NOT NULL);

   CREATE TABLE `produto` (
  `codproduto` INTEGER PRIMARY KEY auto_increment,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL);

  CREATE TABLE `servicofunc` (
  `idservicofunc` INTEGER PRIMARY KEY auto_increment,
  `descricao` varchar(100) NOT NULL,
  `ordemservico` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  FOREIGN KEY (ordemservico) REFERENCES servico (ordemservico),
  FOREIGN KEY (matricula) REFERENCES funcionario (matricula));

  CREATE TABLE `vendaprod` (
  `idvendaprod` INTEGER PRIMARY KEY auto_increment,
  `quantidade` int(11) NOT NULL,
  `codproduto` int(11) NOT NULL,
  `cpf` char(12) NOT NULL,
  FOREIGN KEY (codproduto) REFERENCES produto (codproduto),
  FOREIGN KEY (cpf) REFERENCES cliente (cpf));
