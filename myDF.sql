-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 27, 2024 alle 00:11
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_updown`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `filter`
--

CREATE TABLE `filter` (
  `id_filter` tinyint(4) NOT NULL,
  `description` varchar(20) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `filter`
--

INSERT INTO `filter` (`id_filter`, `description`, `value`) VALUES
(1, 'Piu\' recenti', 'dateUp'),
(2, 'Meno Recenti', 'dateDown'),
(3, 'Punteggio piu\' alto', 'scoreUp'),
(4, 'Punteggio piu\' basso', 'scoreDown');

-- --------------------------------------------------------

--
-- Struttura della tabella `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `fk_user` smallint(6) NOT NULL,
  `game_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `games`
--

INSERT INTO `games` (`id_game`, `score`, `fk_user`, `game_date`) VALUES
(1, 12, 1, '2024-04-01'),
(2, 23, 1, '2024-04-01'),
(3, 3, 1, '2024-04-04'),
(4, 6, 2, '2024-04-05'),
(5, 50, 1, '2024-04-08'),
(6, 4, 1, '2024-04-02'),
(7, 3, 3, '2024-04-17'),
(8, 12, 4, '2024-04-10'),
(9, 12, 5, '2024-04-06'),
(10, 5, 6, '2024-04-22'),
(11, 80, 1, '2024-04-22'),
(12, 10, 1, '2024-04-22'),
(13, 20, 3, '2024-04-22'),
(14, 0, 1, '2024-04-22'),
(15, 0, 1, '2024-04-22'),
(16, 40, 3, '2024-04-22'),
(17, 50, 2, '2024-04-22'),
(18, 0, 3, '2024-04-22'),
(19, 10, 3, '2024-04-22'),
(20, 10, 3, '2024-04-22'),
(21, 0, 3, '2024-04-22'),
(22, 20, 3, '2024-04-22'),
(23, 10, 3, '2024-04-22'),
(24, 10, 3, '2024-04-22'),
(25, 20, 3, '2024-04-22'),
(26, 0, 3, '2024-04-22'),
(27, 10, 3, '2024-04-22'),
(28, 10, 3, '2024-04-22'),
(29, 10, 3, '2024-04-22'),
(30, 10, 3, '2024-04-22'),
(31, 10, 3, '2024-04-22'),
(32, 0, 3, '2024-04-22'),
(33, 10, 3, '2024-04-22'),
(34, 10, 3, '2024-04-22'),
(35, 10, 3, '2024-04-22'),
(36, 10, 3, '2024-04-22'),
(37, 10, 3, '2024-04-22'),
(38, 10, 3, '2024-04-22'),
(39, 10, 3, '2024-04-22'),
(40, 10, 3, '2024-04-22'),
(41, 10, 3, '2024-04-22'),
(42, 10, 3, '2024-04-22'),
(43, 10, 3, '2024-04-22'),
(44, 10, 3, '2024-04-22'),
(45, 20, 3, '2024-04-22'),
(46, 10, 3, '2024-04-22'),
(47, 10, 3, '2024-04-22'),
(48, 10, 3, '2024-04-22'),
(49, 0, 3, '2024-04-22'),
(50, 0, 3, '2024-04-22'),
(51, 0, 3, '2024-04-22'),
(52, 0, 3, '2024-04-22'),
(53, 0, 3, '2024-04-22'),
(54, 10, 3, '2024-04-22'),
(55, 10, 3, '2024-04-22'),
(56, 0, 3, '2024-04-22'),
(57, 0, 3, '2024-04-22'),
(58, 0, 3, '2024-04-22'),
(59, 0, 3, '2024-04-22'),
(60, 0, 3, '2024-04-22'),
(61, 0, 3, '2024-04-22'),
(62, 0, 3, '2024-04-22'),
(63, 23, 3, '2024-04-17'),
(64, 60, 3, '2024-04-22'),
(65, 10, 11, '2024-04-22'),
(66, 40, 11, '2024-04-22'),
(67, 20, 11, '2024-04-22'),
(68, 10, 11, '2024-04-22'),
(69, 20, 11, '2024-04-22'),
(70, 30, 11, '2024-04-22'),
(71, 0, 11, '2024-04-22'),
(72, 50, 11, '2024-04-22'),
(73, 0, 11, '2024-04-22'),
(74, 10, 11, '2024-04-22'),
(75, 0, 11, '2024-04-22'),
(76, 0, 11, '2024-04-22'),
(77, 0, 11, '2024-04-22'),
(78, 0, 11, '2024-04-22'),
(79, 0, 11, '2024-04-22'),
(80, 40, 11, '2024-04-22'),
(81, 40, 11, '2024-04-22'),
(82, 30, 12, '2024-04-22'),
(83, 40, 12, '2024-04-22'),
(84, 0, 1, '2024-04-22'),
(85, 30, 11, '2024-04-23'),
(86, 0, 11, '2024-04-23'),
(87, 10, 17, '2024-04-23'),
(88, 0, 17, '2024-04-23'),
(89, 30, 13, '2024-04-23'),
(90, 0, 13, '2024-04-23'),
(91, 30, 18, '2024-04-23'),
(92, 0, 18, '2024-04-23'),
(93, 10, 15, '2024-04-23'),
(94, 10, 15, '2024-04-23'),
(95, 30, 15, '2024-04-23');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` smallint(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Alberto123', '202cb962ac59075b964b07152d234b70'),
(2, 'Luigi123', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(3, 'albe', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'abc', '202cb962ac59075b964b07152d234b70'),
(5, 'def', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(6, 'ghi', '202cb962ac59075b964b07152d234b70'),
(7, 'lmn', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(8, 'opq', '202cb962ac59075b964b07152d234b70'),
(9, 'rst', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(10, 'Mirco', '202cb962ac59075b964b07152d234b70'),
(11, 'Marco', '202cb962ac59075b964b07152d234b70'),
(12, 'Aurelia', 'b2ef9c7b10eb0985365f913420ccb84a'),
(13, 'Beatrice', '202cb962ac59075b964b07152d234b70'),
(14, 'Pierpaolo', '7815696ecbf1c96e6894b779456d330e'),
(15, 'Francesco', '5f039b4ef0058a1d652f13d612375a5b'),
(16, 'Federico', '7486fc6c0fba42e3300c2910ac5f87ed'),
(17, 'Gesù', '202cb962ac59075b964b07152d234b70'),
(18, 'Marcantonio', '42732a4781317edaa907b98b3c4786cc');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id_filter`);

--
-- Indici per le tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `filter`
--
ALTER TABLE `filter`
  MODIFY `id_filter` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
