-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 03:10 PM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex84228`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `location`, `reisID`) VALUES
(2, 'Test 1 ', 'test1', 1),
(7, 'Test 2', 'Test2', 2),
(11, 'test 3', 'test3', 2),
(12, 'test', 'test', 0),
(13, 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inschrijvingen`
--

CREATE TABLE `inschrijvingen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `studentennummer` int(11) NOT NULL,
  `reisID` int(11) NOT NULL,
  `opmerkingen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inschrijvingen`
--

INSERT INTO `inschrijvingen` (`id`, `naam`, `studentennummer`, `reisID`, `opmerkingen`) VALUES
(2, 'Test User', 9999, 2, 'Test Opmerking'),
(3, 'David Sporry', 84228, 1, 'Test Opmerkingen'),
(18, '', 0, 0, 'tes'),
(19, '', 0, 0, 'Test'),
(20, '', 0, 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `reizen`
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
-- Dumping data for table `reizen`
--

INSERT INTO `reizen` (`reisID`, `titel`, `bestemming`, `omschrijving`, `begindatum`, `einddatum`, `inschrijvingen`, `counter`) VALUES
(1, 'Test 5124', 'Een echte bestemming!', 'De leukste plek op aarde ', '2022-05-18', '2022-05-20', 200, 10),
(2, 'Test Project', 'Test 1 ', 'Dit is een omschrijving voor de test', '2022-05-16', '2022-05-16', 1, 1),
(4, 'Test 5124', 'Een echte bestemming!', 'De leukste plek op aarde ', '2022-05-18', '2022-05-20', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `naam` varchar(26) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `studentennummer` int(11) NOT NULL,
  `opmerkingen` text NOT NULL,
  `reisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `level`, `naam`, `wachtwoord`, `email`, `studentennummer`, `opmerkingen`, `reisID`) VALUES
(1, 2, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@glr.nl', 9999, 'f', 0),
(2, 1, 'Gebruiker', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@glr.nl', 7, 'dit is een test opmerking', 1),
(6, 1, 'David Sporry', '4c42f25049f84714d70a456bc8c004a9', '84228@glr.nl', 84228, 'test', 1),
(9, 1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@glr.nl', 1234, 'etaets', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`reisID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reizen`
--
ALTER TABLE `reizen`
  MODIFY `reisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
