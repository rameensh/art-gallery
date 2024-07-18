-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 08:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tblproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `artist`, `code`, `image`, `price`, `category`) VALUES
(1, 'Abstract Image 1', 'Michalengelo', 'at1', 'product-images/abstract1.jpg', 1500.00, 'abstract'),
(2, 'Abstract Image 2', 'Rambrandet', 'at2', 'product-images/abstract2.jpeg', 800.00, 'abstract'),
(3, 'Abstract Image 3', 'Veermeer', 'at3', 'product-images/abstract3.jpg', 300.00, 'abstract'),
(4, 'Abstract Image 4', 'Eugene', 'at4', 'product-images/abstract4.jpg', 800.00, 'abstract'),
(5, 'Abstract Image 5', 'Claude', 'at5', 'product-images/abbg.jpeg', 300.00, 'abstract'),
(6, 'Abstract Image 6', 'Georges', 'at6', 'product-images/imggg.jpg', 800.00, 'abstract'),
(7, 'Abstract Image 7', 'Vincent', 'at7', 'product-images/images7.jpeg', 300.00, 'abstract'),
(8, 'Abstract Image 8', 'Edward', 'at8', 'product-images/img8.jpg', 100.00, 'abstract'),
(9, 'Abstract Image 9', 'Michalengelo', 'at9', 'product-images/img9.jpg', 100.00, 'abstract'),
(10, 'Landscape Art 1', 'Rambrandet', 'l1', 'product-images/l1.jpg', 1500.00, 'landscape'),
(11, 'Landscape Art 2', 'Vincet', 'l2', 'product-images/l2.jpg', 800.00, 'landscape'),
(12, 'Landscape Art 3', 'Michalengelo', 'l3', 'product-images/l3.jpg', 300.00, 'landscape'),
(13, 'Landscape Art 4', 'Veermeer', 'l4', 'product-images/l4.jpg', 800.00, 'landscape'),
(14, 'Landscape Art 5', 'Claude', 'l5', 'product-images/l5.jpg', 300.00, 'landscape'),
(15, 'Landscape Art 6', 'Michalengelo', 'l6', 'product-images/l6.jpg', 800.00, 'landscape'),
(16, 'Landscape Art 7', 'Rambrandet', 'l7', 'product-images/l7.jpg', 300.00, 'landscape'),
(17, 'Landscape Art 8', 'Edward', 'l8', 'product-images/l8.jpg', 100.00, 'landscape'),
(18, 'Landscape Art 9', 'Georges', 'l9', 'product-images/l9.jpg', 100.00, 'landscape'),
(19, 'Sculpture Image 1', 'Vincet', 'sc1', 'product-images/sc1.jpg', 1500.00, 'sculpture'),
(20, 'Sculpture Image 2', 'Eugene', 'sc2', 'product-images/sc2.jpg', 800.00, 'sculpture'),
(21, 'Sculpture Image 3', 'Claude', 'sc3', 'product-images/sc3.jpg', 300.00, 'sculpture'),
(22, 'Sculpture Image 4', 'Michalengelo', 'sc4', 'product-images/sc4.jpg', 800.00, 'sculpture'),
(23, 'Sculpture Image 5', 'Veermeer', 'sc5', 'product-images/sc5.jpg', 300.00, 'sculpture'),
(24, 'Sculpture Image 6', 'Claude', 'sc6', 'product-images/sc6.jpg', 800.00, 'sculpture'),
(25, 'Sculpture Image 7', 'Georges', 'sc7', 'product-images/sc7.jpg', 300.00, 'sculpture'),
(26, 'Sculpture Image 8', 'Edward', 'sc8', 'product-images/sc8.jpg', 300.00, 'sculpture'),
(27, 'Sculpture Image 9', 'Claude', 'sc9', 'product-images/sc9.jpg', 300.00, 'sculpture'),
(28, 'Indian Contemporary Image 1', 'Vincet', 'i1', 'product-images/i1.jpg', 1500.00, 'indian'),
(29, 'Indian Contemporary Image 2', 'Veermeer', 'i2', 'product-images/i2.jpg', 800.00, 'indian'),
(30, 'Indian Contemporary Image 3', 'Rambrandet', 'i3', 'product-images/i3.jpg', 300.00, 'indian'),
(31, 'Indian Contemporary Image 4', 'Claude', 'i4', 'product-images/i4.jpg', 800.00, 'indian'),
(32, 'Indian Contemporary Image 5', 'Rambrandet', 'i5', 'product-images/i5.jpg', 300.00, 'indian'),
(33, 'Indian Contemporary Image 6', 'Veermeer', 'i6', 'product-images/i6.jpg', 800.00, 'indian'),
(34, 'Indian Contemporary Image 7', 'Michalengelo', 'i7', 'product-images/i7.jpg', 300.00, 'indian'),
(35, 'Indian Contemporary Image 8', 'Eugene', 'i8', 'product-images/i8.jpg', 100.00, 'indian'),
(36, 'Indian Contemporary Image 9', 'Claude', 'i9', 'product-images/i9.jpg', 100.00, 'indian');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_preference` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_preference`, `user_address`) VALUES
(6, 'Tariq', 'drapking13@gmail.com', '1234', 'abstract', 'mumbai'),
(7, 'atiya', 'atiya@gmail.com', '1234', 'landscape', 'mumbai'),
(8, 'test', 'test@gmail.com', '1234', 'abstract', 'mumbai'),
(9, 'jane', 'jane@gmail.com', '1234', 'abstract', 'Maharashtra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
