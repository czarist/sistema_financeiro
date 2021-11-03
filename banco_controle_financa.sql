-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2021 às 04:58
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_controle_financa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_transacao`
--

CREATE TABLE `t_transacao` (
  `id` int(11) NOT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `datahora_cadastro` datetime DEFAULT NULL,
  `datahora_ultimaalteracao` datetime DEFAULT NULL,
  `arquivo_comprovante` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_transacao`
--

INSERT INTO `t_transacao` (`id`, `tipo`, `descricao`, `valor`, `data`, `id_usuario`, `datahora_cadastro`, `datahora_ultimaalteracao`, `arquivo_comprovante`) VALUES
(10, 's', '5tesada', '123.00', '2013-03-01', 1, '2021-11-01 15:42:43', '2021-11-01 15:42:43', './uploads/comprovantes/ideia_grid.png'),
(11, 's', 'teste2', '5000.00', '2021-11-04', 2, '2021-11-01 15:45:30', '2021-11-01 19:58:07', './uploads/comprovantes/ideia_grid2.png'),
(12, 's', 'teste', '123.00', '2021-12-02', 2, '2021-11-01 15:57:39', '2021-11-01 15:57:39', './uploads/comprovantes/ideia_grid3.png'),
(13, 's', 'teste', '123.00', '2021-11-20', 2, '2021-11-01 16:07:50', '2021-11-01 16:07:50', './uploads/comprovantes/ideia_grid4.png'),
(14, 'a', 'teste', '123.00', '2021-11-23', 2, '2021-11-01 16:09:01', '2021-11-01 16:09:01', './uploads/comprovantes/ideia_grid5.png'),
(15, 's', 'teste', '123.00', '2021-11-05', 2, '2021-11-01 16:09:43', '2021-11-01 16:09:43', './uploads/comprovantes/ideia_grid6.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `token_recuperacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_usuario`
--

INSERT INTO `t_usuario` (`id`, `nome`, `email`, `senha`, `token_recuperacao`) VALUES
(1, 'Lucas Cezar', 'czartrentin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', ''),
(2, 'cezar', 'lucastrenty@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `t_transacao`
--
ALTER TABLE `t_transacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `t_transacao`
--
ALTER TABLE `t_transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
