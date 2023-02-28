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
  `senha` varchar(100) NOT NULL,
  `status` char(1) DEFAULT NULL);

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
  `senha` varchar(100) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `foto` varchar (255) NOT NULL);

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

 CREATE TABLE `agendamento` (
  `idagendamento` INTEGER PRIMARY KEY auto_increment,
  `matriculapet` INTEGER (30) NOT NULL,
  `nome` varchar (60) NOT NULL,
  `cpf` char (12) NOT NULL,
  `idservico` integer NOT NULL,
  `hora` time not null,
  `data` date not null,
  FOREIGN KEY (matriculapet) REFERENCES pet (matriculapet),
  FOREIGN KEY (idservico) REFERENCES servico (idservico),
  FOREIGN KEY (cpf) REFERENCES cliente (cpf));
  
  CREATE TABLE `atendimento` (
  `idatendimento` INTEGER PRIMARY KEY auto_increment,
  `idagendamento`INTEGER NOT NULL,
  `matriculapet` INTEGER NOT NULL,
  `matricula` INTEGER NOT NULL,
  `idservico` INTEGER NOT NULL,
  `precototal` DOUBLE NOT NULL,
  `formapg` varchar(20) NOT NULL,
  `data` date NOT NULL,
  FOREIGN KEY (idagendamento) REFERENCES agendamento (idagendamento),
  FOREIGN KEY (matriculapet) REFERENCES pet (matriculapet),
  FOREIGN KEY (matricula) REFERENCES funcionario (matricula),
  FOREIGN KEY (idservico) REFERENCES servico (idservico));

  CREATE TABLE `categoria` (
  `idcategoria` int(11) PRIMARY KEY auto_increment,
  `nomecategoria` varchar(60) NOT NULL);

  CREATE TABLE `produto` (
  `codproduto` INTEGER PRIMARY KEY auto_increment,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(35) NOT NULL,
  `quantidade` int(250) NOT NULL,
  `preco` double NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  FOREIGN KEY (idcategoria) REFERENCES categoria (idcategoria));

  CREATE TABLE `carrinho` (
  `codproduto` INTEGER NOT NULL,
  `nome` varchar(60) NOT NULL,
  `quantcomprada` char(4) NOT NULL,
  `preco` double NOT NULL,
  `foto` varchar(255) NOT NULL,
  FOREIGN KEY (codproduto) REFERENCES produto (codproduto));

  CREATE TABLE `venda` (
  `idvenda` INTEGER PRIMARY KEY auto_increment,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `cpf` char (12) NOT NULL,
  FOREIGN KEY (cpf) REFERENCES cliente (cpf));

  CREATE TABLE `itens` (
  `iditem` INTEGER PRIMARY KEY auto_increment,
  `quantidade` int(250) NOT NULL,
  `idvenda` INTEGER NOT NULL,
  `codproduto` INTEGER NOT NULL,
  FOREIGN KEY (idvenda) REFERENCES venda (idvenda),
  FOREIGN KEY (codproduto) REFERENCES produto (codproduto));

INSERT INTO `cliente` (`cpf`, `nome`, `telefone`, `email`, `cep`, `numerocasa`, `complemento`, `senha`,`status`) VALUES 
('12345678910', 'Barbara', '(21)9123-45678', 'barbara@gmail.com', '23098-030', '23', 'Casa', '$2y$10$3YHIGRqsGcvb1RFC3IuLsOiy1TmJcPtffce7HZTN1k7fOS583vQoS', 'A'),
('11234567890', 'Larissa', '(21)9112-34567', 'larissa@gmail.com', '23085-610', '7', 'Casa', '$2y$10$aFdnU1eK/2myJ760gr5hKuOXjFPqi0uUeSfjXllfxE.zs2JR6hi56', 'A'),
('11123456780', 'Maria Eduarda', '(21)9111-23456', 'mariaeduarda@gmail.com', '26551-090', '33', 'Ap. 102', '$2y$10$YDf704Abcjc1N82PsH87Cuf/EMUY/5KdDWt/nbFT8hq1ZHTcckt26', 'A'),
('12345678990', 'Cristiana', '(21)9987-65432', 'cristiana@gmail.com', '23098-030', '300', 'Ap. 7', '$2y$10$QUj65gQeO9W4H7/pjM04G.B6MERn/0mYuWnB52.ODto9t4Mb60.ey', 'A');

INSERT INTO `funcionario` (`cpf`, `nome`, `cep`, `numerocasa`, `complemento`, `telefone`,
`qualificacao`, `experiencia`, `email`, `senha`, `status`, `foto`) VALUES 
('234567890-01', 'Marcos', '23085-610', '6', 'Casa', '(21)9789-45612', 'Banho e Tosa', '5 Anos', 
'marcos@gmail.com', '$2y$10$bAyJheIZS1v5Xmdk507jEOLR.xMO423aKPhOc0Bw9MWZBuWRh6HXy', 'A', 'fotos/63e26dd9ce1fb.jpg'),
('234567890-02', 'Carlos', '23085-610', '98', 'Ap. 65', '(21)9978-94561', 'Estética Canina', '2 Anos',
'carlos@gmail.com', '$2y$10$826zAzRnVaSUrNwB4ctWZuCDsfMML4uIayAxAztq3qG..ggCNBdOC', 'A', 'fotos/63e26e9372318.jpg'),
('234567890-03', 'Vanessa', '23098-030', '102', 'Casa 02', '(21)9632-58741', 'Veterinária', '10 Anos',
'vanessa@gmail.com', '$2y$10$FSKeUIi1/6Y2NbORxFJwKe1yhly.mEEPzqm4.DxnjWgSWHczeyC.G', 'A', 'fotos/63e26ea645553.jpg'),
('234567890-04', 'Paula', '23085-610', '754', 'Ap.87', '(21)9741-85296', 'Banho e Tosa', '7 Anos',
'paula@gmail.com', '$2y$10$mqL9qY.ux7fxMXfVGRs5Q.Xqp0YUn0VHcSRTYQyN.9wXq325JPaiG', 'A', 'fotos/63e26ebce67d1.jpg'),
('159.764.283-81', 'Clarissa', '23098-030', '1', 'Casa', '(21)96785-4545', 'Veterinária', '2 Anos', 
'clarisssa@gmail.com', '$2y$10$kzDF6VASUPjin0vKX.gijez7qVZ.lSF/KeCvd9N/S89HR1Z28be8S', 'A', 'fotos/63e28a4933c6f.jpg');

INSERT INTO `servico` (`descricao`, `preco`) VALUES 
('Banho','30'),
('Tosa', '50'),
('Estética', '30'),
('Pacote Completo', '100'),
('Veterinário', '150');

INSERT INTO `pet` (`nomepet`, `cpf`, `raca`, `cor`, `idade`) VALUES 
('Marley', '12345678910', 'Golden', 'Marrom', '5 Anos'),
('Pretinha', '11234567890', 'Vira-Lata', 'Preto', '4 Anos'),
('Brutus', '11123456780', 'Pug', 'Preto e Branco', '4 Anos'),
('Mel', '12345678990', 'Poodle', 'Branco', '2 Anos');

INSERT INTO `agendamento` (`matriculapet`, `nome`, `cpf`, `idservico`, `hora`, `data`) VALUES
('1', 'Barbara', '12345678910', '4', '08:00:33', '2023-03-02');
('3', 'Maria Eduarda', '11123456780', '3', '10:30:00', '2023-03-01');
('2', 'Larissa', '11234567890', '1', '13:00:00', '2023-03-06');

INSERT INTO `categoria` (`nomecategoria`) VALUES
('Farmácia'),
('Cachorros'),
('Gatos'),
('Outros Pets'),
('Promoções');

INSERT INTO `produto` (`nome`, `marca`, `quantidade`, `preco`, `idcategoria`, `foto`) VALUES 
('Shampoo antipulgas', 'Sanol', '30', '19.98', '1', 'produtos/antishampoo.webp'),
('Antipulgas em tablete', 'NexGard', '60', '59.97', '1', 'produtos/antitablete.webp'),
('Suplemento', 'Aminomix', '60', '34.97', '1', 'produtos/supaminomix.webp'),
('Suplemento', 'Glicopam Pet', '30', '33.99', '1', 'produtos/supglicopam.webp'),
('Vermifugo para cachorro', 'Drontal Plus', '40', '79.99', '1', 'produtos/vermicao.jpg'),
('Vermifugo para gato', 'Drontal', '40', '49.98', '1', 'produtos/vermigato.webp'),
('Casinha', 'Mec pet', '30', '69.98', '2', 'produtos/casacachorro.webp'),
('Coleira', 'MadDog', '60', '38.97', '2', 'produtos/coleira.avif'),
('Cama', 'Bichinho Chic', '30', '149.99', '2', 'produtos/cama.jpg'),
('Osso', 'S/ Marca', '60', '24.97', '2', 'produtos/osso.jpg'),
('Comeouro e Bebedoro', 'S/ Marca', '30', '34.99', '2', 'produtos/comedouroebebedouro.jpg'),
('Macaco de Pelucia', 'S/ Marca', '35', '19.98', '2', 'produtos/macaco.webp'),
('Arranhador', 'Madalena', '30', '45.97', '3', 'produtos/arranhadores.webp'),
('Coleira para Gato', 'Modernpet', '50', '26.99', '3', 'produtos/coleiragato.webp'),
('Luva tira pelo', 'S/ Marca', '60', '15.97', '3', 'produtos/luva.jpg'),
('Escova de canto', 'Napi', '60', '8.99', '3', 'produtos/escova.jpg'),
('Casa para Gato', 'S/ Marca', '30', '95.99', '3', 'produtos/casagato.jpg'),
('Catnip', 'PowerPets', '60', '14.98', '3', 'produtos/catnips.webp'),
('Viveiro para Passáro', 'Chalesco', '15', '459.99', '4', 'produtos/viveiro.jpg'),
('Aquário', 'OceanTech', '15', '199.99', '4', 'produtos/aquario.jpg'),
('Gaiola para Hamster', 'Pets American', '15', '159.99', '4', 'produtos/gaiola.webp'),
('Bebedouro para Passáro', 'ProBirds', '60', '4.99', '4', 'produtos/bebedouro.webp'),
('Casa Coelho', 'S/ Marca', '40', '59.99', '4', 'produtos/casacoelho.webp'),
('Bebedouro para Répteis', 'Tropical', '20', '39.99', '4', 'produtos/comedourorapt.png'),
('Dispenser saquinho', 'S/ Marca', '60', '13.99', '5', 'produtos/dispenser.jpg'),
('Kit brinquedos', 'S/ Marca', '50', '29.97', '5', 'produtos/kit.webp'),
('Escova com dispenser', 'S/ Marca', '50', '6.99', '5', 'produtos/escovacdispenser.webp'),
('Ração para Cachorro', 'Golden Formula', '50', '99.99', '5', 'produtos/racaoca.webp'),
('Ração para Gato', 'Whiskas', '50', '49.94', '5', 'produtos/whiskas.webp'),
('Ração para Calopsita', 'Zootekna', '50', '6.50', '5', 'produtos/racaopassaro.webp');





--senhas antigas dos funcionarios
--marcos - 456
--carlos - 741
--vanessa - 852
--paula - 963
--clarissa - 4564

--senhas antigas dos clientes
--barbara - 123
--larissa - 312
--maria eduarda - 987
--cristiana - 654
