-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 12:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `barnat_smbr`
--

CREATE TABLE `barnat_smbr` (
  `ID_SMBR` int(11) NOT NULL,
  `Emri_Barnes_SMBR` varchar(100) NOT NULL,
  `ProdhuesiBarnes_SMBR` varchar(100) NOT NULL,
  `DataProdhimitBarnes_SMBR` date NOT NULL,
  `DataSkadimitBarnes_SMBR` date NOT NULL,
  `CmimiBarnes_SMBR` decimal(10,0) NOT NULL,
  `PershkrimiBarnes_SMBR` varchar(100) NOT NULL,
  `LlojiBarnes_SMBR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barnat_smbr`
--

INSERT INTO `barnat_smbr` (`ID_SMBR`, `Emri_Barnes_SMBR`, `ProdhuesiBarnes_SMBR`, `DataProdhimitBarnes_SMBR`, `DataSkadimitBarnes_SMBR`, `CmimiBarnes_SMBR`, `PershkrimiBarnes_SMBR`, `LlojiBarnes_SMBR`) VALUES
(17, 'Adderall', 'ADDERALL®', '2016-01-01', '2022-01-01', '4', 'Adderall përmban një kombinim të amfetaminës dhe dekstroamfetaminës. Amfetamina dhe dekstroamfetamin', 'Pilula');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barnat_smbr`
--
ALTER TABLE `barnat_smbr`
  ADD PRIMARY KEY (`ID_SMBR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barnat_smbr`
--
ALTER TABLE `barnat_smbr`
  MODIFY `ID_SMBR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
