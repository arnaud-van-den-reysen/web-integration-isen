-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-boushoku.alwaysdata.net
-- Generation Time: Jun 19, 2020 at 12:35 AM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boushoku_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `id_addr` int(11) NOT NULL,
  `number` tinyint(4) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`id_addr`, `number`, `street`, `zipcode`) VALUES
(1, 2, 'les clairettes du bas', 83390),
(2, 49, 'impasse des fauvettes', 83130),
(3, 0, 'Place Georges Pompidou', 83000),
(4, 70, 'rue colonel Moll', 83000);

-- --------------------------------------------------------

--
-- Table structure for table `appointement`
--

CREATE TABLE `appointement` (
  `id_appoi` int(11) NOT NULL,
  `date_appoi` date NOT NULL,
  `hour_appoi` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_gpsc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointement`
--

INSERT INTO `appointement` (`id_appoi`, `date_appoi`, `hour_appoi`, `id_user`, `id_doc`, `id_gpsc`) VALUES
(1, '2020-06-30', '13:15:00', 3, 2, 1),
(2, '2020-06-17', '11:00:00', 7, 2, 2),
(3, '2020-07-23', '17:00:00', 8, 2, 3),
(4, '2020-06-09', '07:28:00', 9, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `IdDoc` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`IdDoc`, `mail`, `password`, `prenom`, `nom`) VALUES
(2, 'michelblanc@test.com', 'd780182f77b121450849c2b088a444f0', 'Michel', 'Blanc'),
(3, 'jeanhouse@test.com', 'b71985397688d6f1820685dde534981b', 'Jean', 'House');

-- --------------------------------------------------------

--
-- Table structure for table `gps_coordinates`
--

CREATE TABLE `gps_coordinates` (
  `id_gpsc` int(11) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `lattitude` varchar(25) NOT NULL,
  `id_medrec` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gps_coordinates`
--

INSERT INTO `gps_coordinates` (`id_gpsc`, `longitude`, `lattitude`, `id_medrec`, `id_user`) VALUES
(1, '6.140301695871039', '43.22270247576105', 1, 3),
(2, '2.294481', '48.858370', 2, 7),
(3, '-1.5114', '48.636', 3, 8),
(4, '-1.511422', '48.85837033', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_record`
--

CREATE TABLE `patient_medical_record` (
  `id_medrec` int(11) NOT NULL,
  `height` int(255) NOT NULL,
  `weight` tinyint(4) NOT NULL,
  `socialsecuritynumber` varchar(13) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_addr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_medical_record`
--

INSERT INTO `patient_medical_record` (`id_medrec`, `height`, `weight`, `socialsecuritynumber`, `id_user`, `id_doc`, `id_addr`) VALUES
(1, 182, 78, '1231231231233', 3, 2, 1),
(2, 179, 75, '1342536753987', 7, 2, 2),
(3, 198, 85, '3456278634159', 8, 2, 3),
(4, 198, 88, '1231231231223', 9, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `social_details`
--

CREATE TABLE `social_details` (
  `id_socdet` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthaddr` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `phonenum` int(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_details`
--

INSERT INTO `social_details` (`id_socdet`, `firstname`, `lastname`, `gender`, `birthaddr`, `birthdate`, `phonenum`, `picture`, `id_user`) VALUES
(1, 'Thibaut', 'Chevallier', 1, 'Hopital St Musse 83000 Toulon ', '1998-08-15', 698975422, '', 3),
(2, 'Jean', 'Dujardin', 1, 'Rueil-Malmaison', '1972-06-19', 765656565, '', 7),
(3, 'Agent', 'secret', 1, 'Rueil-Malmaison', '1972-06-19', 700700707, '', 8),
(4, 'Dylan', 'Metans', 1, 'Hopital St Musse 83000 Toulon ', '1998-12-15', 708600237, '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'test1', 'test1@test.com', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Thibaut', 't.chevallier11@gmail.com', 'df5eb1123635f6bfd89978740b8b2541'),
(4, 'test2', 'test2@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'test4', 'test4@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(6, 'test ', 'tes@gmail.com', '9cdfb439c7876e703e307864c9167a15'),
(7, 'Jean Dujardin', 'jeandujardin@isen.fr', '202cb962ac59075b964b07152d234b70'),
(8, 'OSS117', 'oss117@isen.fr', '202cb962ac59075b964b07152d234b70'),
(9, 'dylan', 'dylan.metans@isen.yncea.fr', '2d396a22996d655fd6a179b1b28579d5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id_addr`);

--
-- Indexes for table `appointement`
--
ALTER TABLE `appointement`
  ADD PRIMARY KEY (`id_appoi`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gpsc` (`id_gpsc`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`IdDoc`);

--
-- Indexes for table `gps_coordinates`
--
ALTER TABLE `gps_coordinates`
  ADD PRIMARY KEY (`id_gpsc`),
  ADD KEY `id_medrec` (`id_medrec`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `patient_medical_record`
--
ALTER TABLE `patient_medical_record`
  ADD PRIMARY KEY (`id_medrec`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_addr` (`id_addr`);

--
-- Indexes for table `social_details`
--
ALTER TABLE `social_details`
  ADD PRIMARY KEY (`id_socdet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `id_addr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointement`
--
ALTER TABLE `appointement`
  MODIFY `id_appoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `IdDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gps_coordinates`
--
ALTER TABLE `gps_coordinates`
  MODIFY `id_gpsc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_medical_record`
--
ALTER TABLE `patient_medical_record`
  MODIFY `id_medrec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_details`
--
ALTER TABLE `social_details`
  MODIFY `id_socdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointement`
--
ALTER TABLE `appointement`
  ADD CONSTRAINT `appointement_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `doctors` (`IdDoc`),
  ADD CONSTRAINT `appointement_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointement_ibfk_3` FOREIGN KEY (`id_gpsc`) REFERENCES `gps_coordinates` (`id_gpsc`);

--
-- Constraints for table `gps_coordinates`
--
ALTER TABLE `gps_coordinates`
  ADD CONSTRAINT `gps_coordinates_ibfk_1` FOREIGN KEY (`id_medrec`) REFERENCES `patient_medical_record` (`id_medrec`),
  ADD CONSTRAINT `gps_coordinates_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_medical_record`
--
ALTER TABLE `patient_medical_record`
  ADD CONSTRAINT `patient_medical_record_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `doctors` (`IdDoc`),
  ADD CONSTRAINT `patient_medical_record_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `patient_medical_record_ibfk_3` FOREIGN KEY (`id_addr`) REFERENCES `adress` (`id_addr`);

--
-- Constraints for table `social_details`
--
ALTER TABLE `social_details`
  ADD CONSTRAINT `social_details_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
