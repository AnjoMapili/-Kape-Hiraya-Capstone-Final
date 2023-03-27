-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 05:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapehiraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_number` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_number`, `name`, `email`, `contact`, `address`, `date`) VALUES
(213, '', 'Angelyn A. Mapili', 'angelyn_mapili18@yahoo.com ', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-01-30'),
(214, '', 'Andrea A. Mapili', 'angelyn_mapili18@yahoo.com ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-01-30'),
(215, '', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-02-12'),
(217, '', 'Steve Jobs', 'steve@gmail.com', '09214787621', 'Canada', '2023-02-13'),
(220, '', 'ds', 'sds@dfd ', 'sd', 'sd', '2023-02-27'),
(221, '', 'sdfsdf', 'asd@sdf.com ', '2313', '123', '2023-02-01'),
(222, '', 'sdgsdh', 'dhdfh@gmail.coms ', 'sdgsg', 'dfhdfhdfh', '2023-02-28'),
(223, '', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-02-27'),
(224, '', 'asdaaaaa', 'asd2@sd ', 'asd', 'asd', '2023-03-04'),
(225, '', 'asd', 'asd@asd ', 'asd', 'asd', '2023-03-08'),
(226, '', 'asd', 'asd@asd ', 'asd', 'asd', '2023-03-08'),
(227, '', 'anjoooooooooooo', 'anjoooooooooo@awe ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-08'),
(228, '', 'Angelo A. Mapilissss', 'mapili_angelo14@gmail.com ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-23'),
(229, '', 'Angelyn A. Mapili', 'mapili_angelo14@gmail.com ', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-24'),
(230, '644991', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(231, '523995', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(232, '772580', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(233, '746294', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(234, '842903', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(235, '175971', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(236, '821768', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(237, '815452', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(238, '814228', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(239, '510909', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(240, '376286', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(241, '793391', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(242, '719619', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(243, '433428', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(244, '634802', 'Array', 'Array', 'Array', 'Array', '0000-00-00'),
(245, '898681', 'Andrea A. Mapili', 'andrea_mapili22@yahoo.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-25'),
(246, '720418', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-25'),
(247, '629736', '', '', '', '', '0000-00-00'),
(248, '728960', 'sd', '', '', '', '0000-00-00'),
(249, '588418', '', '', '', '', '0000-00-00'),
(250, '983074', '', '', '', '', '0000-00-00'),
(251, '958687', '', '', '', '', '0000-00-00'),
(252, '127160', '', '', '', '', '0000-00-00'),
(253, '461178', '', '', '', '', '0000-00-00'),
(254, '481267', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-25'),
(255, '649173', '', '', '', '', '0000-00-00'),
(256, '853216', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-25'),
(257, '270635', 'Angelo A. Mapili', '', '', '', '0000-00-00'),
(258, '698270', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-03-26'),
(259, '600546', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com', '', '', '0000-00-00'),
(260, '165872', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '', '', '0000-00-00'),
(261, '190220', 'Angelo A. Mapili', '', '', '', '0000-00-00'),
(262, '661772', 'AnjoPogi123', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-27'),
(263, '119897', 'Angelo A. Mapilisssss', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-03-27'),
(264, '867815', 'Angelo A. Mapili', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_250g` decimal(18,2) NOT NULL,
  `price_500g` decimal(18,2) NOT NULL,
  `price_1kg` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price_250g`, `price_500g`, `price_1kg`) VALUES
(26, 'Benguet Blend', 11, '120.00', '175.00', '325.00'),
(27, 'Barako Blend', 22, '120.00', '175.00', '325.00'),
(28, 'Kalinga Robusta ', 33, '120.00', '175.00', '325.00'),
(29, 'Robusta Batangas	', 44, '120.00', '175.00', '325.00'),
(30, 'Premium Barako', 11, '125.00', '185.00', '345.00'),
(31, 'Sagada Arabica', 22, '150.00', '240.00', '450.00'),
(32, 'Italian Espresso', 22, '140.00', '220.00', '420.00'),
(33, 'Espresso Blend', 33, '138.00', '215.00', '405.00'),
(34, 'French Roast', 11, '125.00', '180.00', '340.00'),
(35, 'Arabica House blend', 11, '140.00', '220.00', '410.00'),
(36, 'Benguet Arabica', 22, '155.00', '240.00', '450.00'),
(37, 'Premium Benguet Arabica', 33, '190.00', '325.00', '615.00'),
(38, 'Hazelnut (FC)', 11, '140.00', '225.00', '395.00'),
(39, 'Mocha (FC)  ', 22, '140.00', '225.00', '395.00'),
(40, 'Macadamia (FC)', 33, '140.00', '225.00', '395.00'),
(41, 'Caramel (FC) ', 11, '140.00', '225.00', '395.00'),
(42, 'Vanilla (FC)', 11, '140.00', '225.00', '395.00'),
(43, 'Butterscotch (FC) ', 22, '140.00', '225.00', '395.00'),
(44, 'Irish Cream (FC)', 33, '140.00', '225.00', '395.00'),
(45, 'Hazelnut Vanilla (FC)', 11, '140.00', '225.00', '395.00'),
(46, 'Double Choco (FC)', 22, '140.00', '225.00', '395.00'),
(47, 'Choco Milano (FC)', 33, '140.00', '225.00', '395.00'),
(48, 'Salted Caramel (FC) ', 33, '140.00', '225.00', '395.00'),
(49, 'French Vanilla (FC) ', 11, '140.00', '225.00', '395.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_address` varchar(45) DEFAULT NULL,
  `customer_contact_number` varchar(45) DEFAULT NULL,
  `customer_payment_method` varchar(45) DEFAULT NULL,
  `item_flavor` varchar(45) DEFAULT NULL,
  `item_type_of_roast` varchar(45) DEFAULT NULL,
  `item_type_of_grind` varchar(45) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_grams` varchar(45) DEFAULT NULL,
  `item_price` decimal(18,2) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_number`, `customer_name`, `customer_address`, `customer_contact_number`, `customer_payment_method`, `item_flavor`, `item_type_of_roast`, `item_type_of_grind`, `item_quantity`, `item_grams`, `item_price`, `status`, `created_at`) VALUES
(74, '723424', 'Andrea A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266403739', 'Gcash', 'Macadamia (FC)', 'Medium Dark Roast', 'Medium Coarse Grind', 3, '500G', '675.00', 'Pending', '2023-03-24 21:11:05'),
(75, '723424', 'Andrea A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266403739', 'Gcash', 'Butterscotch (FC) ', 'Light Roast', 'Medium Grind', 2, '250G', '280.00', 'Pending', '2023-03-24 21:11:05'),
(76, '878501', 'Steve Jobs', 'Canada', '09214787621', 'Gcash', 'Irish Cream (FC)', 'Medium Roast', 'Medium Coarse Grind', 2, '1KG', '790.00', 'Pending', '2023-03-24 21:11:58'),
(77, '442544', 'Andrea A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266403739', 'Cash', 'Macadamia (FC)', 'Light Roast', 'Fine Grind', 3, '250G', '420.00', 'Pending', '2023-03-24 21:12:33'),
(78, '957599', 'Angelyn A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Gcash', 'Vanilla (FC)', 'Medium Dark Roast', 'Medium Coarse Grind', 2, '250G', '280.00', 'Pending', '2023-03-24 21:13:03'),
(79, '359937', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266403739', 'Gcash', 'Arabica House blend', 'Light Roast', 'Coarse Grind', 1, '250G', '140.00', 'Pending', '2023-03-24 21:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `typeofgrind`
--

CREATE TABLE `typeofgrind` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofgrind`
--

INSERT INTO `typeofgrind` (`id`, `name`) VALUES
(1, 'Coarse Grind'),
(2, 'Medium Coarse Grind'),
(3, 'Medium Grind'),
(4, 'Medium Fine Grind'),
(5, 'Fine Grind');

-- --------------------------------------------------------

--
-- Table structure for table `typeofroast`
--

CREATE TABLE `typeofroast` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofroast`
--

INSERT INTO `typeofroast` (`id`, `name`) VALUES
(1, 'Light Roast'),
(2, 'Medium Roast'),
(3, 'Medium Dark Roast'),
(4, 'Dark Roast');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `name`) VALUES
(4, '250G'),
(5, '500G'),
(6, '1KG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `date_created`) VALUES
(1, '', 'admin', '$2y$10$U0wLVlXugkiHSZ4mBV5ZF.OkOc0rjyg/iV/Ua50KTmxkE.b1U.9I2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofgrind`
--
ALTER TABLE `typeofgrind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofroast`
--
ALTER TABLE `typeofroast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `typeofgrind`
--
ALTER TABLE `typeofgrind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typeofroast`
--
ALTER TABLE `typeofroast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
