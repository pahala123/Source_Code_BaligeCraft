-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 31, 2022 at 03:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'Pahala Picauly Sagala', 'pahala.picauly12@gmail.com', '$2y$10$DK.mo9IztJML1K49uStTj.3C812Gh5aOusIMpyxaRbYn/J1bmj2R6', '');

-- --------------------------------------------------------

--
-- Table structure for table `berat_barang`
--

CREATE TABLE `berat_barang` (
  `id_berat` int(11) NOT NULL,
  `berat_barang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berat_barang`
--

INSERT INTO `berat_barang` (`id_berat`, `berat_barang`) VALUES
(1, '1 KG'),
(2, '2 KG');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pengiriman`
--

CREATE TABLE `biaya_pengiriman` (
  `id_biaya` int(11) NOT NULL,
  `id_kota_tujuan` int(11) DEFAULT NULL,
  `totalberat` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_pengiriman`
--

INSERT INTO `biaya_pengiriman` (`id_biaya`, `id_kota_tujuan`, `totalberat`, `biaya`) VALUES
(1, 1, 1, 20000),
(2, 2, 1, 27000),
(3, 3, 1, 28000),
(4, 4, 1, 26000),
(5, 5, 1, 27000),
(6, 6, 1, 38000),
(7, 7, 1, 38000),
(8, 8, 1, 25000),
(9, 9, 1, 47000),
(10, 10, 1, 48000),
(11, 1, 2, 24000),
(12, 2, 2, 31000),
(13, 3, 2, 32000),
(14, 4, 2, 30000),
(15, 5, 2, 32000),
(16, 6, 2, 42000),
(17, 7, 2, 42000),
(18, 8, 2, 29000),
(19, 9, 2, 51000),
(20, 10, 2, 52000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori_nama` varchar(150) NOT NULL,
  `kategori_deskripsi` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_nama`, `kategori_deskripsi`, `status`) VALUES
(1, 'Aksesoris', '-', 1),
(2, 'Busana', '-', 1),
(3, 'Ulos', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `nama_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'Balige'),
(2, 1, 'Deli Serdang'),
(3, 1, 'Medan'),
(4, 1, 'Pematang Siantar'),
(5, 1, 'Sibolga'),
(6, 2, 'Agam'),
(7, 2, 'Bukittinggi'),
(8, 2, 'Padang'),
(9, 2, 'Pasaman'),
(10, 2, 'Solok');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `nama_model` varchar(150) NOT NULL,
  `harga_model` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `nama_model`, `harga_model`, `status`) VALUES
(1, 'Polos', 10000, 1),
(2, 'Lampion', 25000, 1),
(3, 'Rumbai Panjang', 20000, 1),
(4, 'Bordir', 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resi` varchar(16) NOT NULL,
  `gambar_resi` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `province` int(11) NOT NULL,
  `regency` int(11) NOT NULL,
  `courier` varchar(25) NOT NULL,
  `courier_service` varchar(25) NOT NULL,
  `order_number` varchar(16) NOT NULL,
  `order_status` varchar(55) NOT NULL,
  `pesanan_status` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `ongkir` varchar(24) NOT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `total_items` int(10) DEFAULT NULL,
  `payment_method` int(11) DEFAULT 1,
  `delivery_data` text DEFAULT NULL,
  `link_pay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `resi`, `gambar_resi`, `nama_produk`, `province`, `regency`, `courier`, `courier_service`, `order_number`, `order_status`, `pesanan_status`, `order_date`, `ongkir`, `total_price`, `total_items`, `payment_method`, `delivery_data`, `link_pay`) VALUES
(119, 0, '1234567891011', '', '', 0, 0, '', '', 'ZVN1182210756', '1', 0, '2022-08-11 21:16:54', '', '41000.00', 1, 1, NULL, ''),
(120, 0, '1234567891011', '', '', 0, 0, '', '', 'PNC1182210935', '0', 1, '2022-08-11 21:20:24', '', '41000.00', 1, 1, NULL, ''),
(121, 0, '1234567891011', '', '', 17, 48, 'jne', '', 'GME1282210402', '', 0, '2022-08-12 06:20:16', '', '119000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(122, 0, '1234567891011', '', '', 21, 6, 'jne', '', 'RDP1282210019', '', 0, '2022-08-12 11:01:27', '', '45000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(123, 0, '1234567891011', '', '', 26, 207, 'jne', '', 'ZRM1282210416', '', 0, '2022-08-12 16:41:37', '', '81000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(124, 0, '1234567891011', '', 'Gantungan Kunci', 9, 109, 'jne', '', 'PJX1382210105', '', 0, '2022-08-13 00:22:12', '39000', '49000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(125, 0, '1234567891011', '', 'Gantungan Kunci', 3, 402, 'tiki', '', 'GBG1482210913', '', 0, '2022-08-14 16:57:09', '30000', '40000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(132, 0, '1234567891011', '', 'Sling Bag', 9, 107, 'jne', '', 'BRI1482210675', '', 0, '2022-08-14 17:55:17', '39000', '89000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(133, 0, '1234567891011', '', 'Jam Tangan', 17, 172, 'jne', '', 'YTH1482210987', '', 0, '2022-08-14 19:47:27', '46000', '121000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(134, 0, '1234567891011', '', 'Jam Tangan', 18, 283, 'jne', '', 'TRH1482210562', '', 0, '2022-08-14 19:51:56', '46000', '121000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(135, 0, '1234567891011', '', 'Jam Tangan', 7, 88, 'tiki', '', 'WPC1482210820', 'pending', 0, '2022-08-14 20:03:30', '110000', '185000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(136, 0, '1234567891011', '', 'Jam Tangan', 2, 28, 'jne', '', 'TOC1482210182', '3', 0, '2022-08-14 20:40:40', '61000', '136000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(137, 0, '0', '', 'Sling Bag', 17, 172, 'jne', '', 'RZX1482210870', 'pending', 0, '2022-08-14 21:07:18', '46000', '96000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"\",\"notelp\":\"\",\"alamat\":\"\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bb07c796-79d6-410d-9723-a9e71bc62f07/pdf'),
(138, 0, '0', '', 'Sling Bag', 17, 184, 'jne', '', 'HVL1482210640', 'settlement', 1, '2022-08-14 21:55:44', '46000', '96000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b361b1f6-6bfc-4dd3-930e-7389fb4b2b43/pdf'),
(139, 0, '12345678910', '', 'Jam Tangan', 11, 42, 'jne', '', 'GOL1482210092', 'settlement', 4, '2022-08-14 23:35:25', '49000', '199000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ee93f74c-0b91-40c4-b511-21042232b6aa/pdf'),
(140, 0, '0', '', 'Jam Tangan', 17, 237, 'jne', '', 'LYX1582210904', '', 0, '2022-08-15 01:51:00', '46000', '121000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', ''),
(141, 0, '12345678910', '', 'Jam Tangan', 11, 80, 'jne', '', 'QRT1582210872', 'settlement', 4, '2022-08-15 02:02:25', '50000', '125000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e4d7abc6-449e-4960-b60b-b04f5477dbed/pdf'),
(142, 0, '12345678910', '', 'Ulos Sadum Corak Rumbai Panjang', 5, 210, 'jne', '', 'POS1582210314', 'settlement', 4, '2022-08-15 03:09:21', '45000', '120000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cfde048b-ed6e-49b3-a71e-39faf1858bf9/pdf'),
(143, 0, '0', '', 'Sling Bag', 17, 172, 'jne', '', 'NUV1582210194', 'settlement', 0, '2022-08-15 06:49:22', '46000', '96000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/45ccc524-bab3-45d7-9e9d-06efcadaf29b/pdf'),
(144, 0, '0', '', 'Sling Bag', 4, 183, 'jne', '', 'PIU1582210467', 'settlement', 2, '2022-08-15 06:57:19', '59000', '109000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/41ef089c-6367-43f3-9a39-86f23a819752/pdf'),
(145, 0, '12345678910', '', 'Asbak Kayu', 26, 350, 'jne', '', 'HSG1582210059', 'settlement', 4, '2022-08-15 10:58:16', '26000', '96000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/21f61db6-0dfd-4f84-b7fb-e1da6202c707/pdf'),
(146, 0, '0', '', 'Gantungan Kunci', 4, 63, 'jne', '', 'QHT1882210194', 'pending', 0, '2022-08-18 10:58:19', '59000', '69000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/84d10afc-0862-408e-ac9c-ef1d56abe552/pdf'),
(147, 0, '12345678910', '', 'Sling Bag', 11, 243, 'jne', '', 'QOA1882210375', 'settlement', 3, '2022-08-18 11:00:03', '49000', '99000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3452cd0d-baac-4e1e-bedc-f2ecd03f81dc/pdf'),
(148, 0, '0', '', 'Asbak Kayu', 16, 311, 'jne', '', 'QDJ1982210219', 'settlement', 0, '2022-08-19 03:48:15', '94000', '164000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c9c1ec0b-9472-4331-985f-ada8628b423d/pdf'),
(149, 0, '0', '', 'Asbak Kayu', 3, 402, 'jne', '', 'XUG1982210710', 'settlement', 0, '2022-08-19 10:02:24', '39000', '109000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2c7c6cbe-17e3-4914-96bc-de6df0e0b199/pdf'),
(150, 0, '128910127', '', 'Asbak Kayu', 26, 350, 'jne', '', 'IXG1982210519', 'settlement', 4, '2022-08-19 10:33:47', '26000', '96000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6d2a1005-2bbe-428e-bbe0-7333c1c9702a/pdf'),
(151, 0, '12345678910', '', 'Sling Bag', 7, 129, 'jne', '', 'OWF2382210145', 'settlement', 4, '2022-08-23 09:11:01', '102000', '202000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0791e234-3bb0-401c-b91e-71a01d0375bf/pdf'),
(152, 0, '0', '', 'Gantungan Kunci', 4, 65, 'jne', '', 'ICV2382210368', '', 0, '2022-08-23 09:30:45', '59000', '69000.00', 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `user_id`, `order_id`, `produk_id`, `order_qty`, `order_price`) VALUES
(27, 0, 88, 25, 1, '50000.00'),
(28, 0, 89, 25, 1, '50000.00'),
(29, 0, 90, 25, 1, '50000.00'),
(30, 0, 91, 25, 1, '50000.00'),
(31, 0, 92, 25, 1, '50000.00'),
(32, 0, 100, 25, 1, '50000.00'),
(33, 0, 101, 27, 2, '50000.00'),
(34, 0, 102, 26, 2, '50000.00'),
(35, 0, 103, 26, 1, '50000.00'),
(36, 0, 104, 26, 1, '50000.00'),
(37, 0, 105, 26, 1, '50000.00'),
(38, 0, 106, 27, 1, '50000.00'),
(39, 0, 107, 27, 1, '50000.00'),
(40, 0, 108, 26, 1, '50000.00'),
(41, 0, 109, 25, 3, '70000.00'),
(42, 0, 110, 25, 1, '75000.00'),
(43, 0, 111, 25, 1, '80000.00'),
(44, 0, 112, 26, 1, '50000.00'),
(45, 0, 113, 27, 1, '50000.00'),
(46, 0, 114, 28, 1, '90000.00'),
(47, 0, 115, 28, 1, '85000.00'),
(48, 0, 116, 28, 1, '85000.00'),
(49, 0, 116, 29, 1, '75000.00'),
(50, 0, 0, 30, 1, '10000.00'),
(51, 0, 132, 26, 1, '50000.00'),
(52, 0, 133, 29, 1, '75000.00'),
(53, 0, 134, 29, 1, '75000.00'),
(54, 0, 135, 29, 1, '75000.00'),
(55, 0, 136, 29, 1, '75000.00'),
(56, 0, 137, 26, 1, '50000.00'),
(57, 0, 138, 26, 1, '50000.00'),
(58, 0, 139, 29, 2, '75000.00'),
(59, 0, 140, 29, 1, '75000.00'),
(60, 0, 141, 29, 1, '75000.00'),
(61, 0, 142, 25, 1, '75000.00'),
(62, 0, 143, 26, 1, '50000.00'),
(63, 0, 144, 26, 1, '50000.00'),
(64, 0, 145, 24, 1, '70000.00'),
(65, 0, 146, 30, 1, '10000.00'),
(66, 0, 147, 26, 1, '50000.00'),
(67, 0, 148, 24, 1, '70000.00'),
(68, 0, 149, 24, 1, '70000.00'),
(69, 0, 150, 24, 1, '70000.00'),
(70, 0, 151, 26, 2, '50000.00'),
(71, 0, 152, 30, 1, '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_ulos`
--

CREATE TABLE `order_ulos` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(16) NOT NULL,
  `model_ulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_ulos`
--

INSERT INTO `order_ulos` (`order_id`, `order_number`, `model_ulos`) VALUES
(4, '', 2),
(5, '', 2),
(6, '', 2),
(7, '', 1),
(8, '', 2),
(9, '', 1),
(10, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_price` decimal(8,2) DEFAULT NULL,
  `payment_date` datetime NOT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `payment_status` enum('1','2','3') DEFAULT '1',
  `confirmed_date` datetime DEFAULT NULL,
  `payment_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_price`, `payment_date`, `picture_name`, `payment_status`, `confirmed_date`, `payment_data`) VALUES
(1, 66, '100000.00', '2022-07-12 16:46:51', '5.png', '1', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(2, 67, '200000.00', '2022-07-12 17:02:31', '4_(2).png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(3, 68, '100000.00', '2022-07-12 17:28:54', '4_(2)1.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(4, 105, '77000.00', '2022-07-22 07:37:07', '192.jpg', '2', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(5, 111, '108000.00', '2022-07-26 05:40:19', '4.png', '2', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(6, 113, '97000.00', '2022-07-26 09:30:57', 'WhatsApp_Image_2020-05-19_at_10_53_28.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(7, 109, '235000.00', '2022-07-26 09:42:08', 'MA.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(8, 114, '138000.00', '2022-07-26 09:51:40', 'WhatsApp_Image_2022-07-22_at_6_07_47_AM.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(9, 115, '113000.00', '2022-07-26 17:44:46', '193.jpg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}'),
(10, 116, '188000.00', '2022-07-27 08:27:08', 'wallpapermotivasi_34.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `penjual_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT current_timestamp(),
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(125) NOT NULL,
  `foto` varchar(64) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `bio` varchar(1025) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`penjual_id`, `email`, `password`, `nama`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `notelp`, `foto`, `kodepos`, `bio`, `active`) VALUES
(12, 'pahala.picauly67@gmail.com', '$2y$10$juudW8kzVMOr69X9xu.P.e5jmMqTr9vTPuuKwSx3uHTsBNijq4Gwq', 'Pahala123', 'Pahala Picauly Sagala', 'Medan', '2022-07-04', 'Jalan Aster 1 No.169', '082287928245', 'index.jpg', '20124', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_deskripsi_panjang` text NOT NULL,
  `produk_deskripsi_pendek` text NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_gambar` varchar(255) NOT NULL,
  `produk_kuantitas` int(11) NOT NULL,
  `produk_berat` varchar(255) NOT NULL,
  `produk_warna` varchar(255) NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_terbaik` tinyint(4) NOT NULL,
  `produk_status` tinyint(4) NOT NULL,
  `produk_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_deskripsi_panjang`, `produk_deskripsi_pendek`, `produk_harga`, `produk_gambar`, `produk_kuantitas`, `produk_berat`, `produk_warna`, `produk_kategori`, `produk_terbaik`, `produk_status`, `produk_date`) VALUES
(24, 'Asbak Kayu -1', '', '', 70000, 'Asbak_Kayu.png', 50, '5', 'Cokelat', 1, 1, 1, '2022-07-15 05:31:05'),
(25, 'Ulos Sadum', '', '', 50000, 'ulos_sadum.jpeg', 5, '', '', 3, 0, 1, '2022-07-15 05:58:20'),
(26, 'Sling Bag', '', '', 50000, 'sling_bag.png', 10, '', '', 2, 1, 1, '2022-07-15 06:01:35'),
(27, 'Beach Hat', '', '', 50000, 'Beach_Hat.png', 5, '', '', 2, 0, 1, '2022-07-15 06:03:16'),
(28, 'Ulos Ragihotang', '', '', 60000, 'ulos_ragihotang.png', 15, '', '', 3, 0, 1, '2022-07-26 07:46:08'),
(29, 'Jam Tangan Kayu', '', '', 75000, 'Jam_tangan-removebg-preview.png', 10, '2', 'Cokelat muda', 1, 1, 1, '2022-07-26 14:18:21'),
(30, 'Gantungan Kunci', '', '', 10000, 'Gantungan_Kunci-removebg-preview.png', 20, '', '', 1, 0, 1, '2022-07-26 14:21:45'),
(32, 'Ulos Sirara', '-', '-', 20000, 'ulos_sirara.png', 0, '', '', 3, 1, 1, '2022-07-27 06:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Sumatera Utara'),
(2, 'Sumatera Barat');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE `resi` (
  `id` int(11) NOT NULL,
  `nomor` varchar(16) NOT NULL,
  `resi_date` datetime NOT NULL,
  `resi_status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `key` varchar(32) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `content`) VALUES
(1, 'min_shop_to_free_shipping_cost', '20000'),
(2, 'payment_banks', '{\"mandiri\":{\"bank\":\"Mandiri\",\"number\":\"1234567890\",\"name\":\"Balige Craft\"},\"bca\":{\"bank\":\"BCA\",\"number\":\"0987654321\",\"name\":\"Balige Craft\"}}'),
(3, 'shipping_cost', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_ulasan` longtext CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_user`, `nama_lengkap`, `email`, `judul`, `isi_ulasan`, `tanggal`) VALUES
(24, 0, 'Pahala Picauly Sagala', 'pahala.picauly67@gmail.com', 'Produknya bagus', 'Produknya bagus', '0000-00-00'),
(30, 0, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'sip', '0000-00-00'),
(29, 0, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'Produkya bagusx', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `foto` varchar(64) CHARACTER SET armscii8 NOT NULL,
  `alamat` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `kodepos` varchar(10) CHARACTER SET armscii8 NOT NULL,
  `bio` varchar(1025) NOT NULL,
  `notelp` varchar(125) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `email`, `password`, `foto`, `alamat`, `kodepos`, `bio`, `notelp`, `active`) VALUES
(0, 'sagala123', 'Pahala Picauly Sagala', 'Medan', '1999-11-12', 'pahalasagala772@gmail.com', '$2y$10$hoR5JpWq51qQjIhgEAha6uZxUotJJSrOggn6MTqPxPop8CKugYFGS', 'index3.jpg', 'Jalan Aster 2 No 165', '20224', '-', '081269791233', 1),
(7, 'sagala12345', '', '', '0000-00-00', 'pahala.picauly67@gmail.com', '$2y$10$2oKUHRJkgsCsqsS6MW4XfOUalCUBM/TJcg5t70G2X6SP2P/qsisxu', 'default.png', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_verifikasi`
--

CREATE TABLE `user_verifikasi` (
  `id` int(11) NOT NULL,
  `email` varchar(128) CHARACTER SET armscii8 NOT NULL,
  `verifikasi` varchar(128) CHARACTER SET armscii8 NOT NULL,
  `tanggal_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_verifikasi`
--

INSERT INTO `user_verifikasi` (`id`, `email`, `verifikasi`, `tanggal_buat`) VALUES
(4, 'pahalapicauly12@gmail.com', 'hTaO04CQtdttK086O6pICAkSRO3aMcFW', 1648634721),
(5, 'arthapardede18@gmail.com', 'Quw11sKztf8T2CL7wEaX0RnlNfGfQYfP', 1648635060),
(8, 'arthapardede18@gmail.com', '31LHT9i5z6Me8PkR0iGhuAxJVmYiUwIU', 1648698142),
(9, 'diahsirait12@gmail.com', 'nEIMpjBLqb2SaGxxXoXpPEANdD9w8rES', 1648699204),
(10, 'arthapardede18@gmail.com', 'PhkgQJCIQUbUrkzJBQWPgQu3zuThuRRn', 1648699613),
(17, 'pahalapicauly12@gmail.com', 'mG2LQHhdh3MZdvbWrgQTkzf6z5rjfIas', 1650550313),
(57, 'pahalasagala772@gmail.com', 'Peve4x2dFcTtSS0Mb0vHxr1XNpE0Gszc', 1657639412),
(60, 'pahalasagala772@gmail.com', 'nw4slnwfiWsYNL6FFAELvHBdKJEDaYOr', 1657679118);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berat_barang`
--
ALTER TABLE `berat_barang`
  ADD PRIMARY KEY (`id_berat`);

--
-- Indexes for table `biaya_pengiriman`
--
ALTER TABLE `biaya_pengiriman`
  ADD PRIMARY KEY (`id_biaya`),
  ADD KEY `FK_Biaya_Pengiriman_ke_kota` (`id_kota_tujuan`),
  ADD KEY `FK_Berat_Kota` (`totalberat`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `FK_kota_provinsi` (`id_provinsi`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payments_orders` (`order_id`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`penjual_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_verifikasi`
--
ALTER TABLE `user_verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berat_barang`
--
ALTER TABLE `berat_barang`
  MODIFY `id_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biaya_pengiriman`
--
ALTER TABLE `biaya_pengiriman`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `penjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_verifikasi`
--
ALTER TABLE `user_verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biaya_pengiriman`
--
ALTER TABLE `biaya_pengiriman`
  ADD CONSTRAINT `FK_Berat_Kota` FOREIGN KEY (`totalberat`) REFERENCES `berat_barang` (`id_berat`),
  ADD CONSTRAINT `FK_Biaya_Pengiriman_ke_kota` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_kota_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
