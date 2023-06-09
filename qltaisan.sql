-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2023 lúc 06:09 AM
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
-- Cấu trúc bảng cho bảng `bo_phan`
--

CREATE TABLE `bo_phan` (
  `ma_bp` varchar(20) NOT NULL,
  `ten_bp` varchar(100) NOT NULL,
  `truc_thuoc` varchar(20) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `chuong_md` varchar(20) NOT NULL,
  `khoan_md` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bo_phan`
--

INSERT INTO `bo_phan` (`ma_bp`, `ten_bp`, `truc_thuoc`, `ghi_chu`, `chuong_md`, `khoan_md`) VALUES
('BP001', 'Bộ phận 001', '', '', '', ''),
('BP002', 'Bộ phận 002', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `ma_cv` varchar(20) NOT NULL,
  `ten_cv` varchar(100) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`ma_cv`, `ten_cv`, `ghi_chu`) VALUES
('CVCD001', 'Chức vụ/Chức danh 001', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_md`
--

CREATE TABLE `chuong_md` (
  `ma` varchar(20) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_md`
--

INSERT INTO `chuong_md` (`ma`, `ten`) VALUES
('462', 'Sở tài nguyên môi trường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_dung_cu`
--

CREATE TABLE `cong_dung_cu` (
  `ma_ccdc` varchar(20) NOT NULL,
  `ten_ccdc` varchar(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cong_dung_cu`
--

INSERT INTO `cong_dung_cu` (`ma_ccdc`, `ten_ccdc`, `thuoc_loai`, `ghi_chu`, `su_dung`) VALUES
('CCDC001', 'Dụng cụ văn phòng', '', 'ghi chú', 1),
('CCDC002', ' Văn phòng phẩm', '', 'ghi chú', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dinh_muc`
--

CREATE TABLE `dinh_muc` (
  `ma_dm_ts` varchar(20) NOT NULL,
  `ma_dm` varchar(20) NOT NULL,
  `dinh_muc` float NOT NULL,
  `don_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dinh_muc`
--

INSERT INTO `dinh_muc` (`ma_dm_ts`, `ma_dm`, `dinh_muc`, `don_gia`) VALUES
('DMTS0001', 'dung_chung', 250, 360);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dm_tai_san`
--

CREATE TABLE `dm_tai_san` (
  `ma_dm` varchar(20) NOT NULL,
  `ten_dm` varchar(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `don_vi` varchar(10) NOT NULL,
  `dinh_muc` int(1) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dm_tai_san`
--

INSERT INTO `dm_tai_san` (`ma_dm`, `ten_dm`, `thuoc_loai`, `don_vi`, `dinh_muc`, `su_dung`) VALUES
('DMTS0001', 'Loại định mức tài sản 001', '', 'Cái', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi_qd`
--

CREATE TABLE `don_vi_qd` (
  `ma_dv` varchar(20) NOT NULL,
  `ten_dv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi_qd`
--

INSERT INTO `don_vi_qd` (`ma_dv`, `ten_dv`) VALUES
('1076047', 'Văn phòng Đoàn ĐBQH và HĐND tỉnh Bình Phước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `du_an`
--

CREATE TABLE `du_an` (
  `ma_da` varchar(20) NOT NULL,
  `ten_da` varchar(100) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `du_an`
--

INSERT INTO `du_an` (`ma_da`, `ten_da`, `ghi_chu`, `su_dung`) VALUES
('DA001', 'Dự Án Minh Hưng 1', 'ghi chú', 1);

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
('ccdc', 'tool', 1, 2),
('department', 'department', 1, 3),
('function', 'function_manager', 1, 1),
('funding', 'funding', 1, 3),
('group', 'group_manager', 1, 1),
('nguoi_dung', 'user', 1, 3),
('nha_cc', 'nha_cung_cap', 1, 4),
('position', 'position', 1, 3),
('project', 'project', 1, 4),
('property_norms', 'property_norms', 1, 3),
('provide_equipment', 'provide_equipment', 1, 4),
('report_group', 'report_group_manager', 1, 0),
('tbyte', 'tbyte', 1, 2),
('type_asset', 'type_asset', 1, 2),
('type_road', 'type_road', 1, 2),
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
('vpdd', 'VP DD', '', 1),
('vpdd123', 'VP DD 29', '', 1),
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
-- Cấu trúc bảng cho bảng `khoan_md`
--

CREATE TABLE `khoan_md` (
  `ma` varchar(20) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoan_md`
--

INSERT INTO `khoan_md` (`ma`, `ten`) VALUES
('429', 'Các nhiệm vụ khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tai_san`
--

CREATE TABLE `loai_tai_san` (
  `ma_loai_ts` varchar(20) NOT NULL,
  `ten_loai_ts` varchar(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `nhom_ts` int(2) NOT NULL,
  `tyle_haomon` float NOT NULL,
  `sonam_sudung` varchar(4) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `nhac_nho` tinyint(1) NOT NULL,
  `ky_nhacnho` int(1) NOT NULL,
  `so_ky_nhacnho` int(2) NOT NULL,
  `tk_nguyen_gia` varchar(20) NOT NULL,
  `tk_haomon` varchar(20) NOT NULL,
  `tieu_muc` varchar(20) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tai_san`
--

INSERT INTO `loai_tai_san` (`ma_loai_ts`, `ten_loai_ts`, `thuoc_loai`, `nhom_ts`, `tyle_haomon`, `sonam_sudung`, `ghi_chu`, `nhac_nho`, `ky_nhacnho`, `so_ky_nhacnho`, `tk_nguyen_gia`, `tk_haomon`, `tieu_muc`, `su_dung`) VALUES
('LST001', 'Loại tài sản 001', '', 3, 20, '11', 'ghi chú', 0, 4, 15, '211', '2142', '6952', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_ts_duong_bo`
--

CREATE TABLE `loai_ts_duong_bo` (
  `ma_loai_ts` varchar(20) NOT NULL,
  `ten_loai_ts` varchar(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `tyle_haomon` float NOT NULL,
  `sonam_sudung` varchar(4) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_ts_duong_bo`
--

INSERT INTO `loai_ts_duong_bo` (`ma_loai_ts`, `ten_loai_ts`, `thuoc_loai`, `tyle_haomon`, `sonam_sudung`, `ghi_chu`, `su_dung`) VALUES
('TSDB0001', 'Tài sản hệ thống đường bộ', '', 20, '11', 'ghi chú', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_su_dung`
--

CREATE TABLE `nguoi_su_dung` (
  `ma_nd` varchar(20) NOT NULL,
  `ten_nd` varchar(100) NOT NULL,
  `bo_phan` varchar(20) NOT NULL,
  `chuc_vu` varchar(20) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_su_dung`
--

INSERT INTO `nguoi_su_dung` (`ma_nd`, `ten_nd`, `bo_phan`, `chuc_vu`, `su_dung`) VALUES
('NSD001', 'Người sử dụng 001', 'BP001', 'CVCD001', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguon_hinh_thanh`
--

CREATE TABLE `nguon_hinh_thanh` (
  `ma_nguon` int(2) NOT NULL,
  `ten_nguon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguon_hinh_thanh`
--

INSERT INTO `nguon_hinh_thanh` (`ma_nguon`, `ten_nguon`) VALUES
(1, 'Nguồn viện trợ, vay nợ nước ngoài'),
(2, 'Nguồn phí được khấu trừ để lại'),
(3, 'Quỹ phúc lợi'),
(4, 'Quỹ phát triển hoạt động sự nghiệp'),
(5, 'Nguồn vốn kinh doanh'),
(6, 'Nguồn khác'),
(7, 'Nguồn NSNN cấp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguon_kinh_phi`
--

CREATE TABLE `nguon_kinh_phi` (
  `ma_kp` varchar(20) NOT NULL,
  `ten_kp` varchar(100) NOT NULL,
  `thuoc_nguon` varchar(20) NOT NULL,
  `nguon_ht` int(2) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguon_kinh_phi`
--

INSERT INTO `nguon_kinh_phi` (`ma_kp`, `ten_kp`, `thuoc_nguon`, `nguon_ht`, `ghi_chu`, `su_dung`) VALUES
('1', 'Ngân sách Trung ương', '', 7, '', 1);

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
-- Cấu trúc bảng cho bảng `thiet_bi_yte`
--

CREATE TABLE `thiet_bi_yte` (
  `ma_tb` varchar(20) NOT NULL,
  `ten_tb` varchar(100) NOT NULL,
  `thuoc_loai` varchar(20) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thiet_bi_yte`
--

INSERT INTO `thiet_bi_yte` (`ma_tb`, `ten_tb`, `thuoc_loai`, `ghi_chu`, `su_dung`) VALUES
('TBYT001', 'Máy ghi điện não', '', 'ghi chú', 1);

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
-- Cấu trúc bảng cho bảng `trang_cap`
--

CREATE TABLE `trang_cap` (
  `so_qd` varchar(20) NOT NULL,
  `ten_qd` varchar(100) NOT NULL,
  `don_vi` varchar(20) NOT NULL,
  `su_dung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_cap`
--

INSERT INTO `trang_cap` (`so_qd`, `ten_qd`, `don_vi`, `su_dung`) VALUES
('QDTC0001', 'Quyết định trang cấp 0001', '', 1);

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
('admin', 'ccdc', 1, 1, 1, 1),
('admin', 'department', 1, 1, 1, 1),
('admin', 'function', 1, 1, 1, 1),
('admin', 'funding', 1, 1, 1, 1),
('admin', 'group', 1, 1, 1, 1),
('admin', 'nguoi_dung', 1, 1, 1, 1),
('admin', 'nha_cc', 1, 1, 1, 1),
('admin', 'position', 1, 1, 1, 1),
('admin', 'project', 1, 1, 1, 1),
('admin', 'property_norms', 1, 1, 1, 1),
('admin', 'provide_equipment', 1, 1, 1, 1),
('admin', 'report_group', 1, 1, 1, 1),
('admin', 'tbyte', 1, 1, 1, 1),
('admin', 'type_asset', 1, 1, 1, 1),
('admin', 'type_road', 1, 1, 1, 1),
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
-- Chỉ mục cho bảng `bo_phan`
--
ALTER TABLE `bo_phan`
  ADD PRIMARY KEY (`ma_bp`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`ma_cv`);

--
-- Chỉ mục cho bảng `chuong_md`
--
ALTER TABLE `chuong_md`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `cong_dung_cu`
--
ALTER TABLE `cong_dung_cu`
  ADD PRIMARY KEY (`ma_ccdc`);

--
-- Chỉ mục cho bảng `dinh_muc`
--
ALTER TABLE `dinh_muc`
  ADD PRIMARY KEY (`ma_dm_ts`,`ma_dm`);

--
-- Chỉ mục cho bảng `dm_tai_san`
--
ALTER TABLE `dm_tai_san`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Chỉ mục cho bảng `don_vi_qd`
--
ALTER TABLE `don_vi_qd`
  ADD PRIMARY KEY (`ma_dv`);

--
-- Chỉ mục cho bảng `du_an`
--
ALTER TABLE `du_an`
  ADD PRIMARY KEY (`ma_da`);

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
-- Chỉ mục cho bảng `khoan_md`
--
ALTER TABLE `khoan_md`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `loai_ts_duong_bo`
--
ALTER TABLE `loai_ts_duong_bo`
  ADD PRIMARY KEY (`ma_loai_ts`);

--
-- Chỉ mục cho bảng `nguoi_su_dung`
--
ALTER TABLE `nguoi_su_dung`
  ADD PRIMARY KEY (`ma_nd`);

--
-- Chỉ mục cho bảng `nguon_hinh_thanh`
--
ALTER TABLE `nguon_hinh_thanh`
  ADD PRIMARY KEY (`ma_nguon`);

--
-- Chỉ mục cho bảng `nguon_kinh_phi`
--
ALTER TABLE `nguon_kinh_phi`
  ADD PRIMARY KEY (`ma_kp`);

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
-- Chỉ mục cho bảng `thiet_bi_yte`
--
ALTER TABLE `thiet_bi_yte`
  ADD PRIMARY KEY (`ma_tb`);

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
-- Chỉ mục cho bảng `trang_cap`
--
ALTER TABLE `trang_cap`
  ADD PRIMARY KEY (`so_qd`);

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
-- AUTO_INCREMENT cho bảng `nguon_hinh_thanh`
--
ALTER TABLE `nguon_hinh_thanh`
  MODIFY `ma_nguon` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
