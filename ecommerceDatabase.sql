-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 09:37 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `apriori_results`
--

CREATE TABLE `apriori_results` (
  `Id` int(50) NOT NULL,
  `Support` varchar(100) NOT NULL,
  `Item1` varchar(100) NOT NULL,
  `Item2` varchar(100) NOT NULL,
  `Confidence` varchar(100) NOT NULL,
  `Lift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `customers_password`
--

CREATE TABLE `customers_password` (
  `Id` int(100) NOT NULL,
  `User_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- --------------------------------------------------------

--
-- Table structure for table `customers_registration`
--

CREATE TABLE `customers_registration` (
  `Id` int(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `Id` int(50) NOT NULL,
  `Order_Id` int(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- --------------------------------------------------------

--
-- Table structure for table `customer_results`
--

CREATE TABLE `customer_results` (
  `Id` int(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Products` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `Id` int(50) NOT NULL,
  `Order_Id` int(50) NOT NULL,
  `Product_Id` int(50) NOT NULL,
  `Quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(50) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Price`) VALUES
(1, 'Nokia 6.1 plus', 15000),
(2, 'Nokia 3.1 plus', 10000),
(3, 'Nokia 5.1 plus', 12000),
(4, 'Nokia 8.1', 18000),
(6, 'Nokia 7', 25000),
(7, 'Iphone XR', 50000),
(8, 'Iphone X', 60000),
(9, 'Iphone 11', 70000),
(10, 'Iphone 7', 30000),
(11, 'Iphone 6', 25000),
(12, 'Samsung Galaxy M10', 10000),
(13, 'Samsung Galaxy M20', 12000),
(14, 'Samsung Galaxy A50', 15000),
(15, 'Samsung Galaxy A70', 20000),
(16, 'Samsung Galaxy Note 10', 30000),
(17, 'Men cobalt checks shirt 39', 1000),
(18, 'Men cobalt checks shirt 40', 1000),
(19, 'Men cobalt checks shirt 42', 1000),
(20, 'Men cobalt checks shirt 44', 1000),
(21, 'Men brown formal shirt 39', 1200),
(22, 'Men brown formal shirt 40', 1200),
(23, 'Men brown formal shirt 42', 1200),
(24, 'Men brown formal shirt 44', 1200),
(25, 'Men white checks shirt 39', 1500),
(26, 'Men white checks shirt 40', 1500),
(27, 'Men white checks shirt 42', 1500),
(28, 'Men white checks shirt 44', 1500),
(29, 'Men skyblue casual shirt 39', 500),
(30, 'Men skyblue casual shirt 40', 500),
(31, 'Men skyblue casual shirt 42', 500),
(32, 'Men skyblue casual shirt 44', 500),
(33, 'Men blue plain shirt 39', 800),
(34, 'Men blue plain shirt 40', 800),
(35, 'Men blue plain shirt 42', 800),
(36, 'Men blue plain shirt 44', 800),
(38, 'women printed kurtha small', 1000),
(39, 'women printed kurtha medium', 1000),
(40, 'women printed kurtha large', 1000),
(41, 'women printed kurtha xlarge', 1000),
(42, 'women printed kurtha xxlarge', 1000),
(43, 'women a line kurtha small', 1200),
(44, 'women a line kurtha medium', 1200),
(45, 'women a line kurtha large', 1200),
(46, 'women a line kurtha xlarge', 1200),
(47, 'women a line kurtha xxlarge', 1200),
(48, 'women straight digital print kurtha small', 1200),
(49, 'women straight digital print kurtha medium', 1200),
(50, 'women straight digital print kurtha large', 1200),
(51, 'women straight digital print kurtha xlarge', 1200),
(52, 'women straight digital print kurtha xxlarge', 1200),
(53, 'Women gold printed sleeveless kurta small', 500),
(54, 'Women gold printed sleeveless kurta medium', 500),
(55, 'Women gold printed sleeveless kurta large', 500),
(56, 'Women gold printed sleeveless kurta xlarge', 500),
(57, 'Women gold printed sleeveless kurta xxlarge', 500),
(58, 'women rayon kurthi small', 500),
(59, 'women rayon kurthi medium', 500),
(60, 'women rayon kurthi large', 500),
(61, 'women rayon kurthi xlarge', 500),
(62, 'women rayon kurthi xxlarge', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apriori_results`
--
ALTER TABLE `apriori_results`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customers_password`
--
ALTER TABLE `customers_password`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customers_registration`
--
ALTER TABLE `customers_registration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_results`
--
ALTER TABLE `customer_results`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apriori_results`
--
ALTER TABLE `apriori_results`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers_password`
--
ALTER TABLE `customers_password`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers_registration`
--
ALTER TABLE `customers_registration`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_results`
--
ALTER TABLE `customer_results`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
