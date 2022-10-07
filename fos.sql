-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 11:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(10) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_img` varchar(500) NOT NULL,
  `price` varchar(5) NOT NULL,
  `category` varchar(50) NOT NULL,
  `availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_img`, `price`, `category`, `availability`) VALUES
(25, 'Chicken roast', '631d0592e8805629bab8f21f7966d4a7a5200a0102de7.jpg', '120', 'Curry', '1'),
(26, 'tea', '631de3e81eadbistockphoto-531263883-612x612.jpg', '20', 'Beverage', '1'),
(28, 'Chicken biriyani', '631d05eb465cbMuradabadi-chicken-biryani.jpg', '160', 'Rice', '1'),
(29, 'Coffee', '631d05fa06b65coffee-cup-beans-26448276.jpg', '30', 'Beverage', '1'),
(30, 'Kala bhuna', '631d060b7ef9efile.jpg', '150', 'Curry', '1'),
(31, 'Paratha', '631d0e5b4601cparatha.jpg', '20', 'Snacks', '1'),
(32, 'Borhani', '631d8784c2eadborhani_drink.jpg', '40', 'Beverage', '1'),
(44, 'Rui fish curry', '631fb464d1b3c004A3767-edited_2_15-e1611842958656.jpg', '90', 'Curry', '1'),
(45, 'Beef Nihari', '631fb49712b3anihari.jpg', '110', 'Curry', '1'),
(46, 'Fresh water', '631fb4fbef838super-fresh-drinking-water-500-ml.jpg', '20', 'Beverage', '1'),
(47, 'Garlic butter naan', '631fb567e76aa20220319-IMG_6553_jpg-2-1024x1024.jpg', '35', 'Snacks', '1'),
(48, 'Tandoori roti', '631fb5bf83d8dunnamed.jpg', '15', 'Snacks', '1'),
(49, 'Kacchi biriyani', '631fb68b05375images.jpg', '200', 'Rice', '1'),
(50, 'Chicken Khichuri', '631fb6d02b00emoni_s_kitchen_bhuna_khichuri_with_deshi_chicken_roast_thumbnail_1615782486861.jpg', '140', 'Rice', '1'),
(51, 'Plain rice', '631fb6fcc0baehow-to-make-basic-white-rice-2355883-10-5b0da96eba6177003622896e.jpg', '25', 'Rice', '1'),
(52, 'Mixed Vegetable', '631fb7515ec64mixed-vegetable-curry-recipe.jpg', '30', 'Vegetables', '1'),
(53, 'Vegetable salad', '631fb864982fdfruit-and-vegetable-salad-served-in-lettuce-leaf.jpg', '50', 'Vegetables', '1'),
(54, 'Butter garlic bread', '63235992df9f5garlic-bread-with-cheese.jpg', '500', 'Snacks', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `pay_m` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  `time` varchar(10) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `name`, `address`, `phone`, `amount`, `pay_m`, `status`, `time`) VALUES
(9, '19', 'User', 'Shewrapara,Mirpur', '01733000000', '340', 'Cash on delivery', '0', '2022-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(40) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `acc_type` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Password`, `Phone`, `Address`, `acc_type`, `Status`) VALUES
(1, 'Admin', 'admin123', '01711000000', '', 'admin', '1'),
(2, 'Manager', 'manager123', '01722000000', '', 'manager', '1'),
(19, 'User', '1111111111', '01733000000', 'Shewrapara,Mirpur', 'user', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
