-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 12:18 PM
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
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_url` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_description` text DEFAULT NULL,
  `cat_meta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_url`, `cat_image`, `cat_description`, `cat_meta`) VALUES
(1, 'zxczxc fdsdf', 'zxczxc-fdsdf', 'aboutbanner_71842.png', 'asdasd sadasdasd', 'zxczxczxczx eeee');

-- --------------------------------------------------------

--
-- Table structure for table `cat_description`
--

CREATE TABLE `cat_description` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cat_dec_heading` varchar(255) NOT NULL,
  `cat_dec_url` varchar(255) NOT NULL,
  `cat_des_image` varchar(255) NOT NULL,
  `cat_dec_description` text DEFAULT NULL,
  `cat_dec_meta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cat_des_images`
--

CREATE TABLE `cat_des_images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cat_des_id` int(11) NOT NULL,
  `cat_des_cimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_url` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `sub_category_id` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `model_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_trending` enum('0','1') NOT NULL DEFAULT '0',
  `tab_product` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `sr_no` varchar(100) DEFAULT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_url` varchar(255) NOT NULL,
  `sub_cat_image` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@email.com', NULL, '$2y$10$9CH5iuxxnufggXrDO4DJ5.xDnYcJ.qAJvgRa9mY7sM7c1TE65SBLi', '6QP4K7VkZrECpQJ68wxlDJaJ27RpcMt0BfR661LLFHXSobICvMnaWnyBBKEB', '2024-08-27 06:27:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_description`
--
ALTER TABLE `cat_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_des_images`
--
ALTER TABLE `cat_des_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cat_description`
--
ALTER TABLE `cat_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cat_des_images`
--
ALTER TABLE `cat_des_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
