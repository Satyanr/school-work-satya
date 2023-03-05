-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `students_id` varchar(255) NOT NULL,
  `NISN` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `domicile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`students_id`, `NISN`, `NIS`, `name`, `grade`, `major`, `date_of_birth`, `domicile`, `gender`, `photo`) VALUES
('students_6404ae4a4a089', 1234556, 23123121, 'Example Siswa 1', 'XI', 'PPLG', 'ciamis, 5 mei 2005', 'Buniseuri', 'Laki-Laki', '90590677.png'),
('students_6404ae753b43b', 123455612, 1231232, 'Example siswa 2', 'XI', 'PPLG', 'ciamis, 5 mei 2005', 'Buniseuri', 'Laki-Laki', 'IMG_20230208_141012.jpg'),
('students_6404bfeaa69cc', 124124312, 123123421, 'Yui Mizuno', 'XI', 'PPLG', 'ciamis, 5 mei 2005', 'Buniseuri', 'Prempuan', 'fccdd9061b3ee78a4a14436ef54fb58c.jpg'),
('students_6404af1ea1117', 1234556123, 231231211, 'Sachi', 'XI', 'PPLG', 'ciamis, 5 mei 2005', 'Buniseuri', 'Prempuan', 'ToramOnlineScreenshot2023_03_02_13_23_48.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id_user`, `username`, `password`, `role`) VALUES
('user_64042c68b33ec', 'admin', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`NISN`),
  ADD UNIQUE KEY `students_id` (`students_id`),
  ADD UNIQUE KEY `nis` (`NIS`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `name` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
