-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17-Set-2019 às 10:33
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoander`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datanascimento` date NOT NULL,
  `celular` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `sexo`, `cpf`, `endereco`, `datanascimento`, `celular`, `telefone`) VALUES
(1, 'Ander', 'Masculino', '86163620020', 'Av Dos Prazeres 1287', '1996-05-14', '51984951309', '5130302789'),
(2, 'Marcos', 'Masculino', '95486210035', 'Av Do Forte 650', '2030-09-12', '51985613200', '5130302780'),
(4, 'Larissa Da Cruz', 'Feminino', '86163620025', 'Av Do Forte 650', '2000-05-14', '51984951309', '5130302789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `placaMae` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `processador` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `memoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hd` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fonte` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gabinete` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`id`, `nome`, `placaMae`, `processador`, `memoria`, `hd`, `fonte`, `gabinete`, `valor`) VALUES
(4, 'Computador Gamer 01', 'Gigabyte Ga A320m H Amd Am4', 'Amd Ryzen 3 2200g Cache 6mb', 'Hyperx Fury 4gb 2400mhz', 'Seagate BarraCuda 1TB', 'Corsair 450W 80 Plus Bronze CX450', 'Gaerocool Cylon RGB LED MID Tower ATX', '1500'),
(10, 'Computador Gamer 2', 'Gigabyte Ga A320m H Amd Am4', 'Amd Ryzen 3 2200g Cache 6mb', 'Hyperx Fury 4gb 2400mhz', 'Seagate Barracuda 1tb', 'Corsair 450w 80 Plus Bronze Cx450', 'Nox Pax Atx, IluminaÃ§Ã£o De Led Vermelho', '30000'),
(12, 'Computador Gamer 3', 'Gigabyte Z390 Aorus Master', 'Intel Core I9 9900kf Coffee Lake Refresh', 'Corsair Vengeance 16gb 4x4gb', 'Seagate Barracuda 2tb', 'Evga 850w 80 Plus Bronze Semi Modular', 'Nox Pax Atx, IluminaÃ§Ã£o De Led Vermelho', '10000'),
(16, 'Computador Gamer 4', 'Gigabyte Ga-a320m-h, Amd Am4', 'Amd Ryzen 3 2200g, Cache 6mb, 3.5ghz', 'Hyperx Fury, 4gb, 2400mhz', 'Seagate Barracuda, 1tb', 'Corsair 450w 80 Plus Bronze Cx450', 'Nox Pax Atx, IluminaÃ§Ã£o De Led Vermelho', '400');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `computador`
--
ALTER TABLE `computador`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
