-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2022 às 13:21
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stock_management`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `name`, `amount`, `price`) VALUES
(11, 'testee', 5, 22.6),
(12, 'teste', 5, 22.6),
(13, 'camiseta', -2, 233.5),
(14, 'Bota', 2, 30),
(15, 'chinelo', 10, 22.6),
(16, 'Chápeu', 5, 22.6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `purchase`
--

INSERT INTO `purchase` (`id`, `name_product`, `value`, `amount`) VALUES
(18, 'testee', 22.6, 5),
(20, 'short', 22.6, 2),
(21, 'teste', 22.6, 10),
(22, 'calça', 22.6, 10),
(26, 'Bota', 30, 5),
(27, 'chinelo', 22.6, 10),
(28, 'Chápeu', 22.6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `seller` varchar(11) NOT NULL,
  `product` varchar(11) NOT NULL,
  `total` float NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sale`
--

INSERT INTO `sale` (`id`, `date`, `seller`, `product`, `total`, `amount`, `status`, `id_produto`) VALUES
(42, '2022-12-10', 'guilherme', 'teste', 85.55, 2, 'Avista', 6),
(43, '2022-12-08', 'guilhermee', 'teste', 21.11, 20, 'Avista', 6),
(46, '2022-12-10', 'Rosinei', 'Camiseta', 45.2, 4, 'Aprazo', 6),
(47, '2022-12-10', 'Rosinei', 'camiseta', 555.55, 2, 'Aprazo', 13),
(48, '2022-12-02', 'guilhermee', 'bota', 12, 2, 'Avista', 6),
(49, '2022-12-02', 'guilhermee', 'bota', 12, 2, 'Avista', 15),
(50, '2022-12-17', 'Rosinei', 'Bota', 12.22, 3, 'Avista', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `acess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `token`, `acess`) VALUES
(7, 'guilhermee', 'guilherme@14', '123', '697db59a3106a39b490986a0a06ead95', 1),
(9, 'Rosinei', '@rosinei', '12345', 'dee6066e66511fcc3977bff6a824d823', 2),
(12, 'guilherme', 'guilherme@', '3425', '', 1),
(18, 'guilherme', 'guilherme@', '3425', '', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
