-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 12:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computerstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(10) NOT NULL,
  `BName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BName`) VALUES
(1, 'Vivo'),
(2, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `CName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CName`) VALUES
(1, 'Notebook'),
(2, 'Smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `CFirstname` varchar(20) NOT NULL,
  `CLastname` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `TEL` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CFirstname`, `CLastname`, `Address`, `TEL`) VALUES
(190001, 'Nantipat', 'Suwanvong', 'Krabi', '096-873-8721');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `OrderID` int(10) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TotalPrice` int(11) NOT NULL,
  `CustomerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`OrderID`, `OrderDate`, `TotalPrice`, `CustomerID`) VALUES
(2, '2019-04-19 22:29:28', 5999, 190001);

-- --------------------------------------------------------

--
-- Table structure for table `orderingdetail`
--

CREATE TABLE `orderingdetail` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderingdetail`
--

INSERT INTO `orderingdetail` (`OrderID`, `ProductID`, `Unit`) VALUES
(2, 1001303, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `PName` varchar(100) NOT NULL,
  `PDetail` varchar(500) NOT NULL,
  `BrandID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `PName`, `PDetail`, `BrandID`, `CategoryID`, `Price`) VALUES
(1001302, 'INSPIRON 5480-W56695263TH (SILVER)', 'CPU : INTEL CORE I5-8250U \r\nRAM : 8 GB DDR4 (FSB 2133MHz)\r\nHDD : 256 GB SSD\r\nDISPLAY : 15.6\" FHD AG\r\nVGA : AMD RADEON 530 4 GB GDDR5\r\nOS : UBUNTU', 2, 1, 30900),
(1001303, 'Y91 (Black)', 'Octa-Core 2.0GHz / 3GB / 64GB / 6.22\" / F 8.0MP / B 13.0MP + 2.0MP / Android 8.1 / 4,030 mAh / 2SIM', 1, 2, 5999);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockID` int(10) NOT NULL,
  `Unit` int(11) DEFAULT NULL,
  `ProductID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockID`, `Unit`, `ProductID`) VALUES
(1000907, 10, 1001302),
(1000908, 20, 1001303);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `orderingdetail`
--
ALTER TABLE `orderingdetail`
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190002;

--
-- AUTO_INCREMENT for table `ordering`
--
ALTER TABLE `ordering`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001304;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000909;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordering`
--
ALTER TABLE `ordering`
  ADD CONSTRAINT `ordering_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`customerid`);

--
-- Constraints for table `orderingdetail`
--
ALTER TABLE `orderingdetail`
  ADD CONSTRAINT `orderingdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `orderingdetail_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `ordering` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
