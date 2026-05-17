--
-- Base de Dados: `rep`
--
CREATE DATABASE `rep` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rep`;

-- Estrutura da tabela `descartador`
--
CREATE TABLE descartador (
  id_descartador int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  dec_nome varchar(100) NOT NULL,
  dec_cpf varchar(14) NOT NULL,
  dec_email varchar(50) NOT NULL,
  dec_senha char(40) NOT NULL,
  dec_telefone varchar(14) NOT NULL
  );
  
-- Estrutura da tabela `receptor`
--
CREATE TABLE receptor (
  id_receptor int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rec_nome varchar(100) NOT NULL,
  rec_telefone varchar(14) NOT NULL,
  rec_endereco varchar(100) NOT NULL,
  rec_cpf_cnpj varchar(18) NOT NULL,
  rec_email varchar(50) NOT NULL,
  rec_senha char(40) NOT NULL,
  rec_tipo_recebido varchar(30)
);

-- Estrutura da tabela `endereco`
--
CREATE TABLE endereco (
  id_endereco int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  end_nome varchar(100) NOT NULL,
  end_numero int(11) NOT NULL,
  end_cep varchar(9) NOT NULL,
  end_complemento varchar(20) DEFAULT NULL,
  id_descartador_fk int,
  FOREIGN KEY (id_descartador_fk) REFERENCES descartador(id_descartador)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);


-- Estrutura da tabela `residuo`
--
CREATE TABLE residuo (
  id_residuo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(30) NOT NULL
);

-- Estrutura da tabela `historico`
--
CREATE TABLE historico (
  id_historico int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_descartador_fk int,
  id_receptor_fk int,
  data_HIST datetime,
  FOREIGN KEY (id_descartador_fk) REFERENCES descartador(id_descartador),
  FOREIGN KEY (id_receptor_fk) REFERENCES receptor(id_receptor)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

-- Estrutura da tabela `historico_residuo`
--
CREATE TABLE historico_residuo (
  id_historico_residuo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_residuo_fk int,
  id_historico_fk int,
  FOREIGN KEY (id_historico_fk) REFERENCES historico(id_historico),
  FOREIGN KEY (id_residuo_fk) REFERENCES residuo(id_residuo)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

-- Extraindo dados da tabela `residuo`
--

INSERT INTO `residuo` (`id_residuo`, `nome`) VALUES
(1, 'Pilha'),
(2, 'Cabo'),
(3, 'Monitor'),
(4, 'CPU'),
(5, 'Fio'),
(6, 'Lâmpada Eletrônica'),
(7, 'Aparelho de Som'),
(8, 'Carregador'),
(9, 'Celular'),
(10, 'Telefone'),
(11, 'Rádio'),
(12, 'Micro-ondas'),
(13, 'Fogão'),
(14, 'Geladeira'),
(15, 'Computador'),
(16, 'Notebook'),
(17, 'Impressora'),
(18, 'Teclado'),
(19, 'Mouse'),
(20, 'HD'),
(21, 'SSD'),
(22, 'Placa-Mãe'),
(23, 'Fonte de Alimentação'),
(24, 'Tablet'),
(25, 'Freezer'),
(26, 'Máquina de Lavar'),
(27, 'Ferro de Passar'),
(28, 'Ar-condicionado'),
(29, 'Ventilador'),
(30, 'Forno Elétrico'),
(31, 'Televisão'),
(32, 'Câmera'),
(33, 'Console'),
(34, 'Disquetes'),
(35, 'CD'),
(36, 'DVD'),
(37, 'Fitas VHS'),
(38, 'Bateria de celular'),
(39, 'Bateria de veículos'),
(40, 'Bateria de laptops'),
(41, 'Roteador'),
(42, 'Modem'),
(43, 'Switch'),
(44, 'Antena'),
(45, 'Furadeira Elétrica'),
(46, 'Lixadeira Elétrica'),
(47, 'Serra elétrica'),
(48, 'Chave Elétrica'),
(49, 'Fone de Ouvido'),
(50, 'Relógio Digital'),
(51, 'Calculadora'),
(52, 'Brinquedo Eletrônico'),
(53, 'Óculos Realidade Virtual (VR)'),
(54, 'Monitor de pressão'),
(55, 'Lâmpada Fluorescente'),
(56, 'Lâmpada LED'),
(57, 'Lâmpada'),
(58, 'Termômetro Digital'),
(59, 'Oxímetro'),
(60, 'Monitor de Glicemia'),
(61, 'Balança Digital');

SELECT * FROM descartador;
SELECT * FROM receptor;
SELECT * FROM endereco;
SELECT * FROM residuo;