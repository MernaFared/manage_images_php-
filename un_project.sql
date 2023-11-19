-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2023 at 08:31 PM
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
-- Database: `un_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(25, 'Night'),
(26, 'Perfumes'),
(27, 'Cloud'),
(28, 'Flowers'),
(29, 'Nature'),
(33, 'Mountain');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(6) UNSIGNED NOT NULL,
  `photo_date` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `license` text NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `format` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_date`, `title`, `license`, `dimension`, `format`, `is_active`, `image_path`, `category_id`) VALUES
(18, '2023-10-14', 'Starry Night', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '3500*2333', 'JPG', 1, 'uploads/pexels-eberhard-grossgasteiger-1421903.jpg', 25),
(19, '2023-11-10', 'Night Sky', ' Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '3500*2333', 'JPG', 1, 'uploads/pexels-eberhard-grossgasteiger-2098428.jpg', 25),
(21, '2023-10-03', 'Red Rose', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '6000*4000', 'JPG', 1, 'uploads/pexels-irina.jpg', 28),
(26, '2023-10-28', 'Pink Cherry Blossoms', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '3888*2592', 'JPG', 1, 'uploads/pexels-kristina.jpg', 28),
(27, '2023-10-26', 'White Petaled', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '5407*3605', 'JPG', 1, 'uploads/pexels-irina-iriser-943905.jpg', 28),
(29, '2023-11-08', 'Silhouette', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '5832*3888', 'JPG', 1, 'uploads/pexels-asad-photo-maldives-3293148.jpg', 29),
(30, '2023-11-24', 'Dolphins', 'License', '6000*4000', 'JPG', 1, 'uploads/pexels-kammeran-gonzalezkeola-9638689.jpg', 29),
(32, '2023-12-27', 'Clouds', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '6000*4000', 'JPG', 1, 'uploads/pexels-stanislav.jpg', 29),
(34, '2023-11-09', 'Escada', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution.', '3500*2333', 'JPG', 1, 'uploads/pexels-valeria-boltneva-724635.jpg', 26),
(35, '2023-11-01', 'Assorted Perfume', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-valeria-boltneva.jpg', 26),
(36, '2023-12-01', 'Perfume Bottle', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-valeria-boltneva-2.jpg', 26),
(37, '2023-12-30', 'Victoria Secret', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-dids-1830450.jpg', 26),
(38, '2023-10-04', 'Petaled Flowers ', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-brett-sayles-992734.jpg', 28),
(39, '2023-10-20', 'White Flowers', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '6000*4000', 'JPG', 1, 'uploads/pexels-louis-2101187.jpg', 28),
(40, '2023-10-04', 'White Clouds', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '6000*4000', 'JPG', 1, 'uploads/pexels-magda-ehlers-2114014.jpg', 27),
(41, '2023-08-10', 'Cloudscape', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '6000*4000', 'JPG', 1, 'uploads/pexels-pixabay-314726.jpg', 27),
(42, '2023-08-02', 'Snowy Mountain', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-eberhard-grossgasteiger-1287145.jpg', 33),
(43, '2023-07-30', 'Mountains and Trees', 'Free for both personal and commercial use. No need to pay anything. No need to make any attribution. ', '3500*2333', 'JPG', 1, 'uploads/pexels-pixabay-270756.jpg', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `registeration_date` date DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `registeration_date`, `full_name`, `username`, `email`, `active`, `password`) VALUES
(36, '2023-11-02', 'mohamed fayed', 'medoo', 'mohamed@gmail.com', 1, '1234'),
(43, '2023-10-27', 'Perla Peshoy', 'perla12', 'perla1@gmail.com', 0, '123'),
(44, '2023-10-26', 'peter peshoy', 'peboo', 'peter@gmail.com', 1, '123'),
(45, '2023-10-17', 'merna nasser fared', 'merna12', 'mernafared77@gmail.com', 0, '123'),
(46, '2023-10-13', 'Mona Ahmed', 'Mona123', 'mona127@gmail.com', 0, '123'),
(47, '2023-10-13', 'maria nasser  ', 'maria12', 'maria@gmail.com', 0, '123'),
(48, '2023-10-27', 'Noha Ahmed', 'noha', 'noha77@gmail.com', 0, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
