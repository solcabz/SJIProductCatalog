-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 09:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addinfo`
--

CREATE TABLE `addinfo` (
  `id` int(50) NOT NULL,
  `account_id` int(255) NOT NULL,
  `account_user` varchar(255) NOT NULL,
  `EngDesc` varchar(255) NOT NULL,
  `infoSize` varchar(50) NOT NULL,
  `Stockcode` varchar(50) NOT NULL,
  `productStatus` varchar(50) NOT NULL,
  `imageProduct` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addinfo`
--

INSERT INTO `addinfo` (`id`, `account_id`, `account_user`, `EngDesc`, `infoSize`, `Stockcode`, `productStatus`, `imageProduct`) VALUES
(18, 0, 'admin', '8', '24', 'IAJNBYWWS92X0002', 'Available', 0x49414a4e4259575753393258303030322e706e67),
(20, 0, '', '7\" Almandine Piyao Bracelet', '26', 'ZADCBYWWS9021742', '', 0x5a4144434259575753393032313734322e6a706567),
(34, 0, '', 'hellos', '23', 'ZADCBYWWS9AH0125', '', 0x5a4144434259575753394148303132352e6a706567),
(36, 0, 'admin', 'hello', '22', 'IADCBYWWS9020106', '', 0x494144434259575753393032303130362e706e67),
(40, 0, '', 'hellonew', '23', 'IADCBYWWS9020105', '', 0x494144434259575753393032303130352e6a706567),
(44, 0, '', 'SDASD', 'ASDAD', 'IADCBYWWS9460001', '', 0x494144434259575753393436303030312e706e67),
(52, 1, 'admin', 'samp', '11', 'IAFABYZGS9AH0000', '', 0x4941464142595a4753394148303030302e706e67);

--
-- Triggers `addinfo`
--
DELIMITER $$
CREATE TRIGGER `insertAddinfoLog` AFTER INSERT ON `addinfo` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.account_id, NEW.account_user, 'Added a Product', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateAddinfoLog` AFTER UPDATE ON `addinfo` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.account_id, NEW.account_user, 'Added a Product', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `account_id` int(255) NOT NULL,
  `users` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `cdate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `account_id`, `users`, `activity`, `cdate`) VALUES
(1, 8, 'admin2', 'Updated User Info', '2022-09-21 16:10:10.000000'),
(2, 10, 'sample', 'Added User Info', '2022-09-21 16:16:33.000000'),
(3, 11, 'sample', 'Added User Info', '2022-09-21 16:16:35.000000'),
(4, 0, 'admin', 'Added a Product', '2022-09-22 10:39:46.000000'),
(5, 1, 'admin', 'Added a Product', '2022-09-22 13:34:16.000000'),
(6, 1, 'admin', 'Added a Product', '2022-09-22 13:41:27.000000'),
(7, 1, 'admin', 'Added a Product', '2022-09-22 13:42:25.000000'),
(8, 1, 'admin', 'Added a Product', '2022-09-22 13:46:34.000000'),
(9, 1, 'admin', 'Added a Product', '2022-09-22 13:52:49.000000'),
(10, 0, 'admin', 'Added a Product', '2022-10-06 16:47:33.000000'),
(11, 0, 'admin', 'Added a Product', '2022-10-06 16:47:59.000000'),
(12, 4, 'soluser', 'Updated User Info', '2022-10-07 11:52:01.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(100) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `ItemClassification` varchar(50) NOT NULL,
  `JewelryType` varchar(50) NOT NULL,
  `GoldType` varchar(50) NOT NULL,
  `JewelryDesign` varchar(50) NOT NULL,
  `Stockcode` varchar(50) NOT NULL,
  `RetailPrice` varchar(50) NOT NULL,
  `Wght` varchar(50) NOT NULL,
  `Karat` varchar(50) NOT NULL,
  `Lngth` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Outlet` varchar(50) NOT NULL,
  `JewelryDescription` varchar(50) NOT NULL,
  `Carats` varchar(50) NOT NULL,
  `ColorType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Supplier`, `ItemClassification`, `JewelryType`, `GoldType`, `JewelryDesign`, `Stockcode`, `RetailPrice`, `Wght`, `Karat`, `Lngth`, `Age`, `Outlet`, `JewelryDescription`, `Carats`, `ColorType`) VALUES
(1, '﻿DCKC', 'GOLD', 'BRACELET', 'SAUDI', 'GUCCI CHN', 'IADCBYWWS9460001', '40,650', '4.81', '18K', '8', '177', 'AA', 'BLT YG S18K GUCCI CHN', '', 'YELLOW GOLD'),
(2, 'DCKC', 'GOLD', 'BRACELET', 'SAUDI', 'CURB LINK', 'ZADCBYWWS9021742', '90,250', '10.68', '18K', '8', '71', 'AA', 'BLT YG SAU 18K CURB LINK', '', 'YELLOW GOLD'),
(3, 'DCKC', 'GOLD', 'BRACELET', 'SAUDI', 'CURB LINK', 'IADCBYWWS9020105', '58,310', '6.9', '18K', '8', '182', 'AA', 'BLT YG SAU 18K CURB LINK', '', 'YELLOW GOLD'),
(4, 'DCKC', 'GOLD', 'BRACELET', 'SAUDI', 'CURB LINK', 'IADCBYWWS9020106', '54,170', '6.41', '18K', '7.5', '182', 'AA', 'BLT YG SAU 18K CURB LINK', '', 'YELLOW GOLD'),
(5, 'DCKC', 'GOLD', 'BRACELET', 'SAUDI', 'ALT F BDS', 'ZADCBYWWS9AH0125', '4,650', '0.55', '18K', '7.5', '236', 'AA', 'BLT YG SAU 18K ALT FANT BDS', '', 'YELLOW GOLD'),
(6, '3J', 'GOLD', 'BRACELET', 'CHINESE', 'ROL C BEAR', 'ZAJGBYWWC9JU0030', '10,990', '1.3', '18K', '7', '127', 'AA', 'BLT YG CHI 18K ROLLO C BEAR', '', 'YELLOW GOLD'),
(7, 'FA', 'GOLD', 'BRACELET', 'SAUDI', 'ALT F BDS', 'IAFABYZGS9AH0000', '10,570', '1.25', '18K', '6', '386', 'AA', 'BLT YG CUZ WHT S18K ALT F BDS', 'DC CZ', 'YELLOW GOLD'),
(8, 'JN', 'GOLD', 'BRACELET', 'SAUDI', 'FANT CTR', 'IAJNBYWWS92X0001', '4,310', '0.51', '18K', '6.5', '208', 'AA', 'BLT YG SAU 18K FANT C RND DC', 'RND DC', 'YELLOW GOLD'),
(9, 'JN', 'GOLD', 'BRACELET', 'SAUDI', 'FANT CTR', 'IAJNBYWWS92X0002', '6,930', '0.82', '18K', '6.5', '208', 'AA', 'BLT YG S18K FANTC BRRL BDS DC', 'BARREL BDS DC/PLN', 'YELLOW GOLD'),
(10, 'JN', 'GOLD', 'BRACELET', 'CHINESE', 'FNT W/CHMS', 'IAJNBYWWC99X0001', '40,650', '4.81', '18K', '7', '364', 'AA', 'BLT YG C18K FNT W/6 BALL CHMS', 'W/6 BALL CHMS', 'YELLOW GOLD'),
(11, 'LO', 'GOLD', 'BRACELET', 'SAUDI', 'BDS LNK', 'ZALOBYWWS9IN0000', '100,050', '11.84', '18K', '7.5', '72', 'AA', 'BLT YG SAU 18K BDS LNK', '', 'YELLOW GOLD'),
(12, 'MH', 'COLL', 'BRACELET', 'SAUDI', 'FNT C FLW', 'IAMHB3WWS90A0001', '23,240', '2.75', '18K', '7.5', '1168', 'AA', 'BLT 3C S18K FNT C FLWR BDS DC', 'BDS DC 1CHRM', 'TRI-COLOR'),
(13, 'MH', 'GOLD', 'BRACELET', 'SAUDI', 'ALT F BDS', 'IAMHB3ZGS9AH0002', '30,930', '3.66', '18K', '7.5', '1043', 'AA', 'BLT 3C CZ S18K ALTF BDS 5CHMS', '2 HRT,3 BTRFLY', 'TRI-COLOR'),
(14, 'MH', 'GOLD', 'BRACELET', 'SAUDI', 'CS ID', 'IAMHBYWWS92R0000', '20,450', '2.42', '18K', '5.5', '377', 'AA', 'BLT YG S18K CS ID ROLLO C HRT', 'ROLLO C HRT', 'YELLOW GOLD'),
(15, 'SGM', 'REMG', 'BRACELET', 'CHINESE', 'CURB LINK', 'IASMBYWWC9020000', '58,560', '6.93', '18K', '8', '1581', 'AA', 'BLT YG CHI 18K CURB LINK', '', 'YELLOW GOLD'),
(16, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'STUD HRT', 'ZADCEYZGS9EI0224', '20,960', '2.48', '18K', '0', '194', 'AA', 'EAR YG CZ S18K STD HRT/CRWN WT', 'CROWN COMCZ WTOP', 'YELLOW GOLD'),
(17, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'STUD HRT', 'ZADCEYZGS9EI0219', '17,160', '2.03', '18K', '0', '127', 'AA', 'EAR YG CZ S18K STUD HRTLOVE', 'LOVE COM CZ', 'YELLOW GOLD'),
(18, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PICA RECT', 'IADCE3WWS9CY0015', '14,620', '1.73', '18K', '0', '411', 'AA', 'EAR 3C S18K PICARECT DC/STN', 'DC/STN', 'TRI-COLOR'),
(19, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PICA RECT', 'ZADCE3WWS9CY0336', '14,960', '1.77', '18K', '0', '411', 'AA', 'EAR 3C S18K PICARECT DC/STN', 'DC/STN', 'TRI-COLOR'),
(20, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PDNG HRT', 'ZADCEYWWS95G0059', '13,020', '1.54', '18K', '0', '127', 'AA', 'EAR YG S18K PDNG HRT KEY DC/PL', 'KEY DC/PLN', 'YELLOW GOLD'),
(21, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PICA RECT', 'IADCEYWWS9CY0023', '15,380', '1.82', '18K', '0', '414', 'AA', 'EAR YG S18K PICA RECT STN', 'STN', 'YELLOW GOLD'),
(22, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PICA RECT', 'IADCEYWWS9CY0024', '13,520', '1.6', '18K', '0', '230', 'AA', 'EAR YGS18K PCA RCT FLWR DC/STN', 'FLWR DC/STN', 'YELLOW GOLD'),
(23, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PICA RECT', 'ZADCEYWWS9CY0951', '14,450', '1.71', '18K', '0', '414', 'AA', 'EAR YG S18K PICA RECT DC/SATIN', 'DC/SATIN', 'YELLOW GOLD'),
(24, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'HDNG HRT', 'ZADCE2WWS95I0038', '16,140', '1.91', '18K', '0', '43', 'AA', 'EAR 2T S18K HDNG HRT BUBBLE', 'BUBBLE DC/PLAIN', 'TWO-TONE'),
(25, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'HOOP HNG', 'ZADCE3WWS9630030', '22,140', '2.62', '18K', '0', '1075', 'AA', 'EAR 3C S18K HOOP HNGED DC PLN', 'DC/PLN', 'TRI-COLOR'),
(26, 'DCKC', 'GOLD', 'EARRINGS', 'SAUDI', 'PDANGL', 'IADCEYWWS9690003', '14,960', '1.77', '18K', '0', '475', 'AA', 'EAR YG S18K PDNGLNG TREE LIFE', 'TREE OF LIFE', 'YELLOW GOLD'),
(27, 'FA', 'GOLD', 'EARRINGS', 'SAUDI', 'PDANGL', 'IAFAEYZGS9690000', '26,120', '3.09', '18K', '0', '350', 'AA', 'EAR YG CZ WHT S18K PDANG PCLIP', 'PCLIP CZ', 'YELLOW GOLD'),
(28, 'FA', 'GOLD', 'EARRINGS', 'SAUDI', 'KDNY HRT', 'IAFAEYWWS1SC0002', '18,470', '2.08', '21K', '0', '365', 'AA', 'EAR YG S21K KDNY HRT DC', 'DC', 'YELLOW GOLD'),
(29, 'FA', 'GOLD', 'EARRINGS', 'SAUDI', 'KDNY HRT', 'IAFAEYWWS1SC0003', '21,230', '2.39', '21K', '0', '352', 'AA', 'EAR YG SAU 21K KDNY HRT DC', 'DC', 'YELLOW GOLD'),
(30, 'DCKC', 'OAG3', 'EARRINGS', 'ITALIAN', 'STUD CHANL', 'ZADCE2WWI5FM0002', '33,300', '3.94', '14K', '0', '3615', 'AA', 'EAR 2T ITA STUD CHANEL HEART', 'HEART', 'TWO-TONE'),
(31, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'THDRS LV', 'IAJNEYEAS96I0000', '10,570', '1.25', '18K', '0', '167', 'AA', 'EAR YG ENA RED S18K THDRS LV', 'FLOWER R.ENAMEL', 'YELLOW GOLD'),
(32, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'STUD HRT', 'ZAJNE3WWS9EI0161', '16,570', '1.96', '18K', '0', '28', 'AA', 'EAR 3C S18K STUD HRT PFFD DC', 'PUFFED DC.STN/PLN', 'TRI-COLOR'),
(33, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'RND TBE HP', 'IAJNEWWWS95P0001', '25,100', '2.97', '18K', '0', '1230', 'AA', 'EAR WG S18K HP RND TBE PLN', 'PLN', 'WHITE GOLD'),
(34, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'STUD FLWR', 'ZAJNEYWWS9EC0250', '14,790', '1.75', '18K', '0', '664', 'AA', 'EARYG S18K STD FLWR/HRT DC/PLN', 'DC/PLN', 'YELLOW GOLD'),
(35, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'PDNG BDS', 'IAJNEYWWS9DY0000', '12,260', '1.45', '18K', '0', '312', 'AA', 'EAR YGS18K PDNG BD SNKE CHN DC', 'SNAKE CHN DC/PLN', 'YELLOW GOLD'),
(36, 'JN', 'GOLD', 'EARRINGS', 'SAUDI', 'PDNG CHNL', 'IAJNEYWWS9DL0000', '12,000', '1.42', '18K', '0', '194', 'AA', 'EAR YG S18K PDNG CHANEL CRCLE', 'CRCLE BDS DC/PLN', 'YELLOW GOLD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `FirstName`, `LastName`, `Email`, `password`, `status`, `role`) VALUES
(1, 'admin', 'data', '', '', 'c93ccd78b2076528346216b3b2f701e6', 1, 'admin'),
(4, 'soluser', 'sol', 'cabz', 'solocabreza@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'user'),
(7, 'user2', 'data', 'struct', 'solocabreza@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user'),
(8, 'admin2', 'admin', 'dataAdmin', 'solocabreza@gmail.com', '45f2603610af569b6155c45067268c6b', 0, 'admin'),
(9, 'sample', 'samp', 'datatestt', 'solocabreza@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'user'),
(10, 'sample', 'sample', '101', 'sapmle@test.com', 'c0390cd2726ba74cf81081391f94656a', 0, 'user'),
(11, 'sample', 'sample', '101', 'sapmle@test.com', 'c0390cd2726ba74cf81081391f94656a', 0, 'user');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.id, NEW.username, 'Added User Info', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLog` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.id, NEW.username, "Updated User Info", NOW())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addinfo`
--
ALTER TABLE `addinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addinfo`
--
ALTER TABLE `addinfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
