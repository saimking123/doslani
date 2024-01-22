-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 01:57 PM
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
(30, 'tyre', 0x2e2e2f6361746567726f79696d6167652f646f776e6c6f61642e6a666966),
(31, 'tyre', 0x2e2e2f6361746567726f79696d6167652f30322e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `discount` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `discount`, `status`) VALUES
(1, 'PRUS134VUD', 50, 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactno` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `shipping_name` varchar(225) DEFAULT NULL,
  `shipping_city` varchar(225) DEFAULT NULL,
  `shipping_country` varchar(225) DEFAULT NULL,
  `shipping_postal_code` int(11) DEFAULT NULL,
  `shipping_address` varchar(225) DEFAULT NULL,
  `shipping_email` varchar(225) DEFAULT NULL,
  `shipping_contact` int(11) DEFAULT NULL,
  `country` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `Order_Notes` varchar(1000) DEFAULT NULL,
  `total_price` varchar(225) NOT NULL,
  `order_status` varchar(225) DEFAULT 'inprocess',
  `payment` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `full_name`, `email`, `contactno`, `address`, `shipping_name`, `shipping_city`, `shipping_country`, `shipping_postal_code`, `shipping_address`, `shipping_email`, `shipping_contact`, `country`, `city`, `postal_code`, `Order_Notes`, `total_price`, `order_status`, `payment`, `created_at`, `updated_at`) VALUES
(74, 'Rogan Brooks', 'xozy@mailinator.com', 64, 'Exercitationem inven', 'Axel Merritt', 'Placeat eum possimu', 'Sed beatae et autem ', 0, 'Vitae ut corporis en', 'quparajix@mailinator.com', 38, 'Quia exercitationem ', 'Fugiat ipsum aliqui', 0, 'Culpa corrupti vita', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 01:46:50', '2024-01-12 01:46:50'),
(75, 'Odette Daniel', 'jipat@mailinator.com', 67, 'Quis accusamus nulla', 'Kyle Waters', 'Et totam praesentium', 'Consequatur Velit ', 0, 'Praesentium aut ipsu', 'viqo@mailinator.com', 22, 'Consequatur Veniam', 'Quaerat non aut labo', 0, 'Non aspernatur dolor', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 01:50:44', '2024-01-12 01:50:44'),
(76, 'Jakeem Foley', 'pimecesez@mailinator.com', 51, 'Incidunt omnis volu', '', '', '', 0, '', '', 0, 'Molestias sint vitae', 'Aliquid irure enim e', 0, 'Omnis sit asperiore', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 01:51:43', '2024-01-12 01:51:43'),
(77, 'Jakeem Foley', 'pimecesez@mailinator.com', 51, 'Incidunt omnis volu', '', '', '', 0, '', '', 0, 'Molestias sint vitae', 'Aliquid irure enim e', 0, 'Omnis sit asperiore', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 01:52:42', '2024-01-12 01:52:42'),
(78, 'MacKensie Blair', 'hovevyma@mailinator.com', 6, 'Accusantium labore d', 'Quincy Morin', 'Sint pariatur Venia', 'Molestias animi sae', 0, 'Reprehenderit volupt', 'kule@mailinator.com', 41, 'Officia nesciunt si', 'Iusto alias sint nul', 0, 'Totam saepe quia ut ', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 01:55:15', '2024-01-12 01:55:15'),
(79, 'Anastasia Owen', 'dyve@mailinator.com', 6, 'Tempore aute quae s', 'Wylie Hayden', 'Vitae repudiandae id', 'Enim in facilis inve', 0, 'Sed commodi animi v', 'bazu@mailinator.com', 80, 'Sit doloribus itaqu', 'Aliquid maiores pari', 0, 'Quia adipisci aliqua', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 02:03:04', '2024-01-12 02:03:04'),
(80, 'Bryar Koch', 'qeco@mailinator.com', 72, 'Proident asperiores', 'Nola Hoffman', 'Nemo quis aut ut rep', 'Vero repellendus Re', 0, 'Autem suscipit cupid', 'cydawano@mailinator.com', 24, 'Suscipit voluptates ', 'Fugiat temporibus c', 0, 'Irure quae aliquip e', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 22:03:58', '2024-01-12 22:03:58'),
(81, 'Blaine Russell', 'hufev@mailinator.com', 35, 'Aute qui illum mole', 'Dahlia Clay', 'Nihil aliquam et ex ', 'Omnis adipisicing ea', 0, 'Culpa obcaecati quia', 'caki@mailinator.com', 17, 'Non quo qui quos aut', 'Praesentium velit a', 0, 'Explicabo Est aliq', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 22:26:18', '2024-01-12 22:26:18'),
(82, 'Blaine Russell', 'hufev@mailinator.com', 35, 'Aute qui illum mole', 'Dahlia Clay', 'Nihil aliquam et ex ', 'Omnis adipisicing ea', 0, 'Culpa obcaecati quia', 'caki@mailinator.com', 17, 'Non quo qui quos aut', 'Praesentium velit a', 0, 'Explicabo Est aliq', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 22:32:21', '2024-01-12 22:32:21'),
(83, 'Teagan Taylor', 'bykehehylo@mailinator.com', 89, 'Qui veniam est dese', 'Jack Alston', 'Et anim esse eum mai', 'Aliqua Facere numqu', 0, 'Iusto alias dolor ni', 'mitesoli@mailinator.com', 4, 'Totam aperiam consec', 'Adipisicing aperiam ', 0, 'Voluptatem reprehend', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 23:43:13', '2024-01-12 23:43:13'),
(84, 'Libby Mejia', 'divygapuxa@mailinator.com', 24, 'Vel qui ipsum omnis ', 'Cooper Robles', 'Tempora autem omnis ', 'Nihil esse modi qui', 0, 'Et sint sunt et do ', 'vabokece@mailinator.com', 61, 'Aute a proident quo', 'Quia ea optio rerum', 0, 'In qui aut culpa te', '0', 'inprocess', 'cashOnDelivery', '2024-01-12 23:54:46', '2024-01-12 23:54:46'),
(85, '', '', 0, '', '', '', '', 0, '', '', 0, '', '', 0, '', '0', 'inprocess', 'cashOnDelivery', '2024-01-17 23:11:09', '2024-01-17 23:11:09'),
(86, '', '', 0, '', '', '', '', 0, '', '', 0, '', '', 0, '', '0', 'inprocess', 'cashOnDelivery', '2024-01-17 23:19:46', '2024-01-17 23:19:46');

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
(8, 'Ursa Hardy', 385, 5, 'Zeph Bryant', 'Vitae odio ut molest', 13, '[\"#248e1a\"]', '[\"30\"]', 30, '../product_image/01.png', '2024-01-11 08:39:57', '2024-01-11 08:39:57'),
(9, 'Tallulah Jackson', 97, 4, 'Taylor Dale', 'Consequatur culpa sa', 1, '[\"#e7d58e\",\"#de4a4a\"]', '[\"30\"]', 31, '../product_image/meter2.png', '2024-01-17 05:24:00', '2024-01-17 05:24:00'),
(10, 'Maisie Pruitt', 31, 4, 'Rae Finley', 'Accusantium ut alias', 36, '[\"#95c7cf\",\"#957575\"]', '[\"31\"]', 31, '../product_image/4.png', '2024-01-17 05:51:09', '2024-01-17 05:51:09');

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
(1, '../subcategoryimage/01.png', 8),
(2, '../subcategoryimage/02.png', 8),
(3, '../subcategoryimage/meter1.png', 9),
(4, '../subcategoryimage/meter2.png', 9),
(5, '../subcategoryimage/meter3.png', 9),
(6, '../subcategoryimage/1 - Copy.jpg', 10),
(7, '../subcategoryimage/1 - Copy.png', 10),
(8, '../subcategoryimage/2 - Copy.png', 10),
(9, '../subcategoryimage/2.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT '0',
  `verification` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `verification`) VALUES
(5, 'abc', 'abc@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0', ''),
(6, 'xyz', 'xyz@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1', '');

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
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_comments`
--
ALTER TABLE `add_comments`
  ADD CONSTRAINT `add_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `customer_orders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  ADD CONSTRAINT `subcategory_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
