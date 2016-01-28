-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2016 at 11:17 PM
-- Server version: 5.6.26
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gubotdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) NOT NULL DEFAULT 'No',
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`, `isAdmin`) VALUES
(10, 'Rollie', '$2y$10$xPyQE.xDPBuXFPgfxcQjZOIR9gdGV7Fmwo5TBFOMa5zOUsWJYKkKG', 'steventrowland@gmail.com', 'Yes', NULL, 'No', 0),
(11, 'RollieRowland', '$2y$10$Wtv7DSh7nQmWkVLjFkHKReX54.Tv/5aL0wzvFWgbned.mJJ8j0jA2', 'steventylerrowland@gmail.com', 'Yes', NULL, 'No', 0),
(12, 'root', '$2y$10$VC8zdd9fjRfO8UVcuG5/4eMLFiBADILGDhcOOiaSzRcrXba5jbhAe', 'contact@gubotdev.com', 'Yes', NULL, 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `shortDesc` text NOT NULL,
  `price` float NOT NULL,
  `pictureName` text NOT NULL,
  `timeRequired` int(11) NOT NULL,
  `polyMapCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `shortDesc`, `price`, `pictureName`, `timeRequired`, `polyMapCode`) VALUES
(1, 'Khalid V2', 'Maecenas et leo et ligula vehicula pulvinar eu sed magna. Nunc imperdiet iaculis erat, ac cursus lacus consequat id. Vestibulum vestibulum tellus eget sem aliquet, sed consequat lectus efficitur. Sed interdum sapien sit amet vehicula sollicitudin. Proin nec libero quis lorem sodales cursus eu at elit. Nam vel enim ligula. Cras vel sagittis nisl. In eleifend, metus id porta aliquam, dolor tellus bibendum magna, sit amet semper nulla sem volutpat mauris. Cras aliquam, tortor eu condimentum accumsan, mauris lectus vestibulum leo, eget bibendum ipsum sem quis enim. Fusce fringilla porttitor urna nec venenatis. Duis dapibus dolor nisi, et luctus leo pharetra in. Etiam semper imperdiet urna, sit amet euismod ligula facilisis quis. Nullam pulvinar finibus eros vitae luctus. Integer massa felis, aliquam vulputate mi vel, hendrerit efficitur felis. Nullam ut enim a risus hendrerit tristique accumsan eu ipsum. Aliquam erat volutpat.\n\nPellentesque rutrum sapien a sem dignissim, eu rutrum enim varius. Ut et dui congue, eleifend augue a, bibendum ante. Ut libero nisi, faucibus ut mi fringilla, tempor luctus augue. Praesent eu tempus orci. Mauris vel risus vel ante sagittis ultrices. Maecenas quis tristique quam. Donec sit amet tortor maximus, varius tortor a, commodo eros. Mauris imperdiet porttitor sem sed finibus.', 'Pellentesque rutrum sapien a sem dignissim, eu rutrum enim varius. Ut et dui congue, eleifend augue a, bibendum ante. ', 3000, 'gu1.jpg', 26, '<img id="khalidImg" src="images/spin0000.png" border="0" usemap="#khalidMap" alt="" /> 									<map name="khalidMap" id="khalidImg"> 										<area shape="rect" coords="1998,998,2000,1000" alt="Image Map" style="outline:none;" title="Image Map" href="" /> 										<area  alt="" title="" href="" shape="poly" coords="991,89,960,112,979,124,993,111" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="949,133,910,163,915,145" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1356,166,1254,182,1309,169" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1382,157,1476,140,1413,172" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1161,303,1134,349,1023,374,898,358,846,314,881,271,980,252,1090,260" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1521,288,1615,294,1679,304" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1719,307,1891,323,1759,333" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1552,466,1697,552,1647,509" style="outline:none;" target="_self"    /> 										<area  alt="" title="" href="" shape="poly" coords="1738,562,1920,667,1752,613,1737,584" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1163,613,1120,706,1136,740,1166,723,1175,658" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1114,762,1039,926,1030,862,1055,809" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="618,562,401,611,405,625,462,635,567,594" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="361,631,115,691,113,685,195,659,272,642" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="276.00000762939453,357.0000032697405,427.00000762939453,377.0000032697405,298.00000762939453,388.0000032697405,273.00000762939453,369.0000032697405,268.00000762939453,364.0000032697405" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="240.00000762939453,358.0000032697405,98.00000762939453,338.0000032697405,114.00000762939453,337.0000032697405,166.00000762939453,340.0000032697405,206.00000762939453,347.0000032697405" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="553.0000076293945,186.00000326974052,594.0000076293945,228.00000326974052,590.0000076293945,230.00000326974052,541.0000076293945,212.00000326974052,542.0000076293945,191.00000326974052" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="533.0000076293945,177.00000326974052,500.00000762939453,146.00000326974052,504.00000762939453,144.00000326974052,536.0000076293945,163.00000326974052" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="252,441,252,433,284,425,288,421,844,397,861,417" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="921,455,379,734,369,730,369,718,380,718,413,700,416,688,892,446,899,451" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1028,464,1021,466,1010,465,1078.000018310547,771.0000091552735,1082.000018310547,764.0000091552735,1089.000018310547,757.0000091552735,1087.000018310547,748.0000091552735,1091.000018310547,736.0000091552735" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1102.0000061035157,447.00000915527346,1721.0000061035157,663.0000091552735,1727.0000061035157,655.0000091552735,1727.0000061035157,647.0000091552735,1697.0000061035157,644.0000091552735,1684.0000061035157,629.0000091552735,1683.0000061035157,623.0000091552735,1135.0000061035157,436.00000915527346,1131.0000061035157,440.00000915527346" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1150.0000061035157,404.00000915527346,1710.0000061035157,384.00000915527346,1710.0000061035157,372.00000915527346,1692.0000061035157,373.00000915527346,1682.0000061035157,372.00000915527346,1677.0000061035157,367.00000915527346,1161.0000061035157,385.00000915527346,1160.0000061035157,391.00000915527346" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="1377.0000061035157,223,1150.0000061035157,337,1152.0000061035157,321,1156.0000061035157,315,1353.0000061035157,215,1364.0000061035157,217,1374.0000061035157,216" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="948.0000061035156,182,948.0000061035156,177,956.0000061035156,176,976.0000061035156,252,964.0000061035156,253" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="886.0000061035156,352,872.0000061035156,368,861.0000061035156,361,861.0000061035156,346" style="outline:none;" target="_self"     /> 										<area  alt="" title="" href="" shape="poly" coords="854.0000061035156,359,538.0000061035156,249,539.0000061035156,244,551.0000061035156,244,560.0000061035156,240,853.0000061035156,340" style="outline:none;" target="_self"     /> 									</map>'),
(3, 'test', 'test', 'tS', 521.36, 'gu2.jpg', 22, '');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `items` text NOT NULL,
  `orderDate` date NOT NULL,
  `amount` float NOT NULL,
  `address` text NOT NULL,
  `estimateDate` date NOT NULL,
  `isCompleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `username`, `email`, `items`, `orderDate`, `amount`, `address`, `estimateDate`, `isCompleted`) VALUES
(1, 'RollieRowland', 'steventrowland@gmail.com', 't,a,s,', '2016-01-28', 1000.01, 'null', '2016-01-31', 0),
(2, 'RollieRowland', 'steventrowland@gmail.com', 'b,', '2016-01-14', 999.99, 'null', '2016-01-31', 0),
(3, 'RollieRowland', '', 'c,', '2016-01-01', 5.03, 'null', '2016-01-31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
