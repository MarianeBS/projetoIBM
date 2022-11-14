-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2022 às 18:54
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `magic_db`
--
CREATE DATABASE IF NOT EXISTS `magic_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `magic_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id` int(8) NOT NULL,
  `cat` text NOT NULL,
  `banner1` varchar(100) NOT NULL,
  `banner2` varchar(100) NOT NULL,
  `banner3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id` int(10) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `estado` enum('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO','DF') NOT NULL,
  `preferencia` enum('Princesas','Carrinhos','Bonecos','Heróis','Jogos','Bonecas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `nome`, `sobrenome`, `email`, `senha`, `endereco`, `cep`, `cidade`, `bairro`, `estado`, `preferencia`) VALUES
(2, 'Victor', 'Cardoso', 'vektromboni@gmail.com', 'victor19', 'Rua Dom Marcos Barbosa', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Carrinhos'),
(3, 'sdfsd', 'sdfsdfsd', 'victor@gmail.com', '123456', 'Rua Dom Marcos Barbosa', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Princesas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id` int(11) NOT NULL,
  `nome_contato` text COLLATE utf8_unicode_ci NOT NULL,
  `email_contato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `assunto` text COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_contato`
--

INSERT INTO `tbl_contato` (`id`, `nome_contato`, `email_contato`, `assunto`, `mensagem`) VALUES
(1, 'Victor', 'vektromboni@gmail.com', 'Compras recebidas', 'Não recebi minhas compras no prazo.'),
(2, 'Victor', 'vektromboni@gmail.com', 'Compras não recebidas', 'Onde está minha encomenda????');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id` int(8) NOT NULL,
  `id_categoria` int(8) NOT NULL,
  `nome` text NOT NULL,
  `tipo` text NOT NULL,
  `faixa_etaria` enum('Bebê','Criança','Pré-adolescente','Adolescente') NOT NULL,
  `quant` int(8) NOT NULL,
  `preco` double NOT NULL,
  `marca` varchar(25) NOT NULL,
  `material` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_vendas`
--

CREATE TABLE `tbl_vendas` (
  `id` int(8) NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `data_compra` date NOT NULL,
  `quant` int(4) NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD CONSTRAINT `tbl_produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id`);

--
-- Limitadores para a tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD CONSTRAINT `tbl_vendas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
