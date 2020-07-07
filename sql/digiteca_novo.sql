-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2020 at 09:38 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `LOGIN` varchar(20) DEFAULT NULL,
  `SENHA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`LOGIN`, `SENHA`) VALUES
('ADMIN', 'ADMIN'),
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE `emprestimo` (
  `ID` int NOT NULL,
  `LIVRO_ISBN` varchar(13) NOT NULL,
  `CPF_PESSOA` varchar(11) NOT NULL,
  `DATA_EMPRESTADO` date NOT NULL,
  `TEMPO_EMPRESTIMO` int NOT NULL,
  `STATUS_LIVRO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `ID` int NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `TITULO` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AUTOR` varchar(50) DEFAULT NULL,
  `DESCRICAO` tinytext,
  `GENERO` varchar(20) DEFAULT NULL,
  `EDITORA` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ANO_PUBLICACAO` year DEFAULT NULL,
  `UNIDADES_DISPONIVEIS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`ID`, `ISBN`, `TITULO`, `AUTOR`, `DESCRICAO`, `GENERO`, `EDITORA`, `ANO_PUBLICACAO`, `UNIDADES_DISPONIVEIS`) VALUES
(7840, '7533746477234', 'A VOLTA DA REVOLTA, PARTE II : O RETORNO', 'JAMES BOND E ALISHA CARIS', 'SEM PALAVRAS, O  LIVRO É BOM! MAS EU NAO GOSTEI MUITO', 'DRAME', 'RENOVAR', 2048, 20),
(7931, '7234165353453', 'A VOLTA DA REVOLTA, PARTE II : O RETORNO', 'JAMES BOND E ALISHA CARIS', 'SEM PALAVRAS, O  LIVRO É BOM! MAS EU NAO GOSTEI MUITO', 'COMEDIA', 'PREENCHER', 2047, 12);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `SOBRENOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONE` int DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`CPF`, `NOME`, `SOBRENOME`, `EMAIL`, `TELEFONE`, `DATA_NASCIMENTO`) VALUES
('05042237046', 'GABRIEL', 'GREGORIO', 'GABRIEL.@NEUTRO.COM', 178723242, '2001-01-22'),
('48789566871', 'Fabiano ', 'Grande', 'san@gmail.com', 1898745874, '2014-01-20'),
('75059876071', 'Severino', 'Ricardo', 'SEVERINOB@PT.ORG.COM', 9923424, '1995-03-05'),
('90091120047', 'Bruno', 'Henrique', 'BRUNO@DEDIA.COM', 981232131, '1998-01-02'),
('92981061062', 'Nelson', ' Thales', 'TALHES@NELSON.PT', 1242312412, '1997-02-07'),
('93830678029', 'Bruno', 'Juan', 'BRUNO@NALRO.GOV.US', 998232523, '1993-03-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CPF_PESSOA` (`CPF_PESSOA`),
  ADD KEY `LIVRO_ISBN` (`LIVRO_ISBN`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7934;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`CPF_PESSOA`) REFERENCES `usuarios` (`CPF`),
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`LIVRO_ISBN`) REFERENCES `livros` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
