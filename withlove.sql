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

  CREATE TABLE `servico` (
  `idservico` INTEGER PRIMARY KEY auto_increment,
  `descricao` varchar(50) NOT NULL,
  `preco` double NOT NULL);

  CREATE TABLE `pet` (
  `matriculapet` INTEGER PRIMARY KEY auto_increment,
  `nomepet` varchar (30) NOT NULL,
  `raca` varchar (30) NOT NULL,
  `cor` varchar (30) NOT NULL,
  `idade` char (2) NOT NULL,
  `cpf` char(12) NOT NULL,
  FOREIGN KEY (cpf) REFERENCES cliente (cpf));

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

  CREATE TABLE `compra` (
  `idcompra` INTEGER PRIMARY KEY auto_increment,
  `cpf` char(12) NOT NULL,
  `valortotal` char (30) NOT NULL,
  `datacompra` date NOT NULL,
  FOREIGN KEY (cpf) REFERENCES cliente (cpf));

  CREATE TABLE `produto` (
  `codproduto` INTEGER PRIMARY KEY auto_increment,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(35) NOT NULL,
  `quantidade` int(250) NOT NULL,
  `preco` double NOT NULL);

  CREATE TABLE `itens` (
  `iditem` INTEGER PRIMARY KEY auto_increment,
  `quantidade` int(250) NOT NULL,
  `idcompra` INTEGER NOT NULL,
  `codproduto` INTEGER NOT NULL,
  FOREIGN KEY (idcompra) REFERENCES compra (idcompra),
  FOREIGN KEY (codproduto) REFERENCES produto (codproduto));


INSERT INTO `cliente` (`cpf`, `nome`, `telefone`, `email`, `cep`, `numerocasa`, `complemento`, `senha`) VALUES 
('123456789-10', 'Barbara', '(21)9123-45678', 'barbara@gmail.com', '23098-030', '23', 'Casa', '123'),
('112345678-90', 'Larissa', '(21)9112-34567', 'larissa@gmail.com', '23085-610', '7', 'Casa', '312'),
('111234567-80', 'Maria Eduarda', '(21)9111-23456', 'mariaeduarda@gmail.com', '26551-090', '33', 'Ap. 102', '987'),
('123456789-90', 'Cristiana', '(21)9987-65432', 'cristiana@gmail.com', '23098-030', '300', 'Ap. 7', '654');

INSERT INTO `funcionario` (`cpf`, `nome`, `cep`, `numerocasa`, `complemento`, `telefone`,
`qualificacao`, `experiencia`, `email`, `senha`, `status`) VALUES 
('234567890-01', 'Marcos', '23085-610', '6', 'Casa', '(21)9789-45612', 'Banho e Tosa', '5 Anos', 
'marcos@gmail.com', '456', 'A'),
('234567890-02', 'Carlos', '23085-610', '98', 'Ap. 65', '(21)9978-94561', 'Estética Canina', '2 Anos',
'carlos@gmail.com', '741', 'A'),
('234567890-03', 'Vanessa', '23098-030', '102', 'Casa 02', '(21)9632-58741', 'Veterinária', '10 Anos',
'vanessa@gmail.com', '852', 'A'),
('234567890-04', 'Paula', '23085-610', '754', 'Ap.87', '(21)9741-85296', 'Banho e Tosa', '7 Anos',
'paula@gmail.com', '963', 'A');

INSERT INTO `servico` (`descricao`, `preco`) VALUES 
('Banho','30'),
('Tosa', '50'),
('Estética', '30'),
('Pacote Completo', '100'),
('Veterinário', '150');

INSERT INTO `pet` (`nomepet`, `cpf`, `raca`, `cor`, `idade`) VALUES 
('Marley', '123456789-10', 'Golden', 'Marrom', '5 Anos'),
('Pretinha', '112345678-90', 'Vira-Lata', 'Preto', '4 Anos'),
('Brutus', '111234567-80', 'Pug', 'Preto e Branco', '4 Anos'),
('Mel', '123456789-90', 'Poodle', 'Branco', '2 Anos');

INSERT INTO `produto` (`nome`, `marca`, `quantidade`, `preco`) VALUES 
('Shampoo antipulgas', 'Sanol', '30', '19.98'),
('Antipulgas em tablete', 'NexGard', '60', '59.97'),
('Suplemento', 'Aminomix', '60', '34.97'),
('Suplemento', 'Glicopam Pet', '30', '33.99'),
('Vermifugo para cachorro', 'Drontal Plus', '40', '79.99'),
('Vermifugo para gato', 'Drontal', '40', '49.98'),
('Casinha', 'Mec pet', '30', '69.98'),
('Coleira', 'MadDog', '60', '38.97'),
('Cama', 'Bichinho Chic', '30', '149.99'),
('Osso', 'S/ Marca', '60', '24.97'),
('Comeouro e Bebedoro', 'S/ Marca', '30', '34.99'),
('Macaco de Pelucia', 'S/ Marca', '35', '19.98'),
('Arranhador', 'Madalena', '30', '45.97'),
('Coleira para Gato', 'Modernpet', '50', '26.99'),
('Luva tira pelo', 'S/ Marca', '60', '15.97'),
('Escova de canto', 'Napi', '60', '8.99'),
('Casa para Gato', 'S/ Marca', '30', '95.99'),
('Catnip', 'PowerPets', '60', '14.98'),
('Viveiro para Passáro', 'Chalesco', '15', '459.99'),
('Aquário', 'OceanTech', '15', '199.99'),
('Gaiola para Hamster', 'Pets American', '15', '159.99'),
('Bebedouro para Passáro', 'ProBirds', '60', '4.99'),
('Casa Coelho', 'S/ Marca', '40', '59.99'),
('Bebedouro para Répteis', 'Tropical', '20', '39.99'),
('Dispenser saquinho', 'S/ Marca', '60', '13.99'),
('Kit brinquedos', 'S/ Marca', '50', '29.97'),
('Escova com dispenser', 'S/ Marca', '50', '6.99'),
('Ração para Cachorro', 'Golden Formula', '50', '99.99'),
('Ração para Gato', 'Whiskas', '50', '49.94'),
('Ração para Calopsita', 'Zootekna', '50', '6.50');

INSERT INTO `compra` (`cpf`, `valortotal`, `datacompra`) VALUES 

INSERT INTO `itens` (`quantidade`, `idcompra`, `codproduto`) VALUES 

INSERT INTO `atendimento` (`matriculapet`, `matriculafunc`, `idservico`, `precototal`,
`formapg`, `data`, `horaentrada`, `horasaida`) VALUES
