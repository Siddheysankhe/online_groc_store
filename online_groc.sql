-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2016 at 12:06 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_groc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_fruit`
--

CREATE TABLE `cat_fruit` (
  `id` int(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quant_avai` int(200) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_fruit`
--

INSERT INTO `cat_fruit` (`id`, `product_id`, `name`, `image`, `description`, `quant_avai`, `price`) VALUES
(1, 'FV0001', 'apple', 'apple.jpg', 'Fresh Apple', 100, 20),
(2, 'FV0002', 'water-melon', 'water-melon.jpg', 'Fresh Apple', 100, 20),
(3, 'FV0003', 'banana', 'banana.jpg', 'Fresh Apple', 100, 20),
(4, 'FV0004', 'beetroot', 'beetroot.jpg', 'Fresh Apple', 100, 20),
(5, 'FV0005', 'brinjal', 'brinjal.jpg', 'Fresh Apple', 100, 20),
(6, 'FV0006', 'pomegranate', 'pomegranate.jpg', 'Fresh Apple', 100, 20),
(7, 'FV0007', 'carrot', 'carrot.jpg', 'Fresh Apple', 100, 20),
(8, 'FV0008', 'cauliflower', 'cauliflower.jpg', 'Fresh Apple', 100, 20),
(9, 'FV0009', 'chilli-green', 'chilli-green.jpg', 'Fresh Apple', 100, 20),
(10, 'FV0010', 'coconut', 'coconut.jpg', 'Fresh Apple', 100, 20),
(11, 'FV0011', 'coriander', 'coriander.jpg', 'Fresh Apple', 100, 20),
(12, 'FV0012', 'cucumber', 'cucumber.jpg', 'Fresh Apple', 100, 20),
(13, 'FV0013', 'ginger', 'ginger.jpg', 'Fresh Apple', 100, 20),
(14, 'FV0014', 'kiwi', 'kiwi.jpg', 'Fresh Apple', 100, 20),
(15, 'FV0015', 'ladies finger', 'ladies finger.jpg', 'Fresh Apple', 100, 20),
(16, 'FV0016', 'lemon', 'lemon.jpg', 'Fresh Apple', 100, 20),
(17, 'FV0017', 'onion', 'onion.jpg', 'Fresh Apple', 100, 20),
(18, 'FV0018', 'palak', 'palak.jpg', 'Fresh Apple', 100, 20),
(19, 'FV0019', 'potato', 'potato.jpg', 'Fresh Apple', 100, 20),
(20, 'FV0020', 'tomato', 'tomato.jpg', 'Fresh Apple', 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `cat_select` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `cat_name`, `image`, `description`, `cat_select`) VALUES
(1, 'Fruit & Vegetables', 'Fruits&Vegetables.jpg', 'Buy Fruits and vegetables Online!!!', 'cat_fruit.php'),
(2, 'Grocery', 'Grocery & Staples.jpg', 'Buy Groceries Online!!!', 'cat_grocery.php'),
(3, 'Bread & Dairy', 'Bread Dairy & Eggs', 'Buy Bakery and Dairy Products Online!!!', 'cat_bread.php'),
(4, 'Beverages', 'Beverages.jpg', 'Buy Beverages Online!!!', 'cat_beverages.php'),
(5, 'Branded Food', 'Branded food', 'Buy Branded Food Online!!!', 'cat_branfood.php'),
(6, 'Personal Care', 'Personal Care-1.jpg', 'Buy Personal care products  Online!!!', 'cat_persocare.php'),
(7, 'Meat', 'Meat.jpg', 'Buy Meat and Seafood Online!!!', 'cat_meat.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_fruit`
--
ALTER TABLE `cat_fruit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_fruit`
--
ALTER TABLE `cat_fruit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
