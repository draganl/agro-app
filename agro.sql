-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2013 at 04:03 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `mehanizacija`
--

CREATE TABLE `mehanizacija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proizvodjac_fk` int(11) NOT NULL,
  `model` varchar(99) NOT NULL,
  `status` int(1) NOT NULL,
  `opis` varchar(999) NOT NULL,
  `id_vrsta_stroj_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proizvodjac_fk` (`id_proizvodjac_fk`),
  KEY `id_vrsta_stroj_fk` (`id_vrsta_stroj_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mehanizacija`
--

INSERT INTO `mehanizacija` (`id`, `id_proizvodjac_fk`, `model`, `status`, `opis`, `id_vrsta_stroj_fk`) VALUES
(4, 2, '577', 0, '', 1),
(5, 1, '5050', 1, '', 1),
(6, 5, '206', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parcela`
--

CREATE TABLE `parcela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(99) CHARACTER SET utf32 NOT NULL,
  `arcod_id` int(11) NOT NULL,
  `cestice` varchar(999) CHARACTER SET utf32 NOT NULL,
  `opis` varchar(999) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `parcela`
--

INSERT INTO `parcela` (`id`, `naziv`, `arcod_id`, `cestice`, `opis`) VALUES
(12, 'Karašica', 346634643, '', ''),
(13, 'špic', 455445, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posao`
--

CREATE TABLE `posao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vrsta_posao_fk` int(11) NOT NULL,
  `cijena` int(15) NOT NULL,
  `id_parcela_fk` int(11) NOT NULL,
  `opis` varchar(999) NOT NULL,
  `dodatna_polja` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vrsta_posao_fk` (`id_vrsta_posao_fk`),
  KEY `id_parcela_fk` (`id_parcela_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posao`
--

INSERT INTO `posao` (`id`, `id_vrsta_posao_fk`, `cijena`, `id_parcela_fk`, `opis`, `dodatna_polja`) VALUES
(3, 2, 500, 2, '', ''),
(4, 1, 700, 1, '', ''),
(5, 3, 500, 3, '', ''),
(6, 4, 700, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(99) NOT NULL,
  `opis` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`id`, `naziv`, `opis`) VALUES
(1, 'John Deere', ''),
(2, 'IMT', ''),
(5, 'Fendt', ''),
(6, 'Torpedo', ''),
(7, 'Ursus', ''),
(8, 'Zetor', ''),
(9, 'Klass', '');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_posao`
--

CREATE TABLE `vrsta_posao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vrsta` varchar(99) NOT NULL,
  `opis` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vrsta_posao`
--

INSERT INTO `vrsta_posao` (`id`, `vrsta`, `opis`) VALUES
(1, 'Sjetva', ''),
(2, 'Žetva', ''),
(3, 'Oranje', ''),
(4, 'Kultiviranje', ''),
(5, 'Gnojidba', '');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_stroj`
--

CREATE TABLE `vrsta_stroj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vrsta_stroj` varchar(99) NOT NULL,
  `opis` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vrsta_stroj`
--

INSERT INTO `vrsta_stroj` (`id`, `vrsta_stroj`, `opis`) VALUES
(1, 'Samohodni stroj', ''),
(2, 'Priključni stroj', ''),
(3, 'Samohodni stroj', ''),
(4, 'Priključni stroj', ''),
(5, 'Dodatni stroj', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mehanizacija`
--
ALTER TABLE `mehanizacija`
  ADD CONSTRAINT `mehanizacija_ibfk_1` FOREIGN KEY (`id_proizvodjac_fk`) REFERENCES `proizvodjac` (`id`),
  ADD CONSTRAINT `mehanizacija_ibfk_2` FOREIGN KEY (`id_vrsta_stroj_fk`) REFERENCES `vrsta_stroj` (`id`);
