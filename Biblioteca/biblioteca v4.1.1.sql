-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2019 às 01:56
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao`
--

CREATE TABLE `devolucao` (
  `cod` int(10) NOT NULL,
  `data` varchar(35) NOT NULL,
  `multa` float(4,2) NOT NULL,
  `cod_emprestimo` int(10) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `devolucao`
--

INSERT INTO `devolucao` (`cod`, `data`, `multa`, `cod_emprestimo`, `id_usuario`) VALUES
(13, '24/11/19', 0.00, 14, 412966),
(15, '25/11/19', 0.00, 14, 412966),
(16, '25/11/19', 0.00, 15, 412966);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `cod` int(10) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `telefone` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`cod`, `nome`, `telefone`, `email`) VALUES
(2, 'oi', '(88) 9944-0326', 'editora@hotmail.com'),
(62900000, 'fdgfdg fdgfdgf', '0', 'editora@hotmail.com'),
(2147483647, 'fgdfdgfdg', '(88) 9944-0326', 'sdfdsf@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `cod` int(10) NOT NULL,
  `data` varchar(35) NOT NULL,
  `prazo` varchar(35) NOT NULL,
  `cod_exemplar` int(10) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`cod`, `data`, `prazo`, `cod_exemplar`, `id_usuario`) VALUES
(12, '24/11/19', '24/12/19', 46, 412966),
(14, '24/11/19', '24/12/19', 45, 412966),
(15, '25/11/19', '24/12/19', 48, 412966),
(16, '25/11/19', '24/12/19', 47, 412966);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `cod` int(10) NOT NULL,
  `cod_editora` int(10) NOT NULL,
  `titulo` varchar(35) NOT NULL,
  `autor` varchar(55) NOT NULL,
  `edicao` varchar(35) NOT NULL,
  `sinopse` varchar(1024) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `alugado` tinyint(1) NOT NULL,
  `reservado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`cod`, `cod_editora`, `titulo`, `autor`, `edicao`, `sinopse`, `genero`, `alugado`, `reservado`) VALUES
(45, 2, 'sdkjasjd', 'sdfsdfdsfdsf', '2', 'rdgfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'masculon', 0, 1),
(47, 2, '456546', 'sdfsdfdsfdsf', '5465454', 'dsfdsfdsfd', 'fsdfdsf', 1, 0),
(48, 2, 'sdfdsf', 'sdfsdfds', '234', 'dsfsdfsd', 'fsdfsd', 1, 0),
(49, 2, 'aBRA', 'William Shakespeare', '2', 'sadsad', 'sadasd', 0, 0),
(50, 2, 'ZICO', '345435', '324324', '324324324', '234234', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `cod` int(11) NOT NULL,
  `data` varchar(35) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `cod_livro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`cod`, `data`, `id_usuario`, `cod_livro`) VALUES
(38, '24/11/19', 412966, 45),
(39, '24/11/19', 412966, 46),
(40, '25/11/19', 412966, 47),
(41, '25/11/19', 412966, 48);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `matricula` int(20) NOT NULL,
  `senha` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `matricula`, `senha`) VALUES
(34, 'Gabriel', 213123, '123'),
(33, 'cansas', 324324, '123'),
(2, 'Davi', 412900, '123'),
(1, 'Joao', 412966, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devolucao`
--
ALTER TABLE `devolucao`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_emprestimo` (`cod_emprestimo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_exemplar` (`cod_exemplar`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_editora` (`cod_editora`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_livro` (`cod_livro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devolucao`
--
ALTER TABLE `devolucao`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD CONSTRAINT `devolucao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`matricula`);

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`matricula`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
