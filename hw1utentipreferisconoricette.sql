-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 22:25
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1utentipreferisconoricette`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiscono`
--

CREATE TABLE `preferiscono` (
  `utente` int(11) NOT NULL,
  `ricetta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `preferiscono`
--

INSERT INTO `preferiscono` (`utente`, `ricetta`) VALUES
(2, 9),
(2, 10),
(4, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `ricette`
--

CREATE TABLE `ricette` (
  `id_ricetta` int(11) NOT NULL,
  `nomePiatto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ricette`
--

INSERT INTO `ricette` (`id_ricetta`, `nomePiatto`) VALUES
(9, 'Pane Carasau'),
(10, 'Pane, Zucchero, Vino'),
(11, 'Banana daiquiri'),
(12, 'Banana Milkshake'),
(13, 'Pizza Margherita'),
(14, 'Pane Pomodoro with Burrata, Speck, and Pickled Shallots'),
(15, 'Cook the Book: Catalan-Style Turkey'),
(16, 'Spaghetti Carbonara'),
(17, 'Plaice Roll-Ups'),
(18, 'Simple Pizza Margherita'),
(19, '3 ingredients Gnocchi gratin'),
(20, 'Patate In Agrodolce (Sweet '),
(21, 'Patate in Tecia'),
(22, 'Grilled Pizza Margherita'),
(23, 'Pasta alla Gricia Recipe'),
(24, 'Orecchiette Carbonara');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `email`, `nome`, `cognome`, `username`, `password`) VALUES
(2, 'andrea.oliveri@gmail.com', 'Andrea', 'Oliveri', 'andOli02', '$2y$10$2uSXKhlJ4bxkTLOQ9flfXe6oY.au.yFc4N/jxDBNekiK6k4rpmHvG'),
(4, 'davide.oliveri@gmail.com', 'Davide', 'Oliveri', 'davOli02', '$2y$10$hKRlF8IQe7CjoqFygL8viuSzqYcMMOT0RHWAnhIdVKbmsRcequDC.'),
(5, 'u@gmail.com', 'utente1', 'utente1', 'ut01', '$2y$10$nSYNLJDsg9U9Si8FPTp8meX1TkaIeMGg/fvUdjlswLqHuJAZt9FwK');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `preferiscono`
--
ALTER TABLE `preferiscono`
  ADD PRIMARY KEY (`utente`,`ricetta`),
  ADD KEY `ricetta` (`ricetta`);

--
-- Indici per le tabelle `ricette`
--
ALTER TABLE `ricette`
  ADD PRIMARY KEY (`id_ricetta`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ricette`
--
ALTER TABLE `ricette`
  MODIFY `id_ricetta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `preferiscono`
--
ALTER TABLE `preferiscono`
  ADD CONSTRAINT `preferiscono_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utenti` (`id_utente`),
  ADD CONSTRAINT `preferiscono_ibfk_2` FOREIGN KEY (`ricetta`) REFERENCES `ricette` (`id_ricetta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
