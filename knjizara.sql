-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 01:25 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjizara`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorijaID` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorijaID`, `naziv`) VALUES
(1, 'Istorija'),
(2, 'Nauka'),
(3, 'Ekonomija'),
(4, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `knjigaID` int(10) NOT NULL,
  `naslov` varchar(30) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `godina` varchar(20) NOT NULL,
  `kategorija` int(1) NOT NULL,
  `cena` int(10) NOT NULL,
  `kolicina` int(5) DEFAULT NULL,
  `istaknuta` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`knjigaID`, `naslov`, `autor`, `godina`, `kategorija`, `cena`, `kolicina`, `istaknuta`) VALUES
(2, 'test1', 'test1', 'test', 2, 1000, NULL, 0),
(5, 'php', 'sdfsdfsf', '1', 4, 1000, NULL, 1),
(6, 'ratovi', 'ttttttt', '1', 1, 1000, NULL, 1),
(7, 'erteer', 'eqrtet', 'erter', 1, 1000, 8, 1),
(8, 'naslov', 'aggga', 'rerg', 4, 555, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnikID` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `sifra` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `nivo` int(1) NOT NULL,
  `blokiran` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnikID`, `ime`, `prezime`, `sifra`, `adresa`, `nivo`, `blokiran`) VALUES
(1, 'dule', 'dule', 'dule', 'nis', 3, 0),
(2, 'pera', 'pera', 'pera', 'pera', 2, 0),
(3, 'mika', 'mika', 'mika', 'mika', 1, 0),
(4, 'joca', 'joca', 'joca', 'joca', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodaja`
--

CREATE TABLE `prodaja` (
  `prodajaID` int(11) NOT NULL,
  `datum` varchar(20) NOT NULL,
  `kupac` int(10) NOT NULL,
  `knjiga` int(10) NOT NULL,
  `cena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodaja`
--

INSERT INTO `prodaja` (`prodajaID`, `datum`, `kupac`, `knjiga`, `cena`) VALUES
(1, '', 0, 3, 0),
(2, '1505432839', 0, 3, 3),
(3, '1505433027', 0, 0, 1000),
(4, '1505433289', 0, 0, 1000),
(5, '1505465873', 2, 1, 3),
(6, '1505465889', 2, 6, 1000),
(7, '1505472211', 1, 2, 1000),
(8, '1505473938', 1, 1, 3),
(9, '1505473975', 1, 1, 3),
(10, '1505473992', 1, 1, 3),
(11, '1505474392', 1, 1, 3),
(12, '1505474885', 1, 1, 3),
(13, '1505474919', 1, 1, 3),
(14, '1505474972', 1, 5, 1000),
(15, '1505475672', 2, 6, 1000),
(16, '1505477112', 2, 7, 1000),
(17, '1505477128', 2, 7, 1000),
(18, '1505477253', 2, 7, 1000),
(19, '1505477257', 2, 7, 1000),
(20, '1505477295', 2, 7, 1000),
(21, '1505477336', 2, 7, 1000),
(22, '1505479032', 1, 7, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorijaID`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`knjigaID`),
  ADD KEY `kategorija` (`kategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnikID`),
  ADD KEY `korisnikID` (`korisnikID`);

--
-- Indexes for table `prodaja`
--
ALTER TABLE `prodaja`
  ADD PRIMARY KEY (`prodajaID`),
  ADD KEY `kupac` (`kupac`),
  ADD KEY `knjiga` (`knjiga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `kategorijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `knjigaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prodaja`
--
ALTER TABLE `prodaja`
  MODIFY `prodajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`kategorijaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
