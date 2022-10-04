/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : ta_marketplace

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 24/09/2022 11:59:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Pahala Picauly Sagala', 'pahala.picauly12@gmail.com', '$2y$10$DK.mo9IztJML1K49uStTj.3C812Gh5aOusIMpyxaRbYn/J1bmj2R6', '');

-- ----------------------------
-- Table structure for berat_barang
-- ----------------------------
DROP TABLE IF EXISTS `berat_barang`;
CREATE TABLE `berat_barang`  (
  `id_berat` int(11) NOT NULL AUTO_INCREMENT,
  `berat_barang` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_berat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berat_barang
-- ----------------------------
INSERT INTO `berat_barang` VALUES (1, '1 KG');
INSERT INTO `berat_barang` VALUES (2, '2 KG');

-- ----------------------------
-- Table structure for biaya_pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `biaya_pengiriman`;
CREATE TABLE `biaya_pengiriman`  (
  `id_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `id_kota_tujuan` int(11) NULL DEFAULT NULL,
  `totalberat` int(11) NULL DEFAULT NULL,
  `biaya` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_biaya`) USING BTREE,
  INDEX `FK_Biaya_Pengiriman_ke_kota`(`id_kota_tujuan`) USING BTREE,
  INDEX `FK_Berat_Kota`(`totalberat`) USING BTREE,
  CONSTRAINT `FK_Berat_Kota` FOREIGN KEY (`totalberat`) REFERENCES `berat_barang` (`id_berat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_Biaya_Pengiriman_ke_kota` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `kota` (`id_kota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of biaya_pengiriman
-- ----------------------------
INSERT INTO `biaya_pengiriman` VALUES (1, 1, 1, 20000);
INSERT INTO `biaya_pengiriman` VALUES (2, 2, 1, 27000);
INSERT INTO `biaya_pengiriman` VALUES (3, 3, 1, 28000);
INSERT INTO `biaya_pengiriman` VALUES (4, 4, 1, 26000);
INSERT INTO `biaya_pengiriman` VALUES (5, 5, 1, 27000);
INSERT INTO `biaya_pengiriman` VALUES (6, 6, 1, 38000);
INSERT INTO `biaya_pengiriman` VALUES (7, 7, 1, 38000);
INSERT INTO `biaya_pengiriman` VALUES (8, 8, 1, 25000);
INSERT INTO `biaya_pengiriman` VALUES (9, 9, 1, 47000);
INSERT INTO `biaya_pengiriman` VALUES (10, 10, 1, 48000);
INSERT INTO `biaya_pengiriman` VALUES (11, 1, 2, 24000);
INSERT INTO `biaya_pengiriman` VALUES (12, 2, 2, 31000);
INSERT INTO `biaya_pengiriman` VALUES (13, 3, 2, 32000);
INSERT INTO `biaya_pengiriman` VALUES (14, 4, 2, 30000);
INSERT INTO `biaya_pengiriman` VALUES (15, 5, 2, 32000);
INSERT INTO `biaya_pengiriman` VALUES (16, 6, 2, 42000);
INSERT INTO `biaya_pengiriman` VALUES (17, 7, 2, 42000);
INSERT INTO `biaya_pengiriman` VALUES (18, 8, 2, 29000);
INSERT INTO `biaya_pengiriman` VALUES (19, 9, 2, 51000);
INSERT INTO `biaya_pengiriman` VALUES (20, 10, 2, 52000);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori_deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Aksesoris', '-', 1);
INSERT INTO `kategori` VALUES (2, 'Busana', '-', 1);
INSERT INTO `kategori` VALUES (3, 'Ulos', '', 1);

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota`  (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NULL DEFAULT NULL,
  `nama_kota` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kota`) USING BTREE,
  INDEX `FK_kota_provinsi`(`id_provinsi`) USING BTREE,
  CONSTRAINT `FK_kota_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES (1, 1, 'Balige');
INSERT INTO `kota` VALUES (2, 1, 'Deli Serdang');
INSERT INTO `kota` VALUES (3, 1, 'Medan');
INSERT INTO `kota` VALUES (4, 1, 'Pematang Siantar');
INSERT INTO `kota` VALUES (5, 1, 'Sibolga');
INSERT INTO `kota` VALUES (6, 2, 'Agam');
INSERT INTO `kota` VALUES (7, 2, 'Bukittinggi');
INSERT INTO `kota` VALUES (8, 2, 'Padang');
INSERT INTO `kota` VALUES (9, 2, 'Pasaman');
INSERT INTO `kota` VALUES (10, 2, 'Solok');

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model`  (
  `id_model` int(11) NOT NULL AUTO_INCREMENT,
  `nama_model` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_model` int(11) NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0',
  PRIMARY KEY (`id_model`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES (1, 'Polos', 10000, 1);
INSERT INTO `model` VALUES (2, 'Lampion', 25000, 1);
INSERT INTO `model` VALUES (3, 'Rumbai Panjang', 20000, 1);
INSERT INTO `model` VALUES (4, 'Bordir', 30000, 1);

-- ----------------------------
-- Table structure for order_item
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` bigint(20) NULL DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` decimal(8, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO `order_item` VALUES (27, 0, 88, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (28, 0, 89, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (29, 0, 90, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (30, 0, 91, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (31, 0, 92, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (32, 0, 100, 25, 1, 50000.00);
INSERT INTO `order_item` VALUES (33, 0, 101, 27, 2, 50000.00);
INSERT INTO `order_item` VALUES (34, 0, 102, 26, 2, 50000.00);
INSERT INTO `order_item` VALUES (35, 0, 103, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (36, 0, 104, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (37, 0, 105, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (38, 0, 106, 27, 1, 50000.00);
INSERT INTO `order_item` VALUES (39, 0, 107, 27, 1, 50000.00);
INSERT INTO `order_item` VALUES (40, 0, 108, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (41, 0, 109, 25, 3, 70000.00);
INSERT INTO `order_item` VALUES (42, 0, 110, 25, 1, 75000.00);
INSERT INTO `order_item` VALUES (43, 0, 111, 25, 1, 80000.00);
INSERT INTO `order_item` VALUES (44, 0, 112, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (45, 0, 113, 27, 1, 50000.00);
INSERT INTO `order_item` VALUES (46, 0, 114, 28, 1, 90000.00);
INSERT INTO `order_item` VALUES (47, 0, 115, 28, 1, 85000.00);
INSERT INTO `order_item` VALUES (48, 0, 116, 28, 1, 85000.00);
INSERT INTO `order_item` VALUES (49, 0, 116, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (50, 0, 0, 30, 1, 10000.00);
INSERT INTO `order_item` VALUES (51, 0, 132, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (52, 0, 133, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (53, 0, 134, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (54, 0, 135, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (55, 0, 136, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (56, 0, 137, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (57, 0, 138, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (58, 0, 139, 29, 2, 75000.00);
INSERT INTO `order_item` VALUES (59, 0, 140, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (60, 0, 141, 29, 1, 75000.00);
INSERT INTO `order_item` VALUES (61, 0, 142, 25, 1, 75000.00);
INSERT INTO `order_item` VALUES (62, 0, 143, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (63, 0, 144, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (64, 0, 145, 24, 1, 70000.00);
INSERT INTO `order_item` VALUES (65, 0, 146, 30, 1, 10000.00);
INSERT INTO `order_item` VALUES (66, 0, 147, 26, 1, 50000.00);
INSERT INTO `order_item` VALUES (67, 0, 148, 24, 1, 70000.00);
INSERT INTO `order_item` VALUES (68, 0, 149, 24, 1, 70000.00);
INSERT INTO `order_item` VALUES (69, 0, 150, 24, 1, 70000.00);
INSERT INTO `order_item` VALUES (70, 0, 151, 26, 2, 50000.00);
INSERT INTO `order_item` VALUES (71, 0, 152, 30, 1, 10000.00);

-- ----------------------------
-- Table structure for order_ulos
-- ----------------------------
DROP TABLE IF EXISTS `order_ulos`;
CREATE TABLE `order_ulos`  (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_ulos` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_ulos
-- ----------------------------
INSERT INTO `order_ulos` VALUES (4, '', 2);
INSERT INTO `order_ulos` VALUES (5, '', 2);
INSERT INTO `order_ulos` VALUES (6, '', 2);
INSERT INTO `order_ulos` VALUES (7, '', 1);
INSERT INTO `order_ulos` VALUES (8, '', 2);
INSERT INTO `order_ulos` VALUES (9, '', 1);
INSERT INTO `order_ulos` VALUES (10, '', 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `resi` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province` int(11) NOT NULL,
  `regency` int(11) NOT NULL,
  `courier` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `courier_service` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_status` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pesanan_status` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `ongkir` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(8, 2) NULL DEFAULT NULL,
  `total_items` int(10) NULL DEFAULT NULL,
  `payment_method` int(11) NULL DEFAULT 1,
  `delivery_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `link_pay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 153 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (119, 0, '1234567891011', '', '', 0, 0, '', '', 'ZVN1182210756', '1', 0, '2022-08-11 21:16:54', '', 41000.00, 1, 1, NULL, '');
INSERT INTO `orders` VALUES (120, 0, '1234567891011', '', '', 0, 0, '', '', 'PNC1182210935', '0', 1, '2022-08-11 21:20:24', '', 41000.00, 1, 1, NULL, '');
INSERT INTO `orders` VALUES (121, 0, '1234567891011', '', '', 17, 48, 'jne', '', 'GME1282210402', '', 0, '2022-08-12 06:20:16', '', 119000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (122, 0, '1234567891011', '', '', 21, 6, 'jne', '', 'RDP1282210019', '', 0, '2022-08-12 11:01:27', '', 45000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (123, 0, '1234567891011', '', '', 26, 207, 'jne', '', 'ZRM1282210416', '', 0, '2022-08-12 16:41:37', '', 81000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (124, 0, '1234567891011', '', 'Gantungan Kunci', 9, 109, 'jne', '', 'PJX1382210105', '', 0, '2022-08-13 00:22:12', '39000', 49000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (125, 0, '1234567891011', '', 'Gantungan Kunci', 3, 402, 'tiki', '', 'GBG1482210913', '', 0, '2022-08-14 16:57:09', '30000', 40000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (132, 0, '1234567891011', '', 'Sling Bag', 9, 107, 'jne', '', 'BRI1482210675', '', 0, '2022-08-14 17:55:17', '39000', 89000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (133, 0, '1234567891011', '', 'Jam Tangan', 17, 172, 'jne', '', 'YTH1482210987', '', 0, '2022-08-14 19:47:27', '46000', 121000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (134, 0, '1234567891011', '', 'Jam Tangan', 18, 283, 'jne', '', 'TRH1482210562', '', 0, '2022-08-14 19:51:56', '46000', 121000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (135, 0, '1234567891011', '', 'Jam Tangan', 7, 88, 'tiki', '', 'WPC1482210820', 'pending', 0, '2022-08-14 20:03:30', '110000', 185000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (136, 0, '1234567891011', '', 'Jam Tangan', 2, 28, 'jne', '', 'TOC1482210182', '3', 0, '2022-08-14 20:40:40', '61000', 136000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (137, 0, '0', '', 'Sling Bag', 17, 172, 'jne', '', 'RZX1482210870', 'pending', 0, '2022-08-14 21:07:18', '46000', 96000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"\",\"notelp\":\"\",\"alamat\":\"\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bb07c796-79d6-410d-9723-a9e71bc62f07/pdf');
INSERT INTO `orders` VALUES (138, 0, '0', '', 'Sling Bag', 17, 184, 'jne', '', 'HVL1482210640', 'settlement', 1, '2022-08-14 21:55:44', '46000', 96000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b361b1f6-6bfc-4dd3-930e-7389fb4b2b43/pdf');
INSERT INTO `orders` VALUES (139, 0, '12345678910', '', 'Jam Tangan', 11, 42, 'jne', '', 'GOL1482210092', 'settlement', 4, '2022-08-14 23:35:25', '49000', 199000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ee93f74c-0b91-40c4-b511-21042232b6aa/pdf');
INSERT INTO `orders` VALUES (140, 0, '0', '', 'Jam Tangan', 17, 237, 'jne', '', 'LYX1582210904', '', 0, '2022-08-15 01:51:00', '46000', 121000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', '');
INSERT INTO `orders` VALUES (141, 0, '12345678910', '', 'Jam Tangan', 11, 80, 'jne', '', 'QRT1582210872', 'settlement', 4, '2022-08-15 02:02:25', '50000', 125000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e4d7abc6-449e-4960-b60b-b04f5477dbed/pdf');
INSERT INTO `orders` VALUES (142, 0, '12345678910', '', 'Ulos Sadum Corak Rumbai Panjang', 5, 210, 'jne', '', 'POS1582210314', 'settlement', 4, '2022-08-15 03:09:21', '45000', 120000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cfde048b-ed6e-49b3-a71e-39faf1858bf9/pdf');
INSERT INTO `orders` VALUES (143, 0, '0', '', 'Sling Bag', 17, 172, 'jne', '', 'NUV1582210194', 'settlement', 0, '2022-08-15 06:49:22', '46000', 96000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/45ccc524-bab3-45d7-9e9d-06efcadaf29b/pdf');
INSERT INTO `orders` VALUES (144, 0, '0', '', 'Sling Bag', 4, 183, 'jne', '', 'PIU1582210467', 'settlement', 2, '2022-08-15 06:57:19', '59000', 109000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/41ef089c-6367-43f3-9a39-86f23a819752/pdf');
INSERT INTO `orders` VALUES (145, 0, '12345678910', '', 'Asbak Kayu', 26, 350, 'jne', '', 'HSG1582210059', 'settlement', 4, '2022-08-15 10:58:16', '26000', 96000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/21f61db6-0dfd-4f84-b7fb-e1da6202c707/pdf');
INSERT INTO `orders` VALUES (146, 0, '0', '', 'Gantungan Kunci', 4, 63, 'jne', '', 'QHT1882210194', 'pending', 0, '2022-08-18 10:58:19', '59000', 69000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/84d10afc-0862-408e-ac9c-ef1d56abe552/pdf');
INSERT INTO `orders` VALUES (147, 0, '12345678910', '', 'Sling Bag', 11, 243, 'jne', '', 'QOA1882210375', 'settlement', 3, '2022-08-18 11:00:03', '49000', 99000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3452cd0d-baac-4e1e-bedc-f2ecd03f81dc/pdf');
INSERT INTO `orders` VALUES (148, 0, '0', '', 'Asbak Kayu', 16, 311, 'jne', '', 'QDJ1982210219', 'settlement', 0, '2022-08-19 03:48:15', '94000', 164000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c9c1ec0b-9472-4331-985f-ada8628b423d/pdf');
INSERT INTO `orders` VALUES (149, 0, '0', '', 'Asbak Kayu', 3, 402, 'jne', '', 'XUG1982210710', 'settlement', 0, '2022-08-19 10:02:24', '39000', 109000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 1 No.169\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2c7c6cbe-17e3-4914-96bc-de6df0e0b199/pdf');
INSERT INTO `orders` VALUES (150, 0, '128910127', '', 'Asbak Kayu', 26, 350, 'jne', '', 'IXG1982210519', 'settlement', 4, '2022-08-19 10:33:47', '26000', 96000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6d2a1005-2bbe-428e-bbe0-7333c1c9702a/pdf');
INSERT INTO `orders` VALUES (151, 0, '12345678910', '', 'Sling Bag', 7, 129, 'jne', '', 'OWF2382210145', 'settlement', 4, '2022-08-23 09:11:01', '102000', 202000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0791e234-3bb0-401c-b91e-71a01d0375bf/pdf');
INSERT INTO `orders` VALUES (152, 0, '0', '', 'Gantungan Kunci', 4, 65, 'jne', '', 'ICV2382210368', '', 0, '2022-08-23 09:30:45', '59000', 69000.00, 1, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', '');

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NULL DEFAULT NULL,
  `payment_price` decimal(8, 2) NULL DEFAULT NULL,
  `payment_date` datetime NOT NULL,
  `picture_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `confirmed_date` datetime NULL DEFAULT NULL,
  `payment_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_payments_orders`(`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, 66, 100000.00, '2022-07-12 16:46:51', '5.png', '1', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (2, 67, 200000.00, '2022-07-12 17:02:31', '4_(2).png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (3, 68, 100000.00, '2022-07-12 17:28:54', '4_(2)1.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (4, 105, 77000.00, '2022-07-22 07:37:07', '192.jpg', '2', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (5, 111, 108000.00, '2022-07-26 05:40:19', '4.png', '2', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (6, 113, 97000.00, '2022-07-26 09:30:57', 'WhatsApp_Image_2020-05-19_at_10_53_28.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (7, 109, 235000.00, '2022-07-26 09:42:08', 'MA.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (8, 114, 138000.00, '2022-07-26 09:51:40', 'WhatsApp_Image_2022-07-22_at_6_07_47_AM.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (9, 115, 113000.00, '2022-07-26 17:44:46', '193.jpg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (10, 116, 188000.00, '2022-07-27 08:27:08', 'wallpapermotivasi_34.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');

-- ----------------------------
-- Table structure for penjual
-- ----------------------------
DROP TABLE IF EXISTS `penjual`;
CREATE TABLE `penjual`  (
  `penjual_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notelp` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodepos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bio` varchar(1025) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`penjual_id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjual
-- ----------------------------
INSERT INTO `penjual` VALUES (12, 'pahala.picauly67@gmail.com', '$2y$10$juudW8kzVMOr69X9xu.P.e5jmMqTr9vTPuuKwSx3uHTsBNijq4Gwq', 'Pahala123', 'Pahala Picauly Sagala', 'Medan', '2022-07-04', 'Jalan Aster 1 No.169', '082287928245', 'index.jpg', '20124', '-', 1);

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_deskripsi_panjang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_deskripsi_pendek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_kuantitas` int(11) NOT NULL,
  `produk_berat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_warna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_terbaik` tinyint(4) NOT NULL,
  `produk_status` tinyint(4) NOT NULL,
  `produk_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`produk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (24, 'Asbak Kayu -1', '', '', 70000, 'Asbak_Kayu.png', 50, '5', 'Cokelat', 1, 1, 1, '2022-07-15 12:31:05');
INSERT INTO `produk` VALUES (25, 'Ulos Sadum', '', '', 50000, 'ulos_sadum.jpeg', 5, '', '', 3, 0, 1, '2022-07-15 12:58:20');
INSERT INTO `produk` VALUES (26, 'Sling Bag', '', '', 50000, 'sling_bag.png', 10, '', '', 2, 1, 1, '2022-07-15 13:01:35');
INSERT INTO `produk` VALUES (27, 'Beach Hat', '', '', 50000, 'Beach_Hat.png', 5, '', '', 2, 0, 1, '2022-07-15 13:03:16');
INSERT INTO `produk` VALUES (28, 'Ulos Ragihotang', '', '', 60000, 'ulos_ragihotang.png', 15, '', '', 3, 0, 1, '2022-07-26 14:46:08');
INSERT INTO `produk` VALUES (29, 'Jam Tangan Kayu', '', '', 75000, 'Jam_tangan-removebg-preview.png', 10, '2', 'Cokelat muda', 1, 1, 1, '2022-07-26 21:18:21');
INSERT INTO `produk` VALUES (30, 'Gantungan Kunci', '', '', 10000, 'Gantungan_Kunci-removebg-preview.png', 20, '', '', 1, 0, 1, '2022-07-26 21:21:45');
INSERT INTO `produk` VALUES (32, 'Ulos Sirara', '-', '-', 20000, 'ulos_sirara.png', 0, '', '', 3, 1, 1, '2022-07-27 13:15:10');

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi`  (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES (1, 'Sumatera Utara');
INSERT INTO `provinsi` VALUES (2, 'Sumatera Barat');

-- ----------------------------
-- Table structure for resi
-- ----------------------------
DROP TABLE IF EXISTS `resi`;
CREATE TABLE `resi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resi_date` datetime NOT NULL,
  `resi_status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resi
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'min_shop_to_free_shipping_cost', '20000');
INSERT INTO `settings` VALUES (2, 'payment_banks', '{\"mandiri\":{\"bank\":\"Mandiri\",\"number\":\"1234567890\",\"name\":\"Balige Craft\"},\"bca\":{\"bank\":\"BCA\",\"number\":\"0987654321\",\"name\":\"Balige Craft\"}}');
INSERT INTO `settings` VALUES (3, 'shipping_cost', '5000');

-- ----------------------------
-- Table structure for ulasan
-- ----------------------------
DROP TABLE IF EXISTS `ulasan`;
CREATE TABLE `ulasan`  (
  `id_ulasan` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_ulasan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_ulasan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ulasan
-- ----------------------------
INSERT INTO `ulasan` VALUES (24, 0, 'Pahala Picauly Sagala', 'pahala.picauly67@gmail.com', 'Produknya bagus', 'Produknya bagus', '0000-00-00');
INSERT INTO `ulasan` VALUES (30, 0, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'sip', '0000-00-00');
INSERT INTO `ulasan` VALUES (29, 0, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'Produkya bagusx', '0000-00-00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `nama_lengkap` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(150) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `password` varchar(150) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `foto` varchar(64) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `alamat` varchar(150) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `kodepos` varchar(10) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `bio` varchar(1025) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notelp` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (0, 'sagala123', 'Pahala Picauly Sagala', 'Medan', '1999-11-12', 'pahalasagala772@gmail.com', '$2y$10$hoR5JpWq51qQjIhgEAha6uZxUotJJSrOggn6MTqPxPop8CKugYFGS', 'index3.jpg', 'Jalan Aster 2 No 165', '20224', '-', '081269791233', 1);
INSERT INTO `user` VALUES (7, 'sagala12345', '', '', '0000-00-00', 'pahala.picauly67@gmail.com', '$2y$10$2oKUHRJkgsCsqsS6MW4XfOUalCUBM/TJcg5t70G2X6SP2P/qsisxu', 'default.png', '', '', '', '', 1);

-- ----------------------------
-- Table structure for user_verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `user_verifikasi`;
CREATE TABLE `user_verifikasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `verifikasi` varchar(128) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tanggal_buat` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_verifikasi
-- ----------------------------
INSERT INTO `user_verifikasi` VALUES (4, 'pahalapicauly12@gmail.com', 'hTaO04CQtdttK086O6pICAkSRO3aMcFW', 1648634721);
INSERT INTO `user_verifikasi` VALUES (5, 'arthapardede18@gmail.com', 'Quw11sKztf8T2CL7wEaX0RnlNfGfQYfP', 1648635060);
INSERT INTO `user_verifikasi` VALUES (8, 'arthapardede18@gmail.com', '31LHT9i5z6Me8PkR0iGhuAxJVmYiUwIU', 1648698142);
INSERT INTO `user_verifikasi` VALUES (9, 'diahsirait12@gmail.com', 'nEIMpjBLqb2SaGxxXoXpPEANdD9w8rES', 1648699204);
INSERT INTO `user_verifikasi` VALUES (10, 'arthapardede18@gmail.com', 'PhkgQJCIQUbUrkzJBQWPgQu3zuThuRRn', 1648699613);
INSERT INTO `user_verifikasi` VALUES (17, 'pahalapicauly12@gmail.com', 'mG2LQHhdh3MZdvbWrgQTkzf6z5rjfIas', 1650550313);
INSERT INTO `user_verifikasi` VALUES (57, 'pahalasagala772@gmail.com', 'Peve4x2dFcTtSS0Mb0vHxr1XNpE0Gszc', 1657639412);
INSERT INTO `user_verifikasi` VALUES (60, 'pahalasagala772@gmail.com', 'nw4slnwfiWsYNL6FFAELvHBdKJEDaYOr', 1657679118);

SET FOREIGN_KEY_CHECKS = 1;
