-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/07/2020 às 05:46
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `digiteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ADMINISTRADOR`
--

CREATE TABLE `ADMINISTRADOR` (
  `LOGIN` varchar(20) DEFAULT NULL,
  `SENHA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `ADMINISTRADOR`
--

INSERT INTO `ADMINISTRADOR` (`LOGIN`, `SENHA`) VALUES
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `EMPRESTIMO`
--

CREATE TABLE `EMPRESTIMO` (
  `ID` int(11) NOT NULL,
  `LIVRO_ISBN` varchar(13) DEFAULT NULL,
  `CPF_PESSOA` varchar(11) DEFAULT NULL,
  `DATA_EMPRESTADO` date DEFAULT NULL,
  `TEMPO_EMPRESTIMO` int(11) DEFAULT NULL,
  `STATUS_LIVRO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `EMPRESTIMO`
--

INSERT INTO `EMPRESTIMO` (`ID`, `LIVRO_ISBN`, `CPF_PESSOA`, `DATA_EMPRESTADO`, `TEMPO_EMPRESTIMO`, `STATUS_LIVRO`) VALUES
(7, '7533746477234', '63643107021', '2020-07-05', 3, 'NÃO DEVOLVIDO'),
(8, '7234165353453', '49521803010', '2020-07-05', 5, 'DEVOLVIDO'),
(9, '7234165353453', '63643107021', '2020-07-04', 5, 'DEVOLVIDO'),
(10, '7533746477234', '58515540029', '2020-07-03', 5, 'NÃO DEVOLVIDO'),
(11, '1231231244735', '24573258035', '2020-07-03', 5, 'DEVOLVIDO'),
(12, '1231231244735', '05839927066', '2020-07-02', 5, 'NÃO DEVOLVIDO'),
(13, '9802345257834', '05839927066', '2020-06-27', 2, 'DEVOLVIDO'),
(14, '9802345257834', '24573258035', '2020-06-26', 14, 'DEVOLVIDO'),
(15, '7234165353453', '24573258035', '2020-06-25', 7, 'NÃO DEVOLVIDO'),
(16, '1231231244735', '58515540029', '2020-06-24', 9, 'DEVOLVIDO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `LIVROS`
--

CREATE TABLE `LIVROS` (
  `ISBN` varchar(13) NOT NULL,
  `AUTOR` varchar(50) DEFAULT NULL,
  `TITULO` varchar(100) DEFAULT NULL,
  `DESCRICAO` varchar(1000) DEFAULT NULL,
  `GENERO` varchar(20) DEFAULT NULL,
  `UNIDADES_DISPONIVEIS` int(11) DEFAULT NULL,
  `EDITORA` varchar(50) DEFAULT NULL,
  `ANO_PUBLICACAO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `LIVROS`
--

INSERT INTO `LIVROS` (`ISBN`, `AUTOR`, `TITULO`, `DESCRICAO`, `GENERO`, `UNIDADES_DISPONIVEIS`, `EDITORA`, `ANO_PUBLICACAO`) VALUES
('1231231244735', 'josé de alencar', 'O Guarani', 'Em uma fazenda no interior do Rio de Janeiro, moram D. Antônio de Mariz e sua família, formada pela esposa D. Lauriana, o filho D. Diogo e a filha Cecília. A casa abriga ainda a mestiça Isabel (na verdade, filha bastarda de D. Antônio), apaixonada pelo moço Álvaro, que, no entanto, só tinha olhos para Cecília. O índio Peri, que salvou certa vez Cecília de ser atingida por uma pedra, permaneceu no lugar a pedido da moça, morando em uma cabana. Peri passa a se dedicar inteiramente à satisfação de todas as vontades de Cecília, a quem chama simplesmente de Ceci. Acidentalmente, D. Diogo mata uma índia aimoré. Como vingança, a família', 'Romantismo', 2, 'BRASILEIRA', '2001-07-23'),
('7234165353453', 'Júlio Verne', 'Vinte Mil Léguas Submarinas', 'Em 1866, o Professor Pierre M. Aronnax e seu assistente Conseil, que estão em São Francisco para pesquisar relatos de um monstro marinho gigante atacando navios no Oceano Pacífico, são convidados a participar de uma expedição para procurar a criatura. Durante a busca, eles e o arpoador Ned Land são lançados ao mar durante um ataque, acabando por descobrir que o monstro é na verdade um submarino pilotado pelo brilhante, mas assombrado, Capitão Nemo.', 'Aventura', 12, 'Reeditora', '2015-09-08'),
('7533746477234', 'Mário de Andrade', 'Macunaíma', 'Macunaíma e a renovação da linguagem literária. Publicado em 1928, numa tiragem de apenas oitocentos exemplares (Mário de Andrade não conseguira editor), Macunaíma, o herói sem nenhum caráter, é uma das obras pilares da cultura brasileira.', 'Drama', 20, 'Brasil edidocs', '2019-01-02'),
('9802345257834', 'josé de alencar', 'Iracema', 'Iracema, ícone do indianismo romântico, teve sua primeira publicação em 1865 e figura até hoje entre as principais obras literárias brasileiras. De autoria de José de Alencar, cujo projeto artístico envolvia a consolidação de uma cultura nacional, Iracema é uma narrativa de fundação, ou seja, seu eixo temático principal versa sobre a criação de uma identidade cultural, um texto que se orienta para representar a origem da nacionalidade brasileira.', 'Romantismo', 5, 'RENOVAR', '1990-02-01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `SOBRENOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `USUARIOS`
--

INSERT INTO `USUARIOS` (`CPF`, `NOME`, `SOBRENOME`, `EMAIL`, `TELEFONE`, `DATA_NASCIMENTO`) VALUES
('05839927066', 'Bruno', 'Juan', 'bruno.juan@fatec.sp.gpv.br', '17997567372', '1993-03-12'),
('24573258035', 'Nelson', ' Thales', 'nelson.thales@fatec.sp.gpv.br', '18997327453', '1997-02-07'),
('49521803010', 'Severino', 'Santos', 'severino.santos@fatec.sp.gpv.br', '17997325734', '1995-03-05'),
('58515540029', 'Gabriel', 'Gregorio', 'gabriel.gregorio@fatec.sp.gpv.br', '18997362421', '2001-01-22'),
('63643107021', 'BRUNO', 'Henrique', 'bruno.henrique@fatec.sp.gpv.br', '17997342385', '1998-01-02');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `EMPRESTIMO`
--
ALTER TABLE `EMPRESTIMO`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CPF_PESSOA` (`CPF_PESSOA`),
  ADD KEY `LIVRO_ISBN` (`LIVRO_ISBN`);

--
-- Índices de tabela `LIVROS`
--
ALTER TABLE `LIVROS`
  ADD PRIMARY KEY (`ISBN`);

--
-- Índices de tabela `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `EMPRESTIMO`
--
ALTER TABLE `EMPRESTIMO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `EMPRESTIMO`
--
ALTER TABLE `EMPRESTIMO`
  ADD CONSTRAINT `EMPRESTIMO_ibfk_1` FOREIGN KEY (`CPF_PESSOA`) REFERENCES `USUARIOS` (`CPF`),
  ADD CONSTRAINT `EMPRESTIMO_ibfk_2` FOREIGN KEY (`LIVRO_ISBN`) REFERENCES `LIVROS` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
