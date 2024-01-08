-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2024 at 08:13 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_comments`
--

DROP TABLE IF EXISTS `add_comments`;
CREATE TABLE IF NOT EXISTS `add_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `dat_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_comments`
--

INSERT INTO `add_comments` (`comment_id`, `comment_name`, `email`, `message`, `dat_time`, `product_id`) VALUES
(25, 'memon', 'memon@gmail.com', 'asdasdjdnasdfaf ff', '2023-12-29 17:08:55', 157);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

DROP TABLE IF EXISTS `add_to_cart`;
CREATE TABLE IF NOT EXISTS `add_to_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `add_to_cart_ibfk_2` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `discount`, `tax`, `product_id`, `user_id`) VALUES
(12, 2, 22, 4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(225) NOT NULL,
  `category_image` blob NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`) VALUES
(13, 'indicator', 0x2e2e2f6361746567726f79696d6167652f342e6a7067),
(14, 'gloves', 0x2e2e2f6361746567726f79696d6167652f322e6a7067),
(15, 'halmet', 0x2e2e2f6361746567726f79696d6167652f312e6a7067),
(16, 'tyre', 0x2e2e2f6361746567726f79696d6167652f332e6a7067),
(17, 'meter', 0x2e2e2f6361746567726f79696d6167652f372e706e67),
(18, 'Handel', 0x2e2e2f6361746567726f79696d6167652f352e6a7067),
(19, 'tyre', 0x2e2e2f6361746567726f79696d6167652f646f776e6c6f61642e6a666966),
(20, 'shoes', 0x2e2e2f6361746567726f79696d6167652f77312e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `shipping_address` varchar(225) DEFAULT NULL,
  `shipping_email` varchar(225) DEFAULT NULL,
  `shipping_phone` int(11) DEFAULT NULL,
  `country` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zipcode` varchar(225) NOT NULL,
  `total_price` varchar(225) NOT NULL,
  `order_status` varchar(225) DEFAULT 'inprocess',
  `payment` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `order_ibfk_1` (`updated_at`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `shipping_address`, `shipping_email`, `shipping_phone`, `country`, `state`, `zipcode`, `total_price`, `order_status`, `payment`, `created_at`, `updated_at`) VALUES
(34, 'Rachel', 'Mcneil', 'saim2109d@aptechgdn.net', 1, 'Sunt enim dolore qui', 'Veritatis doloremque', 'bydo@mailinator.com', 1, 'Non ad sit eum non ', 'Possimus ea aliquid', '45145', '600', 'delivered', 'cashOnDelivery', '2023-12-14 14:24:42', '2023-12-14 22:54:09'),
(35, 'Geraldine', 'Moss', 'saim2109d@aptechgdn.net', 1, 'Ut eveniet veniam ', '', '', 0, 'Odio ut ipsa laudan', 'Accusantium omnis ni', '59161', '600', 'inprocess', 'cashOnDelivery', '2023-12-14 22:56:33', '2023-12-14 22:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

DROP TABLE IF EXISTS `detail_order`;
CREATE TABLE IF NOT EXISTS `detail_order` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `name` varchar(225) NOT NULL,
  `reason` mediumtext DEFAULT NULL,
  `product_price` varchar(225) NOT NULL,
  `qty` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `customer_id`, `product_id`, `name`, `reason`, `product_price`, `qty`, `total_price`, `created_at`) VALUES
(250, 34, 5, 'watch', NULL, '600', 1, 600, '2023-12-14 13:54:09'),
(251, 35, 4, 'watch', 'pre_order', '600', 1, 600, '2023-12-14 13:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

DROP TABLE IF EXISTS `post_rating`;
CREATE TABLE IF NOT EXISTS `post_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `review_name`, `email`, `message`, `created`, `modified`, `product_id`) VALUES
(41, 'saim', 'saim@mail.com', 'abcd', '2023-12-31 13:41:46', '2023-12-31 13:41:46', 158);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `fully_detail` longtext NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT 0,
  `color` varchar(500) NOT NULL,
  `size` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `description`, `fully_detail`, `popularity`, `color`, `size`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(157, 'gloves', 200, 300, 'very best product', 'abcd', 1, '', '', 14, '../product_image/2.jpg', '2023-12-18 07:20:51', '2023-12-18 07:20:51'),
(158, 'gloves', 200, 300, 'very best product', 'abcd', 1, '', '', 14, '../product_image/2.jpg', '2023-12-18 07:20:54', '2023-12-18 07:20:54'),
(159, 'Indicator', 500, 500, 'A watch is a portable timekeeping device typically worn on the wrist. It is designed to accurately measure and display the passage of time. Watches come in various styles, from analog with hour and minute hands to digital wit', 'asdasdasd', 0, '', '', 13, '../product_image/4.jpg', '2023-12-18 07:34:34', '2023-12-18 07:34:34'),
(160, 'Elton Montoya', 954, 0, 'Kim Lloyd', 'Duis officia libero ', 93, '', '', 16, '../product_image/download.jfif', '2023-12-27 08:07:10', '2023-12-27 08:07:10'),
(163, 'shoes', 48, 0, 'Brennan Rocha', 'Aut placeat explica', 84, '#be0909', '', 20, '../product_image/1.png', '2023-12-27 08:53:35', '2023-12-27 08:53:35'),
(164, 'Lawrence Stevenson', 448, 0, 'Plato Cooley', 'Molestias fugiat odi', 50, '[\"#0af2a8\",\"#cedb54\",\"#6647ea\",\"#3a1970\"]', '', 14, '../product_image/download.jfif', '2023-12-29 07:18:44', '2023-12-29 07:18:44'),
(165, 'Tanek Love', 584, 0, 'Shelly Montoya', 'Dolorem sed ex labor', 10, '[\"#a403c7\",\"#c81e1e\"]', 'Jeanette Christian', 13, '../product_image/download.jfif', '2023-12-29 08:54:21', '2023-12-29 08:54:21'),
(166, 'Erica Juarez', 686, 0, 'Meredith Holden', 'Ut ad neque natus at', 28, '[\"#7a5c96\",\"#f50000\"]', 'xl x xxl', 13, '../product_image/download.jfif', '2023-12-29 08:55:12', '2023-12-29 08:55:12'),
(167, 'Callie Craig', 478, 7000, 'James Robbins', 'Ut voluptas aliquam ', 0, '[\"#aaa6d6\"]', 'x ', 15, '../product_image/user.png', '2024-01-01 18:58:45', '2024-01-01 18:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_images`
--

DROP TABLE IF EXISTS `subcategory_images`;
CREATE TABLE IF NOT EXISTS `subcategory_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_images` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory_images`
--

INSERT INTO `subcategory_images` (`id`, `subcategory_images`, `product_id`) VALUES
(239, '../subcategoryimage/banner2.webp', 167),
(240, '../subcategoryimage/banner3.webp', 167),
(241, '../subcategoryimage/banner11.webp', 167),
(242, '../subcategoryimage/banner12.webp', 167),
(243, '../subcategoryimage/discount-banner-thumb.webp', 167);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `cpassword` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT '0',
  `verification` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `cpassword`, `phone`, `role`, `verification`) VALUES
(75, 'Sean Noble', 'muhammadasasz786@gmail.com', '$2y$10$kjQ8Xof0OZWyIs9JYRsdke7JXypvXmrGhkLVOU6oHHcDAfLqO1c/i', '', 63, '0', 'f0463e83e04d49979473fed9e7a5de8b27ef9d5257a5563254e6d68b1c48e245'),
(76, 'Shana Mccarthy', 'saimsachwany@gmail.com', '$2y$10$r83SCbotYRFBnNT8RXSQa.proOMujWaME6Aq2lOCVWh.sIsfzyqVi', '', 75, '0', 'c267aadcdd9d71c00b84f6eeb862984c71e11cb2e610fdb2f4debf5ae65880f1'),
(87, 'Fulton Mcclure', 'vybulex@mailinator.com', '$2y$10$6DmwJOs.mvjAFtvZBw96cuwUsEHD0FT9mC4datJ1ppuL4uc0oaktu', '', 26, '0', 'f26f353a10ad468068534f8dd98f2552af4c0c74f17164b87b4e354816df5f15'),
(88, 'Hilda Ruiz', 'lisefinuq@mailinator.com', '$2y$10$/mw5DUVxANKygJZJ8P4KruNan.0WPDEI6nR6xxKxgIMWl8.T.G0i.', '', 40, '0', '3b1f472670ee4777783a7b10f27629a4d5d26f890088c710430d9894d769c6e0'),
(89, 'Prescott Blackwell', 'luti@mailinator.com', '12345678', '', 40, '0', '695277108f36a52e923b5b41fa4c26d2586469c67684090fb190abc03719be9f'),
(90, 'abc', 'abc@gmail.com', '$2y$10$Ug8CRqeefiDDGTbEn3qpVeSo2etHERrgLPoPIhlM/pJgOli/Q8APS', '', 2147483647, '0', '91d264b1ba5441b3d7431f8e2fc1726d4ab66ba85a72d7a60effcf04a9be4368'),
(91, 'saim', 'dasdas@gmail.com', '$2y$10$6MBSYuglod/NzT.60fTab.oyn76C3fsiISh0eux53UkCPSXSONnnW', '', 2123123123, '0', '58a96af649d0d93ed629788b7c28f1de5a01540b908fc1847c79a70c790074a5'),
(92, 'Eugenia Leach', 'haxore@mailinator.com', '$2y$10$TBFC3BYQDAEzQ68NMZ5InezN1JIzvl2amsSWSwBEY1VxGbiZdNLOK', '', 60, '0', '2e693156d7f0516616ffa4cfd84f27fd3caa0d99aecd4fd4782b6b2600305fbc'),
(93, 'Ulric Kelley', 'hajemoneq@mailinator.com', '$2y$10$nvnixw5JQuWTBJHn5VVtzuY/IFqp.zcCRSSqckhY2eWYgozkwOxBO', '', 67, '0', '4529c52e95fa7301907b26750f2a73943cfe4f92294e0d360613861692a19bfb'),
(94, 'Cole Frazier', 'mukezurob@mailinator.com', '$2y$10$PX7aq8UH0uztYu6wZBpJL.JrmPvpw3yzK04yWkvcIdcPsS26vcxsG', '', 98, '0', 'c208f5b2b80ecfd42ec421a1001550d8cadc7ee13865bbb8559b133435d0b7be'),
(95, 'Yolanda Barry', 'lijaluqil@mailinator.com', '$2y$10$AnzrkcrZZ5pgBHXu6qeA3eyI/dpVPNilUcWQQqaWJLVEi6mTfiooW', '', 76, '0', 'b7cca5a7e1624602fb02e3a939890968a640c6e87684a025cdfaa4177eed72f9'),
(96, 'TaShya Hood', 'nuqetiwybo@mailinator.com', '$2y$10$ms1j78cX6eEC0TBWM0I0HOeWj/YRFSylUfHm82gSolyOJp42WOgnS', '', 98, '0', '547149ea12bdc6f515225df7418afab70d87d317e1a77d46d4b8a3227d7c72d8'),
(97, 'Xander Cummings', 'zaxowuzi@mailinator.com', '$2y$10$cfciyeyqbdc7lOubI9s6WOxrj4cR/l0zasXI67aWPTbOr/V52XZ8a', '', 52, '0', '11230eb5d9d23bc17b46a7bec5336cefe45d44ed0909193bd9ed3b79a26b0cbd'),
(98, 'Tanisha Bryant', 'wytaxe@mailinator.com', '$2y$10$5aF1wpBBhVeKF2YA/n8qFu5TwO5KKaGRmee4.QAYjlRAKFb.li5wi', '', 66, '0', '5c32b2ec0b361b4d41ad1779120d4aaa17fcc834ba129ac2d599285a9c180d32'),
(100, 'Paloma Maxwell', 'saim@gmail.com', '$2y$10$/oSj3IvCvYnimJGDwbhEpONDLcMOIu2dnU2M2Ycb9cqnOtAdA9rEi', '', 32, '0', 'f50860c69385d7e236e3990825e65b6bc60d257f789bf9f365e7022e5daf52a8'),
(117, 'Thaddeus Rogers', 'kinerifa@mailinator.com', '$2y$10$9/zwoSlfx/PgUDKwOzC8OudjcwdIjqkWEQHX46ZMIftbXVkpioAGK', '', 97, '0', '5f4b03fd0967c8c174f62b0fc9381d76614360eeb6ca398764c2e726e7b61a17'),
(124, 'zain', 'mzainkhatri@gmail.com', '$2y$10$02ytZahSvl8OdvQ61/Lscel8dUMofSnrmuy3HAo4PMEozayYrhbOq', '', 4341411, '0', 'b504cc5f943f919323f02c6cd81c7715066895ff008c64d7d01a018fbd1b4edc'),
(156, 'Blythe Chandler', 'vumunufofo@mailinator.com', '$2y$10$zN/TEMoYCSVVmctSiTkWfO8oX4Qu1873p1PGYwcLEZsZRTGBEprxq', '', 21, '0', 'c0a338a19203a7ec2f308640f126e1358db5943d9e7a3ab09076a3e644f3a427'),
(164, 'Isabelle Mcleod', 'saim2109d@aptechgdn.net', '$2y$10$avghg6XjA6hH9fivwc5tH.7ZAhpLrc9MApToBjSa2nTOTAUfFd.Cu', '', 23, '0', '38f8ac6baa637f0aba27231b8546a26fe9529770ce65e592424a3defa4e2b351');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_comments`
--
ALTER TABLE `add_comments`
  ADD CONSTRAINT `add_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD CONSTRAINT `post_rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  ADD CONSTRAINT `subcategory_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
