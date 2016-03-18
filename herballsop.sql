-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2016 at 05:38 PM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herballsop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id_product` int(11) NOT NULL,
  `nombre_product` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `price` float NOT NULL,
  `img` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `index_descript` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nombre_product`, `price`, `img`, `index_descript`) VALUES
(1, 'Borojo X90 Softgels', 14.6, 'img_prod8.jpg', 'Is used as an excellent source of energy to increase the physical and mental performance. *'),
(3, 'Bioactrinc X 60g', 21.8, 'img_prod9.jpg', 'Extract that proven effects as antiseptics, antibacterial and healing.'),
(4, 'Male Extreme Mix X 30 Cap', 18, 'img_prod1.jpg', 'Width Ingredients to increase male performance and many minerals that help promote male activities*'),
(5, 'Colon Cleansing X 30 Caps', 17.5, 'img_prod3.jpg', 'Help detox the whole body<br>Promote healthy bowel movements<br>Help relieve occasional constipation'),
(6, 'Acai X 90 Softgels', 12.5, 'img_prod4.jpg', 'Flush out the accumulated toxins inside our body and also enhance metabolism and burns more calories resulting to weight loss* '),
(7, 'Diabet Off X 30 Capsules', 16.7, 'img_prod6.jpg', 'Tablet is a natural solution for diabetes. With more than 25 years of success<br>DiabetOff stimulates the cells of the Islets of Langerhans, in order to get from the pancreas a normal and natural production of insulin*'),
(8, 'Prostacoffee X 400g', 19.5, 'img_prod7.jpg', 'Extract that proven effects as antiseptics, antibacterial and healing*'),
(9, 'Redufem X60 Capsules', 20.52, 'img_prod10.png', 'As an addition to the normal diet, Redufem visibly reduces fluctuations abdominal size*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
