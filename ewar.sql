-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 03:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewar`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `permalink`, `description`) VALUES
(17, 'AC', 'ac', 'Layanan cuci, pemeriksaan, pemasangan & relokasi, penambahan freon, dan perawatan AC split.'),
(18, 'Kulkas', 'kulkas', 'Layanan perbaikan kulkas'),
(19, 'Mesin Cuci', 'mesin-cuci', 'Layanan perbaikan mesin cuci.');

-- --------------------------------------------------------

--
-- Table structure for table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` int(10) NOT NULL,
  `sender_bank` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) NOT NULL,
  `receiver_bank` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmations`
--

INSERT INTO `confirmations` (`id`, `sender_bank`, `bank_account_name`, `receiver_bank`, `amount`, `payment_date`, `status`, `order_id`, `created`, `modified`) VALUES
(1, 'BCA', 'SATRIA APRILIAN', '0', 4000, '2018-11-21', 1, 1, '2018-12-01 16:36:44', NULL),
(2, 'BCA', 'SATRIA APRILIAN', '0', 4000, '2018-11-21', 1, 2, '2018-12-01 16:40:42', NULL),
(3, 'BRI', '1231928389', '0', 0, '1970-02-03', 1, 3, '2018-12-08 08:59:17', NULL),
(4, 'BCA', 'SATRIA APRILIAN', '0', 0, '2018-11-21', 1, 5, '2018-12-10 04:43:24', NULL),
(5, 'BCA', 'SATRIA APRILIAN', '0', 0, '2018-11-21', 1, 6, '2018-12-10 04:44:50', NULL),
(6, 'BCA', 'SATRIA APRILIAN', '0', 0, '2018-11-21', 1, 7, '2018-12-10 06:58:23', NULL),
(7, 'BCA', 'SATRIA APRILIAN', '0', 0, '1970-02-01', 1, 9, '2018-12-10 07:00:30', NULL),
(8, 'ASDASD', 'ASDASD', '0', 0, '1970-02-03', 1, 8, '2019-03-31 17:07:05', NULL),
(9, 'bca', 'panjul', '0', 0, '2019-07-04', 0, 11, '2019-06-13 13:08:40', NULL),
(10, 'bca', 'panjul', '0', 0, '2019-06-13', 0, 12, '2019-06-13 13:25:46', NULL),
(11, 'bca', 'panjul', '0', 0, '2019-06-13', 0, 12, '2019-06-13 13:26:02', NULL),
(12, 'bca', 'panjul', '0', 0, '2019-06-13', 0, 13, '2019-06-13 13:39:05', NULL),
(13, 'bca', 'paha', '2', 0, '1970-02-01', 1, 15, '2019-06-27 04:18:12', NULL),
(14, 'bca', 'panjul', '0', 0, '2019-06-13', 0, 16, '2019-06-27 04:24:00', NULL),
(15, 'bca', 'susi', '0', 0, '1980-12-26', 1, 19, '2019-07-03 04:36:28', NULL),
(16, 'bca', 'tes', '0', 0, '1970-02-01', 1, 20, '2019-07-04 08:23:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` int(11) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `key`, `mime`, `description`, `path`, `created`, `modified`) VALUES
(31, 'slide', 33, 'image/jpeg', 'PROMO DISKON 50% TANGGAL 22-25 Desember', 'public/slides/pageBanner.png', '2013-05-25 13:03:19', '0000-00-00 00:00:00'),
(48, 'product', 12, 'image/png', 'Cuci AC', 'public/products/image_589317e146275.png', '2019-06-13 10:01:35', '0000-00-00 00:00:00'),
(50, 'product', 13, 'image/jpeg', 'Pemeriksaan Masalah AC (Pre-Reparasi)', 'public/products/split-ac-repairing-service.jpg', '2019-06-13 10:05:34', '0000-00-00 00:00:00'),
(51, 'product', 14, 'image/jpeg', 'Pemeriksaan Kulkas Tanpa Tindakan', 'public/products/gb-layananservices.jpg', '2019-06-13 10:20:01', '0000-00-00 00:00:00'),
(52, 'product', 15, 'image/jpeg', 'Servis Penggantian Spare Part Kulkas', 'public/products/refrigerator-repair-rf-appliances-winnipeg.jpg', '2019-06-13 10:28:09', '0000-00-00 00:00:00'),
(56, 'product', 0, 'image/jpeg', 'Service Penggantian Spare Part Mesin Cuci', 'public/products/TUKANG-SERVICE-MESIN-CUCI-GRESIK-MURAH-816x450.jpg', '2019-06-13 10:42:17', '0000-00-00 00:00:00'),
(58, 'slide', 34, 'image/jpeg', '0', 'public/slides/Blog_Header.jpg', '2019-06-13 10:51:07', '0000-00-00 00:00:00'),
(60, 'product', 16, 'image/jpeg', 'TES', 'public/products/IMG_20181204_204359_HHT.jpg', '2019-07-04 08:28:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `order_date` date NOT NULL,
  `payment_deadline` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `total`, `order_date`, `payment_deadline`, `payment_method`, `user_id`, `status`, `created`, `modified`) VALUES
(1, 'R2K5O6F7', 4000, '2018-12-01', '2018-12-08', '1', 1, 1, '2018-12-01 00:00:00', NULL),
(2, '7WY2OYG0', 4000, '2018-12-01', '2018-12-08', '1', 1, 1, '2018-12-01 00:00:00', NULL),
(3, 'NW96JBFW', 1629000, '2018-12-08', '2018-12-15', '1', 1, 1, '2018-12-08 00:00:00', NULL),
(4, 'CVMKOHMR', 6599000, '2018-12-10', '2018-12-17', '1', 3, 0, '2018-12-10 00:00:00', NULL),
(5, 'S481A7SM', 6599000, '2018-12-10', '2018-12-17', '1', 3, 1, '2018-12-10 00:00:00', NULL),
(6, '5ECG9RFR', 11298000, '2018-12-10', '2018-12-17', '1', 1, 1, '2018-12-10 00:00:00', NULL),
(7, '7AR4DG8P', 2985000, '2018-12-10', '2018-12-17', '1', 1, 1, '2018-12-10 00:00:00', NULL),
(8, '9C6GHM6K', 4699000, '2018-12-10', '2018-12-17', '1', 1, 1, '2018-12-10 00:00:00', NULL),
(9, 'ODZDHD2E', 6599000, '2018-12-10', '2018-12-17', '1', 1, 1, '2018-12-10 00:00:00', NULL),
(10, 'Z95NKZEA', 2985000, '2019-03-14', '2019-03-21', '1', 1, 0, '2019-03-14 00:00:00', NULL),
(11, 'OEGHWO2P', 70000, '2019-06-13', '2019-06-20', '1', 3, 4, '2019-06-13 00:00:00', NULL),
(12, 'X03S0EXM', 70000, '2019-06-13', '2019-06-20', '1', 7, 4, '2019-06-13 00:00:00', NULL),
(13, '422T94AP', 70000, '2019-06-13', '2019-06-20', '1', 7, 4, '2019-06-13 00:00:00', NULL),
(14, 'TCDYJSHS', 70000, '2019-06-14', '2019-06-21', '1', 7, 0, '2019-06-14 00:00:00', NULL),
(15, '6KDTZ0VS', 70000, '2019-06-27', '2019-07-04', '1', 8, 1, '2019-06-27 00:00:00', NULL),
(16, 'ASDV389N', 70000, '2019-06-27', '2019-07-04', '1', 8, 4, '2019-06-27 00:00:00', NULL),
(17, 'JRM09TSD', 70000, '2019-06-27', '2019-07-04', '1', 8, 0, '2019-06-27 00:00:00', NULL),
(18, '1P2K1W5C', 70000, '2019-07-03', '2019-07-10', '1', 9, 0, '2019-07-03 00:00:00', NULL),
(19, 'AD750935', 70000, '2019-07-03', '2019-07-10', '1', 9, 1, '2019-07-03 00:00:00', NULL),
(20, 'OP4SSEHD', 70000, '2019-07-04', '2019-07-11', '1', 10, 1, '2019-07-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `net_price` double NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `code`, `name`, `qty`, `price`, `discount_percent`, `net_price`, `order_id`) VALUES
(1, 'ABCR34', 'Product Baru', 1, 4000, 20, 4000, 1),
(2, 'ABCR34', 'Product Baru', 1, 4000, 20, 4000, 2),
(3, '1998', 'Realme C1', 1, 1629000, 0, 1629000, 3),
(4, 'CNN15', 'Canon EOS 1500D Kit EF-S 18-55mm', 1, 6599000, 0, 6599000, 4),
(5, 'CNN15', 'Canon EOS 1500D Kit EF-S 18-55mm', 1, 6599000, 0, 6599000, 5),
(6, 'SNPS4', 'SONY Playstation 4 Slim 500GB', 1, 4699000, 0, 4699000, 6),
(7, 'CNN15', 'Canon EOS 1500D Kit EF-S 18-55mm', 1, 6599000, 0, 6599000, 6),
(8, '1998', 'Realme C1', 1, 2985000, 0, 2985000, 7),
(9, 'SNPS4', 'SONY Playstation 4 Slim 500GB', 1, 4699000, 0, 4699000, 8),
(10, 'CNN15', 'Canon EOS 1500D Kit EF-S 18-55mm', 1, 6599000, 0, 6599000, 9),
(11, '1998', 'Realme C1', 1, 2985000, 0, 2985000, 10),
(12, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 11),
(13, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 12),
(14, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 13),
(15, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 14),
(16, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 15),
(17, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 16),
(18, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 17),
(19, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 18),
(20, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 19),
(21, 'AC001', 'Cuci AC', 1, 70000, 0, 70000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `permalink`, `title`, `body`, `status`, `created`, `modified`) VALUES
(6, 'about', 'About', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>', 1, '2012-05-15 19:53:52', '2012-05-15 19:54:01'),
(7, 'how-to-shop', 'How To shop', '<p><img src=\"http://localhost/ewar/public/front/img/howtoorder.png\" alt=\"\" width=\"1579\" height=\"1112\" /></p>', 1, '2012-05-15 19:54:41', '2018-12-10 04:41:33'),
(8, 'contact', 'Contact', '<p>Main Address :</p>\n<p>&nbsp;</p>', 1, '2012-05-16 22:52:06', '0000-00-00 00:00:00'),
(9, 'service', 'service', '<p>test</p>', 1, '2019-04-14 17:30:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_percent` double NOT NULL,
  `net_price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `permalink`, `price`, `discount_percent`, `net_price`, `description`, `stock`, `status`, `category_id`) VALUES
(12, 'AC001', 'Cuci AC', 'cuci-ac', 70000, 0, 70000, '<p>Pembersihan unit AC split indoor dan outdoor</p>\r\n<p>(Biaya tercantum belum termasuk pengisian/penambahan freon)</p>', 5, 1, 17),
(13, 'AC02', 'Pre Reparasi AC', 'pre-reparasi-ac', 50000, 0, 50000, '<p>Layanan ini mencakup pengecekan pada unit AC Split yang bermasalah., tanpa tindakan perbaikan</p>', 5, 1, 17),
(14, 'CC01', 'Pemeriksaan Kulkas Tanpa Tindakan', 'pemeriksaan-kulkas-tanpa-tindakan', 50000, 0, 50000, '<p>Layanan pemeriksaan dan diagnosa permasalahan pada kulkas.</p>\r\n<p>Biaya pemeriksaan tidak akan dikenakan apabila menggunakan jasa lainnya.</p>', 5, 1, 18),
(15, 'CC02', 'Servis Penggantian Spare Part Kulkas', 'servis-penggantian-spare-part-kulkas', 100000, 0, 100000, '<p>Jasa penggantian spare part pada kulkas yang mengalami kerusakan.</p>\r\n<p>Harga yang tertera belum termasuk harga spare part.</p>', 5, 1, 18),
(16, 'TEST1', 'TES', 'tes', 140000, 0, 140000, '<p>Tes</p>', 20, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `service_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `nambar` varchar(99) NOT NULL,
  `tipe_barang` enum('AC','Mesin_cuci','Kulkas') NOT NULL,
  `nama` varchar(99) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `comment` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `code`, `service_date`, `user_id`, `status`, `nambar`, `tipe_barang`, `nama`, `alamat`, `no_telp`, `comment`) VALUES
(4, NULL, '0000-00-00', 0, 0, 'samsung gt', 'Mesin_cuci', 'panjul', 'pasdjasdjsjd', '1283081208', ''),
(5, NULL, '0000-00-00', 0, 0, 'samsung gt', 'AC', 'asdasd', 'asdasd', '7827828', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `description`) VALUES
(1, 'paginationLimit', '100', 'Global pagination limit'),
(2, 'imageAllowed', 'gif|jpg|png|jpeg', ''),
(3, 'maxImageSize', '200000', ''),
(4, 'Order.DueDate', '7', 'Days payment due'),
(5, 'Bank.Name', 'BCA,Mandiri,BNI', 'Bank name that receive transfer from customer'),
(6, 'Email.Admin', 'admin@admin.com', 'Email Admin');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_en` text NOT NULL,
  `position` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `description`, `title_en`, `description_en`, `position`, `status`) VALUES
(34, 'PROMO', 'Gratis Ongkos Pemasangan Unit Baru si Biru', '', '', 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `login_admin` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `reset_token`, `full_name`, `address`, `phone`, `zip`, `level`, `status`, `last_login`, `created`, `modified`, `login_admin`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'ADMINISTRATOR', 'Jl CONDET', '54674573', 0, 1, 1, '2019-07-04 08:25:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'panjul@gmail.com', '900150983cd24fb0d6963f7d28e17f72', NULL, 'PANJUL', 'Yogyakarta', '356363', 0, 0, 1, '2012-05-16 22:44:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'user@user.com', '6ad14ba9986e3615423dfca256d04e3f', NULL, 'satria aprilian', 'easdasdasd', '9823098129038', 13430, 0, 1, '2019-06-13 13:35:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'mapril@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', NULL, 'muhammad aprilian', 'jl condet asd', '8122139898', 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'panjul@panjul.com', '5d94f87882682ed36cfefe6efdda937c', NULL, 'Panjul Halilintar', 'aksjdnkjnaskdjnasd\r\n', '0192830988', 13530, 0, 1, '2019-04-27 07:33:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'satriaaprilian18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'panjul halilintar', '123123dsasdsd', '0192830988', 13530, 0, 1, '2019-04-14 19:10:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'asd@asd.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'panjul halilintar', 'kmjasbmbjdsambadsmbadsmbadmhad', '23123213', 13530, 0, 1, '2019-06-14 13:41:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'paha@gmail.com', 'ac3a620cddea3458b3db29cebedc76f1', NULL, 'PAHA', 'aksdjbkjbasdkjbasd', '0812329479', 13530, 0, 1, '2019-06-27 04:19:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'susi@gmail.com', '536931d80decb18c33db9612bdd004d4', NULL, 'susi', 'jalana', '1111111111111', 13530, 0, 1, '2019-07-03 04:37:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'tes@tes.com', '28b662d883b6d76fd96e4ddc5e9ba780', NULL, 'tes', 'asdjahsdjkhaskdj', '919911919', 13530, 0, 1, '2019-07-04 08:28:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
