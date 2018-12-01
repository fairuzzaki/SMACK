-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 03:12 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smack`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `rating` int(10) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `price`, `description`, `rating`, `photo`, `created_at`, `updated_at`) VALUES
(2, 6, 'menu 1', 15, 'ini menu 1', 5, '19.jpeg', '2017-11-21 21:08:20', '2017-11-21 14:08:20'),
(3, 6, 'menu 2', 12, 'ini menu 2', 4, '12.jpeg', '2017-11-21 20:42:33', '2017-11-21 13:42:33'),
(5, 6, 'menu 3', 10, 'ini menu 3', NULL, '13.jpeg', '2017-11-21 20:42:40', '2017-11-21 13:42:40'),
(6, 6, 'menu 4', 20, 'ini menu 4', NULL, '14.jpeg', '2017-11-21 20:42:46', '2017-11-21 13:42:46'),
(7, 6, 'menu 5', 23, 'ini menu 5', NULL, '15.jpeg', '2017-11-21 20:42:54', '2017-11-21 13:42:54'),
(8, 6, 'menu 6', 18, 'ini menu 6', NULL, '18.jpeg', '2017-11-21 21:08:44', '2017-11-21 14:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','outlet','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `photo`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$XXmXsLr66F6XzhSbDJpMIus7FjOgLi7N3hNntr8Gc7Wu1VLsiKi2O', '', 'admin', '1OX3Kqx7LYTSkcM6KjsiI9t71YXIy3W6A4cWzbtntoYmv9KOnoMChNt7NAdI', NULL, NULL),
(6, 'outlet', 'outlet@outlet.com', '$2y$10$BwqrkgMA2fWElMbsqXBRrer8YMWUskmUi7NijlBjphxfDFJU01ILm', '', 'outlet', 'rh3MWnQxr9PHq4tXigsQQP3TtHZygD3VYQQiNtFOHsOoQPy4CoxibMO4LUG8', NULL, NULL),
(11, 'member', 'member@member.com', '$2y$10$HHNS/PNN95ZIE8hw1S35juCbkhDwkmbyNMiINERC97rOTztzNgGrS', '', 'member', 'tyEDlFPPjDvYeAveeqRcLD6Rz1UaKSnmoDkm527xSKG5PIJHxWSnE5aNQtsf', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
