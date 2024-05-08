-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/05/2024 às 19:05
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

DROP DATABASE IF EXISTS `loja`;
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(3, 'Vestuário'),
(6, 'Utensilio de cozinha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cnpj_cli` varchar(18) NOT NULL,
  `nome_cli` varchar(50) DEFAULT NULL,
  `numero_cli` varchar(10) DEFAULT NULL,
  `bairro_cli` varchar(10) DEFAULT NULL,
  `cidade_cli` varchar(20) DEFAULT NULL,
  `cep_cli` varchar(10) DEFAULT NULL,
  `estado_cli` varchar(2) DEFAULT NULL,
  `endereco_cli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `numero_compra` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor_comissao` decimal(10,2) DEFAULT NULL,
  `valor_transporte` decimal(10,2) DEFAULT NULL,
  `cpf_cnpj_vend` varchar(18) DEFAULT NULL,
  `cpf_cnpj_trans` varchar(18) DEFAULT NULL,
  `cpf_cnpj_cli` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `codigo_img` int(11) NOT NULL,
  `codigo_prod` varchar(10) DEFAULT NULL,
  `nome_arquivo` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`codigo_img`, `codigo_prod`, `nome_arquivo`) VALUES
(1, '1', 'https://i.imgur.com/H5MqEfu.png'),
(4, '12', 'https://i.imgur.com/jNWIpNB.png'),
(123, '121', 'a'),
(1234, '121', 'as');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itemcompra`
--

CREATE TABLE `itemcompra` (
  `numero_compra` int(11) DEFAULT NULL,
  `codigo_prod` varchar(10) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` varchar(10) NOT NULL,
  `nome_pro` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(5,2) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `dimensoes` varchar(15) DEFAULT NULL,
  `unidade_venda` varchar(3) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `nome_pro`, `descricao`, `valor_unitario`, `quantidade`, `peso`, `dimensoes`, `unidade_venda`, `id_categoria`) VALUES
('1', 'Camiseta', 'Camiseta', 20.00, 20.00, '20', '20', '20', 3),
('12', 'Manga', 'Manga', 90.00, 90.00, '90', '90', '90', 3),
('121', 'Atum', '1', 1.00, 1.00, '1', '1', '1', 3),
('43', 'Atum', '1', 1.00, 1.00, '1', '1', '1', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `cpf_cnpj_trans` varchar(18) NOT NULL,
  `nome_trans` varchar(50) DEFAULT NULL,
  `endereco_trans` varchar(50) DEFAULT NULL,
  `numero_trans` varchar(10) DEFAULT NULL,
  `bairro_trans` varchar(10) DEFAULT NULL,
  `cidade_trans` varchar(5) DEFAULT NULL,
  `estado_trans` varchar(2) DEFAULT NULL,
  `cep_trans` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `transportadora`
--

INSERT INTO `transportadora` (`cpf_cnpj_trans`, `nome_trans`, `endereco_trans`, `numero_trans`, `bairro_trans`, `cidade_trans`, `estado_trans`, `cep_trans`) VALUES
('121212', 'RM Transportes Express', 'aba', 'aba', 'aba', 'aba', 'ab', 'aba');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cpf_cnpj_vend` varchar(18) NOT NULL,
  `nome_vend` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`cpf_cnpj_vend`, `nome_vend`) VALUES
('45069533800', 'Maria Fernanda');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf_cnpj_cli`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `cpf_cnpj_vend` (`cpf_cnpj_vend`),
  ADD KEY `cpf_cnpj_cli` (`cpf_cnpj_cli`),
  ADD KEY `cpf_cnpj_trans` (`cpf_cnpj_trans`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`codigo_img`),
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices de tabela `itemcompra`
--
ALTER TABLE `itemcompra`
  ADD KEY `numero_compra` (`numero_compra`),
  ADD KEY `codigo_prod` (`codigo_prod`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_prod`),
  ADD KEY `id` (`id_categoria`);

--
-- Índices de tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`cpf_cnpj_trans`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cpf_cnpj_vend`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cpf_cnpj_vend`) REFERENCES `vendedor` (`cpf_cnpj_vend`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`cpf_cnpj_cli`) REFERENCES `cliente` (`cpf_cnpj_cli`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`cpf_cnpj_trans`) REFERENCES `transportadora` (`cpf_cnpj_trans`);

--
-- Restrições para tabelas `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Restrições para tabelas `itemcompra`
--
ALTER TABLE `itemcompra`
  ADD CONSTRAINT `ItemCompra_ibfk_1` FOREIGN KEY (`numero_compra`) REFERENCES `compra` (`numero_compra`),
  ADD CONSTRAINT `ItemCompra_ibfk_2` FOREIGN KEY (`codigo_prod`) REFERENCES `produto` (`codigo_prod`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
