-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2020 lúc 09:55 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ngocthanhshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `ID_Catalog` int(11) NOT NULL,
  `Name_Catalog` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`ID_Catalog`, `Name_Catalog`) VALUES
(1, 'MacBook Super Vip'),
(2, 'Asus'),
(3, 'Lenovo'),
(4, 'Dell'),
(5, 'Acer'),
(6, 'Hp'),
(7, 'Huawei'),
(15, 'Surface Pro');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `ID_Comment` int(11) NOT NULL,
  `ID_Product` int(11) NOT NULL,
  `ID_User` varchar(70) NOT NULL,
  `Comment` text NOT NULL,
  `Date_Comment` date NOT NULL DEFAULT current_timestamp(),
  `Admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`ID_Comment`, `ID_Product`, `ID_User`, `Comment`, `Date_Comment`, `Admin`) VALUES
(5, 1, '1', 'Tooi laf Thanh Pro 19IT2. Nhan can moi keo', '0000-00-00', NULL),
(6, 11, '21', '435', '2020-12-26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `ID_Order` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Address_User` varchar(255) NOT NULL,
  `Phone_User` varchar(255) NOT NULL,
  `Status_Order` varchar(255) NOT NULL,
  `Date_Order` varchar(255) NOT NULL,
  `Date_De` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`ID_Order`, `ID_User`, `Address_User`, `Phone_User`, `Status_Order`, `Date_Order`, `Date_De`) VALUES
(1, 1, 'Nam Kỳ Khởi Nghĩa', '0332148505', 'Giao Thành Công', '14:39:42 16/12/2020', '11:17:25 2020/12/16'),
(2, 1, 'Nam Kỳ Khởi Nghĩa2', '0332148505', 'Giao Thành Công', '14:40:44 16/12/2020', '16:09:03 2020/12/25'),
(3, 1, '869  Vesta Drive', '5595297976', 'Chưa Giải Quyết', '14:42:19 16/12/2020', ''),
(81, 1, 'Nam Kỳ Khởi Nghĩa', '0332148505', 'Chưa Giải Quyết', '15:51:09 26/12/2020', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ID_OrderDetail` int(11) NOT NULL,
  `ID_Order` int(11) NOT NULL,
  `ID_Product` int(11) NOT NULL,
  `Quanlity_Order` int(11) NOT NULL,
  `Price_Order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`ID_OrderDetail`, `ID_Order`, `ID_Product`, `Quanlity_Order`, `Price_Order`) VALUES
(1, 1, 1, 2, 44000),
(2, 2, 1, 1, 22000),
(3, 3, 1, 10, 220000),
(4, 1, 1, 1, 22000),
(5, 1, 2, 100, 3300),
(6, 2, 1, 1, 22000),
(7, 81, 1, 15, 330000000),
(8, 81, 2, 3, 99000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID_Product` int(11) NOT NULL,
  `Name_Product` varchar(145) NOT NULL,
  `ID_Catalog` int(11) NOT NULL,
  `Brand_Product` varchar(45) DEFAULT NULL,
  `Price_Product` int(11) DEFAULT NULL,
  `Des_Product` varchar(2000) DEFAULT NULL,
  `Image_Product` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID_Product`, `Name_Product`, `ID_Catalog`, `Brand_Product`, `Price_Product`, `Des_Product`, `Image_Product`) VALUES
(1, 'Surface7', 15, 'Microsoft', 22000, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(2, 'Asus TUF F15 ', 1, 'Ngojc Thanhf', 33, '<p><em>Đ&acirc;y l&agrave; m&ocirc; tả 2</em></p>', 'surface-pro-x_01.jpg'),
(3, 'Surface Pro', 3, 'Surface Pro', 1111, '<p>surface-pro-x_01.jpg</p>', 'surface-pro-x_01.jpg'),
(4, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(5, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(6, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(7, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(8, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(9, 'Surface7', 15, 'Microsoft', NULL, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(10, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp'),
(11, 'Surface7', 15, 'Microsoft', 1, '<p><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- CPU: Intel Core i5-1035G4</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- M&agrave;n h&igrave;nh: 12.3\" (2736 x 1824)</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- RAM: 1 x 8GB</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Đồ họa: Intel UHD Graphics</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Lưu trữ: 128GB SSD /</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Hệ điều h&agrave;nh: Windows 10</span></strong></em><br style=\"box-sizing: border-box; color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\" /><em><strong><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; background-color: #ffffff;\">- Khối lượng: 0.8 kg</span></strong></em></p>', 'sun7.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recomment`
--

CREATE TABLE `recomment` (
  `ID_ReComment` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Comment` int(11) NOT NULL,
  `ReComment` text NOT NULL,
  `Date_ReComment` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `recomment`
--

INSERT INTO `recomment` (`ID_ReComment`, `ID_User`, `ID_Comment`, `ReComment`, `Date_ReComment`) VALUES
(4, 21, 6, '12321', '2020-12-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `Email_User` varchar(100) NOT NULL,
  `Password_User` varchar(45) NOT NULL,
  `Image_User` varchar(77) NOT NULL,
  `Date_Join_User` datetime NOT NULL DEFAULT current_timestamp(),
  `Name_User` varchar(45) DEFAULT NULL,
  `Phone_User` varchar(12) NOT NULL,
  `Address_User` varchar(5000) NOT NULL,
  `Position` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID_User`, `Email_User`, `Password_User`, `Image_User`, `Date_Join_User`, `Name_User`, `Phone_User`, `Address_User`, `Position`) VALUES
(1, 'Admin@gmail.com', 'Admin@gmail.com', '', '2020-12-16 08:12:07', 'Ngọc Thành', '20000212', 'Việt Nam', '2'),
(21, 'phsang49@gmail.com', 'phsang49@gmail.com', '', '2020-12-25 23:29:35', 'Sang', '', '', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`ID_Catalog`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_Comment`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID_Order`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ID_OrderDetail`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_Product`);

--
-- Chỉ mục cho bảng `recomment`
--
ALTER TABLE `recomment`
  ADD PRIMARY KEY (`ID_ReComment`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`,`Email_User`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `ID_Catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_Comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `ID_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ID_OrderDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `recomment`
--
ALTER TABLE `recomment`
  MODIFY `ID_ReComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
