-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2019 às 20:43
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
  `cod_emprestimo` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `data` date NOT NULL,
  `multa` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `data` date NOT NULL,
  `prazo` date NOT NULL,
  `limit_renovacoes` int(10) NOT NULL,
  `cod_exemplar` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exemplar`
--

CREATE TABLE `exemplar` (
  `cod` int(10) NOT NULL,
  `cod_livro` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ano` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(42, 2, 'saldksald', 'William Shakespeare', '213', 'fdsfdgfdgf', 'masculino', 0, 0),
(43, 2, '456546', '45435', '2', 'sdfdsfds', 'wqdsa', 0, 1);

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
(31, '23/11/19', 412966, 43);

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
-- Indexes for table `exemplar`
--
ALTER TABLE `exemplar`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_livro` (`cod_livro`);

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
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
