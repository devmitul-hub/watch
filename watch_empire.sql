-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch_empire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `date_time` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`, `date_time`) VALUES
(1, 'admin', 'admin\r\n', NULL),
(2, 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(250) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pro_img` varchar(250) DEFAULT NULL,
  `date_time` varchar(250) DEFAULT NULL,
  `status` enum('cart','delete','order') DEFAULT 'cart',
  `order_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `pro_id`, `pro_name`, `pro_price`, `quantity`, `total`, `pro_img`, `date_time`, `status`, `order_time`) VALUES
(1, 1, 2, 'TITAN', 7200, 9, 64800, '61WkDUtq5aL._SX679_.jpg', '2024-10-08 13:50:45', 'order', '2024-10-08 14-05-52'),
(2, 1, 3, 'OMEGA', 8800, 3, 26400, 'shopping.webp', '2024-10-08 13:50:55', 'order', '2024-10-08 14-05-52'),
(3, 1, 2, 'TITAN', 7200, 1, 7200, '61WkDUtq5aL._SX679_.jpg', '2024-10-10 08:28:38', 'order', '2024-10-10 08-28-57'),
(4, 1, 4, 'ROLEX', 12800, 1, 12800, 'm126603-0001.avif', '2024-10-10 08:28:49', 'order', '2024-10-10 08-28-57'),
(5, 1, 2, 'TITAN', 7200, 1, 7200, '61WkDUtq5aL._SX679_.jpg', '2024-10-12 12:23:58', 'order', '2024-10-12 12-24-40'),
(6, 1, 4, 'ROLEX', 12800, 1, 12800, 'm126603-0001.avif', '2024-10-12 12:24:25', 'order', '2024-10-12 12-24-40'),
(7, 1, 2, 'TITAN', 7200, 1, 7200, '61WkDUtq5aL._SX679_.jpg', '2024-10-12 13:07:27', 'order', '2024-10-12 13-07-53'),
(8, 1, 4, 'ROLEX', 12800, 1, 12800, 'm126603-0001.avif', '2024-10-12 13:07:38', 'order', '2024-10-12 13-07-53'),
(9, 1, 1, 'CITIZEN', 6700, 1, 6700, 'download.jpg', '2024-10-12 13:10:11', 'order', '2024-10-12 13-11-37'),
(10, 1, 2, 'TITAN', 7200, 1, 7200, '61WkDUtq5aL._SX679_.jpg', '2024-10-12 13:10:22', 'order', '2024-10-12 13-11-37'),
(11, 1, 2, 'TITAN', 7200, 3, 21600, '61WkDUtq5aL._SX679_.jpg', '2024-10-12 14:18:44', 'order', '2024-10-12 14-19-03'),
(12, 1, 4, 'ROLEX', 12800, 1, 12800, 'm126603-0001.avif', '2024-10-12 14:18:59', 'order', '2024-10-12 14-19-03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `category_image` varchar(250) DEFAULT NULL,
  `date_time` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `date_time`) VALUES
(1, 'TITAN', '1713BM02_1.webp', '2024-10-01 15:58:52'),
(2, 'ROLEX', '4bc68992905787.5e586eba1127b.jpg', '2024-10-01 16:01:24'),
(3, 'OMEGA', '66213fa8c5f0c0f6dc0bd8c49aa332fd_large.jpg', '2024-10-01 16:04:16'),
(4, 'CITIZEN', 'slashio-photography-fy-JGSH-3N0-unsplash.webp', '2024-10-01 16:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `contact`, `message`) VALUES
(1, 'Jocelyn Wolf', 'goxinimahi@mailinator.com', 2147483647, 'Esse amet praesent'),
(2, 'Vladimir Gardner', 'liqamoru@mailinator.com', 1784563214, 'Tempore aliqua Qui');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `pro_name` varchar(60) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `date_time` varchar(200) NOT NULL,
  `status` enum('conform','cancel','pandding') NOT NULL DEFAULT 'pandding',
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `order_status` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `cart_id`, `pro_name`, `pro_price`, `pro_quantity`, `total`, `grand_total`, `date_time`, `status`, `first_name`, `last_name`, `contact_number`, `email`, `city`, `address`, `order_status`) VALUES
(1, 1, 7, 'TITAN', 7200, 1, 7200, 0, '2024-10-12 13-07-53', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y'),
(2, 1, 8, 'ROLEX', 12800, 1, 12800, 0, '2024-10-12 13-07-53', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y'),
(3, 1, 9, 'CITIZEN', 6700, 1, 6700, 13900, '2024-10-12 13-11-37', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y'),
(4, 1, 10, 'TITAN', 7200, 1, 7200, 13900, '2024-10-12 13-11-37', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y'),
(5, 1, 11, 'TITAN', 7200, 3, 21600, 34400, '2024-10-12 14-19-03', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y'),
(6, 1, 12, 'ROLEX', 12800, 1, 12800, 34400, '2024-10-12 14-19-03', 'conform', 'Chiquita', 'Chase', 767, 'nyxotub@mailinator.com', 'Amreli', 'Quibusdam saepe solu', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_cate_id` int(11) NOT NULL,
  `pro_name` varchar(250) DEFAULT NULL,
  `pro_disc` varchar(250) NOT NULL,
  `pro_img` varchar(250) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_discount` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_status` enum('available','out of stoke') NOT NULL DEFAULT 'available',
  `date_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_cate_id`, `pro_name`, `pro_disc`, `pro_img`, `pro_price`, `pro_discount`, `pro_quantity`, `pro_status`, `date_time`) VALUES
(1, 4, 'CITIZEN', 'Citizen Stainless Steel Men Quartz Gents Analog Watch -Bi5070-57L  Band_Silver Dial_Blue', 'download.jpg', 6700, 7300, 19, 'available', '2024-10-01 16:12:04'),
(2, 1, 'TITAN', 'Titan Regalia Opulent Blue Dial Quartz Multifunction Stainless Steel Strap Watch for Men-NS90127KM02', '61WkDUtq5aL._SX679_.jpg', 7200, 7800, 6, 'available', '2024-10-01 16:14:49'),
(3, 3, 'OMEGA', 'Seamaster Aqua Terra 150M 41 mm, steel on steel', 'shopping.webp', 8800, 9700, 13, 'available', '2024-10-01 16:18:18'),
(4, 2, 'ROLEX', 'Oyster, 43 mm, Oystersteel and yellow gold  Reference 126603', 'm126603-0001.avif', 12800, 15000, 10, 'available', '2024-10-01 16:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `date_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `Password`, `email`, `number`, `address`, `gender`, `image`, `date_time`) VALUES
(1, 'mitanshu', 'e10adc3949ba59abbe56e057f20f883e', 'mitanshu@gmail.com', 2147483647, 'amreli', 'male', 'photo-1607706189992-eae578626c86.jpg', '2024-10-08 12:00:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cate_id` (`pro_cate_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pro_cate_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
