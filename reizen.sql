-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 mei 2022 om 21:46
-- Serverversie: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP-versie: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `david`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `reisID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bestemming` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `inschrijvingen` int(100) NOT NULL,
  `counter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`reisID`, `titel`, `bestemming`, `omschrijving`, `begindatum`, `einddatum`, `inschrijvingen`, `counter`) VALUES
(1, 'Test project', 'Test', 'Dit is een omschrijving om te testen of alles werkt ', '2022-05-17', '2022-05-19', 10, 0),
(2, 'Test Project', 'Test 1 ', 'Dit is een omschrijving voor de test', '2022-05-16', '2022-05-16', 1, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`reisID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `reisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
