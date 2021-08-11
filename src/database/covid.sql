-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 11, 2021 lúc 02:31 PM
-- Phiên bản máy phục vụ: 8.0.26-0ubuntu0.20.04.2
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `covid`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calendar`
--

CREATE TABLE `calendar` (
  `id` int NOT NULL,
  `time` datetime NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `calendar`
--

INSERT INTO `calendar` (`id`, `time`, `address`) VALUES
(1, '2021-08-11 14:17:08', 'Đại học Công Nghiệp Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registers`
--

CREATE TABLE `registers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `prioritized` int NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `registers`
--

INSERT INTO `registers` (`id`, `name`, `age`, `email`, `address`, `prioritized`, `id_card`, `phone`) VALUES
(112, 'Vũ Văn Nam', 18, 'vannam@gmail.com', 'Nam Hà - Nam Hải - Đông Hưng - Thái Bình', 1, '129837423462', '2846193645'),
(164, 'Lê Thị Bích', 26, 'bichle@gmail.com', 'Nghĩa Hưng - Quỳnh Côi - Thái Thụy - Thái Bình', 1, '129837423462', '2846193645'),
(234, 'Nguyễn Văn Hùng', 43, 'vanhung@gmail.com', 'Văn Khê - Tiên Nam - Đông Hà - Hải Dương', 1, '129837423462', '2846193645'),
(865, 'Nguyễn Xuân An', 27, 'anxuan@gmail.com', 'Lê Nam - Trần Hới - Đông Văn - Ninh Bình', 1, '129837423462', '2846193645'),
(3243, 'Trần Đức Long', 30, 'longtd@gmail.com', 'Nam Tiên - Nam Hà - Nghĩa Văn - Hải Phòng', 1, '129837423462', '2846193645');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `account`, `password`) VALUES
(1, 'Admin', 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3244;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
