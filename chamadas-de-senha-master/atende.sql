-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/06/2024 às 15:42
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atendimento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atende`
--

CREATE TABLE `atende` (
  `codAtende` tinyint(3) UNSIGNED NOT NULL,
  `dataAtende` datetime NOT NULL,
  `senhaAtende` varchar(10) NOT NULL,
  `statusAtende` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `atende`
--

INSERT INTO `atende` (`codAtende`, `dataAtende`, `senhaAtende`, `statusAtende`) VALUES
(107, '2024-06-28 15:13:32', '9614', 3),
(106, '2024-06-28 15:13:31', '3964', 3),
(105, '2024-06-28 15:13:30', '7683', 3),
(104, '2024-06-28 15:13:29', '428P', 3),
(103, '2024-06-28 15:13:28', '954P', 3),
(102, '2024-06-28 15:13:28', '730P', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `guiche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atende`
--
ALTER TABLE `atende`
  ADD PRIMARY KEY (`codAtende`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atende`
--
ALTER TABLE `atende`
  MODIFY `codAtende` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
