-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'latop', 'các sản phẩm thuộc loại laptop', 1, '2023-10-31 12:13:17', '2023-10-31 12:13:42'),
(2, 'phụ kiện', 'các sản phẩm thuộc phụ kiện', 1, '2023-10-31 12:25:15', '2023-10-31 12:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `manufactuers`
--

CREATE TABLE `manufactuers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufactuers`
--

INSERT INTO `manufactuers` (`id`, `name`, `categories_id`, `status`, `created_at`, `updated_at`) VALUES
(18, 'logictech', 2, 1, '2023-10-31 07:47:32', '2023-10-31 07:47:32'),
(19, 'razer', 2, 1, '2023-10-31 07:47:46', '2023-10-31 07:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(12) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `manufactuers_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 1,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `email_verified_at` datetime DEFAULT current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `address`, `password`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nam123', '0939175092', 'admin@gmail.com', '11 tran hung dao', '25f9e794323b453885f5181f1b624d0b', 1, 1, NULL, '0000-00-00 00:00:00', '2023-10-23 00:05:57', '2023-10-23 00:58:30'),
(2, 'admin', '0939175092', 'trungnam2000kl@gmail.com', '11 tran hung dao', '$2y$10$w7pLBNDiOe6SGZi1zSO0seimUKK2aCV0fZ4MKqK9gIsapPnAfn.yC', 1, 1, NULL, 'CwkaLs8ZN8u794MIxGmb4rx8f1lMmYaetiV2aXFPDgKghCpg0G4a09OSS7SK', '2023-10-23 00:11:10', '2023-10-28 13:08:34'),
(3, 'fnatic11htn', '09465435456', 'trungnam2000sg@gmail.com', '11 trần hưng đạo', '$2y$10$S7nU62nKU0ZBeM9cq0bbM.UoxVWWs18YLYKyu/TtyJNSOgwZjEB1m', 1, 1, NULL, '0000-00-00 00:00:00', '2023-10-22 17:56:17', '2023-10-23 00:58:33'),
(4, 'admin123', '0926041051', 'namsg2k@gmail.com', '11 trần hưng đạo', '$2y$10$BtIP8UnlL6lpIrlB.NTdruM4rDB2LZAaG0uOqgXJaqOToMqbdZG7y', 1, 1, '2023-10-23 11:55:32', NULL, '2023-10-23 04:55:32', '2023-10-24 15:07:59'),
(5, 'testadmin', '0926041051', 'trungnam787@gmail.com', '11 trần hưng đạo', '$2y$10$SNyetE.B.QVuj7rEkvGjd.vZibYm4P8AIyUyUq3oce364Iw7JSigS', 1, 1, '2023-10-24 16:46:06', NULL, '2023-10-24 09:46:06', '2023-10-24 09:46:06'),
(6, 'thienvo1', '0939175085', 'thienvo08102000@gmail.com', '444 truogn trinh', '$2y$10$x7oXVzqP0ewyvUO8fynSh.OiGGa8TrwzeTnbEAbFIAP8oT.DNdY2G', 1, 1, '2023-10-24 21:35:19', NULL, '2023-10-24 14:35:19', '2023-10-24 14:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactuers`
--
ALTER TABLE `manufactuers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufactuers`
--
ALTER TABLE `manufactuers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
