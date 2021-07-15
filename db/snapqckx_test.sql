-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2021 at 02:13 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snapqckx_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `detail` mediumtext NOT NULL,
  `ratting` int(11) NOT NULL,
  `creationdate` datetime NOT NULL,
  `modificationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `image`, `detail`, `ratting`, `creationdate`, `modificationdate`) VALUES
(3, 'Men', 400, 'images/black-shirt.jpg', 'product', 3, '2021-04-10 13:20:23', '2021-04-10 17:20:23'),
(4, 'Women', 300, 'images/brown-shoe-main.jpg', 'product', 2, '2021-04-10 13:32:59', '2021-04-10 17:32:59'),
(5, 'Kids', 200, 'images/poliver-green.jpg', 'afdda', 4, '2021-04-10 13:33:15', '2021-04-10 17:33:15'),
(6, 'Long Sleeve Pique Polo', 100, 'images/poliver-blue.jpg', 'A piquÃ© knit polo to keep your style in check from the golf course to the conference room. Regular fit - Long sleeve with buttoned cuff Ribbed polo collar - Button placket', 5, '2021-04-10 14:18:33', '2021-04-10 18:18:33'),
(7, 'New product ', 150, 'images/black-shirt.jpg', 'tasfbdaksd', 4, '2021-04-11 00:28:57', '2021-04-11 04:28:57'),
(8, 'Men cloth', 152, 'images/black-shirt.jpg', 'product', 3, '2021-04-10 13:20:23', '2021-04-10 17:20:23'),
(9, 'Women cloth', 458, 'images/brown-shoe-main.jpg', 'product', 2, '2021-04-10 13:32:59', '2021-04-10 17:32:59'),
(10, 'Kids cloth', 700, 'images/poliver-green.jpg', 'afdda', 4, '2021-04-10 13:33:15', '2021-04-10 17:33:15'),
(11, 'Long Sleeve Pique Polo', 500, 'images/poliver-blue.jpg', 'A piquÃ© knit polo to keep your style in check from the golf course to the conference room. Regular fit - Long sleeve with buttoned cuff Ribbed polo collar - Button placket', 5, '2021-04-10 14:18:33', '2021-04-10 18:18:33'),
(12, 'New product ', 220, 'images/black-shirt.jpg', 'tasfbdaksd', 4, '2021-04-11 00:28:57', '2021-04-11 04:28:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
