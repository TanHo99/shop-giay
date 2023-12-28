-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2023 lúc 08:05 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdh`
--

CREATE TABLE `chitietdh` (
  `chitietdh_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dh_id` int(11) NOT NULL,
  `sanpham_ten` varchar(255) NOT NULL,
  `chitietdh_so_luong` int(11) NOT NULL,
  `sanpham_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `danhgia_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `danhgia_noi_dung` text NOT NULL,
  `danhgia_sao` int(11) NOT NULL,
  `chitietdh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` int(11) NOT NULL,
  `danhmuc_ten` varchar(225) NOT NULL,
  `danhmuc_mo_ta` text NOT NULL,
  `danhmuc_trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_ten`, `danhmuc_mo_ta`, `danhmuc_trang_thai`) VALUES
(7, 'Giày', 'Giày', 0),
(8, 'Dép', 'Dép', 0),
(9, 'Phụ kiện', 'Phụ kiện', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dh`
--

CREATE TABLE `dh` (
  `dh_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vanchuyen_id` int(11) NOT NULL,
  `thanhtoan_id` int(11) NOT NULL,
  `dh_trang_thai` varchar(255) NOT NULL,
  `dh_tong_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhang_id` int(11) NOT NULL,
  `dh_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `donhang_ten_nguoi_nhan` varchar(225) NOT NULL,
  `donhang_dia_chi` varchar(225) NOT NULL,
  `donhang_sdt` int(10) NOT NULL,
  `donhang_tong_tien` int(11) NOT NULL,
  `donhang_ghi_chu` text NOT NULL,
  `donhang_pay` varchar(225) NOT NULL,
  `donhang_trang_thai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `khachhang_ten` varchar(225) NOT NULL,
  `khachhang_dia_chi` varchar(225) NOT NULL,
  `khachhang_sdt` int(10) NOT NULL,
  `khachhang_ngay_sinh` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `khuyenmai_id` int(11) NOT NULL,
  `khuyenmai_ten` varchar(225) NOT NULL,
  `khuyenmai_loai` varchar(225) NOT NULL,
  `khuyenmai_gia_tri` int(11) NOT NULL,
  `khuyenmai_ngay_bd` date NOT NULL,
  `khuyenmai_ngay_kt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_30_182714_create_tbl_admin_table', 1),
(6, '2023_12_01_014546_create_tbl_category', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ncc_id` int(11) NOT NULL,
  `ncc_ten` varchar(225) NOT NULL,
  `ncc_sdt` varchar(10) NOT NULL,
  `ncc_dia_chi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ncc_id`, `ncc_ten`, `ncc_sdt`, `ncc_dia_chi`) VALUES
(5, 'Minh Thành', '0523284884', '123 Nguyễn Văn Ling, Phường Tân Thuận, Quận 7'),
(6, 'Trương Đoàn', '0819433009', '47A Trần Thị Trọng, Phường 15, Quận Tân Bình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvien_id` int(11) NOT NULL,
  `nhanvien_ten` varchar(225) NOT NULL,
  `nhanvien_sdt` int(10) NOT NULL,
  `nhanvien_ngay_sinh` date NOT NULL,
  `nhanvien_dia_chi` varchar(225) NOT NULL,
  `nhanvien_cccd` int(12) NOT NULL,
  `nhanvien_ngay_vao_lam` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `nhanvien_chuc_vu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `sanpham_ten` varchar(225) NOT NULL,
  `sanpham_hinh` varchar(255) DEFAULT NULL,
  `sanpham_mo_ta` text NOT NULL,
  `sanpham_luot_xem` int(11) DEFAULT NULL,
  `sanpham_trang_thai` varchar(225) DEFAULT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `ncc_id` int(11) NOT NULL,
  `sanpham_gia` int(11) DEFAULT NULL,
  `sanpham_gia_km` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanpham_id`, `sanpham_ten`, `sanpham_hinh`, `sanpham_mo_ta`, `sanpham_luot_xem`, `sanpham_trang_thai`, `thuonghieu_id`, `danhmuc_id`, `ncc_id`, `sanpham_gia`, `sanpham_gia_km`) VALUES
(64, 'Giày Vans Old Skool', 'z4953018585081_f66bb69c1cc3c865bb36d8347c61667d33.jpg', 'Giày Vans Old Skool', NULL, '0', 5, 7, 5, NULL, NULL),
(65, 'Giày Vans Black Canvas', 'z4953052453945_73395d3885657050b69b8ce43e2df6608.jpg', 'Giày Vans Black Canvas', NULL, '0', 5, 7, 5, NULL, NULL),
(66, 'Giày Converse Chuk Taylor All Star 1970s', 'z4953058274658_7d074768a32beb5ec052821e5a5a0c3122.jpg', 'Giày Converse Chuk Taylor All Star 1970s', NULL, '0', 7, 7, 5, NULL, NULL),
(67, 'Giày Converse Chuk Taylor 70 Nautical Tri Blocked', 'z4953063343997_2a3cdd659df0310fefce1c026000104c41.jpg', 'Giày Converse Chuk Taylor 70 Nautical Tri Blocked', NULL, '0', 7, 7, 5, NULL, NULL),
(68, 'Giày PUMA unisex cổ thấp Slipstream Lux', 'z4953069439679_312c1fe6d69c73c47d14a1f9d9f417a859.jpg', 'Giày PUMA unisex cổ thấp Slipstream Lux', NULL, '0', 10, 7, 6, NULL, NULL),
(69, 'Giày PUMA nam Suede Classic XXI', 'z4953077200187_f90a76068fc836f664e4b7a68a271c8746.jpg', 'Giày PUMA nam Suede Classic XXI', NULL, '0', 10, 7, 6, NULL, NULL),
(70, 'Giày susu xx', 'z4953077217832_4bc10dbbb424b52d1551adeabc0e6ff710.jpg', 'Giày susu xx', NULL, '0', 5, 7, 6, 322353425, 345),
(71, 'Giày vans', 'z4953052442155_740064c29a1c9b001d400d2a2ff28c9d40.jpg', 'Giày vans', NULL, '0', 5, 7, 6, 1100000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_ct`
--

CREATE TABLE `sanpham_ct` (
  `sanpham_ct_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `mau_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `sanpham_ct_sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_ct`
--

INSERT INTO `sanpham_ct` (`sanpham_ct_id`, `sanpham_id`, `mau_id`, `size_id`, `sanpham_ct_sl`) VALUES
(19, 70, 8, 1, 22),
(20, 70, 6, 4, 12),
(21, 71, 5, 6, 10),
(22, 71, 5, 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_hinh_item`
--

CREATE TABLE `sanpham_hinh_item` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_hinh_item`
--

INSERT INTO `sanpham_hinh_item` (`id`, `sanpham_id`, `name`) VALUES
(12, 64, '1701966279z4953018592166_b4edd45e4ebaaae5f8e58c4b635d11e023.jpg'),
(13, 64, '1701966279z4953018596845_73cc6bed119f8aa16545420baaed63f824.jpg'),
(14, 65, '1701966614z4953052442155_740064c29a1c9b001d400d2a2ff28c9d75.jpg'),
(15, 65, '1701966614z4953052445829_dd38d3a1a6352e58e22cd6c45197185e5.jpg'),
(16, 66, '1701966844z4953058268998_28e23797665a6071f2ac7b899edfa8fa61.jpg'),
(17, 66, '1701966844z4953058276229_5209ea3c13ed7e0d5251dcef76e5923b23.jpg'),
(18, 66, '1701966844z4953058279682_01254839cdd9236aa69636871959881268.jpg'),
(19, 67, '1701967049z4953063348556_3bab4a3f8166ff7d350e65e8b3f9f3e169.jpg'),
(20, 67, '1701967049z4953063351482_d67ed7b952434e73622bd4ec4332d83373.jpg'),
(21, 68, '1701967369z4953069437667_abc60eab922dc3f65fb06ed0b620551815.jpg'),
(22, 68, '1701967369z4953069442800_d9f6c36d1e4c8bb37585fb9b20e2e75a53.jpg'),
(23, 68, '1701967369z4953069443429_70aa8f6f5e574749bb5fccc3fb32006b60.jpg'),
(24, 69, '1701967679z4953077204485_4adfb7a54a96a0c85bd2174b2b1de46046.jpg'),
(25, 69, '1701967679z4953077211384_dfe660ed596a8c20421ad98eea8e8bf69.jpg'),
(26, 69, '1701967679z4953077216637_e348676661b6761ea52ff1adb1d8e58b72.jpg'),
(27, 69, '1701967679z4953077217832_4bc10dbbb424b52d1551adeabc0e6ff719.jpg'),
(28, 70, '1703092472z4953077200187_f90a76068fc836f664e4b7a68a271c8784.jpg'),
(29, 70, '1703092472z4953077204485_4adfb7a54a96a0c85bd2174b2b1de46056.jpg'),
(30, 70, '1703092472z4953077211384_dfe660ed596a8c20421ad98eea8e8bf636.jpg'),
(31, 70, '1703092472z4953077216637_e348676661b6761ea52ff1adb1d8e58b69.jpg'),
(32, 71, '1703128288z4953052445829_dd38d3a1a6352e58e22cd6c45197185e34.jpg'),
(33, 71, '1703128288z4953052453945_73395d3885657050b69b8ce43e2df66040.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_mau`
--

CREATE TABLE `sanpham_mau` (
  `mau_id` int(11) NOT NULL,
  `mau_ten` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_mau`
--

INSERT INTO `sanpham_mau` (`mau_id`, `mau_ten`) VALUES
(5, 'Đen'),
(6, 'Trắng'),
(7, 'Đỏ'),
(8, 'Xanh dương'),
(9, 'Xanh lá'),
(10, 'Vàng'),
(11, 'Cam'),
(12, 'Nâu'),
(13, 'Tím'),
(14, 'Hồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_size`
--

CREATE TABLE `sanpham_size` (
  `size_id` int(11) NOT NULL,
  `size_ten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_size`
--

INSERT INTO `sanpham_size` (`size_id`, `size_ten`) VALUES
(1, 36),
(2, 37),
(3, 38),
(4, 39),
(5, 40),
(6, 41),
(7, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tấn Hồ', '0523284884', '2023-11-30 18:38:07', '2023-11-30 18:38:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `thanhtoan_id` int(11) NOT NULL,
  `thanhtoan_hinh_thuc` varchar(255) NOT NULL,
  `thanhtoan_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`thanhtoan_id`, `thanhtoan_hinh_thuc`, `thanhtoan_trang_thai`) VALUES
(1, '2', 'Đang chờ xử lý'),
(2, '2', 'Đang chờ xử lý'),
(3, '2', 'Đang chờ xử lý'),
(4, '2', 'Đang chờ xử lý'),
(5, '1', 'Đang chờ xử lý'),
(6, '2', 'Đang chờ xử lý'),
(7, '2', 'Đang chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `thuonghieu_id` int(11) NOT NULL,
  `thuonghieu_ten` varchar(255) NOT NULL,
  `thuonghieu_mo_ta` text NOT NULL,
  `thuonghieu_trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`thuonghieu_id`, `thuonghieu_ten`, `thuonghieu_mo_ta`, `thuonghieu_trang_thai`) VALUES
(4, 'Nike', 'Nike', 0),
(5, 'Vans', 'Vans', 0),
(6, 'Adidas', 'Adidas', 0),
(7, 'Converse', 'Converse', 0),
(8, 'MLB', 'MLB', 0),
(9, 'New Balance', 'New Balance', 0),
(10, 'Puma', 'Puma', 0),
(11, 'Lacoste', 'Lacoste', 0),
(12, 'Reebok', 'Reebok', 0),
(13, 'Balanciaga', 'Balanciaga', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`) VALUES
(10, 'leminh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'ho@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'nhan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `vanchuyen_id` int(11) NOT NULL,
  `vanchuyen_ten` varchar(255) NOT NULL,
  `vanchuyen_dia_chi` text NOT NULL,
  `vanchuyen_sdt` varchar(10) NOT NULL,
  `vanchuyen_email` varchar(255) NOT NULL,
  `vanchuyen_ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `vanchuyen`
--

INSERT INTO `vanchuyen` (`vanchuyen_id`, `vanchuyen_ten`, `vanchuyen_dia_chi`, `vanchuyen_sdt`, `vanchuyen_email`, `vanchuyen_ghichu`) VALUES
(1, 'Mạnh', '123 Nguyễn Văn Linh', '0123456789', 'manh@gmail.com', 'Giao hàng trong ngày'),
(2, 'Mạnh', '123 Nguyễn Văn Linh', '0123456789', 'manh@gmail.com', 'Giao hàng nhanh'),
(3, 'Mạnh', '123 Nguyễn Văn Linh', '0123456789', 'manh@gmail.com', 'Giao nhanh'),
(4, 'Hải', '123 Nguyễn Văn Linh', '0523284884', 'hai@gmail.com', NULL),
(5, 'Hải', '123 Nguyễn Văn Linh', '0123456789', 'hai@gmail.com', NULL),
(6, 'Mạnh', '123 Nguyễn Văn Linh', '0123456789', 'manh@gmail.com', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD PRIMARY KEY (`chitietdh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `dh_id` (`dh_id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`danhgia_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Chỉ mục cho bảng `dh`
--
ALTER TABLE `dh`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `thanhtoan_id` (`thanhtoan_id`),
  ADD KEY `vanchuyen_id` (`vanchuyen_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhang_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`khuyenmai_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ncc_id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvien_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`),
  ADD KEY `ncc_id` (`ncc_id`),
  ADD KEY `thuonghieu_id` (`thuonghieu_id`);

--
-- Chỉ mục cho bảng `sanpham_ct`
--
ALTER TABLE `sanpham_ct`
  ADD PRIMARY KEY (`sanpham_ct_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `mau_id` (`mau_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Chỉ mục cho bảng `sanpham_hinh_item`
--
ALTER TABLE `sanpham_hinh_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `sanpham_mau`
--
ALTER TABLE `sanpham_mau`
  ADD PRIMARY KEY (`mau_id`);

--
-- Chỉ mục cho bảng `sanpham_size`
--
ALTER TABLE `sanpham_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`thanhtoan_id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`thuonghieu_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`vanchuyen_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  MODIFY `chitietdh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `danhgia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `danhmuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dh`
--
ALTER TABLE `dh`
  MODIFY `dh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `khuyenmai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ncc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanvien_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `sanpham_ct`
--
ALTER TABLE `sanpham_ct`
  MODIFY `sanpham_ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `sanpham_hinh_item`
--
ALTER TABLE `sanpham_hinh_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `sanpham_mau`
--
ALTER TABLE `sanpham_mau`
  MODIFY `mau_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sanpham_size`
--
ALTER TABLE `sanpham_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `thanhtoan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `thuonghieu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `vanchuyen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD CONSTRAINT `chitietdh_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`sanpham_id`),
  ADD CONSTRAINT `chitietdh_ibfk_3` FOREIGN KEY (`dh_id`) REFERENCES `dh` (`dh_id`);

--
-- Các ràng buộc cho bảng `dh`
--
ALTER TABLE `dh`
  ADD CONSTRAINT `dh_ibfk_1` FOREIGN KEY (`thanhtoan_id`) REFERENCES `thanhtoan` (`thanhtoan_id`),
  ADD CONSTRAINT `dh_ibfk_2` FOREIGN KEY (`vanchuyen_id`) REFERENCES `vanchuyen` (`vanchuyen_id`),
  ADD CONSTRAINT `dh_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`danhmuc_id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ncc_id`) REFERENCES `nhacungcap` (`ncc_id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`thuonghieu_id`) REFERENCES `thuonghieu` (`thuonghieu_id`);

--
-- Các ràng buộc cho bảng `sanpham_ct`
--
ALTER TABLE `sanpham_ct`
  ADD CONSTRAINT `sanpham_ct_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`sanpham_id`),
  ADD CONSTRAINT `sanpham_ct_ibfk_2` FOREIGN KEY (`mau_id`) REFERENCES `sanpham_mau` (`mau_id`),
  ADD CONSTRAINT `sanpham_ct_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sanpham_size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
