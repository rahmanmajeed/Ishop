-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 03:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ishopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `description`) VALUES
(1, 'Asus', 'Asus Pro'),
(2, 'Intel', 'Intel Inside'),
(3, 'Dell', 'Dell Inspiration'),
(4, 'Acer', 'Acer Products'),
(5, 'Lenovo', 'Lenovo Products'),
(6, 'Samsung', 'Lenovo Samsung'),
(7, 'Canon', 'Camera brands'),
(8, 'Nikon', 'Camera Brands and Equipment'),
(9, 'HP', 'Pro Book'),
(10, 'Apacer', 'Accessories Brand'),
(11, 'Toshiba', 'Storage Brand'),
(12, 'A Data', 'Accessories'),
(13, 'Apple', 'mac book pro');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `description`) VALUES
(1, 'Desktop', 'Full PC'),
(2, 'Laptop', 'Laptop PC, NoteBook'),
(3, 'Tablets', 'Tab/Smart Phones'),
(4, 'Storage', 'All kinds of Drive'),
(5, 'Network', 'Networking Device'),
(6, 'Accessories', 'ETC'),
(7, 'Office Equipment', 'Official Products'),
(8, 'Photography', 'Photography Products'),
(9, 'Audio/Video', 'All Types of Media'),
(10, 'Monitor', 'Display, Output Device'),
(11, 'Mouse', 'Any Type Mouse'),
(12, 'Keyboard', 'Any Type Keyboard'),
(13, 'Software', 'Premimum Soft'),
(14, 'Ram', 'All Brands'),
(15, 'Motherboard', 'Asus,Intel,MSI Brands'),
(16, 'bluetooth mouse', 'wireless ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_discounts`
--

CREATE TABLE `customer_discounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `orderer_id` int(11) NOT NULL,
  `order_price` double NOT NULL,
  `order_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `orderer_id`, `order_price`, `order_date`, `product_id`, `status`) VALUES
(1, 18, 6200, '2016-09-04', 2, 'sold'),
(9, 18, 6200, '2016-09-05', 2, 'sold'),
(6, 18, 37000, '2016-09-05', 6, 'sold'),
(7, 18, 27000, '2016-09-05', 8, 'completed'),
(8, 18, 16000, '2016-09-05', 13, 'sold'),
(10, 6, 4800, '2016-09-05', 1, 'incomplete'),
(11, 6, 27000, '2016-09-05', 8, 'incomplete'),
(12, 1, 6200, '2016-09-05', 2, 'incomplete'),
(13, 6, 6200, '2016-09-05', 2, 'incomplete'),
(14, 18, 6200, '2016-09-06', 2, 'incomplete'),
(15, 18, 27000, '2016-09-06', 8, 'incomplete'),
(16, 18, 16000, '2016-09-06', 13, 'incomplete'),
(17, 18, 48000, '2016-09-06', 9, 'incomplete'),
(18, 18, 16000, '2016-09-06', 13, 'incomplete'),
(19, 21, 6200, '2016-09-05', 2, 'incomplete'),
(20, 22, 4800, '2016-09-06', 1, 'sold'),
(22, 22, 4800, '2016-09-06', 1, 'sold'),
(23, 5, 6200, '2016-09-06', 2, 'incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `buy_price` double NOT NULL,
  `sell_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_purchased` date NOT NULL,
  `last_sold` date NOT NULL,
  `brand_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `buy_price`, `sell_price`, `quantity`, `last_purchased`, `last_sold`, `brand_id`, `supplier_id`, `cat_id`, `image_location`, `description`) VALUES
(1, 'Router', 4200, 4800, 21, '2016-08-15', '2016-08-28', 6, 2, 4, 'Archer-C7-01.jpg', 'Dual Antena, 2000SQF '),
(2, 'HDTH31Canvio Head Phone', 5800, 6200, 34, '2016-08-15', '2000-10-10', 4, 2, 1, 'beats-headphones.jpg', 'Creative Bluetooth'),
(3, 'Model: J35T3 ', 10000, 12000, 100016, '2016-09-04', '2016-08-28', 12, 1, 4, 'asus-zenfone-2-1.jpg', ' Storage: 32 GB'),
(4, 'Model: My Passport Ultra WDBGPU0010BWT', 5300, 5700, 22, '2000-10-10', '2016-08-15', 11, 6, 1, 'download (5).jpg', '2GB Ram, 2year warrenty'),
(5, 'Acer Veriton 4th Gen. Intel Core i5', 30000, 35000, 16, '2016-08-13', '2016-08-13', 4, 7, 1, 'Acer-Aspire-V3_574G_531H.jpg', '2TB HDD, 4GB Ram'),
(6, 'Acer Aspire 5663', 32000, 37000, 1024, '2016-09-04', '2000-10-10', 1, 1, 1, '14-r251TU.jpg', '4th Gen, 4GB Ram'),
(7, 'Asus K30AD', 37500, 33500, 33, '2016-08-28', '2016-08-13', 1, 2, 1, 'Ryans_animation_13.png', 'Processor: Intel PQC N3530 \nMonitor: 19.5" Touch \nRAM: 4GB \nHDD: 500GB HDD \nGraphics: Intel HD \nWarranty: 1 Year '),
(8, 'DELL VOSTRO 3900 MT', 25000, 27000, 75, '2016-09-04', '2016-08-28', 3, 1, 1, 'download (1).jpg', 'Ram 4GB, 6th Gen'),
(9, 'Asus H61M-K LGA1155', 37000, 48000, 53, '2000-10-10', '2000-10-10', 1, 3, 15, 'Dell-Inspiron-N5458_Black.jpg', '4GB Ram, TB HDD'),
(10, 'Asus H81M-C', 42000, 4900, 13, '2000-10-10', '2000-10-10', 1, 9, 1, 'download.jpg', '500GB HDD, 2Years Warrenty'),
(11, 'Asus B150M PRO GAMING', 7800, 8300, 22, '2000-10-10', '2000-10-10', 1, 8, 1, 'download (7).jpg', '4GB Graphics, 8GB Ram'),
(12, 'SBS A550 5.1', 4200, 4900, 11, '2016-08-13', '2000-10-10', 6, 8, 9, 'Twinmos-T7283GDI-Black.png', '2Gb ram, 8.0 MP Camera'),
(13, 'Asus FonePad FE375CG', 15000, 16000, 16, '2016-08-13', '2000-10-10', 1, 1, 1, 'images.jpg', '1GB Ram, 16GB Memory');

-- --------------------------------------------------------

--
-- Table structure for table `products_sells`
--

CREATE TABLE `products_sells` (
  `id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sell_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_sells`
--

INSERT INTO `products_sells` (`id`, `sell_id`, `product_id`, `sell_price`, `quantity`) VALUES
(1, 1, 7, 12000, 2),
(2, 1, 5, 6200, 1),
(3, 1, 1, 4800, 1),
(4, 2, 4, 6200, 1),
(5, 2, 3, 4800, 2),
(6, 3, 8, 12000, 1),
(7, 3, 3, 6200, 1),
(8, 3, 1, 4800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` int(11) NOT NULL,
  `product_id` int(50) NOT NULL,
  `discount` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `product_id`, `discount`, `start_date`, `end_date`) VALUES
(1, 5, 20, '2016-08-13', '2016-08-20'),
(2, 8, 15, '2016-08-13', '2016-09-15'),
(3, 13, 18, '2016-08-13', '2016-09-15'),
(5, 1, 20, '2014-01-01', '2015-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `purchase_id`, `product_id`, `buy_price`, `quantity`, `status`) VALUES
(1, 1, 2, 5800, 2, 'Complete'),
(2, 1, 1, 4200, 4, 'Complete'),
(3, 2, 12, 4200, 1, 'Processing'),
(4, 2, 1, 4200, 1, 'Processing'),
(5, 3, 8, 25000, 3, 'Complete'),
(6, 4, 8, 25000, 2, 'Complete'),
(7, 4, 7, 37500, 1, 'Complete'),
(8, 5, 3, 10000, 99999, 'Complete'),
(9, 5, 8, 25000, 55, 'Complete'),
(10, 5, 6, 32000, 999, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `problem_description` varchar(300) NOT NULL,
  `repair_cost` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`id`, `service_id`, `product_id`, `problem_description`, `repair_cost`, `status`) VALUES
(1, 1, 8, 'Ram slot faulty', 300, 'Complete'),
(2, 1, 4, 'Chip Prob', 230, 'Complete'),
(3, 2, 3, 'Partition Prob', 260, 'Normal'),
(4, 3, 1, 'Fragment porb		', 600, 'Complete'),
(5, 0, 3, 'disk prob', 230, 'Emergency');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `name`, `phone`, `email`, `address`, `creator_id`) VALUES
(1, 2, 'Mr.Ruposh', '01735108437', 'ruposh.cse@gmail.com', 'Mirpur-11, Dhaka', 1),
(2, 3, 'Taj', '01818222382', 'saveus@gmail.com', 'Mohakhali, Dhaka', 2),
(3, 4, 'Anik', '01674534532', 'anik@gmail.com', 'Kochukhet, Dhaka', 2),
(4, 5, 'Mr.Sajal', '01823200300', 'sajal@ymail.com', 'Tangail', 1),
(5, 6, 'Mr.sojib', '01723238721', 'sajib@gmail.com', 'Tangail', 2),
(6, 7, 'Mr.Nadim', '01711943232', 'nadim@yahoo.com', 'Dhaka', 2),
(7, 8, 'Mr.Rahim', '0182781268', 'rahim@gmail.com', 'Nikunjo-2', 1),
(8, 9, 'Ms.Sufia', '01721378674', 'sufia@yahoo.com', 'Banani dhaka', 7),
(16, 17, 'Ashraf', '01723723234', 'ashraf@yahoo.com', 'Mohakhali', 7),
(17, 18, 'Akib Hasan', '01752144815', 'akib.hasan@ymail.com', 'Mohakhali Wireless Gate', 7),
(18, 19, 'rakhal raja', '017507556323', 'ruposh.cse@gmail.com', 'dhaka', 7),
(19, 20, 'aaaa ddd', '01750755632', 'rahad@gmail.com', 'dhaka', 2),
(20, 21, 'test test', '01711111111', 'test@mail.com', 'Dhaka', 7),
(21, 22, 'samiul islam', '01750177814', 'akib5293@gmail.com', 'arjotpara mohakhali dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `purchaser_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_charge` double NOT NULL,
  `advance_pay` double NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `approx_receive_date` date NOT NULL,
  `receive_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchaser_id`, `supplier_id`, `total_charge`, `advance_pay`, `receiver_id`, `approx_receive_date`, `receive_date`, `status`) VALUES
(1, 1, 2, 28400, 28400, 1, '2016-08-07', '2016-08-15', 'Completed'),
(2, 1, 3, 8400, 8400, 1, '2016-08-03', '2000-10-10', 'Incomplete'),
(3, 1, 4, 75000, 75000, 1, '2015-04-04', '2016-08-17', 'Completed'),
(4, 1, 2, 87500, 87500, 1, '2016-08-20', '2016-08-28', 'Completed'),
(5, 1, 1, 33343000, 100000, 1, '2016-12-04', '2016-09-04', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `sell_id` int(11) NOT NULL,
  `buyer_id` varchar(12) NOT NULL,
  `total_charges` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `sell_date` date NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`sell_id`, `buyer_id`, `total_charges`, `paid_amount`, `sell_date`, `seller_id`) VALUES
(1, '01818038110', 106800, 106800, '2016-08-13', 0),
(2, '01827812683', 29700, 29700, '2016-08-15', 1),
(3, '01735108437', 25650, 25650, '2016-08-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `customer_id` varchar(12) NOT NULL,
  `total_charges` double NOT NULL,
  `advance_pay` double NOT NULL,
  `receive_date` date NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `customer_id`, `total_charges`, `advance_pay`, `receive_date`, `receiver_id`, `delivery_date`, `status`) VALUES
(1, '01818038110', 530, 530, '2016-08-13', 2, '2016-08-14', 'Completed'),
(2, '01818038110', 260, 260, '2016-08-13', 1, '2016-08-20', 'Incomplete'),
(3, '01721378674', 600, 600, '2016-08-15', 7, '2016-09-01', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_email` varchar(60) NOT NULL,
  `supplier_address` varchar(70) NOT NULL,
  `security_deposit` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_email`, `supplier_address`, `security_deposit`) VALUES
(1, 'Akib', '01752144815', 'akib@yahoo.com', 'Mohakhali', 40000),
(2, 'Majeed', '01672005709', 'majed@gmail.com', 'Kazipara, Dhaka', 30000),
(3, 'Muabbiz', '01711090815', 'muabbiz@gmail.com', 'Nikunjo-2', 35000),
(4, 'Tanvir', '01618240414', 'tanvir@ymail.com', 'Old Dhaka', 20000),
(5, 'Ratul', '01717255597', 'ratul@hotmail.com', 'Dhanmandi', 45000),
(6, 'Zahidul', '01672349862', 'zahidul@gmail.com', 'Mirpur', 60000),
(7, 'Ratul', '01676 455 659', 'ratulminhaz@gmail.com', 'Banani', 55000),
(8, 'Imran Sarkar', '01743311333', 'imran@yahoo.com', 'Mirpur', 40000),
(9, 'Tonmoy', '01675316134', 'tonmoy@yahoo.com', 'Old Dhaka', 32000),
(10, 'ruposh', '01674774908', 'ruposh@gmail.com', 'GP cha 232', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type`, `status`, `last_login`) VALUES
(1, 'admin', 'admin', 'Admin', 'active', '2017-01-14'),
(2, '01735108437', '6432', 'Manager', 'active', '2016-09-08'),
(3, '01818222382', '1234', 'Consummer', 'active', '2017-01-14'),
(4, '01674534532', '12345', 'Employee', 'active', '2016-09-08'),
(5, '01823200300', '1234', 'Consummer', 'active', '2016-09-06'),
(6, '01723238721', '1234', 'Consummer', 'active', '2016-09-05'),
(7, '01711943232', '1234', 'Employee', 'active', '2016-09-07'),
(8, '01827812683', '1234', 'Consummer', 'active', '2016-09-06'),
(9, '01721378674', '12345', 'Consummer', 'active', '2000-10-10'),
(17, '01723723234', '123456', 'Consummer', 'active', '2000-10-10'),
(18, '01752144815', 'akibdadu', 'Consummer', 'active', '2016-09-05'),
(19, 'rakhal raja', '123456', 'Consummer', 'active', '0000-00-00'),
(20, '01750755632', '123456', 'Consummer', 'active', '2016-09-05'),
(21, '01711111111', '123456', 'Consummer', 'active', '2016-09-05'),
(22, '01750177814', '123456', 'Consummer', 'active', '2016-09-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_discounts`
--
ALTER TABLE `customer_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_sells`
--
ALTER TABLE `products_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `customer_discounts`
--
ALTER TABLE `customer_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `products_sells`
--
ALTER TABLE `products_sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
