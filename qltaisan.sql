-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2023 lúc 05:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltaisan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `function_id` varchar(20) NOT NULL,
  `function_name` varchar(100) NOT NULL,
  `function_status` tinyint(2) NOT NULL,
  `function_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `functions`
--

INSERT INTO `functions` (`function_id`, `function_name`, `function_status`, `function_group`) VALUES
('function', 'function_manager', 1, 1),
('group', 'group_manager', 1, 1),
('nha_cc', 'nha_cung_cap', 1, 4),
('report_group', 'report_group_manager', 1, 0),
('type_asset', 'type_asset', 1, 2),
('user', 'user_manager', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `group_id` varchar(20) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_parent` varchar(20) NOT NULL,
  `group_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_parent`, `group_status`) VALUES
('vpddbd', 'Chi nhánh Bù Đăng', 'vpddt', 1),
('vpddbdp', 'Chi nhánh Bù Đốp', 'vpddt', 1),
('vpddbgm', 'Chi nhánh Bù Gia Mập', 'vpddt', 1),
('vpddbl', 'Chi nhán Bình Long', 'vpddt', 1),
('vpddct', 'Chi nhánh Chơn Thành', 'vpddt', 1),
('vpdddp', 'Chi nhánh Đồng Phú', 'vpddt', 1),
('vpdddx', 'Chi nhánh Đồng Xoài', 'vpddt', 1),
('vpddhq', 'Chi nhánh Hớn Quảng', 'vpddt', 1),
('vpddln', 'Chi nhánh Lộc Ninh', 'vpddt', 1),
('vpddpl', 'Chi nhánh Phước Long', 'vpddt', 1),
('vpddpr', 'Chi nhánh Phú Riềng', 'vpddt', 1),
('vpddt', 'Văn phòng ĐK ĐĐ Tỉnh', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tai_san`
--

CREATE TABLE `loai_tai_san` (
  `ma_loai_ts` varchar(20) NOT NULL,
  `ten_loai_ts` int(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `nhom_ts` int(2) NOT NULL,
  `tyle_haomon` float NOT NULL,
  `sonam_sudung` varchar(4) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `ky_nhacnho` int(1) NOT NULL,
  `so_ky_nhacnho` int(2) NOT NULL,
  `tk_nguyen_gia` varchar(20) NOT NULL,
  `tk_haomon` varchar(20) NOT NULL,
  `tieu_muc` varchar(20) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ma_ncc` varchar(50) NOT NULL,
  `ten_ncc` varchar(200) NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `ncc_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ma_ncc`, `ten_ncc`, `dia_chi`, `ncc_status`) VALUES
('NCC000001', 'Nhà cung cấp 001', 'Đường ĐT.741, Thôn Phú Thịnh, Xã Phú Riềng, Huyện Phú Riềng, Tỉnh Bình Phước, Việt Nam', 1),
('NCC000002', 'Nhà cung cấp 002', 'ĐT741 Bình Phước', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_tai_san`
--

CREATE TABLE `nhom_tai_san` (
  `id` int(11) NOT NULL,
  `ten_nts` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom_tai_san`
--

INSERT INTO `nhom_tai_san` (`id`, `ten_nts`) VALUES
(1, 'Đất'),
(2, 'Nhà'),
(3, 'Vật kiến trúc'),
(4, 'Ô tô'),
(5, 'Phương tiện vận tải khác'),
(6, 'Máy móc thiết bị'),
(7, 'Cây lâu năm, SVLV'),
(8, 'TSCĐ hữu hình khác'),
(9, 'TSCĐ vô hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieu_muc`
--

CREATE TABLE `tieu_muc` (
  `ma_tm` varchar(20) NOT NULL,
  `ten_tm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tieu_muc`
--

INSERT INTO `tieu_muc` (`ma_tm`, `ten_tm`) VALUES
('6951', 'Ô tô dùng chung'),
('6952', 'Ô tô phục vụ chức danh'),
('6953', 'Ô tô chuyên dùng'),
('6954', 'Tài sản và thiết bị chuyên dùng'),
('6955', 'Tài sản và thiết bị văn phòng'),
('6956', 'Các thiết bị công nghệ thông tin'),
('6999', 'Tài sản và thiết bị khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_hao_mon`
--

CREATE TABLE `tk_hao_mon` (
  `ma_tk` varchar(20) NOT NULL,
  `ten_tk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk_hao_mon`
--

INSERT INTO `tk_hao_mon` (`ma_tk`, `ten_tk`) VALUES
('214', 'Khấu hao và hao mòn lũy kế TSCĐ'),
('2141', 'Khấu hao và hao mòn lũy kế tài sản cố định hữu hình'),
('2142', 'Khấu hao và hao mòn lũy kế tài sản cố định vô hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_nguyen_gia`
--

CREATE TABLE `tk_nguyen_gia` (
  `ma_tk` varchar(20) NOT NULL,
  `ten_tk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk_nguyen_gia`
--

INSERT INTO `tk_nguyen_gia` (`ma_tk`, `ten_tk`) VALUES
('211', 'Tài sản cố định hữu hình'),
('213', 'Tài sản cố định vô hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `group_id` varchar(10) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `gender`, `email`, `phonenumber`, `group_id`, `user_status`) VALUES
('admin', 'Nguyễn Đăng Cẩm', 'b16f278e79dade5ef8e2207cf852d2e653e6c084', 1, 'dangcam.pr@outlook.com', '0979371093', 'vpddt', 1),
('admin1', 'Admin 1', '8b2a31ad260da1ddd9e026d88d72dbfe42276f72', 1, 'admin1@gmail.com', '0979371093', 'vpddpr', 1),
('admin2', 'Admin 2', '2e7c8260125e7cdc02300c9ee56be000fad6ab52', 2, 'dangcam.pr@gmail.com', '0979371093', 'vpdddx', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_function`
--

CREATE TABLE `user_function` (
  `user_id` varchar(20) NOT NULL,
  `function_id` varchar(20) NOT NULL,
  `function_view` tinyint(4) NOT NULL,
  `function_add` tinyint(4) NOT NULL,
  `function_edit` tinyint(4) NOT NULL,
  `function_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_function`
--

INSERT INTO `user_function` (`user_id`, `function_id`, `function_view`, `function_add`, `function_edit`, `function_delete`) VALUES
('admin', 'function', 1, 1, 1, 1),
('admin', 'group', 1, 1, 1, 1),
('admin', 'nha_cc', 1, 1, 1, 1),
('admin', 'report_group', 1, 1, 1, 1),
('admin', 'type_asset', 1, 1, 1, 1),
('admin', 'user', 1, 1, 1, 1),
('admin1', 'function', 0, 0, 0, 0),
('admin1', 'group', 0, 0, 0, 0),
('admin1', 'report_group', 1, 1, 1, 1),
('admin1', 'user', 0, 0, 0, 0),
('admin2', 'function', 0, 0, 0, 0),
('admin2', 'group', 0, 0, 0, 0),
('admin2', 'report_group', 1, 1, 1, 1),
('admin2', 'user', 0, 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`function_id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Chỉ mục cho bảng `nhom_tai_san`
--
ALTER TABLE `nhom_tai_san`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tieu_muc`
--
ALTER TABLE `tieu_muc`
  ADD PRIMARY KEY (`ma_tm`);

--
-- Chỉ mục cho bảng `tk_hao_mon`
--
ALTER TABLE `tk_hao_mon`
  ADD PRIMARY KEY (`ma_tk`);

--
-- Chỉ mục cho bảng `tk_nguyen_gia`
--
ALTER TABLE `tk_nguyen_gia`
  ADD PRIMARY KEY (`ma_tk`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Chỉ mục cho bảng `user_function`
--
ALTER TABLE `user_function`
  ADD PRIMARY KEY (`user_id`,`function_id`),
  ADD KEY `user_function_ibfk_2` (`function_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nhom_tai_san`
--
ALTER TABLE `nhom_tai_san`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `user_function`
--
ALTER TABLE `user_function`
  ADD CONSTRAINT `user_function_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_function_ibfk_2` FOREIGN KEY (`function_id`) REFERENCES `functions` (`function_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
