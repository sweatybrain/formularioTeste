-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Set-2022 às 15:17
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tut`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario_teste`
--

CREATE TABLE `formulario_teste` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formulario_teste`
--

INSERT INTO `formulario_teste` (`id`, `name`, `email`, `cpf`) VALUES
(27, 'meiii', '99@999.com', 'OTk5Ljk5OS45OTk='),
(28, 'jjjjjjjj', 'jjjj@jj.com', 'Li4t'),
(29, 'jijij', 'jijiji@co.com', 'OTk5Ljk5OS45OTktOTk='),
(30, 'myda', 'dan@da.com', 'ODI1LjQ1NS4xMDItMjA='),
(31, 'eeieiei', 'iii@ii.com', 'Mzk0LjgyMi4zODEtMTI='),
(32, 'dani', '99@999.com', 'ODI1LjQ1NS4xMDItMjA='),
(33, 'dani', '99@999.com', 'ODI1LjQ1NS4xMDItMjA='),
(34, 'eieieie', '99@999.com', 'ODI1LjQ1NS4xMDItMjA='),
(35, 'eeeee', '99@999.com', 'ODI1LjQ1NS4xMDItMjA='),
(36, 'eooooo', '99@999.com', 'ODI1LjQ1NS4xMDItMjA=');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `formulario_teste`
--
ALTER TABLE `formulario_teste`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `formulario_teste`
--
ALTER TABLE `formulario_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
