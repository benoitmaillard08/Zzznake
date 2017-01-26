-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2017 at 11:35 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Zzznake`
--
CREATE DATABASE Zzznake;
USE Zzznake;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `pk_room` int(11) NOT NULL,
  `playing` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`pk_room`, `playing`) VALUES
(5, 1),
(3, 0),
(6, 0),
(7, 0),
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pk_user` int(50) NOT NULL,
  `lastname` char(40) NOT NULL,
  `firstname` char(40) NOT NULL,
  `email` char(40) NOT NULL,
  `username` char(40) NOT NULL,
  `password` char(40) NOT NULL,
  `n_victory` int(100) NOT NULL,
  `n_lost` int(11) NOT NULL,
  `fk_room` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pk_user`, `lastname`, `firstname`, `email`, `username`, `password`, `n_victory`, `n_lost`, `fk_room`) VALUES
(1, 'Brodard', 'Vincent', 'vincent.brodard@gmail.com', 'Brodcouille', '1234', 2, 1, 1),
(2, 'Mail', 'Benoi', 'ben@ben.sadfkh', 'bene', '1234', 2, 2, 3),
(3, 'asdf', 'asdf', 'vincent.brodard@gmail.com', 'qwertz', '123456', 0, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`pk_room`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `pk_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pk_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
