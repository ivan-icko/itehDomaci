-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 10:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjigedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `igrica`
--

CREATE TABLE `igrica` (
  `idKnjige` int(11) NOT NULL,
  `nazivKnjige` varchar(50) NOT NULL,
  `verzijaIgrice` varchar(50) NOT NULL,
  `zanrID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igrica`
--

INSERT INTO `igrica` (`idKnjige`, `nazivKnjige`, `verzijaIgrice`, `zanrID`) VALUES
(6, 'PUBG', '12', 3),
(8, 'DOTA', '2', 1),
(10, 'Fortnite', '2022', 3);

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `IdKnjige` int(11) NOT NULL,
  `NazivKnjige` varchar(50) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Zanr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`IdKnjige`, `NazivKnjige`, `Autor`, `Zanr`) VALUES
(1, 'Usamljeni putnik', 'Džek keruak', 1),
(2, 'Zima u nama', 'Ketrin Mej', 1),
(3, 'Igra s vukovima', 'Majkl Blejk', 2),
(4, 'Ostrvo s blagom', 'Robert Luis Stivenson', 2),
(5, '101 četnica za zube', 'Grupa autora', 3),
(6, 'Magična vodena bokanka', 'Dženi Kuper, Rejčel Maklejn', 3),
(7, 'Skola za špijune', 'Denis Bukin', 4),
(8, 'Ne nauditi', 'Henri Marš', 4);

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `zanrID` int(11) NOT NULL,
  `nazivZanra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`zanrID`, `nazivZanra`) VALUES
(1, 'autobiografija'),
(2, 'avanturisticki'),
(3, 'bojanka'),
(4, 'psiholoski');

-- --------------------------------------------------------

--
-- Table structure for table `zanrknjige`
--

CREATE TABLE `zanrknjige` (
  `ZanrId` int(11) NOT NULL,
  `NazivZanra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zanrknjige`
--

INSERT INTO `zanrknjige` (`ZanrId`, `NazivZanra`) VALUES
(1, 'Autobiografija'),
(2, 'Avanturistički'),
(3, 'Bojanka'),
(4, 'Psihološki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igrica`
--
ALTER TABLE `igrica`
  ADD PRIMARY KEY (`idKnjige`);

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`IdKnjige`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`zanrID`);

--
-- Indexes for table `zanrknjige`
--
ALTER TABLE `zanrknjige`
  ADD PRIMARY KEY (`ZanrId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igrica`
--
ALTER TABLE `igrica`
  MODIFY `idKnjige` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `zanrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
