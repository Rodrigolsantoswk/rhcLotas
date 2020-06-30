-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.rf.gd
-- Tempo de geração: 30/06/2020 às 15:05
-- Versão do servidor: 5.6.47-87.0
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_26021611_rhcLotas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `idImagem` int(11) NOT NULL,
  `nomeImagem` varchar(100) NOT NULL,
  `idLotas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotas`
--

CREATE TABLE `lotas` (
  `idLotas` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `horapostagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantidade` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperarsenhas`
--

CREATE TABLE `recuperarsenhas` (
  `idRecuperar` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `novaSenha` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `idSolicitacoes` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `imagemUsuario` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `acesso` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `imagemUsuario` varchar(100) NOT NULL,
  `acesso` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `nomeUsuario`, `senha`, `imagemUsuario`, `acesso`) VALUES
(1, 'guinhoeuposso', 'guinhoeuposso', '$2y$10$i51EMww9TXL2214kn5K.6em1EXLJmu5CCBQaxqTNQJwWjJVOA.xEC', '1592858916.jpg', 'administrador'),
(21, 'guinhoeuposso2', 'guinhoeuposso', '$2y$10$l0EIovJoPX.EKzVdOy0mEOONGmFLV46j26JGLTcaB0WjtlYL6pxyO', '1593540309.jpg', 'usuario');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`idImagem`),
  ADD UNIQUE KEY `idImagem` (`idImagem`),
  ADD UNIQUE KEY `nomeImagem` (`nomeImagem`);

--
-- Índices de tabela `lotas`
--
ALTER TABLE `lotas`
  ADD PRIMARY KEY (`idLotas`),
  ADD UNIQUE KEY `idLotas` (`idLotas`);

--
-- Índices de tabela `recuperarsenhas`
--
ALTER TABLE `recuperarsenhas`
  ADD PRIMARY KEY (`idRecuperar`);

--
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`idSolicitacoes`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `lotas`
--
ALTER TABLE `lotas`
  MODIFY `idLotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `recuperarsenhas`
--
ALTER TABLE `recuperarsenhas`
  MODIFY `idRecuperar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `idSolicitacoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
