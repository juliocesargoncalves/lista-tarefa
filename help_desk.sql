-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26-Jan-2021 às 15:45
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_desk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`) VALUES
(1, 'pendente'),
(2, 'realizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefas`
--

CREATE TABLE `tb_tarefas` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `tarefa` text NOT NULL,
  `data_cadastrado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tarefas`
--

INSERT INTO `tb_tarefas` (`id`, `id_status`, `tarefa`, `data_cadastrado`) VALUES
(5, 2, 'Estudar para a prova', '2021-01-18 23:08:00'),
(6, 1, 'Comer as 21 Horas', '2021-01-18 23:17:52'),
(8, 1, 'Lavar o carro por dentro', '2021-01-20 14:57:26'),
(9, 1, 'Terminar serviÃ§o garagem 66', '2021-01-26 16:26:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD CONSTRAINT `tb_tarefas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
