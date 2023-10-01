-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 07:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(18, 'Suki', 'Hooper', 'wasoceluf@mailinator.com', '+1 (423) 978-96'),
(19, 'Sopoline', 'Mcconnell', 'raci@mailinator.com', '+1 (689) 797-79'),
(20, 'Sloane', 'Scott', 'bylitury@mailinator.com', '+1 (443) 307-32'),
(21, 'Guy', 'Chase', 'lyfo@mailinator.com', '+1 (155) 835-32'),
(23, 'Odessa', 'Todd', 'docuf@mailinator.com', '+1 (187) 395-13'),
(24, 'Phillip', 'Calderon', 'haripegyl@mailinator.com', '+1 (754) 489-75'),
(25, 'Colette', 'Castro', 'mobu@mailinator.com', '+1 (689) 471-88'),
(26, 'Hermione', 'Mcfadden', 'fobilihaz@mailinator.com', '+1 (607) 107-72'),
(27, 'Galvin', 'Jensen', 'setyr@mailinator.com', '+1 (312) 365-91'),
(28, 'Rowan', 'Foster', 'zohocofy@mailinator.com', '+1 (832) 995-36'),
(29, 'Raya', 'West', 'gibepef@mailinator.com', '+1 (228) 134-73'),
(30, 'Felicia', 'Moody', 'qavodyk@mailinator.com', '+1 (525) 487-95'),
(31, 'Fallon', 'Bernard', 'menadyx@mailinator.com', '+1 (962) 503-12'),
(32, 'Zephania', 'Lucas', 'wijisurag@mailinator.com', '+1 (275) 897-46'),
(33, 'Len', 'Russo', 'kipuvyk@mailinator.com', '+1 (694) 752-65'),
(34, 'Willow', 'Sharpe', 'kakohyr@mailinator.com', '+1 (883) 889-18'),
(35, 'Jerome', 'Barry', 'zusylin@mailinator.com', '+1 (997) 105-55'),
(36, 'Mechelle', 'Chen', 'wufis@mailinator.com', '+1 (958) 718-22'),
(37, 'Gabriel', 'Harvey', 'hedap@mailinator.com', '+1 (772) 982-93'),
(38, 'Lacey', 'Witt', 'vazefu@mailinator.com', '+1 (405) 223-65'),
(39, 'Linus', 'Tyson', 'mici@mailinator.com', '+1 (456) 342-75'),
(40, 'Edan', 'Pierce', 'sedeg@mailinator.com', '+1 (128) 288-19'),
(41, 'Dillon', 'House', 'tafasygiri@mailinator.com', '+1 (619) 958-63'),
(42, 'Tana', 'Clements', 'riqu@mailinator.com', '+1 (221) 615-79'),
(43, 'Autumn', 'Ramirez', 'labuzezymu@mailinator.com', '+1 (454) 698-91'),
(44, 'Kylynn', 'Carey', 'falazuci@mailinator.com', '+1 (993) 692-33'),
(45, 'Kylynn', 'Carey', 'falazuci@mailinator.com', '+1 (993) 692-33'),
(46, 'Sebastian', 'Gregory', 'raludy@mailinator.com', '+1 (289) 717-58'),
(47, 'Noble', 'Garrett', 'lygobuf@mailinator.com', '+1 (723) 719-33'),
(48, 'Martin', 'Rosario', 'rogirel@mailinator.com', '+1 (447) 393-79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
