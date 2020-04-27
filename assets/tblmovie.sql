-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 01:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmovie`
--

CREATE TABLE `tblmovie` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Director` varchar(255) NOT NULL,
  `PosterLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmovie`
--

INSERT INTO `tblmovie` (`MovieID`, `Title`, `Year`, `Director`, `PosterLink`) VALUES
(1, 'The Avengers: Age of Ultron', '2015', 'Joss Whedon', 'assets/poster/avenger.jfif'),
(2, 'Jurrasic World', '2015', 'Sam Mendes', 'assets/poster/jurrasic.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmovie`
--
ALTER TABLE `tblmovie`
  ADD PRIMARY KEY (`Director`),
  ADD UNIQUE KEY `MovieID` (`MovieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmovie`
--
ALTER TABLE `tblmovie`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
