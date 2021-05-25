-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 21:23
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbmessages`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmessage`
--

CREATE TABLE `tbmessage` (
  `idMessage` int(11) NOT NULL,
  `nameFromMessage` varchar(30) DEFAULT NULL,
  `emailFromMessage` varchar(30) DEFAULT NULL,
  `subjectMessage` varchar(30) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmessage`
--

INSERT INTO `tbmessage` (`idMessage`, `nameFromMessage`, `emailFromMessage`, `subjectMessage`, `message`) VALUES
(1, 'David Almeia', 'almeida154@', 'Atualização do laravel', 'Fiquei sabendo que o Laravel ganhará uma nova atualização  em breve. Fique ligado.'),
(2, 'Guilherme Delfino', 'delfs@gmail', 'Reunião', 'Precisamos conversar sobre a empresa.'),
(3, 'Ruy Barbosa', 'barbarosa777@', 'SpaceSoft', 'Nossa startup está crescendo. Acho bom criarmos um MEI.'),
(4, 'Paulo Henrique', 'phmm@inout.com', 'Futebol no final de semana', 'Quer jogar um fut no sábado? '),
(5, 'Juliana Gonzales', 'juli.br@hotmail', 'Casamento', 'Bora casar?'),
(6, 'Camylly', 'camy@gmail', 'Ap novo', 'Convidado para a primeira festa no apartamento novo.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbmessage`
--
ALTER TABLE `tbmessage`
  ADD PRIMARY KEY (`idMessage`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbmessage`
--
ALTER TABLE `tbmessage`
  MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
