-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/04/2019 às 01:25
-- Versão do servidor: 5.7.25-0ubuntu0.18.04.2
-- Versão do PHP: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `senhaAtende` smallint(4) UNSIGNED NOT NULL,
  `statusAtende` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `atende`
--

INSERT INTO `atende` (`codAtende`, `dataAtende`, `senhaAtende`, `statusAtende`) VALUES
(1, '2019-04-16 01:21:17', 1924, 1),
(2, '2019-04-16 01:21:19', 8527, 1),
(3, '2019-04-16 01:21:19', 4129, 1),
(4, '2019-04-16 01:21:20', 4897, 1),
(5, '2019-04-16 01:21:21', 4916, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `atende`
--
ALTER TABLE `atende`
  ADD PRIMARY KEY (`codAtende`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `atende`
--
ALTER TABLE `atende`
  MODIFY `codAtende` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
