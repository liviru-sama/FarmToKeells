-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2024 at 05:00 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmtokeells`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `reset_token_expire`, `reset_token`, `email`) VALUES
(2, 'admin', '$2y$10$wRil2JyC3oN7FcMWeMS6Pulm/uX9NbD/Q1hk/C8S0FjdDjsUoKmM2', NULL, NULL, NULL),
(4, 'admin1', '$2y$10$Hai1hvKzAyb6Ny77JRJvre0B4qhaKgyPvjJMG2Qc43uUYrjfDfpci', '2024-04-26 00:59:08', '4d5ba6785c7b3e8f84c6e01001dbc6d032ff77b9d1a41db7245b117f8ba53c15', 'tkugananthy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `adminnotifications`
--

DROP TABLE IF EXISTS `adminnotifications`;
CREATE TABLE IF NOT EXISTS `adminnotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `purchase_product` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ccm_reply` varchar(255) DEFAULT NULL,
  `tm_reply` varchar(255) DEFAULT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `totalprice` decimal(10,0) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminnotifications`
--

INSERT INTO `adminnotifications` (`id`, `user_id`, `product`, `purchase_product`, `quantity`, `action`, `time`, `ccm_reply`, `tm_reply`, `inquiry`, `user`, `order_id`, `totalprice`, `is_read`) VALUES
(8, 55, 'Corriander', NULL, 78, 'new_order', '2024-04-23 15:05:15', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(7, 55, 'Ginger', 'Ginger', 45, 'new_order', '2024-04-23 15:04:33', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(9, NULL, NULL, NULL, NULL, 'reply', '2024-04-23 15:33:05', 'illuminate what', NULL, NULL, NULL, NULL, NULL, 0),
(10, NULL, NULL, NULL, NULL, 'reply', '2024-04-23 15:46:35', NULL, 'sfvnjn\r\n', NULL, NULL, NULL, NULL, 0),
(11, 44, NULL, NULL, NULL, 'farmerreply', '2024-04-23 15:57:28', NULL, NULL, 'djfndj', 'john', NULL, NULL, 0),
(12, 55, 'Beans', NULL, NULL, 'payment', '2024-04-23 16:25:03', NULL, NULL, NULL, 'wasri', 80, '6942', 0),
(13, 64, NULL, NULL, NULL, 'newuser', '2024-04-23 16:25:36', NULL, NULL, NULL, 'nithun', NULL, NULL, 0),
(14, NULL, 'Capsicum', NULL, 9, 'low', '2024-04-23 16:40:01', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 55, 'Leeks', NULL, NULL, 'payment', '2024-04-24 06:55:03', NULL, NULL, NULL, 'wasri', 40, '3780', 0),
(16, 55, 'Ginger', 'Ginger', 65, 'new_order', '2024-04-25 07:07:02', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(17, NULL, NULL, NULL, NULL, 'reply', '2024-04-25 16:17:38', 'sathu', NULL, NULL, NULL, NULL, NULL, 0),
(18, 55, 'Cucumber', 'Cucumber', 96, 'new_order', '2024-04-25 17:24:05', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(19, 55, 'Cucumber', 'Cucumber', 98, 'new_order', '2024-04-25 17:27:58', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(20, 55, 'Cucumber', 'Cucumber', 78, 'new_order', '2024-04-25 17:54:37', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(21, 55, 'Corriander', NULL, 78, 'new_order', '2024-04-25 18:56:08', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(22, 55, 'Ginger', NULL, 67, 'new_order', '2024-04-27 12:30:52', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(23, 65, NULL, NULL, NULL, 'newuser', '2024-04-28 07:29:42', NULL, NULL, NULL, 'sathu', NULL, NULL, 0),
(24, 65, 'Ginger', NULL, 78, 'new_order', '2024-04-28 09:03:08', NULL, NULL, NULL, 'sathu', NULL, NULL, 0),
(25, 55, 'Ginger', NULL, NULL, 'payment', '2024-04-28 12:10:03', NULL, NULL, NULL, 'wasri', 89, '4005', 0),
(26, 55, 'Ginger', NULL, NULL, 'payment', '2024-04-28 12:20:26', NULL, NULL, NULL, 'wasri', 89, '4005', 0),
(27, 55, 'Pumpkin', NULL, NULL, 'payment', '2024-04-28 14:08:00', NULL, NULL, NULL, 'wasri', 84, '6370', 0),
(28, 55, 'Cucumber', NULL, NULL, 'payment', '2024-04-28 14:30:50', NULL, NULL, NULL, 'wasri', 100, '4410', 0),
(29, 55, 'Ginger', NULL, 56, 'new_order', '2024-04-29 04:49:31', NULL, NULL, NULL, 'wasri', NULL, NULL, 0),
(30, 66, NULL, NULL, NULL, 'newuser', '2024-04-29 08:38:18', NULL, NULL, NULL, 'umai', NULL, NULL, 0),
(31, 67, NULL, NULL, NULL, 'newuser', '2024-04-29 09:31:54', NULL, NULL, NULL, 'iflal', NULL, NULL, 0),
(32, 67, 'Ginger', NULL, 10, 'new_order', '2024-04-29 10:34:42', NULL, NULL, NULL, 'iflal', NULL, NULL, 0),
(33, 67, 'Corriander', NULL, 34, 'new_order', '2024-04-29 11:29:52', NULL, NULL, NULL, 'iflal', NULL, NULL, 0),
(34, 67, 'Beans', NULL, 34, 'new_order', '2024-04-29 14:52:59', NULL, NULL, NULL, 'iflal', NULL, NULL, 0),
(35, 55, 'Capsicum', NULL, NULL, 'payment', '2024-04-30 05:15:36', NULL, NULL, NULL, 'wasri', 75, '6396', 1);

--
-- Triggers `adminnotifications`
--
DROP TRIGGER IF EXISTS `username_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `username_insert_trigger` BEFORE INSERT ON `adminnotifications` FOR EACH ROW BEGIN
    -- Declare a variable to store the user's name
    DECLARE user_name VARCHAR(255);

    -- Retrieve the user's name based on the user_id
    SELECT name INTO user_name FROM users WHERE id = NEW.user_id;

    -- Set the user_name value in the new row
    SET NEW.user = user_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ccm`
--

DROP TABLE IF EXISTS `ccm`;
CREATE TABLE IF NOT EXISTS `ccm` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `collectioncenter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ccm`
--

INSERT INTO `ccm` (`admin_id`, `admin_username`, `admin_password`, `reset_token_expire`, `reset_token`, `email`, `collectioncenter`) VALUES
(2, 'ccm', '$2y$10$u3LkrC95hjWTmvj12eksE.Gz97PN5mkr/7e2ox7dfKWFXo3jsLVLK', NULL, NULL, 'nithun@gmail.com', 'Thambuththegama Keells collection center'),
(3, 'ccm1', '$2y$10$27w8qRX8t5cUZpLfJnrcEem/HKPRYecsiUJs4UrFAq1Ngab8Ft2eK', NULL, NULL, 'anthy@gmail.com', 'Sooriyawewa Keells collection center'),
(5, 'ccm2', '$2y$10$iqjRpCSmcC9ZeSkitT77o.AKJD.G4I9OOU3KW5CyA9ksSMidJqMJa', NULL, NULL, 'tkugananthy@gmail.com', 'Jaffna Keells collection center'),
(11, 'ccm10', '$2y$10$tZ.yT6/EzW2qOB/zu7BvV..wFzr5KuDLCJXOniaX5zKWdZNDwIZja', NULL, NULL, 'ccm10@gmail.com', 'Bandarawela Keells collection center'),
(15, 'ccm78', '$2y$10$XKoq9lxIxsefXI.aBfKYxOhr5yFF.7RjID/vWhMjkPjbj2wRFxRIu', NULL, NULL, 'ccm@gmail.com', 'Puttalam Keells collection center'),
(16, 'ccm132', '$2y$10$ti3sRIh1pPhZ7Zk7z.9rnu4jPUgYtC2u7n.Lkn6ou6wat1Ab6l9XC', NULL, NULL, 'ccm132@gmail.com', 'Sigiriya Keells collection center');

-- --------------------------------------------------------

--
-- Table structure for table `ccmnotifications`
--

DROP TABLE IF EXISTS `ccmnotifications`;
CREATE TABLE IF NOT EXISTS `ccmnotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `purchase_product` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_reply` varchar(255) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ccmnotifications`
--

INSERT INTO `ccmnotifications` (`id`, `user_id`, `product`, `purchase_product`, `quantity`, `action`, `time`, `admin_reply`, `is_read`) VALUES
(9, 55, 'Corriander', NULL, 78, 'new_order', '2024-04-23 15:05:15', NULL, 0),
(8, 55, 'Ginger', 'Ginger', 45, 'new_order', '2024-04-23 15:04:33', NULL, 0),
(10, NULL, NULL, NULL, NULL, 'reply', '2024-04-23 15:32:42', 'eliminate', 0),
(11, 55, 'Ginger', 'Ginger', 65, 'new_order', '2024-04-25 07:07:02', NULL, 0),
(12, NULL, NULL, NULL, NULL, 'reply', '2024-04-25 16:17:51', 'mathu', 0),
(13, 55, 'Cucumber', 'Cucumber', 96, 'new_order', '2024-04-25 17:24:05', NULL, 0),
(14, 55, 'Cucumber', 'Cucumber', 98, 'new_order', '2024-04-25 17:27:58', NULL, 0),
(15, 55, 'Cucumber', 'Cucumber', 78, 'new_order', '2024-04-25 17:54:37', NULL, 0),
(16, 55, 'Corriander', NULL, 78, 'new_order', '2024-04-25 18:56:08', NULL, 0),
(17, 55, 'Ginger', NULL, 67, 'new_order', '2024-04-27 12:30:52', NULL, 0),
(18, 65, 'Ginger', NULL, 78, 'new_order', '2024-04-28 09:03:08', NULL, 0),
(19, 55, 'Ginger', NULL, 56, 'new_order', '2024-04-29 04:49:31', NULL, 0),
(20, 67, 'Ginger', NULL, 10, 'new_order', '2024-04-29 10:34:42', NULL, 0),
(21, 67, 'Corriander', NULL, 34, 'new_order', '2024-04-29 11:29:52', NULL, 0),
(22, 67, 'Beans', NULL, 34, 'new_order', '2024-04-29 14:52:59', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ccm_chat`
--

DROP TABLE IF EXISTS `ccm_chat`;
CREATE TABLE IF NOT EXISTS `ccm_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ccm_reply` text,
  `admin_reply` text,
  `admin_reply_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ccm_chat`
--

INSERT INTO `ccm_chat` (`id`, `ccm_reply`, `admin_reply`, `admin_reply_time`, `created_at`) VALUES
(1, 'We\'ve received a batch of tomatoes with unusual discoloration. What should we do with them?', NULL, NULL, '2024-04-28 13:49:36'),
(3, 'Do we have any special instructions for storing leafy greens to maintain freshness?\n', NULL, NULL, '2024-04-28 13:50:06'),
(5, 'Do we have any special instructions for storing leafy greens to maintain freshness?\n', NULL, NULL, '2024-04-28 13:50:09'),
(6, 'Is there a specific protocol for inspecting incoming shipments of produce for quality control?\n', NULL, NULL, '2024-04-28 13:50:36'),
(7, 'We\'ve received a batch of tomatoes with unusual discoloration. What should we do with them?', NULL, NULL, '2024-04-28 13:49:54'),
(8, 'Is there a specific protocol for inspecting incoming shipments of produce for quality control?\n', NULL, NULL, '2024-04-28 13:50:39'),
(15, 'Do we have any special instructions for storing leafy greens to maintain freshness?\n', NULL, NULL, '2024-04-28 13:50:21'),
(16, 'We\'ve received a batch of tomatoes with unusual discoloration. What should we do with them?', NULL, NULL, '2024-04-28 13:49:51'),
(17, NULL, 'Please set aside the tomatoes with discoloration for inspection. We\'ll assess the quality and determine if they can be salvaged or need to be discarded.', '2024-04-16 15:51:47', NULL),
(13, 'Is there a specific protocol for inspecting incoming shipments of produce for quality control?\n', NULL, NULL, '2024-04-28 13:50:43'),
(14, NULL, 'For leafy greens, ensure they are stored in a cool, dry place away from direct sunlight. Consider using perforated bags or containers to maintain airflow and prevent wilting', '2024-04-16 15:17:34', NULL),
(18, 'Can you provide guidance on how to handle a customer request for a special order of organic vegetables?\n', NULL, NULL, '2024-04-28 13:50:55'),
(20, 'What is the recommended procedure for disposing of expired or spoiled vegetables?\n\n\n\n\n', NULL, NULL, '2024-04-28 13:51:21');

--
-- Triggers `ccm_chat`
--
DROP TRIGGER IF EXISTS `ccm_chat_admin_reply_trigger`;
DELIMITER $$
CREATE TRIGGER `ccm_chat_admin_reply_trigger` BEFORE INSERT ON `ccm_chat` FOR EACH ROW BEGIN
    -- Check if the admin_reply column is not null
    IF NEW.admin_reply IS NOT NULL THEN
        -- Insert the new admin_reply value into the ccmnotifications table
        INSERT INTO ccmnotifications (admin_reply, action, time)
        VALUES (NEW.admin_reply, 'reply', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ccm_chat_admin_reply_triggeradmin`;
DELIMITER $$
CREATE TRIGGER `ccm_chat_admin_reply_triggeradmin` BEFORE INSERT ON `ccm_chat` FOR EACH ROW BEGIN
    -- Check if the admin_reply column is not null
    IF NEW.ccm_reply IS NOT NULL THEN
        -- Insert the new admin_reply value into the ccmnotifications table
        INSERT INTO adminnotifications (ccm_reply, action, time)
        VALUES (NEW.ccm_reply, 'reply', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_ccmcreated_at`;
DELIMITER $$
CREATE TRIGGER `update_ccmcreated_at` BEFORE UPDATE ON `ccm_chat` FOR EACH ROW BEGIN
    IF NEW.ccm_reply != OLD.ccm_reply THEN
        SET NEW.created_at = CURRENT_TIMESTAMP;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `driverinfo`
--

DROP TABLE IF EXISTS `driverinfo`;
CREATE TABLE IF NOT EXISTS `driverinfo` (
  `D_id` int NOT NULL AUTO_INCREMENT,
  `D_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `D_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `D_contact` int NOT NULL,
  `D_address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DateJoined` date NOT NULL,
  PRIMARY KEY (`D_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driverinfo`
--

INSERT INTO `driverinfo` (`D_id`, `D_name`, `D_email`, `D_contact`, `D_address`, `DateJoined`) VALUES
(19, 'John', 'john@gmail.com', 762887272, '267/11, Colombo 08', '2022-11-09'),
(20, 'Alice', 'alice@gmail.com', 1234567890, '123 Main Street', '2022-10-15'),
(21, 'Bob', 'bob@gmail.com', 2147483647, '456 Elm Street', '2022-09-20'),
(22, 'Eva', 'eva@gmail.com', 2147483647, '789 Oak Street', '2022-08-05'),
(23, 'Michael', 'michael@gmail.com', 1112223333, '101 Pine Street', '2022-07-01'),
(24, 'Siripala', 'siripala@email.com', 772255668, '250/14, Kolonnawa', '2024-02-08'),
(25, 'Jothipala', 'jothipala@email.com', 12233333, '1222 Reid Ave', '2024-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `farmernotifications`
--

DROP TABLE IF EXISTS `farmernotifications`;
CREATE TABLE IF NOT EXISTS `farmernotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `purchase_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  `admin_reply` varchar(255) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `farmernotifications`
--

INSERT INTO `farmernotifications` (`id`, `user_id`, `order_id`, `action`, `status`, `time`, `purchase_id`, `product_name`, `price`, `inquiry`, `admin_reply`, `is_read`) VALUES
(1, 44, 7, 'status_update', 'Approved', '2024-04-21 17:39:04', NULL, NULL, NULL, NULL, NULL, 0),
(2, NULL, NULL, 'new purchase order', NULL, '2024-04-22 15:40:05', 27, 'Potato', NULL, NULL, NULL, 0),
(4, NULL, NULL, 'price_update', 'decreased', '2024-04-22 17:03:13', NULL, 'Brinjal', '158.00', NULL, NULL, 0),
(8, 55, 46, 'payment_update', 'Pending', '2024-04-22 17:23:44', NULL, 'Carrot', '1794.00', NULL, NULL, 0),
(9, 55, 74, 'payment_update', 'Pending', '2024-04-22 17:26:56', NULL, 'Ginger', '5070.00', NULL, NULL, 0),
(10, 55, 46, 'payment_update', 'Completed', '2024-04-22 17:31:44', NULL, 'Carrot', '1794.00', NULL, NULL, 0),
(11, 44, 7, 'status_update', 'Rejected', '2024-04-22 17:32:26', NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, NULL, 'price_update', 'increased', '2024-04-22 17:33:06', NULL, 'Brinjal', '170.00', NULL, NULL, 0),
(13, 55, NULL, 'reply', NULL, '2024-04-22 17:49:24', NULL, NULL, NULL, 'helloo\r\n', 'nithushanan', 0),
(14, 55, NULL, 'replyupdate', NULL, '2024-04-22 17:49:51', NULL, NULL, NULL, 'helloo\r\n', 'nithushan', 0),
(15, 78, NULL, 'reply', NULL, '2024-04-22 18:02:49', NULL, NULL, NULL, 'ow wow', 'ghvgjb', 0),
(16, 78, NULL, 'replyupdate', NULL, '2024-04-22 18:03:11', NULL, NULL, NULL, 'ow wow', 'hbjhj', 0),
(17, 55, 73, 'status_update', 'Rejected', '2024-04-23 10:42:24', NULL, NULL, NULL, NULL, NULL, 0),
(18, 55, 46, 'payment_update', 'pending', '2024-04-23 12:04:14', NULL, 'Carrot', '1794.00', NULL, NULL, 0),
(19, 55, 69, 'payment_update', 'pending', '2024-04-23 12:04:25', NULL, 'Cabbage', '5785.00', NULL, NULL, 0),
(28, 55, 75, 'status_update', 'Approved', '2024-04-24 17:13:01', NULL, NULL, NULL, NULL, NULL, 0),
(27, 55, 69, 'status_update', 'Quality Approved', '2024-04-24 16:51:38', NULL, NULL, NULL, NULL, NULL, 0),
(26, 55, 40, 'status_update', 'Completed', '2024-04-24 06:53:02', NULL, NULL, NULL, NULL, NULL, 0),
(25, 55, 80, 'status_update', 'Completed', '2024-04-23 16:20:34', NULL, NULL, NULL, NULL, NULL, 0),
(29, 55, 75, 'status_update', 'Quality Approved', '2024-04-24 17:13:38', NULL, NULL, NULL, NULL, NULL, 0),
(30, 55, 75, 'status_update', 'Approved', '2024-04-24 17:22:35', NULL, NULL, NULL, NULL, NULL, 0),
(31, 55, 86, 'status_update', 'Approved', '2024-04-24 17:22:35', NULL, NULL, NULL, NULL, NULL, 0),
(32, 55, 64, 'status_update', 'Quality Approved', '2024-04-24 17:56:16', NULL, NULL, NULL, NULL, NULL, 0),
(33, 55, 71, 'status_update', 'Quality Approved', '2024-04-24 18:06:52', NULL, NULL, NULL, NULL, NULL, 0),
(34, 55, 71, 'status_update', 'Rejected', '2024-04-24 18:06:54', NULL, NULL, NULL, NULL, NULL, 0),
(35, 55, 71, 'status_update', 'Quality Approved', '2024-04-24 18:07:00', NULL, NULL, NULL, NULL, NULL, 0),
(36, 55, 71, 'status_update', 'Rejected', '2024-04-24 18:07:03', NULL, NULL, NULL, NULL, NULL, 0),
(37, 55, 75, 'status_update', 'Quality Rejected', '2024-04-24 18:11:25', NULL, NULL, NULL, NULL, NULL, 0),
(38, 55, 75, 'status_update', 'Quality Approved', '2024-04-24 18:11:28', NULL, NULL, NULL, NULL, NULL, 0),
(39, 55, 86, 'status_update', 'Quality Rejected', '2024-04-24 18:21:49', NULL, NULL, NULL, NULL, NULL, 0),
(40, 55, 71, 'status_update', 'Approved', '2024-04-24 18:39:02', NULL, NULL, NULL, NULL, NULL, 0),
(41, 55, 71, 'status_update', 'Rejected', '2024-04-24 18:39:25', NULL, NULL, NULL, NULL, NULL, 0),
(42, 55, 84, 'status_update', 'Approved', '2024-04-24 18:52:48', NULL, NULL, NULL, NULL, NULL, 0),
(43, 55, 84, 'status_update', 'Quality Approved', '2024-04-24 18:53:06', NULL, NULL, NULL, NULL, NULL, 0),
(44, 55, 90, 'status_update', 'Approved', '2024-04-24 18:56:42', NULL, NULL, NULL, NULL, NULL, 0),
(45, 55, 86, 'status_update', 'Approved', '2024-04-25 07:08:54', NULL, NULL, NULL, NULL, NULL, 0),
(46, 55, 86, 'status_update', 'Quality Approved', '2024-04-25 07:10:53', NULL, NULL, NULL, NULL, NULL, 0),
(47, 55, 90, 'status_update', 'Quality Approved', '2024-04-25 07:12:02', NULL, NULL, NULL, NULL, NULL, 0),
(48, 55, 76, 'status_update', 'Approved', '2024-04-25 07:55:35', NULL, NULL, NULL, NULL, NULL, 0),
(49, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:34:11', NULL, 'Carrot', '440.00', NULL, NULL, 0),
(50, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:34:34', NULL, 'Onions', '470.00', NULL, NULL, 0),
(51, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:34:59', NULL, 'Onions', '650.00', NULL, NULL, 0),
(52, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:35:35', NULL, 'Brinjal', '340.00', NULL, NULL, 0),
(53, NULL, NULL, 'price_update', 'decreased', '2024-04-25 16:39:08', NULL, 'Tomato', '160.00', NULL, NULL, 0),
(54, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:39:54', NULL, 'Beans', '450.00', NULL, NULL, 0),
(55, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:41:38', NULL, 'Ginger', '3650.00', NULL, NULL, 0),
(56, NULL, NULL, 'price_update', 'decreased', '2024-04-25 16:41:48', NULL, 'Ginger', '3160.00', NULL, NULL, 0),
(57, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:42:22', NULL, 'Capsicum', '1380.00', NULL, NULL, 0),
(58, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:42:54', NULL, 'Cabbage', '210.00', NULL, NULL, 0),
(59, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:43:18', NULL, 'Cucumber', '480.00', NULL, NULL, 0),
(60, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:43:50', NULL, 'Corriander', '200.00', NULL, NULL, 0),
(61, NULL, NULL, 'price_update', 'decreased', '2024-04-25 16:44:22', NULL, 'Pumpkin', '150.00', NULL, NULL, 0),
(62, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:46:42', NULL, 'Chillie', '300.00', NULL, NULL, 0),
(63, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:47:11', NULL, 'Leeks', '220.00', NULL, NULL, 0),
(64, NULL, NULL, 'price_update', 'increased', '2024-04-25 16:47:38', NULL, 'Potato', '430.00', NULL, NULL, 0),
(65, 55, 64, 'status_update', 'Pending Approval', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(66, 55, 69, 'status_update', 'Pending Approval', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(67, 55, 75, 'status_update', 'Approved', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(68, 55, 84, 'status_update', 'Pending Approval', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(69, 55, 86, 'status_update', 'Pending Approval', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(70, 55, 90, 'status_update', 'Pending Approval', '2024-04-26 06:11:58', NULL, NULL, NULL, NULL, NULL, 0),
(71, 55, 75, 'status_update', 'Quality Approved', '2024-04-26 07:15:43', NULL, NULL, NULL, NULL, NULL, 0),
(72, NULL, NULL, 'new purchase order', NULL, '2024-04-26 07:51:22', 28, 'Capsicum', NULL, NULL, NULL, 0),
(73, 55, 75, 'status_update', 'Pending Approval', '2024-04-26 08:40:44', NULL, NULL, NULL, NULL, NULL, 0),
(74, 55, 84, 'status_update', 'Approved', '2024-04-26 08:40:44', NULL, NULL, NULL, NULL, NULL, 0),
(75, 55, 76, 'status_update', 'Quality Approved', '2024-04-26 09:07:46', NULL, NULL, NULL, NULL, NULL, 0),
(76, 55, 84, 'status_update', 'Quality Approved', '2024-04-26 09:08:10', NULL, NULL, NULL, NULL, NULL, 0),
(77, 55, 86, 'status_update', 'Approved', '2024-04-26 18:08:45', NULL, NULL, NULL, NULL, NULL, 0),
(78, 55, 102, 'status_update', 'Rejected', '2024-04-26 18:08:51', NULL, NULL, NULL, NULL, NULL, 0),
(80, 55, 64, 'status_update', 'Approved', '2024-04-27 07:37:16', NULL, NULL, NULL, NULL, NULL, 0),
(81, 55, 89, 'status_update', 'Approved', '2024-04-27 10:26:56', NULL, NULL, NULL, NULL, NULL, 0),
(82, 55, 99, 'status_update', 'Approved', '2024-04-27 13:29:33', NULL, NULL, NULL, NULL, NULL, 0),
(83, 55, 89, 'status_update', 'Quality Approved', '2024-04-27 13:42:53', NULL, NULL, NULL, NULL, NULL, 0),
(84, 55, 89, 'request', NULL, '2024-04-27 13:45:58', NULL, 'Ginger', NULL, NULL, NULL, 0),
(89, 55, 84, 'collected', NULL, '2024-04-27 14:16:39', NULL, 'Pumpkin', NULL, NULL, NULL, 0),
(88, 55, 84, 'outforpickup', NULL, '2024-04-27 14:15:52', NULL, 'Pumpkin', NULL, NULL, NULL, 0),
(90, 44, 7, 'status_update', 'Approved', '2024-04-27 15:50:56', NULL, NULL, NULL, NULL, NULL, 0),
(91, 55, 76, 'status_update', 'Quality Rejected', '2024-04-28 04:49:43', NULL, NULL, NULL, NULL, NULL, 0),
(92, 55, 103, 'status_update', 'Approved', '2024-04-28 04:56:39', NULL, NULL, NULL, NULL, NULL, 0),
(93, 55, 96, 'status_update', 'Approved', '2024-04-28 07:09:06', NULL, NULL, NULL, NULL, NULL, 0),
(94, 55, 103, 'status_update', 'Quality Rejected', '2024-04-28 07:20:55', NULL, NULL, NULL, NULL, NULL, 0),
(95, 78, NULL, 'replyupdate', NULL, '2024-04-28 08:30:21', NULL, NULL, NULL, 'Are there any discounts or promotions available for bulk orders or regular customers?', 'hbjhj', 0),
(96, 55, NULL, 'reply', NULL, '2024-04-28 08:32:26', NULL, NULL, NULL, 'How do I update or add new products to my online inventory?', 'You can easily update or add new products to your online inventory by accessing your account dashboard and selecting the \'Add Product\' or \'Edit Product\' option. Follow the prompts to input product details, including name, description, price, and images', 0),
(97, 55, NULL, 'reply', NULL, '2024-04-28 08:33:36', NULL, NULL, NULL, 'how to place an order', 'You can easily place an order  by accessing your account dashboard and selecting the order  option. Follow the prompts to input product details, including name, description, price, and images', 0),
(98, 55, 84, 'completed', NULL, '2024-04-28 12:00:19', NULL, 'Pumpkin', NULL, NULL, NULL, 0),
(99, 55, 89, 'outforpickup', NULL, '2024-04-28 12:09:49', NULL, 'Ginger', NULL, NULL, NULL, 0),
(100, 55, 89, 'collected', NULL, '2024-04-28 12:09:50', NULL, 'Ginger', NULL, NULL, NULL, 0),
(101, 55, 89, 'completed', NULL, '2024-04-28 12:09:51', NULL, 'Ginger', NULL, NULL, NULL, 0),
(102, 55, 89, 'status_update', 'completed', '2024-04-28 12:09:51', NULL, NULL, NULL, NULL, NULL, 0),
(103, 55, 89, 'status_update', 'Quality Approved', '2024-04-28 12:19:14', NULL, NULL, NULL, NULL, NULL, 0),
(104, 55, 89, 'outforpickup', NULL, '2024-04-28 12:20:25', NULL, 'Ginger', NULL, NULL, NULL, 0),
(105, 55, 89, 'collected', NULL, '2024-04-28 12:20:25', NULL, 'Ginger', NULL, NULL, NULL, 0),
(112, 55, 84, 'collected', NULL, '2024-04-28 14:21:59', NULL, 'Pumpkin', NULL, NULL, NULL, 0),
(113, 55, 100, 'status_update', 'Approved', '2024-04-28 14:27:15', NULL, NULL, NULL, NULL, NULL, 0),
(111, 55, 84, 'outforpickup', NULL, '2024-04-28 14:21:58', NULL, 'Pumpkin', NULL, NULL, NULL, 0),
(114, 55, 100, 'status_update', 'Quality Approved', '2024-04-28 14:27:59', NULL, NULL, NULL, NULL, NULL, 0),
(115, 55, 100, 'request', NULL, '2024-04-28 14:30:43', NULL, 'Cucumber', NULL, NULL, NULL, 0),
(116, 55, 100, 'outforpickup', NULL, '2024-04-28 14:30:47', NULL, 'Cucumber', NULL, NULL, NULL, 0),
(117, 55, 100, 'collected', NULL, '2024-04-28 14:30:48', NULL, 'Cucumber', NULL, NULL, NULL, 0),
(118, 55, 100, 'status_update', 'Completed', '2024-04-28 14:30:50', NULL, NULL, NULL, NULL, NULL, 0),
(119, 55, 75, 'status_update', 'Approved', '2024-04-28 16:09:01', NULL, NULL, NULL, NULL, NULL, 0),
(120, 55, 76, 'status_update', 'Pending Approval', '2024-04-28 16:09:01', NULL, NULL, NULL, NULL, NULL, 0),
(121, 55, 103, 'status_update', 'Pending Approval', '2024-04-28 16:09:01', NULL, NULL, NULL, NULL, NULL, 0),
(122, 67, 106, 'status_update', 'Approved', '2024-04-29 10:35:23', NULL, NULL, NULL, NULL, NULL, 0),
(123, 67, 106, 'status_update', 'Quality Approved', '2024-04-29 10:37:35', NULL, NULL, NULL, NULL, NULL, 0),
(124, NULL, NULL, 'new purchase order', NULL, '2024-04-29 12:12:15', 29, 'gINGER', NULL, NULL, NULL, 0),
(125, 67, 107, 'status_update', 'Approved', '2024-04-29 14:00:33', NULL, NULL, NULL, NULL, NULL, 0),
(208, 55, 75, 'collected', NULL, '2024-04-30 05:15:35', NULL, 'Capsicum', NULL, NULL, NULL, 1),
(209, 55, 75, 'status_update', 'Completed', '2024-04-30 05:15:36', NULL, NULL, NULL, NULL, NULL, 1),
(134, 55, 99, 'status_update', 'Pending Approval', '2024-04-29 14:13:36', NULL, NULL, NULL, NULL, NULL, 0),
(203, 55, 100, 'status_update', 'Quality Approved', '2024-04-30 04:03:38', NULL, NULL, NULL, NULL, NULL, 1),
(204, 55, 75, 'status_update', 'Quality Approved', '2024-04-30 04:09:28', NULL, NULL, NULL, NULL, NULL, 1),
(205, 55, 75, 'request', NULL, '2024-04-30 05:13:42', NULL, 'Capsicum', NULL, NULL, NULL, 1),
(206, 55, 100, 'status_update', 'Completed', '2024-04-30 05:14:38', NULL, NULL, NULL, NULL, NULL, 1),
(207, 55, 75, 'outforpickup', NULL, '2024-04-30 05:15:34', NULL, 'Capsicum', NULL, NULL, NULL, 1),
(142, 55, 76, 'status_update', 'Pending Approval', '2024-04-29 14:15:42', NULL, NULL, NULL, NULL, NULL, 0),
(143, 55, 99, 'status_update', 'Pending Approval', '2024-04-29 14:15:42', NULL, NULL, NULL, NULL, NULL, 0),
(144, 55, 100, 'status_update', 'Pending Approval', '2024-04-29 14:15:42', NULL, NULL, NULL, NULL, NULL, 0),
(145, 55, 101, 'status_update', 'Pending Approval', '2024-04-29 14:15:42', NULL, NULL, NULL, NULL, NULL, 0),
(146, 65, 104, 'status_update', 'Approved', '2024-04-29 14:15:42', NULL, NULL, NULL, NULL, NULL, 0),
(147, 55, 64, 'status_update', '', '2024-04-29 14:16:02', NULL, NULL, NULL, NULL, NULL, 0),
(202, 55, 105, 'status_update', 'Quality Approved', '2024-04-30 04:03:29', NULL, NULL, NULL, NULL, NULL, 1),
(201, 55, 103, 'status_update', 'Quality Rejected', '2024-04-29 17:24:04', NULL, NULL, NULL, NULL, NULL, 1),
(152, 55, 64, 'status_update', 'Pending Approval', '2024-04-29 14:17:35', NULL, NULL, NULL, NULL, NULL, 0),
(153, 55, 76, 'status_update', 'Pending Approval', '2024-04-29 14:17:38', NULL, NULL, NULL, NULL, NULL, 0),
(154, 55, 99, 'status_update', 'Pending Approval', '2024-04-29 14:17:42', NULL, NULL, NULL, NULL, NULL, 0),
(155, 55, 100, 'status_update', 'Pending Approval', '2024-04-29 14:17:44', NULL, NULL, NULL, NULL, NULL, 0),
(156, 55, 101, 'status_update', 'Pending Approval', '2024-04-29 14:17:47', NULL, NULL, NULL, NULL, NULL, 0),
(200, 65, 104, 'status_update', 'Quality Approved', '2024-04-29 17:23:40', NULL, NULL, NULL, NULL, NULL, 1),
(199, 55, 98, 'status_update', 'Approved', '2024-04-29 17:17:01', NULL, NULL, NULL, NULL, NULL, 1),
(198, 67, 108, 'status_update', 'Quality Approved', '2024-04-29 14:56:21', NULL, NULL, NULL, NULL, NULL, 0),
(196, 55, 101, 'status_update', 'Rejected', '2024-04-29 14:51:32', NULL, NULL, NULL, NULL, NULL, 0),
(197, 67, 108, 'status_update', 'Approved', '2024-04-29 14:53:58', NULL, NULL, NULL, NULL, NULL, 0),
(164, 55, 100, 'status_update', 'Pending Approval', '2024-04-29 14:20:05', NULL, NULL, NULL, NULL, NULL, 0),
(165, 55, 101, 'status_update', 'Pending Approval', '2024-04-29 14:20:08', NULL, NULL, NULL, NULL, NULL, 0),
(166, 55, 64, 'status_update', 'Pending Approval', '2024-04-29 14:20:27', NULL, NULL, NULL, NULL, NULL, 0),
(195, 55, 64, 'status_update', 'Approved', '2024-04-29 14:51:23', NULL, NULL, NULL, NULL, NULL, 0),
(168, 55, 76, 'status_update', '', '2024-04-29 14:20:32', NULL, NULL, NULL, NULL, NULL, 0),
(169, 55, 99, 'status_update', '', '2024-04-29 14:20:32', NULL, NULL, NULL, NULL, NULL, 0),
(170, 55, 100, 'status_update', '', '2024-04-29 14:20:32', NULL, NULL, NULL, NULL, NULL, 0),
(171, 55, 101, 'status_update', '', '2024-04-29 14:20:32', NULL, NULL, NULL, NULL, NULL, 0),
(172, 55, 64, 'status_update', 'Pending Approval', '2024-04-29 14:21:42', NULL, NULL, NULL, NULL, NULL, 0),
(173, 55, 76, 'status_update', 'Pending Approval', '2024-04-29 14:21:44', NULL, NULL, NULL, NULL, NULL, 0),
(174, 55, 99, 'status_update', 'Pending Approval', '2024-04-29 14:21:48', NULL, NULL, NULL, NULL, NULL, 0),
(190, 67, 107, 'status_update', 'Rejected', '2024-04-29 14:28:53', NULL, NULL, NULL, NULL, NULL, 0),
(191, 55, 101, 'status_update', 'Approved', '2024-04-29 14:29:49', NULL, NULL, NULL, NULL, NULL, 0),
(193, 55, 99, 'status_update', 'Approved', '2024-04-29 14:35:45', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

DROP TABLE IF EXISTS `farmers`;
CREATE TABLE IF NOT EXISTS `farmers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `name`, `username`, `email`, `nic`, `mobile`, `password`) VALUES
(1, 'Liviru Samarawickrama', 'liviru', 'liviru.samarawickrama@gmail.com', '200133402097', '0710357456', '$2y$10$erMhUkUXCcrf0kg4db1FfOjz7lK/EFXW5VwxDqGdl6rUGcfFLvbiK'),
(2, 'Mahogha Harith', 'mahogha', 'maho@gmail.com', '20006543526', '0715654321', '$2y$10$rjBb88c5qURKuTzVa9KpXeBuRxWKM12I/YDK9a4ae6yVW659lmlF.'),
(3, 'Liviru Samarawickrama', 'kasun', '2021@gmail.com', '200133402097', '0710357456', '$2y$10$fL3XFeFXzptf9DGoFMfWHOGg7mwrtLW9//5boM1gxqJm2okz0FCqa');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inquiry` text NOT NULL,
  `admin_reply` text,
  `admin_reply_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `user_id`, `username`, `contact_no`, `email`, `inquiry`, `admin_reply`, `admin_reply_time`, `created_at`) VALUES
(1, 78, 'wasri', '763535243', 'cusherahkugan@gmail.com', 'Are there any discounts or promotions available for bulk orders or regular customers?', 'hbjhj', '2024-04-22 18:03:11', '2024-04-15 18:14:18'),
(18, 55, 'wasri', '763535243', 'cusherahkugan@gmail.com', 'how to place an order', 'You can easily place an order  by accessing your account dashboard and selecting the order  option. Follow the prompts to input product details, including name, description, price, and images', '2024-04-17 05:24:46', '2024-04-17 05:24:46'),
(9, 55, 'wasri', '763535243', 'cusherahkugan@gmail.com', 'How do I track the status of my order once it\'s been placed?', NULL, '2024-04-15 20:16:03', '2024-04-15 20:16:03'),
(10, 55, 'wasri', '763535243', 'cusherahkugan@gmail.com', 'how can i get help???', NULL, '2024-04-15 20:16:28', '2024-04-15 20:16:28'),
(11, 55, 'wasri', '763535243', 'cusherahkugan@gmail.com', 'How do I update or add new products to my online inventory?', 'You can easily update or add new products to your online inventory by accessing your account dashboard and selecting the \'Add Product\' or \'Edit Product\' option. Follow the prompts to input product details, including name, description, price, and images', '2024-04-15 20:16:59', '2024-04-15 20:16:59');

--
-- Triggers `inquiry`
--
DROP TRIGGER IF EXISTS `inquiry_admin_reply_trigger`;
DELIMITER $$
CREATE TRIGGER `inquiry_admin_reply_trigger` AFTER UPDATE ON `inquiry` FOR EACH ROW BEGIN
    IF OLD.admin_reply IS NULL AND NEW.admin_reply IS NOT NULL THEN
        INSERT INTO farmernotifications (inquiry, admin_reply, time, user_id, action)
        VALUES (NEW.inquiry, NEW.admin_reply, NOW(), NEW.user_id, 'reply');
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `inquiry_admin_reply_triggeradmin`;
DELIMITER $$
CREATE TRIGGER `inquiry_admin_reply_triggeradmin` BEFORE INSERT ON `inquiry` FOR EACH ROW BEGIN
    IF NEW.inquiry IS NOT NULL THEN
        INSERT INTO adminnotifications (inquiry, action, time)
        VALUES (NEW.inquiry, 'farmerreply', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `inquiry_admin_reply_update_trigger`;
DELIMITER $$
CREATE TRIGGER `inquiry_admin_reply_update_trigger` AFTER UPDATE ON `inquiry` FOR EACH ROW BEGIN
    IF OLD.admin_reply IS NOT NULL AND NEW.admin_reply IS NOT NULL THEN
        INSERT INTO farmernotifications (inquiry, admin_reply, time, user_id, action)
        VALUES (NEW.inquiry, NEW.admin_reply, NOW(), NEW.user_id, 'replyupdate');
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_admin_reply_time`;
DELIMITER $$
CREATE TRIGGER `update_admin_reply_time` BEFORE UPDATE ON `inquiry` FOR EACH ROW BEGIN
    IF NEW.admin_reply <> OLD.admin_reply THEN
        SET NEW.admin_reply_time = CURRENT_TIMESTAMP;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inspector`
--

DROP TABLE IF EXISTS `inspector`;
CREATE TABLE IF NOT EXISTS `inspector` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `collectioncenter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inspector`
--

INSERT INTO `inspector` (`admin_id`, `admin_username`, `admin_password`, `reset_token_expire`, `reset_token`, `email`, `collectioncenter`) VALUES
(1, 'qi', '$2y$10$Zqc99CO2n3W28j8pmQqJI.Rd3BTcAKBZEjiaixj7E2T.Bq932zXSe', NULL, NULL, 'tkugananthy@gmail.com', 'Bandarawela Keells collection center');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

DROP TABLE IF EXISTS `inventory_history`;
CREATE TABLE IF NOT EXISTS `inventory_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity_change` int DEFAULT NULL,
  `change_date` datetime NOT NULL,
  `price_change` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventory_product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `product_id`, `product_name`, `quantity_change`, `change_date`, `price_change`) VALUES
(1, 2, 'Carrot', 15, '2024-04-04 23:34:46', NULL),
(2, 2, 'Carrot', 22, '2024-04-04 23:35:15', NULL),
(8, 9, 'Leeks', -9, '2024-04-10 20:02:17', NULL),
(9, 8, 'Chillie', -56, '2024-04-10 20:02:21', NULL),
(10, 7, 'Cabbage', -57, '2024-04-10 20:02:25', NULL),
(11, 5, 'Brinjal', 56, '2024-04-10 20:04:16', NULL),
(12, 5, 'Brinjal', 89, '2024-04-10 20:05:31', NULL),
(13, 11, 'Cucumber', 0, '2024-04-10 20:20:21', NULL),
(14, 12, 'Cucumber', 34, '2024-04-10 20:22:40', NULL),
(15, 13, 'Tomato', 34, '2024-04-11 15:33:36', NULL),
(16, 13, 'Tomato', NULL, '2024-04-11 15:34:21', NULL),
(17, 14, 'Tomato', 65, '2024-04-11 15:39:45', NULL),
(18, 14, 'Tomato', 0, '2024-04-11 15:41:40', NULL),
(19, 12, 'Cucumber', 0, '2024-04-11 21:04:10', NULL),
(20, 6, 'Ladies Finger', 0, '2024-04-12 05:51:27', NULL),
(22, 10, 'Chillie', 0, '2024-04-12 22:35:23', '99.00'),
(23, 3, 'Garlic', 78, '2024-04-12 22:35:51', NULL),
(24, 3, 'Garlic', 0, '2024-04-12 22:35:51', '89.00'),
(25, 3, 'Garlic', 0, '2024-04-12 22:55:23', '46.00'),
(26, 5, 'Brinjal', 84, '2024-04-12 22:55:30', NULL),
(27, 2, 'Carrot', 19, '2024-04-12 22:57:26', NULL),
(28, 2, 'Carrot', 0, '2024-04-12 22:57:26', '49.00'),
(29, 15, 'Pumpkin', 24, '2024-04-13 10:29:59', NULL),
(31, 16, 'Pumpkin', 45, '2024-04-13 10:35:33', NULL),
(32, 22, 'Capsicum', 47, '2024-04-13 13:56:48', NULL),
(33, 10, 'Chillie', 79, '2024-04-13 13:58:14', NULL),
(34, 23, 'Capsicum', NULL, '2024-04-13 14:05:50', '24.00'),
(35, 24, 'Capsicum', NULL, '2024-04-13 14:09:40', '45.00'),
(36, 25, 'Capsicum', 54, '2024-04-13 16:01:36', NULL),
(37, 26, 'Capsicum', 35, '2024-04-13 16:09:49', NULL),
(38, 27, 'Capsicum', 29, '2024-04-13 16:17:46', NULL),
(39, 28, 'Capsicum', 87, '2024-04-13 16:25:11', NULL),
(40, 28, 'Capsicum', NULL, '2024-04-13 16:25:11', '78.00'),
(41, 29, 'Capsicum', 9, '2024-04-13 16:26:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

DROP TABLE IF EXISTS `paymentdetails`;
CREATE TABLE IF NOT EXISTS `paymentdetails` (
  `user_id` int NOT NULL,
  `bank_account_number` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`user_id`, `bank_account_number`, `account_name`, `bank`, `branch`) VALUES
(55, '78253675757', 'A M W Wasri', 'Bank of Ceylon (BOC)', 'colombo'),
(44, '78253664t5736', 'john', 'Sampath Bank (SAMP) ', 'colombo'),
(47, '475647839', 'tina', 'Sampath Bank (SAMP) ', 'galle');

-- --------------------------------------------------------

--
-- Table structure for table `paymentrequests`
--

DROP TABLE IF EXISTS `paymentrequests`;
CREATE TABLE IF NOT EXISTS `paymentrequests` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product` varchar(255) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `user_id` int NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paymentrequests`
--

INSERT INTO `paymentrequests` (`payment_id`, `order_id`, `product`, `totalprice`, `user_id`, `bank_account_number`, `account_name`, `bank`, `branch`, `status`, `receipt`) VALUES
(1, 70, 'Cabbage', '4005.00', 55, '78253675757', 'kugani', 'hnb', 'colombo', 'pending', ''),
(2, 77, 'Cucumber', '4212.00', 55, '78253675757', 'kugani', 'hnb', 'colombo', 'pending', ''),
(3, 4, 'Potato', '336.00', 47, '475647839', 'tina', 'ndb', 'galle', 'pending', ''),
(4, 5, 'Potato', '900.00', 47, '475647839', 'tina', 'ndb', 'galle', 'pending', ''),
(6, 46, 'Carrot', '1794.00', 55, '78253675757', 'kugani', 'hnb', 'colombo', 'pending', ''),
(7, 74, 'Ginger', '5070.00', 55, '78253675757', 'kugani', 'hnb', 'colombo', 'pending', ''),
(8, 69, 'Cabbage', '5785.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(9, 82, 'Carrot', '6566.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(10, 80, 'Beans', '6942.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(11, 40, 'Leeks', '3780.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(13, 89, 'Ginger', '4005.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(14, 84, 'Pumpkin', '6370.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(15, 100, 'Cucumber', '4410.00', 55, '78253675757', 'wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', ''),
(16, 75, 'Capsicum', '6396.00', 55, '78253675757', 'A M W Wasri', 'Bank of Ceylon (BOC)', 'colombo', 'pending', '');

--
-- Triggers `paymentrequests`
--
DROP TRIGGER IF EXISTS `payment_update_trigger`;
DELIMITER $$
CREATE TRIGGER `payment_update_trigger` AFTER UPDATE ON `paymentrequests` FOR EACH ROW BEGIN
    IF OLD.status <> NEW.status THEN
        INSERT INTO farmernotifications (action, order_id, user_id, status, product_name, price)
        VALUES ('payment_update', NEW.order_id, NEW.user_id, NEW.status, NEW.product, NEW.totalprice);
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `paymentrequests_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `paymentrequests_insert_trigger` AFTER INSERT ON `paymentrequests` FOR EACH ROW BEGIN
    INSERT INTO adminnotifications (order_id, user_id, product, totalprice, action, time)
    VALUES (NEW.order_id, NEW.user_id, NEW.product, NEW.totalprice, 'payment', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`product_id`, `name`, `image`, `price`) VALUES
(1, 'Carrot', 'http://localhost/Farmtokeells/public/images/carrot.png', '440.00'),
(3, 'Brinjal', 'http://localhost/Farmtokeells/public/images/brinjal.png', '340.00'),
(4, 'Onions', 'http://localhost/Farmtokeells/public/images/onion.png', '650.00'),
(5, 'Tomato', 'http://localhost/Farmtokeells/public/images/tomato.png', '160.00'),
(7, 'Beans', 'http://localhost/Farmtokeells/public/images/beans.png', '450.00'),
(8, 'Ginger', 'http://localhost/Farmtokeells/public/images/ginger.png', '3160.00'),
(9, 'Capsicum', 'http://localhost/Farmtokeells/public/images/capsicum.png', '1380.00'),
(10, 'Cabbage', 'http://localhost/Farmtokeells/public/images/cabbage.png', '210.00'),
(11, 'Cucumber', 'http://localhost/Farmtokeells/public/images/cucumber.png', '480.00'),
(12, 'Corriander', 'http://localhost/Farmtokeells/public/images/corriander.png', '200.00'),
(13, 'Pumpkin', 'http://localhost/Farmtokeells/public/images/pumpkin.png', '150.00'),
(14, 'Chillie', 'http://localhost/Farmtokeells/public/images/chillie.png', '300.00'),
(15, 'Leeks', 'http://localhost/Farmtokeells/public/images/leeks.png', '220.00'),
(16, 'Broccoli', 'http://localhost/Farmtokeells/public/images/broccoli.png', '105.27'),
(17, 'Potato', 'http://localhost/Farmtokeells/public/images/potato.png', '430.00');

--
-- Triggers `price`
--
DROP TRIGGER IF EXISTS `price_update_trigger`;
DELIMITER $$
CREATE TRIGGER `price_update_trigger` AFTER UPDATE ON `price` FOR EACH ROW BEGIN
    INSERT INTO farmernotifications (action, time, product_name, price, status)
    VALUES ('price_update', NOW(), NEW.name, NEW.price, 
            CASE
                WHEN NEW.price > OLD.price THEN 'increased'
                WHEN NEW.price < OLD.price THEN 'decreased'
                ELSE 'unchanged'
            END);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `poor_quantity` int DEFAULT '0',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `type`, `quantity`, `price`, `image`, `poor_quantity`, `time`, `status`) VALUES
(2, 'Carrot', 'Organic', 78, 36, 'http://localhost/Farmtokeells/public/images/carrot.png', 23, '2024-04-20 19:11:31', ''),
(3, 'Garlic', 'Organic', 46, 49, 'http://localhost/Farmtokeells/public/images/garlic.png', 0, '2024-04-20 18:52:14', ''),
(5, 'Brinjal', 'Organic', 89, 90, 'http://localhost/Farmtokeells/public/images/brinjal.png', 0, '2024-04-20 18:52:14', ''),
(10, 'Chillie', 'Hill Count', 37, 28, 'http://localhost/Farmtokeells/public/images/chillie.png', 0, '2024-04-20 18:52:14', ''),
(32, 'Capsicum', 'Hill Count', 23, 34, 'http://localhost/Farmtokeells/public/images/capsicum.png', NULL, '2024-04-30 09:27:43', 'Active'),
(33, 'Ginger', 'Hill Count', 25, 34, 'http://localhost/Farmtokeells/public/images/ginger.png', NULL, '2024-04-30 09:31:27', 'Inactive'),
(34, 'Beans', 'Hill Count', 56, 56, 'http://localhost/Farmtokeells/public/images/beans.png', NULL, '2024-04-30 09:34:52', 'Active');

--
-- Triggers `product`
--
DROP TRIGGER IF EXISTS `add_price_to_inventory_history`;
DELIMITER $$
CREATE TRIGGER `add_price_to_inventory_history` AFTER INSERT ON `product` FOR EACH ROW BEGIN
    INSERT INTO `product_history` (`product_id`, `product_name`, `price_change`, `change_date`)
    VALUES (NEW.product_id, NEW.name, NEW.price, NOW());
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `add_product_to_inventory_history`;
DELIMITER $$
CREATE TRIGGER `add_product_to_inventory_history` AFTER INSERT ON `product` FOR EACH ROW BEGIN
    INSERT INTO `product_history` (`product_id`, `product_name`, `quantity_change`, `change_date`)
    VALUES (NEW.product_id, NEW.name, NEW.quantity, NOW());
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `product_quantity_update_trigger`;
DELIMITER $$
CREATE TRIGGER `product_quantity_update_trigger` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    IF NEW.quantity < 10 THEN
        INSERT INTO adminnotifications (product, quantity, action, time)
        VALUES (NEW.name, NEW.quantity, 'low', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `product_quantity_update_triggerccm`;
DELIMITER $$
CREATE TRIGGER `product_quantity_update_triggerccm` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    IF NEW.quantity < 10 THEN
        INSERT INTO ccmnotifications (product, quantity, action, time)
        VALUES (NEW.name, NEW.quantity, 'low', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_price_to_inventory_history`;
DELIMITER $$
CREATE TRIGGER `update_price_to_inventory_history` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    IF OLD.price <> NEW.price THEN
        INSERT INTO `product_history` (`product_id`, `product_name`, `price_change`, `change_date`)
        VALUES (NEW.product_id, NEW.name, NEW.price, NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_quantity_to_inventory_history`;
DELIMITER $$
CREATE TRIGGER `update_quantity_to_inventory_history` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    IF OLD.quantity <> NEW.quantity THEN
        INSERT INTO `product_history` (`product_id`, `product_name`, `quantity_change`, `change_date`)
        VALUES (NEW.product_id, NEW.name, NEW.quantity, NOW());
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_history`
--

DROP TABLE IF EXISTS `product_history`;
CREATE TABLE IF NOT EXISTS `product_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity_change` int DEFAULT NULL,
  `change_date` datetime NOT NULL,
  `price_change` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inventory_product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_history`
--

INSERT INTO `product_history` (`id`, `product_id`, `product_name`, `quantity_change`, `change_date`, `price_change`) VALUES
(1, 27, 'Capsicum', 29, '2024-04-13 16:17:46', NULL),
(2, 28, 'Capsicum', 87, '2024-04-13 16:25:11', NULL),
(3, 29, 'Capsicum', 9, '2024-04-13 16:26:34', NULL),
(4, 29, 'Capsicum', NULL, '2024-04-13 16:26:34', '90.00'),
(5, 29, 'Capsicum', NULL, '2024-04-13 16:37:21', '67.00'),
(6, 29, 'Capsicum', 79, '2024-04-13 16:38:38', NULL),
(7, 3, 'Garlic', NULL, '2024-04-13 23:45:32', '171.00'),
(8, 3, 'Garlic', NULL, '2024-04-13 23:45:40', '182.00'),
(9, 2, 'Carrot', 67, '2024-04-14 10:55:09', NULL),
(10, 2, 'Carrot', NULL, '2024-04-14 10:55:12', '67.00'),
(11, 3, 'Garlic', 46, '2024-04-14 10:55:15', NULL),
(12, 3, 'Garlic', NULL, '2024-04-14 10:55:22', '67.00'),
(13, 5, 'Brinjal', NULL, '2024-04-14 10:55:26', '46.00'),
(14, 5, 'Brinjal', 35, '2024-04-14 10:55:31', NULL),
(15, 10, 'Chillie', 35, '2024-04-14 10:55:35', NULL),
(16, 10, 'Chillie', NULL, '2024-04-14 10:55:38', '25.00'),
(17, 16, 'Pumpkin', 27, '2024-04-14 10:55:42', NULL),
(18, 16, 'Pumpkin', NULL, '2024-04-14 10:55:46', '47.00'),
(19, 17, 'Beans', 89, '2024-04-14 10:55:53', NULL),
(20, 17, 'Beans', NULL, '2024-04-14 10:55:56', '26.00'),
(21, 18, 'Potato', 37, '2024-04-14 10:55:59', NULL),
(22, 18, 'Potato', NULL, '2024-04-14 10:56:02', '39.00'),
(23, 29, 'Capsicum', 46, '2024-04-14 10:56:05', NULL),
(24, 29, 'Capsicum', NULL, '2024-04-14 10:56:08', '49.00'),
(38, 17, 'Beans', NULL, '2024-04-14 11:10:08', '50.00'),
(26, 2, 'Carrot', NULL, '2024-04-14 10:57:00', '36.00'),
(27, 3, 'Garlic', 28, '2024-04-14 10:57:03', NULL),
(28, 3, 'Garlic', NULL, '2024-04-14 10:57:05', '49.00'),
(29, 5, 'Brinjal', 89, '2024-04-14 10:57:11', NULL),
(30, 5, 'Brinjal', NULL, '2024-04-14 10:57:13', '4636.00'),
(31, 5, 'Brinjal', NULL, '2024-04-14 10:57:20', '90.00'),
(32, 10, 'Chillie', 37, '2024-04-14 10:57:24', NULL),
(33, 10, 'Chillie', NULL, '2024-04-14 10:57:28', '28.00'),
(34, 16, 'Pumpkin', 46, '2024-04-14 10:57:31', NULL),
(35, 16, 'Pumpkin', NULL, '2024-04-14 10:57:37', '67.00'),
(36, 17, 'Beans', 47, '2024-04-14 10:57:42', NULL),
(37, 3, 'Garlic', 46, '2024-04-14 10:58:27', NULL),
(39, 29, 'Capsicum', 54, '2024-04-14 12:24:47', NULL),
(40, 29, 'Capsicum', NULL, '2024-04-14 12:24:54', '78.00'),
(41, 30, 'Ginger', 56, '2024-04-14 13:28:07', NULL),
(42, 30, 'Ginger', NULL, '2024-04-14 13:28:07', '89.00'),
(43, 2, 'Carrot', 63, '2024-04-17 16:34:54', NULL),
(44, 2, 'Carrot', 69, '2024-04-21 00:01:40', NULL),
(45, 2, 'Carrot', 78, '2024-04-21 00:01:52', NULL),
(46, 2, 'Carrot', 89, '2024-04-21 00:05:45', NULL),
(47, 31, 'Cabbage', NULL, '2024-04-21 00:06:29', '56.00'),
(48, 31, 'Cabbage', 89, '2024-04-21 00:06:29', NULL),
(49, 30, 'Ginger', 0, '2024-04-21 00:16:28', NULL),
(50, 2, 'Carrot', 0, '2024-04-21 00:28:06', NULL),
(51, 2, 'Carrot', 78, '2024-04-21 00:41:31', NULL),
(52, 29, 'Capsicum', 9, '2024-04-23 22:10:01', NULL),
(53, 32, 'Capsicum', 23, '2024-04-30 14:57:43', NULL),
(54, 32, 'Capsicum', NULL, '2024-04-30 14:57:43', '34.00'),
(55, 33, 'Ginger', 25, '2024-04-30 15:01:27', NULL),
(56, 33, 'Ginger', NULL, '2024-04-30 15:01:27', '34.00'),
(57, 34, 'Beans', 56, '2024-04-30 15:04:52', NULL),
(58, 34, 'Beans', NULL, '2024-04-30 15:04:52', '56.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `purchase_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  `purchase_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`purchase_id`, `name`, `type`, `quantity`, `date`, `purchase_status`, `image`, `price`) VALUES
(4, 'Potato', 'Organic', 87, '2024-04-30', 'Pending', 'http://localhost/Farmtokeells/public/images/potato.png', NULL),
(6, 'Carrot', 'Hillcountry', 63, '2024-04-12', 'Completed', 'http://localhost/Farmtokeells/public/images/carrot.png', NULL),
(8, 'Cabbage', 'Hillcountry', 45, '2024-04-25', 'Completed', 'http://localhost/Farmtokeells/public/images/cabbage.png', NULL),
(16, 'Cucumber', 'Organic', 89, '2024-04-24', 'Pending', 'http://localhost/Farmtokeells/public/images/cucumber.png', NULL),
(22, 'Corriander', 'Hill Country', 56, '2024-04-18', 'Completed', 'http://localhost/Farmtokeells/public/images/corriander.png', NULL),
(23, 'Capsicum', 'Organic', 98, '2024-04-30', 'Completed', 'http://localhost/Farmtokeells/public/images/capsicum.png', NULL),
(24, 'Ginger', 'Organic', 34, '2024-04-30', 'Completed', 'http://localhost/Farmtokeells/public/images/ginger.png', NULL),
(27, 'Potato', 'Hill Country', 87, '2024-05-11', 'Pending', 'http://localhost/Farmtokeells/public/images/potato.png', NULL),
(28, 'Capsicum', 'Hill Country', 67, '2024-05-03', 'Pending', 'http://localhost/Farmtokeells/public/images/capsicum.png', NULL);

--
-- Triggers `purchaseorder`
--
DROP TRIGGER IF EXISTS `new_purchase_notification`;
DELIMITER $$
CREATE TRIGGER `new_purchase_notification` AFTER INSERT ON `purchaseorder` FOR EACH ROW BEGIN
    INSERT INTO farmernotifications (purchase_id, product_name, action, time)
    VALUES (NEW.purchase_id, NEW.name, 'new purchase order', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `qinotifications`
--

DROP TABLE IF EXISTS `qinotifications`;
CREATE TABLE IF NOT EXISTS `qinotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_reply` text,
  `is_read` int DEFAULT '1',
  `order_id` int DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qinotifications`
--

INSERT INTO `qinotifications` (`id`, `user_id`, `product`, `action`, `time`, `admin_reply`, `is_read`, `order_id`, `user`) VALUES
(1, 55, 'Cucumber', 'order', '2024-04-27 13:29:33', NULL, 0, 99, 'wasri'),
(2, 44, 'Carrot', 'order', '2024-04-27 15:50:56', NULL, 0, 7, 'Liviru Samarawickrama'),
(3, 55, 'Ginger', 'order', '2024-04-28 04:56:39', NULL, 0, 103, 'wasri'),
(4, 55, 'Ginger', 'order', '2024-04-28 07:09:06', NULL, 0, 96, 'wasri'),
(5, 55, 'Cucumber', 'order', '2024-04-28 14:27:15', NULL, 0, 100, 'wasri'),
(6, 55, 'Capsicum', 'order', '2024-04-28 16:09:01', NULL, 0, 75, 'wasri'),
(7, 67, 'Ginger', 'order', '2024-04-29 10:35:23', NULL, 0, 106, 'iflal'),
(8, 67, 'Corriander', 'order', '2024-04-29 14:00:33', NULL, 0, 107, 'iflal'),
(9, 65, 'Ginger', 'order', '2024-04-29 14:15:42', NULL, 0, 104, 'sathu'),
(10, 55, 'Cucumber', 'order', '2024-04-29 14:22:02', NULL, 0, 101, 'wasri'),
(11, 55, 'Ginger', 'order', '2024-04-29 14:28:40', NULL, 0, 103, 'wasri'),
(12, 55, 'Ginger', 'order', '2024-04-29 14:28:47', NULL, 0, 105, 'wasri'),
(13, 55, 'Cucumber', 'order', '2024-04-29 14:29:49', NULL, 0, 101, 'wasri'),
(14, 55, 'Cucumber', 'order', '2024-04-29 14:35:12', NULL, 0, 100, 'wasri'),
(15, 55, 'Cucumber', 'order', '2024-04-29 14:35:45', NULL, 0, 99, 'wasri'),
(16, 55, 'Cucumber', 'order', '2024-04-29 14:36:55', NULL, 0, 76, 'wasri'),
(17, 55, 'Cucumber', 'order', '2024-04-29 14:51:23', NULL, 0, 64, 'wasri'),
(18, 67, 'Beans', 'order', '2024-04-29 14:53:58', NULL, 0, 108, 'iflal'),
(19, 55, 'Ginger', 'order', '2024-04-29 17:17:01', NULL, 0, 98, 'wasri');

--
-- Triggers `qinotifications`
--
DROP TRIGGER IF EXISTS `usernamefill`;
DELIMITER $$
CREATE TRIGGER `usernamefill` BEFORE INSERT ON `qinotifications` FOR EACH ROW BEGIN
    -- Declare a variable to store the user's name
    DECLARE user_name VARCHAR(255);

    -- Retrieve the user's name based on the user_id
    SELECT name INTO user_name FROM users WHERE id = NEW.user_id;

    -- Set the user_name value in the new row
    SET NEW.user = user_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `req_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `active` int NOT NULL DEFAULT '1',
  `order_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`req_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `fk_order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `user_id`, `product_id`, `quantity`, `startdate`, `enddate`, `notes`, `active`, `order_id`, `product_name`, `address`) VALUES
(12, 55, NULL, 46, '2024-04-17', '2024-04-01', 'hb', 0, 46, 'carrot', 'ght'),
(13, 55, NULL, 82, '2024-05-03', '2024-05-02', 'hdbhsbch', 0, 75, 'Capsicum', 'jaffna'),
(17, 55, NULL, 98, '2024-04-30', '2024-05-11', '', 1, 84, 'Pumpkin', 'vavuniya');

--
-- Triggers `requests`
--
DROP TRIGGER IF EXISTS `create_notification_trigger`;
DELIMITER $$
CREATE TRIGGER `create_notification_trigger` AFTER INSERT ON `requests` FOR EACH ROW BEGIN
    INSERT INTO tmnotifications (user_id, order_id, action, time)
    VALUES (NEW.user_id, NEW.order_id, 'new request', CURRENT_TIMESTAMP);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

DROP TABLE IF EXISTS `salesorder`;
CREATE TABLE IF NOT EXISTS `salesorder` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_id` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending Approval',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `user_id` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_salesorder_purchase_id` (`purchase_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`order_id`, `name`, `type`, `quantity`, `date`, `address`, `purchase_id`, `status`, `image`, `user_id`, `price`) VALUES
(4, 'Potato', 'Organic', 6, '2023-11-03', 'badulla', 4, 'Completed', 'http://localhost/Farmtokeells/public/images/potato.png', 47, '56.00'),
(5, 'Potato', 'Organic', 20, '2024-04-27', 'badulla', 4, 'Completed', 'http://localhost/Farmtokeells/public/images/potato.png', 47, '45.00'),
(7, 'Carrot', 'Hill Country', 60, '2023-11-16', 'colombo', NULL, 'Approved', 'http://localhost/Farmtokeells/public/images/carrot.png', 44, '66.00'),
(13, 'Carrot', 'Organic', 10, '2023-12-15', 'vavuniya', 6, 'Rejected', 'http://localhost/Farmtokeells/public/images/carrot.png', 55, '56.00'),
(40, 'Leeks', 'Organic', 90, '2024-04-20', 'vavuniya', NULL, 'Completed', 'http://localhost/Farmtokeells/public/images/leeks.png', 55, '42.00'),
(46, 'Carrot', 'Hill Country', 46, '2024-04-20', 'vavuniya', 6, 'Completed', 'http://localhost/Farmtokeells/public/images/carrot.png', 55, '39.00'),
(64, 'Cucumber', 'Hill Country', 45, '2024-04-27', 'vavuniya', 16, 'Approved', 'http://localhost/Farmtokeells/public/images/cucumber.png', 55, '35.00'),
(69, 'Cabbage', 'Organic', 89, '2024-04-17', 'vavuniya', 8, 'Pending Approval', 'http://localhost/Farmtokeells/public/images/cabbage.png', 55, '65.00'),
(70, 'Cabbage', 'Organic', 89, '2024-04-27', 'vavuniya', 8, 'Completed', 'http://localhost/Farmtokeells/public/images/cabbage.png', 55, '45.00'),
(71, 'Cabbage', 'Organic', 49, '2024-04-25', 'vavuniya', 8, 'Rejected', 'http://localhost/Farmtokeells/public/images/cabbage.png', 55, '43.00'),
(73, 'Cabbage', 'Organic', 90, '2024-04-19', 'vavuniya', 8, 'Rejected', 'http://localhost/Farmtokeells/public/images/cabbage.png', 55, '78.00'),
(74, 'Ginger', 'Hill Country', 78, '2024-04-17', 'vavuniya', NULL, 'Completed', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '65.00'),
(75, 'Capsicum', 'Hill Country', 82, '2024-04-30', 'vavuniya', NULL, 'Completed', 'http://localhost/Farmtokeells/public/images/capsicum.png', 55, '78.00'),
(76, 'Cucumber', 'Hill Country', 78, '2024-04-30', 'vavuniya', 16, 'Approved', 'http://localhost/Farmtokeells/public/images/cucumber.png', 55, '6.00'),
(80, 'Beans', 'Organic', 89, '2024-05-11', 'vavuniya', NULL, 'Completed', 'http://localhost/Farmtokeells/public/images/beans.png', 55, '78.00'),
(81, 'Corriander', 'Organic', 56, '2024-05-11', 'vavuniya', 22, 'Rejected', 'http://localhost/Farmtokeells/public/images/corriander.png', 55, '56.00'),
(82, 'Carrot', 'Organic', 98, '2024-04-30', 'vavuniya', 6, 'Completed', 'http://localhost/Farmtokeells/public/images/carrot.png', 55, '67.00'),
(84, 'Pumpkin', 'Hill Country', 98, '2024-05-11', 'vavuniya', NULL, 'Completed', 'http://localhost/Farmtokeells/public/images/pumpkin.png', 55, '65.00'),
(86, 'Beans', 'Hill Country', 45, '2024-05-10', 'vavuniya', NULL, 'Approved', 'http://localhost/Farmtokeells/public/images/beans.png', 55, '56.00'),
(89, 'Ginger', 'Hill Country', 45, '2024-04-30', 'vavuniya', 24, 'Completed', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '89.00'),
(90, 'Ginger', 'Hill Country', 87, '2024-04-30', 'vavuniya', 24, 'Pending Approval', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '56.00'),
(95, 'Ginger', 'Organic', 13, '2024-05-11', 'vavuniya', 24, 'Pending Approval', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '23.98'),
(96, 'Ginger', 'Organic', 45, '2024-05-11', 'vavuniya', 24, 'Approved', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '54.00'),
(98, 'Ginger', 'Hill Country', 65, '2024-05-11', 'vavuniya', 24, 'Approved', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '45.00'),
(99, 'Cucumber', 'Hill Country', 100, '2024-04-30', 'vavuniya', 16, 'Approved', 'http://localhost/Farmtokeells/public/images/cucumber.png', 55, '78.00'),
(100, 'Cucumber', 'Hill Country', 98, '2024-04-30', 'vavuniya', 16, 'Completed', 'http://localhost/Farmtokeells/public/images/cucumber.png', 55, '45.00'),
(101, 'Cucumber', 'Hill Country', 78, '2024-04-30', 'vavuniya', 16, 'Rejected', 'http://localhost/Farmtokeells/public/images/cucumber.png', 55, '76.00'),
(102, 'Corriander', 'Hill Country', 78, '2024-04-30', 'vavuniya', NULL, 'Rejected', 'http://localhost/Farmtokeells/public/images/corriander.png', 55, '45.00'),
(103, 'Ginger', 'Hill Country', 67, '2024-04-30', 'vavuniya', NULL, 'Quality Rejected', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '45.00'),
(104, 'Ginger', 'Hill Country', 78, '2024-05-10', 'vavuniya', NULL, 'Quality Approved', 'http://localhost/Farmtokeells/public/images/ginger.png', 65, '56.00'),
(105, 'Ginger', 'Hill Country', 56, '2024-04-30', 'vavuniya', NULL, 'Quality Approved', 'http://localhost/Farmtokeells/public/images/ginger.png', 55, '34.00'),
(106, 'Ginger', 'Hill Country', 10, '2024-05-08', 'kalmunai', NULL, 'Quality Approved', 'http://localhost/Farmtokeells/public/images/ginger.png', 67, '69.00'),
(107, 'Corriander', 'Hill Country', 34, '2024-04-30', 'kalmunai', NULL, 'Rejected', 'http://localhost/Farmtokeells/public/images/corriander.png', 67, '23.00'),
(108, 'Beans', 'Hill Country', 34, '2024-04-30', 'kalmunai', NULL, 'Quality Approved', 'http://localhost/Farmtokeells/public/images/beans.png', 67, '45.00');

--
-- Triggers `salesorder`
--
DROP TRIGGER IF EXISTS `check_completed_orders_trigger`;
DELIMITER $$
CREATE TRIGGER `check_completed_orders_trigger` AFTER UPDATE ON `salesorder` FOR EACH ROW BEGIN
    IF NEW.status = 'completed' OR NEW.status = 'Completed' THEN
        INSERT INTO paymentrequests (order_id, user_id, product, totalprice, bank_account_number, account_name, bank, branch, status)
        SELECT 
            NEW.order_id,
            NEW.user_id,
            NEW.name AS product,
            (NEW.quantity * NEW.price) AS totalprice,
            pd.bank_account_number,
            pd.account_name,
            pd.bank,
            pd.branch,
            'pending' AS status
        FROM paymentdetails pd
        WHERE NEW.user_id = pd.user_id
            AND NOT EXISTS (
                SELECT 1 FROM paymentrequests pr WHERE pr.order_id = NEW.order_id
            );
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_notification_after_update`;
DELIMITER $$
CREATE TRIGGER `insert_notification_after_update` AFTER UPDATE ON `salesorder` FOR EACH ROW BEGIN
    IF OLD.status != 'approved' AND NEW.status = 'approved' THEN
        INSERT INTO qinotifications (user_id, order_id, product, action, time)
        VALUES (NEW.user_id, NEW.order_id, NEW.name, 'order', CURRENT_TIMESTAMP);
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `sales_order_status_update_trigger`;
DELIMITER $$
CREATE TRIGGER `sales_order_status_update_trigger` AFTER UPDATE ON `salesorder` FOR EACH ROW BEGIN
    -- Check if the status column has been updated
    IF OLD.status != NEW.status THEN
        -- Insert a row into farmernotifications table
        INSERT INTO farmernotifications (order_id, user_id, action, status, time)
        VALUES (NEW.order_id, NEW.user_id, 'status_update', NEW.status, CURRENT_TIMESTAMP);
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `salesorder_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `salesorder_insert_trigger` AFTER INSERT ON `salesorder` FOR EACH ROW BEGIN
    DECLARE product_name VARCHAR(255);
    DECLARE purchase_product_name VARCHAR(255);
    
    -- Assigning values to variables
    SET product_name = NEW.name;
    
    -- Inserting into ccmnotifications
    INSERT INTO ccmnotifications (product, quantity, action, time, user_id)
    VALUES (product_name, NEW.quantity, 'new_order', NOW(), NEW.user_id);

    -- Checking if purchase_id is not null
    IF NEW.purchase_id IS NOT NULL THEN
        -- Retrieving purchase product name
        SELECT name INTO purchase_product_name FROM purchaseorder WHERE purchase_id = NEW.purchase_id;
        
        -- Updating ccmnotifications
        IF purchase_product_name IS NOT NULL THEN
            UPDATE ccmnotifications 
            SET purchase_product = purchase_product_name
            WHERE product = product_name;
        END IF;
    END IF;
    
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `salesorder_insert_triggeradmin`;
DELIMITER $$
CREATE TRIGGER `salesorder_insert_triggeradmin` AFTER INSERT ON `salesorder` FOR EACH ROW BEGIN
    DECLARE product_name VARCHAR(255);
    DECLARE purchase_product_name VARCHAR(255);
    
    -- Assigning values to variables
    SET product_name = NEW.name;
    
    -- Inserting into ccmnotifications
    INSERT INTO adminnotifications (product, quantity, action, time, user_id)
    VALUES (product_name, NEW.quantity, 'new_order', NOW(), NEW.user_id);

    -- Checking if purchase_id is not null
    IF NEW.purchase_id IS NOT NULL THEN
        -- Retrieving purchase product name
        SELECT name INTO purchase_product_name FROM purchaseorder WHERE purchase_id = NEW.purchase_id;
        
        -- Updating ccmnotifications
        IF purchase_product_name IS NOT NULL THEN
            UPDATE adminnotifications 
            SET purchase_product = purchase_product_name
            WHERE product = product_name;
        END IF;
    END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `order_id` int NOT NULL,
  `V_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `slots` int DEFAULT NULL,
  `D_id` int DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `V_id` (`V_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`order_id`, `V_id`, `date`, `slots`, `D_id`) VALUES
(50, 11, '2024-04-24', 13, NULL),
(7, 14, '2024-02-28', 13, NULL),
(4, 14, '2024-02-07', 18, NULL),
(84, 14, '2024-04-30', 8, NULL),
(89, 14, '2024-04-30', 8, NULL),
(100, 14, '2024-04-28', 8, NULL),
(75, 14, '2024-05-09', 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tm`
--

DROP TABLE IF EXISTS `tm`;
CREATE TABLE IF NOT EXISTS `tm` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `collectioncenter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm`
--

INSERT INTO `tm` (`admin_id`, `admin_username`, `admin_password`, `reset_token_expire`, `reset_token`, `email`, `collectioncenter`) VALUES
(3, 'tm', '$2y$10$Sa74STYQAM1XfL3y2nRw0O1sDLsSlnFui2CEmaTJxAlxf57.p97Ya', NULL, NULL, NULL, 'Bandarawela Keells collection center'),
(4, 'tm1', '$2y$10$oK7xydeGLX2jAeki0Qa8D.JzQXrKp80xURvcM0Ard.ZkbFtm/7NtW', NULL, NULL, 'tkugananthy@gmail.com', 'Puttlam  Keells collection center'),
(11, 'tm4', '$2y$10$b1IgNc07E6J4.rZ8Nj3ITOgwXgZffsPfZ6ZBTjggjD.IZYpgEOxWG', NULL, NULL, 'sjvnsjf@gmail.com', 'Jaffna Keells collection center'),
(21, 'tm78', '$2y$10$yBIhbvWVYhZngG5IretEV.AbkXo1QU.xRwKZ0K16nlvhUQUt3qJ4y', NULL, NULL, 'tm78@gmail.com', 'Puttlam  Keells collection center');

-- --------------------------------------------------------

--
-- Table structure for table `tmnotifications`
--

DROP TABLE IF EXISTS `tmnotifications`;
CREATE TABLE IF NOT EXISTS `tmnotifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `purchase_product` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_reply` varchar(255) DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '1',
  `order_id` int NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tmnotifications`
--

INSERT INTO `tmnotifications` (`id`, `user_id`, `product`, `purchase_product`, `quantity`, `action`, `time`, `admin_reply`, `is_read`, `order_id`, `user`) VALUES
(1, NULL, NULL, NULL, NULL, 'reply', '2024-04-23 15:42:33', 'hi tm', 0, 0, NULL),
(2, 55, NULL, NULL, NULL, 'new request', '2024-04-27 07:28:14', NULL, 0, 84, 'wasri'),
(3, 55, NULL, NULL, NULL, 'new request', '2024-04-27 13:44:34', NULL, 0, 89, 'wasri'),
(4, 55, NULL, NULL, NULL, 'new request', '2024-04-28 14:30:32', NULL, 1, 100, 'wasri'),
(5, 67, NULL, NULL, NULL, 'new request', '2024-04-29 10:39:02', NULL, 1, 106, 'iflal'),
(6, 55, NULL, NULL, NULL, 'new request', '2024-04-30 04:26:59', NULL, 1, 75, 'wasri');

--
-- Triggers `tmnotifications`
--
DROP TRIGGER IF EXISTS `fillusername`;
DELIMITER $$
CREATE TRIGGER `fillusername` BEFORE INSERT ON `tmnotifications` FOR EACH ROW BEGIN
    -- Declare a variable to store the user's name
    DECLARE user_name VARCHAR(255);

    -- Retrieve the user's name based on the user_id
    SELECT name INTO user_name FROM users WHERE id = NEW.user_id;

    -- Set the user_name value in the new row
    SET NEW.user = user_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tm_chat`
--

DROP TABLE IF EXISTS `tm_chat`;
CREATE TABLE IF NOT EXISTS `tm_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tm_reply` text,
  `admin_reply` text,
  `admin_reply_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_chat`
--

INSERT INTO `tm_chat` (`id`, `tm_reply`, `admin_reply`, `admin_reply_time`, `created_at`) VALUES
(1, 'What are the current delivery schedules for our transport fleet?\n', NULL, '2024-04-17 05:01:45', '2024-04-17 05:01:45'),
(2, 'Can you provide guidance on optimizing our delivery routes to minimize fuel consumption and improve efficiency?\n', NULL, '2024-04-17 05:12:07', '2024-04-17 05:12:07'),
(3, NULL, 'Our records indicate that regular maintenance checks are up to date. However, I\'ll schedule a thorough inspection to ensure all vehicles are in optimal condition', '2024-04-17 05:34:26', '2024-04-17 05:34:26'),
(4, 'Are there any updates on regulations or permits required for transporting goods to certain areas?\n', NULL, '2024-04-17 10:56:13', '2024-04-17 10:56:13'),
(5, 'Do we need to coordinate with suppliers or customers regarding any changes in delivery arrangements or timelines?\n', NULL, '2024-04-23 15:40:41', '2024-04-23 15:40:41'),
(6, NULL, 'I\'ll reach out to relevant stakeholders to discuss any changes in delivery arrangements or timelines and keep you updated on any adjustments.', '2024-04-23 15:42:33', '2024-04-23 15:42:33'),
(7, 'What are the current delivery schedules for our transport fleet?\n', NULL, '2024-04-23 15:44:40', '2024-04-23 15:44:40'),
(8, 'Are there any updates on regulations or permits required for transporting goods to certain areas?\n', NULL, '2024-04-23 15:45:39', '2024-04-23 15:45:39'),
(9, 'Are there any maintenance checks or repairs needed for our vehicles before the next delivery cycle?\n', NULL, '2024-04-23 15:46:35', '2024-04-23 15:46:35');

--
-- Triggers `tm_chat`
--
DROP TRIGGER IF EXISTS `tm_chat_admin_reply_trigger`;
DELIMITER $$
CREATE TRIGGER `tm_chat_admin_reply_trigger` BEFORE INSERT ON `tm_chat` FOR EACH ROW BEGIN
    IF NEW.admin_reply IS NOT NULL THEN
        INSERT INTO tmnotifications (admin_reply, action, time)
        VALUES (NEW.admin_reply, 'reply', NOW());
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tm_chat_admin_reply_triggeradmin`;
DELIMITER $$
CREATE TRIGGER `tm_chat_admin_reply_triggeradmin` BEFORE INSERT ON `tm_chat` FOR EACH ROW BEGIN
    -- Check if the admin_reply column is not null
    IF NEW.tm_reply IS NOT NULL THEN
        -- Insert the new admin_reply value into the ccmnotifications table
        INSERT INTO adminnotifications (tm_reply, action, time)
        VALUES (NEW.tm_reply, 'reply', NOW());
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `torders`
--

DROP TABLE IF EXISTS `torders`;
CREATE TABLE IF NOT EXISTS `torders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `V_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `D_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `V_id` (`V_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `torders`
--

INSERT INTO `torders` (`order_id`, `user_id`, `V_id`, `product_name`, `status`, `D_id`, `date`) VALUES
(100, 55, 14, 'Cucumber', 4, 24, NULL),
(7, 44, 14, 'Carrot', 1, 24, NULL),
(4, 47, 14, 'Potato', 1, 24, NULL),
(84, 55, 14, 'Pumpkin', 4, 24, NULL),
(89, 55, 14, 'Ginger', 4, 24, NULL),
(75, 55, 14, 'Capsicum', 4, 24, '2024-05-09');

--
-- Triggers `torders`
--
DROP TRIGGER IF EXISTS `insert_notification_on_insert`;
DELIMITER $$
CREATE TRIGGER `insert_notification_on_insert` AFTER INSERT ON `torders` FOR EACH ROW BEGIN
    INSERT INTO farmernotifications (order_id, user_id, action, time,product_name)
    VALUES (NEW.order_id, NEW.user_id, 'request', CURRENT_TIMESTAMP,NEW.product_name);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_notification_on_status_change`;
DELIMITER $$
CREATE TRIGGER `insert_notification_on_status_change` BEFORE UPDATE ON `torders` FOR EACH ROW BEGIN
    IF OLD.status = 1 AND NEW.status = 2 THEN
        INSERT INTO farmernotifications (order_id, user_id, action, time,product_name)
        VALUES (NEW.order_id, NEW.user_id, 'outforpickup', CURRENT_TIMESTAMP,NEW.product_name);
    ELSEIF OLD.status = 2 AND NEW.status = 3 THEN
        INSERT INTO farmernotifications (order_id, user_id, action, time,product_name)
        VALUES (NEW.order_id, NEW.user_id, 'collected', CURRENT_TIMESTAMP,NEW.product_name);
    
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_salesorder_status`;
DELIMITER $$
CREATE TRIGGER `update_salesorder_status` AFTER UPDATE ON `torders` FOR EACH ROW BEGIN
    IF NEW.status = 4 THEN
        UPDATE salesorder
        SET status = 'Completed'
        WHERE order_id = NEW.order_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` int NOT NULL,
  `province` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `collectioncenter` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `distance` int NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_general_ci DEFAULT 'accept',
  `reset_token` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default_image.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `nic`, `mobile`, `province`, `collectioncenter`, `distance`, `status`, `reset_token`, `reset_token_expire`, `image`) VALUES
(44, 'Liviru Samarawickrama', 'kasun', '2021@gmail.com', '$2y$10$gI/fm.NAAtzKhqTlpk2xpuYe8HQ/a1byvZTsEcAaUmJk8alyhuMFy', '200133402097', 710357456, 'Bandarawela Keells collection center', 'colombo', 20, 'accept', NULL, NULL, 'default_image.jpg'),
(46, 'vinuja', 'vinuja', '20212@gmail.com', '$2y$10$MiJuk.tkor8qMkz1Yuhid.8TnCsYCSQvTdPEbDHMfO6uQ2Xc59OUO', '200133402097', 710357456, 'Puttlam  Keells collection center', 'puttalam', 31, 'accept', NULL, NULL, 'default_image.jpg'),
(47, 'Rosara Dayaratne', 'rosara', 'rosara@gmail.com', '$2y$10$AUybIJgwRVxesZKF/lIgH.JXXItAGinaGWiq3Zp/8hftL6.7Ql1qO', '200103301220', 761700212, 'Bandarawela Keells collection center', 'badulla', 34, 'accept', NULL, NULL, 'default_image.jpg'),
(55, 'wasri', 'wasri', 'cusherahkugan@gmail.com', '$2y$10$KuVZ3C/iPLH9swZ6UeAlNOXVzE5Z752W5Ee.mDmJBszeUp54Eu3ku', '2007650033', 766741405, 'Puttlam  Keells collection center', 'Vavuniya', 4, 'accept', NULL, NULL, '662a058ade3665.43483188.png'),
(56, 'Liviru Samarawickrama', 'kasun', '2021@gmail.com', '$2y$10$gI/fm.NAAtzKhqTlpk2xpuYe8HQ/a1byvZTsEcAaUmJk8alyhuMFy', '200133402097', 710357456, 'Bandarawela Keells collection center', 'badulla', 32, 'accept', NULL, NULL, 'default_image.jpg'),
(57, 'Kasun', 'kasun', 'kasun@gmail.com', '$2y$10$OIU8MggIq/vKzNHqMDKmle/eEGfgEc27NAtarV2nO1Krn.oN5Li6.', '200133402097', 710357456, 'Puttlam  Keells collection center', 'puttalam', 46, 'accept', NULL, NULL, 'default_image.jpg'),
(58, 'Rosara Dayaratne', 'rosara', 'rosara@gmail.com', '$2y$10$AUybIJgwRVxesZKF/lIgH.JXXItAGinaGWiq3Zp/8hftL6.7Ql1qO', '200103301220', 761700212, 'Bandarawela Keells collection center', 'badulla', 12, 'accept', NULL, NULL, 'default_image.jpg'),
(59, 'Navod', 'nav', 'nav@gmail.com', '$2y$10$ofeTdjvLvUWh2CjbSIRHPOGGxJnBpBOpgZ2msSvWtZQWLNgiMKtx6', '200103301220', 761232727, 'Puttlam  Keells collection center', 'puttalam', 5, 'accept', NULL, NULL, 'default_image.jpg'),
(61, 'Liviru Samarawickrama', 'liviru', 'liv@gmail.com', '$2y$10$UuIilBTWzYAapen3MC8.kO3/SbZb1p.4RRmJqktqtUh5vAoy606tK', '200133402099', 767898765, 'Bandarawela Keells collection center', 'badulla', 10, 'accept', NULL, NULL, 'default_image.jpg'),
(62, 'cusherah', 'cusherah', 'tkugananthy@gmail.com', '$2y$10$woeeY9jrH6OMO5xrNktPWOoFwMN1tFIcnhCoPUDuy9FBvNbxc4pYC', '200076500022', 766741405, 'Puttlam  Keells collection center', 'puttalam', 3, 'accept', NULL, NULL, 'default_image.jpg'),
(63, 'surabi', 'surabi', 'surabi@gmail.com', '$2y$10$FzwsmXLIUBhYXL7PF0vDK.TQfG7jOP9CzcCuTlbjpIEOteaRE8guS', '200067500021', 774243402, 'Bandarawela Keells collection center', 'vavuniya', 6, 'pending', NULL, NULL, 'default_image.jpg'),
(64, 'nithun', 'nithun', 'nithun@gmail.com', '$2y$10$ipyCLwCVXX.A5O4WtU1HtO.KN/S0HZglQBCYIUaT5ScrBrxXA6Jk6', '200076300022', 766741405, 'Jaffna Keells collection center', 'Vavuniya', 7, 'pending', NULL, NULL, 'default_image.jpg'),
(65, 'sathu', 'sathu', 'sathu@gmail.com', '$2y$10$07V35.BFNBfjKCpzCCdwiOKZr/7g3eZJugaDmZDUJN07JAqsSY6nS', '200176500022', 764534781, 'Nuwara-eliya Keells collection center', 'dehiwala ,colombo', 6, 'accept', NULL, NULL, '662dfc79a78a27.31528934.png'),
(66, 'umai', 'umai', 'umai@gmail.com', '$2y$10$qxgYF9qG45FwpTF8FDCbP.nJXmLwtFF10EaJ1J1fOvmK7Jhana9hC', '2007650025', 766741408, 'Thambuththegama Keells collection center', 'jaffna', 3, 'accept', NULL, NULL, 'default_image.jpg'),
(67, 'iflal', 'iflal', 'iflal@gmail.com', '$2y$10$vcH9Vo0xIsUige34ufrm7uOJTpGuTutZsANM.UVsMaatj1xXMzygK', '200076500034', 766741403, 'Sigiriya Keells collection center', 'kalmunai', 5, 'accept', NULL, NULL, 'default_image.jpg');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `users_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `users_insert_trigger` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    -- Insert the details of the new user into the adminnotifications table
    INSERT INTO adminnotifications (user_id, action, time)
    VALUES (NEW.id, 'newuser', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinfo`
--

DROP TABLE IF EXISTS `vehicleinfo`;
CREATE TABLE IF NOT EXISTS `vehicleinfo` (
  `V_id` int NOT NULL AUTO_INCREMENT,
  `License_no` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chassis` decimal(18,0) DEFAULT NULL,
  `vtype` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `D_id` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`V_id`),
  KEY `fk_driverinfo_D_id` (`D_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicleinfo`
--

INSERT INTO `vehicleinfo` (`V_id`, `License_no`, `chassis`, `vtype`, `model`, `capacity`, `D_id`, `active`) VALUES
(9, 'ABC-1234', '28774279828974', 'Flatbed', 'Izuzu', 0, 19, 1),
(10, 'XYZ-5678', '982374892734', 'Light Lorry', 'Demo', 0, 20, 1),
(11, 'DEF-9012', '87456328904823', 'Light Lorry', 'Demo', 0, 21, 1),
(12, 'GHI-3456', '29873492384729', 'Heavy Lorry', 'Mitsubishi', 0, 22, 1),
(13, 'JKL-7890', '71293471293847', 'Three Wheeler', 'Bajaj', 0, 23, 1),
(14, 'ABC-1222', '124442423423', 'Heavy Lorry', 'Leyland', 100, 24, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `salesorder` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `fk_salesorder_purchase_id` FOREIGN KEY (`purchase_id`) REFERENCES `purchaseorder` (`purchase_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  ADD CONSTRAINT `fk_driverinfo_D_id` FOREIGN KEY (`D_id`) REFERENCES `driverinfo` (`D_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
