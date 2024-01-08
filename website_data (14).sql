-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 06:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `add_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `dat_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_comments`
--

INSERT INTO `add_comments` (`comment_id`, `comment_name`, `email`, `message`, `dat_time`, `product_id`) VALUES
(25, 'memon', 'memon@gmail.com', 'asdasdjdnasdfaf ff', '2023-12-29 17:08:55', 157);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `discount`, `tax`, `product_id`, `user_id`) VALUES
(12, 2, 22, 4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `category_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `detail_order` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `name` varchar(225) NOT NULL,
  `reason` mediumtext DEFAULT NULL,
  `product_price` varchar(225) NOT NULL,
  `qty` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `post_rating` (
  `id` int(11) NOT NULL,
  `review_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `review_name`, `email`, `message`, `created`, `modified`, `product_id`) VALUES
(41, 'saim', 'saim@mail.com', 'abcd', '2023-12-31 13:41:46', '2023-12-31 13:41:46', 158),
(42, '', '', '', '2024-01-02 12:00:24', '2024-01-02 12:00:24', 167);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `description`, `fully_detail`, `popularity`, `color`, `size`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(170, 'Hall Brewer', 761, 400, 'Iola Camacho', 'Reprehenderit omnis', 1, '[\"#5c2ffb\",\"#eb0000\"]', '[\"13\",\"14\",\"16\",\"19\"]', 20, '../product_image/3.png', '2024-01-03 05:08:27', '2024-01-03 05:08:27'),
(171, 'Hall Brewer', 761, 400, 'Iola Camacho', 'Reprehenderit omnis', 0, '[\"#5c2ffb\",\"#eb0000\"]', '[\"13\",\"14\",\"16\",\"19\"]', 20, '../product_image/3.png', '2024-01-03 05:31:49', '2024-01-03 05:31:49'),
(172, 'adasd', 5, 54, 'asdsa', 'asdasd', 1, '[\"#5c2ffb\",\"#eb0000\"]', '[\"13\",\"14\",\"16\",\"19\"]', 13, '../product_image/2.png', '2024-01-03 05:35:01', '2024-01-03 05:35:01'),
(173, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 1, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 06:09:37', '2024-01-03 06:09:37'),
(174, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 1, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 06:10:46', '2024-01-03 06:10:46'),
(175, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 0, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 06:11:09', '2024-01-03 06:11:09'),
(176, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 0, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 08:59:48', '2024-01-03 08:59:48'),
(177, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 0, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 08:59:49', '2024-01-03 08:59:49'),
(178, 'Owen Conrad', 418, 1000, 'Ciara Durham', 'Non esse consequatur', 0, '[\"#d37c9c\"]', '[\"13\",\"14\",\"16\",\"19\"]', 17, '../product_image/2.png', '2024-01-03 08:59:50', '2024-01-03 08:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_images`
--

CREATE TABLE `subcategory_images` (
  `id` int(11) NOT NULL,
  `subcategory_images` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory_images`
--

INSERT INTO `subcategory_images` (`id`, `subcategory_images`, `product_id`) VALUES
(1, '../subcategoryimage/1.png', 170),
(2, '../subcategoryimage/2.jfif', 170),
(3, '../subcategoryimage/2.png', 170),
(4, '../subcategoryimage/3.png', 170),
(5, '../subcategoryimage/w1.png', 170),
(6, '../subcategoryimage/w2.png', 170),
(7, '../subcategoryimage/w3.png', 170),
(8, '../subcategoryimage/w4.png', 170),
(9, '../subcategoryimage/1.png', 171),
(10, '../subcategoryimage/2.jfif', 171),
(11, '../subcategoryimage/2.png', 171),
(12, '../subcategoryimage/3.png', 171),
(13, '../subcategoryimage/w1.png', 171),
(14, '../subcategoryimage/w2.png', 171),
(15, '../subcategoryimage/w3.png', 171),
(16, '../subcategoryimage/w4.png', 171),
(17, '../subcategoryimage/1.png', 173),
(18, '../subcategoryimage/2.jfif', 173),
(19, '../subcategoryimage/2.png', 173),
(20, '../subcategoryimage/3.png', 173),
(21, '../subcategoryimage/w1.png', 173),
(22, '../subcategoryimage/1.png', 174),
(23, '../subcategoryimage/2.jfif', 174),
(24, '../subcategoryimage/2.png', 174),
(25, '../subcategoryimage/3.png', 174),
(26, '../subcategoryimage/w1.png', 174),
(27, '../subcategoryimage/1.png', 175),
(28, '../subcategoryimage/2.jfif', 175),
(29, '../subcategoryimage/2.png', 175),
(30, '../subcategoryimage/3.png', 175),
(31, '../subcategoryimage/w1.png', 175),
(32, '../subcategoryimage/1.png', 176),
(33, '../subcategoryimage/2.jfif', 176),
(34, '../subcategoryimage/2.png', 176),
(35, '../subcategoryimage/3.png', 176),
(36, '../subcategoryimage/w1.png', 176),
(37, '../subcategoryimage/1.png', 177),
(38, '../subcategoryimage/2.jfif', 177),
(39, '../subcategoryimage/2.png', 177),
(40, '../subcategoryimage/3.png', 177),
(41, '../subcategoryimage/w1.png', 177),
(42, '../subcategoryimage/1.png', 178),
(43, '../subcategoryimage/2.jfif', 178),
(44, '../subcategoryimage/2.png', 178),
(45, '../subcategoryimage/3.png', 178),
(46, '../subcategoryimage/w1.png', 178);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `cpassword` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT '0',
  `verification` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_comments`
--
ALTER TABLE `add_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `add_to_cart_ibfk_2` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`updated_at`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_comments`
--
ALTER TABLE `add_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
