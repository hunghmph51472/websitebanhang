-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2025 at 01:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webduanbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`) VALUES
(1, 2, '2025-06-06 02:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `customer_name`, `customer_phone`, `customer_address`, `payment_method`) VALUES
(1, 2, '29990000.00', '2025-06-06 04:02:29', NULL, NULL, NULL, NULL),
(2, 2, '34990000.00', '2025-06-06 04:04:41', NULL, NULL, NULL, NULL),
(3, 2, '94970000.00', '2025-06-09 08:35:18', NULL, NULL, NULL, NULL),
(4, 2, '29990000.00', '2025-06-09 08:35:23', NULL, NULL, NULL, NULL),
(5, 2, '18990000.00', '2025-06-09 08:35:32', NULL, NULL, NULL, NULL),
(6, 2, '34990000.00', '2025-06-09 08:36:08', NULL, NULL, NULL, NULL),
(7, 2, '34990000.00', '2025-06-09 08:45:13', 'Dũng', '0346600239', 'Đan Phượng, Hà Nội', 'cod'),
(8, 2, '29990000.00', '2025-06-09 08:46:26', 'Dũng', '0346600239', 'Đan Phượng, Hà Nội', 'cod'),
(9, 2, '29990000.00', '2025-06-09 09:06:27', 'Dũng', '0346600239', 'Đan Phượng, Hà Nội', 'cod'),
(10, 2, '134960000.00', '2025-06-10 11:18:57', NULL, NULL, NULL, NULL),
(11, 2, '118960000.00', '2025-06-10 12:33:28', NULL, NULL, NULL, NULL),
(12, 2, '34990000.00', '2025-06-10 12:34:15', NULL, NULL, NULL, NULL),
(13, 2, '69980000.00', '2025-06-10 12:43:55', NULL, NULL, NULL, NULL),
(14, 2, '34990000.00', '2025-06-10 12:48:33', NULL, NULL, NULL, NULL),
(15, 2, '34990000.00', '2025-06-10 12:49:06', NULL, NULL, NULL, NULL),
(16, 2, '34990000.00', '2025-06-10 12:51:21', NULL, NULL, NULL, NULL),
(17, 2, '34990000.00', '2025-06-10 12:52:30', NULL, NULL, NULL, NULL),
(18, 2, '29990000.00', '2025-06-10 12:53:30', NULL, NULL, NULL, NULL),
(19, 2, '34990000.00', '2025-06-10 12:53:44', NULL, NULL, NULL, NULL),
(20, 2, '34990000.00', '2025-06-10 12:54:10', NULL, NULL, NULL, NULL),
(21, 2, '34990000.00', '2025-06-10 12:54:39', NULL, NULL, NULL, NULL),
(22, 2, '34990000.00', '2025-06-10 12:56:09', NULL, NULL, NULL, NULL),
(23, 2, '34990000.00', '2025-06-10 12:58:07', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, '29990000.00'),
(2, 2, 3, 1, '34990000.00'),
(3, 3, 4, 1, '34990000.00'),
(4, 3, 5, 2, '29990000.00'),
(5, 4, 6, 1, '29990000.00'),
(6, 5, 7, 1, '18990000.00'),
(7, 6, 8, 1, '34990000.00'),
(8, 7, 9, 1, '34990000.00'),
(9, 8, 10, 1, '29990000.00'),
(10, 9, 11, 1, '29990000.00'),
(11, 10, 12, 3, '34990000.00'),
(12, 10, 13, 1, '29990000.00'),
(13, 11, 16, 2, '34990000.00'),
(14, 11, 17, 1, '29990000.00'),
(15, 11, 18, 1, '18990000.00'),
(16, 12, 19, 1, '34990000.00'),
(17, 13, 20, 2, '34990000.00'),
(18, 14, 21, 1, '34990000.00'),
(19, 15, 22, 1, '34990000.00'),
(20, 16, 23, 1, '34990000.00'),
(21, 17, 24, 1, '34990000.00'),
(22, 18, 25, 1, '29990000.00'),
(23, 19, 26, 1, '34990000.00'),
(24, 20, 27, 1, '34990000.00'),
(25, 21, 28, 1, '34990000.00'),
(26, 22, 29, 1, '34990000.00'),
(27, 23, 30, 1, '34990000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'iPhone 15 Pro Max new', '', '34990000.00', 'iphone15promax.jpg', '2025-06-06 02:23:24'),
(2, 'Samsung Galaxy S24 Ultra', '', '29990000.00', '1749203999_Samsung Galaxy S24 Ultra.webp', '2025-06-06 02:23:24'),
(3, 'Xiaomi 14 Pro', 'Hiệu năng mạnh, giá tốt', '18990000.00', 'xiaomi14pro.jpg', '2025-06-06 02:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'dungxx', 'anhdung130511030308@gmail.com', '$2y$10$WGCmq.jMHSq8CDauzrGIYepfhoi9FNzh0JNov5ITHllI0FeveAYkC', 0),
(2, 'dũng', 'dungphph52508@gmail.com', '$2y$10$FJbzLESb9H8xjbfLYj/Tou1gxidAb7Z25WsQNMqNO3HxBQ5cEylva', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
