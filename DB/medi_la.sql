-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 11:52 AM
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
  `cat_ban_image` varchar(255) NOT NULL,
  `cat_description` text DEFAULT NULL,
  `cat_meta` text DEFAULT NULL,
  `cat_detail_des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_url`, `cat_image`, `cat_ban_image`, `cat_description`, `cat_meta`, `cat_detail_des`) VALUES
(3, 'Testing', 'testing', 'about1_12946.png', 'about-us-img_96867.png', 'Description', '<meta>', NULL),
(5, 'Testing-2', 'testing-2', 'homeservice_24419.png', 'homeservice_88013.png', 'asdasdasd', '<meta>', NULL);

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
  `cat_des_ban_image` varchar(255) NOT NULL,
  `cat_dec_description` text DEFAULT NULL,
  `cat_dec_meta` text DEFAULT NULL,
  `is_home` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_description`
--

INSERT INTO `cat_description` (`id`, `category_id`, `cat_dec_heading`, `cat_dec_url`, `cat_des_image`, `cat_des_ban_image`, `cat_dec_description`, `cat_dec_meta`, `is_home`) VALUES
(4, 3, 'T-One', 't-one', 'banner2_78140.png', 'about-us-img_30016.png', 'Descr-11', NULL, 1),
(5, 5, 'Details', 'details', 'content-writing_69967.jpg', 'about-us-img_38195.png', NULL, NULL, 0),
(6, 5, 'Details -2', 'details-2', 'homeservice_81506.jpg', 'aboutbanner_16362.png', 'sdasd', '<meta>', 1),
(7, 3, 'Details -11', 'details-11', 'aws_73926.png', 'css_24774.png', 'ssdfsd', '<meta>', 0);

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

--
-- Dumping data for table `cat_des_images`
--

INSERT INTO `cat_des_images` (`id`, `category_id`, `cat_des_id`, `cat_des_cimg`) VALUES
(16, 1, 1, 'deepika_42188.jpg'),
(20, 1, 2, 'mohit_84678.jpg'),
(22, 1, 3, 'seo-content-writing_17633.png'),
(24, 1, 3, 'webdevelopment_65402.png'),
(25, 3, 4, 'blog_72038.png'),
(28, 3, 4, 'contact_16608.png'),
(29, 5, 5, 'bookeeping-accounting_35789.jpg'),
(30, 5, 5, 'cloud-hosting-provider_84008.jpg'),
(31, 5, 5, 'data-center-application-provider_44238.jpg'),
(32, 5, 5, 'erp-services_54241.jpg'),
(33, 5, 6, 'android_49089.png'),
(34, 5, 6, 'aws_87369.png'),
(35, 5, 6, 'client_85901.png'),
(36, 3, 7, 'ci_87387.png'),
(37, 3, 7, 'client_98549.png'),
(38, 3, 7, 'cloud_85857.png'),
(39, 3, 7, 'coding2x_36694.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `comp_email1` varchar(100) DEFAULT NULL,
  `comp_contact1` varchar(20) DEFAULT NULL,
  `comp_address` varchar(300) DEFAULT NULL,
  `comp_map` text DEFAULT NULL,
  `comp_sm1` varchar(300) DEFAULT NULL,
  `comp_sm2` varchar(300) DEFAULT NULL,
  `comp_sm3` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `comp_email1`, `comp_contact1`, `comp_address`, `comp_map`, `comp_sm1`, `comp_sm2`, `comp_sm3`) VALUES
(1, 'oberoi.productiontts@gmail.com', '+91 78275-45160', 'Company Address', NULL, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `p_heading` text NOT NULL,
  `p_url` text NOT NULL,
  `p_description` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_meta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `p_heading`, `p_url`, `p_description`, `p_image`, `p_meta`) VALUES
(2, 'Cinematography', 'cinematography', 'Our cinematic techniques making us more famous\r\nas a best wedding cinematographers in delhi, india.\r\nLook our wedding and pre wedding cinematography here', 'improvecredibility_52627.webp', '<meta>');

-- --------------------------------------------------------

--
-- Table structure for table `port_details`
--

CREATE TABLE `port_details` (
  `id` int(11) NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `pd_heading` text NOT NULL,
  `pd_image` varchar(255) NOT NULL,
  `pd_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `port_details`
--

INSERT INTO `port_details` (`id`, `portfolio_id`, `tab_id`, `pd_heading`, `pd_image`, `pd_video`) VALUES
(3, 2, 1, 'Testing', '3_82646.png', 'www.youtube.com/watch1e86.html?v=TLnmb07WQ-s');

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE `tabs` (
  `id` int(11) NOT NULL,
  `tab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `tab`) VALUES
(1, 'Tab-11');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `t_heading` text NOT NULL,
  `t_description` text NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `t_heading`, `t_description`, `t_name`, `t_image`) VALUES
(1, 'Feedback Of My Client,  What I Found', 'It is a long established fact that a reader will be distracted by the readable content of a page buildupa duskam azer fact that a reader will be distracted azer duskam.It is a long established fact that page buildupa.', 'MOMENZ VONG', '1_53229.png'),
(2, 'Feedback Of My Client, What I Found', 'It is a long established fact that a reader will be distracted by the readable content of a page buildupa duskam azer fact that a reader will be distracted azer duskam.It is a long established fact that page buildupa.', 'MINTUJI CHIO', '2_67532.png'),
(3, 'Feedback Of My Client, What I Found', 'It is a long established fact that a reader will be distracted by the readable content of a page buildupa duskam azer fact that a reader will be distracted azer duskam.It is a long established fact that page buildupa.', 'Hello', '3_62270.png');

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
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_details`
--
ALTER TABLE `port_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabs`
--
ALTER TABLE `tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cat_description`
--
ALTER TABLE `cat_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat_des_images`
--
ALTER TABLE `cat_des_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `port_details`
--
ALTER TABLE `port_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabs`
--
ALTER TABLE `tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
