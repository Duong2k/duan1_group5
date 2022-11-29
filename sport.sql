-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2022 lúc 03:56 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sport`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'boday382033@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Văn Dương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES
(1, 'Giày chất lượng', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 'giay3.jpg'),
(2, 'Giày chất lượng và đẹp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, 'g3.jpg'),
(3, 'Quần chất lượng và bền bỉ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 3, 'quan1.jpg'),
(4, 'Áo khoác chất lượng cao', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 4, 'thethao1.jpg'),
(5, 'Áo khoác đẹp và bền bỉ', 'Chất liệu vải thun mè cao cấp nhất, chuẩn Thái Lan.\r\nForm ôm body rất đẹp và vừa vặn.\r\nHàng chất lượng cao, thoáng mát, không nhăn, không xù lông.\r\nMẫu áo thiết kế chuẩn form Player hiện đại và tinh tế.', 'Rất đẹp và bắt mắt', 4, 'quan2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(2, 'Giày Bóng Đá'),
(3, 'Giày Thể Thao'),
(4, 'Quần Thể Thao'),
(5, 'Áo Thể Thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc_tin`
--

INSERT INTO `tbl_danhmuc_tin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(1, 'Thông Tin Giày Bóng Đá'),
(2, 'Thông Tin Giày Thể Thao'),
(3, 'Thông Tin Quần Thể Thao'),
(4, 'Thông Tin Áo Thể Thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`) VALUES
(13, 20, 3, '4236', 15, '2019-10-04 02:33:55', 0, 0),
(14, 21, 4, '4236', 15, '2019-10-04 02:33:56', 0, 0),
(15, 20, 3, '6503', 16, '2019-10-04 02:34:56', 0, 0),
(16, 21, 4, '6503', 16, '2019-10-04 02:34:56', 0, 0),
(17, 21, 1, '2508', 17, '2019-10-04 02:35:19', 0, 0),
(18, 26, 3, '4249', 18, '2019-10-04 02:45:46', 0, 0),
(19, 26, 3, '8728', 19, '2019-10-04 02:46:40', 0, 0),
(20, 21, 1, '5037', 20, '2019-10-04 02:48:16', 0, 0),
(21, 20, 1, '5037', 20, '2019-10-04 02:48:17', 0, 0),
(22, 21, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0),
(23, 20, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0),
(75, 19, 1, '1700', 29, '2022-11-25 19:11:10', 3, 0),
(80, 21, 1, '3685', 29, '2022-11-25 19:19:30', 0, 0),
(81, 27, 1, '5311', 31, '2022-11-26 04:49:01', 0, 0),
(82, 27, 1, '8355', 32, '2022-11-26 04:50:57', 0, 0),
(83, 26, 1, '8982', 32, '2022-11-26 04:51:31', 0, 0),
(84, 19, 1, '618', 33, '2022-11-26 07:27:06', 0, 0),
(85, 19, 1, '146', 35, '2022-11-26 07:56:04', 2, 0),
(86, 19, 1, '3525', 35, '2022-11-26 08:14:10', 0, 0),
(87, 19, 1, '9375', 35, '2022-11-26 08:19:31', 0, 0),
(88, 19, 1, '6888', 35, '2022-11-26 08:20:26', 0, 0),
(89, 19, 1, '3577', 35, '2022-11-26 08:21:58', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`) VALUES
(3, 21, 2, '5737', '2019-10-04 02:57:00', 23, 0, 0),
(4, 26, 1, '6219', '2019-10-04 02:58:34', 24, 0, 0),
(5, 25, 3, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(6, 22, 5, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(7, 27, 2, '7785', '2019-10-04 03:11:52', 25, 0, 0),
(8, 21, 1, '5396', '2019-10-04 03:49:08', 26, 0, 0),
(9, 20, 3, '5396', '2019-10-04 03:49:08', 26, 0, 0),
(10, 20, 3, '7914', '2019-10-05 05:38:42', 28, 0, 0),
(11, 26, 1, '7914', '2019-10-05 05:38:42', 28, 0, 0),
(12, 25, 2, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(13, 26, 3, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(14, 27, 1, '6687', '2019-10-09 09:48:42', 27, 1, 2),
(15, 22, 1, '1125', '2022-11-24 05:56:29', 27, 3, 2),
(16, 24, 1, '1125', '2022-11-24 05:56:29', 27, 3, 2),
(17, 20, 1, '555', '2019-10-09 09:50:08', 27, 0, 2),
(18, 26, 1, '6889', '2022-11-23 22:45:21', 30, 0, 0),
(19, 21, 1, '6889', '2022-11-23 22:45:21', 30, 0, 0),
(20, 22, 2, '6889', '2022-11-23 22:45:21', 30, 0, 0),
(57, 21, 1, '3685', '2022-11-25 19:19:30', 29, 0, 0),
(58, 27, 1, '5311', '2022-11-26 04:49:01', 31, 0, 0),
(59, 27, 1, '8355', '2022-11-26 04:50:57', 32, 0, 0),
(60, 26, 1, '8982', '2022-11-26 04:51:31', 32, 0, 0),
(61, 19, 1, '618', '2022-11-26 07:27:06', 33, 0, 0),
(62, 19, 1, '146', '2022-11-26 07:56:04', 35, 2, 0),
(63, 19, 1, '3525', '2022-11-26 08:14:10', 35, 0, 0),
(64, 19, 1, '9375', '2022-11-26 08:19:31', 35, 0, 0),
(65, 19, 1, '6888', '2022-11-26 08:20:26', 35, 0, 0),
(66, 19, 1, '3577', '2022-11-26 08:21:58', 35, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `size` varchar(255) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(29, 'Quang Dương', '0383390125', 'Hà Nội', 'Xin chào', 'boday382033@gmail.com', '5ec829debe54b19a5f78d9a65b900a39', 0),
(31, 'Văn Dương', '0383390125', 'Hà nội', 'Xin chào', 'duonghvph26744@fpt.edu.vn', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(32, 'Văn Dương', '0383390125', 'Hà nội', 'Xin chào', 'duonghvph26744@fpt.edu.vn', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(33, 'Văn Mạnh', '0383390125', 'Hà Nội', 'Xin chào', 'manh@gmail.com', 'c5b2cebf15b205503560c4e8e6d1ea78', 1),
(34, 'Quang Dương', '0383390125', 'Hà Nội', 'Xin chào', 'boday382033@gmail.com', 'c5b2cebf15b205503560c4e8e6d1ea78', 0),
(35, 'Văn Dương', '0383390125', 'Hà Nội', 'gbcgg', 'boday382033@gmail.com', 'c5b2cebf15b205503560c4e8e6d1ea78', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_size` varchar(255) NOT NULL,
  `sanpham_color` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_size`, `sanpham_color`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(17, 2, 'GIÀY BÓNG ĐÁ WIKA HUNTER 2 TRẮNG', '', '', 'dasdasdasadasd', 'dasdasddsadasds', '500000', '350000', 0, 0, 10, 'giay3.jpg'),
(18, 5, 'ÁO POLO DAS MÀU XANH DƯƠNG', '', '', 'Mềm và bền bỉ', 'Chất lượng tốt', '300000', '190000', 0, 0, 10, 'thethao2.jpg'),
(19, 5, 'ÁO BODY ADIDAS MÃ A40', '', '', 'Vải mềm nhẹ nhàng', 'Chất lượng tốt', '200000', '120000', 0, 0, 5, 'thethao1.jpg'),
(20, 4, 'QUẦN SHORT LACOSTE – MÃ Q29', '', '', 'dasdad', 'dasdas', '250000', '170000', 0, 0, 15, 'quan2.jpg'),
(21, 4, 'QUẦN DÀI ADIDAS ỐNG SUÔNG – MÃ Q03', '', '', 'dasdad', 'dasdas', '290000', '190000', 0, 0, 10, 'quan1.jpg'),
(22, 2, 'GIÀY BÓNG ĐÁ WIKA HUNTER 2 ĐEN', '', '', 'dasdad', 'dasdas', '500000', '350000', 0, 0, 5, 'giay2.jpg'),
(23, 2, 'GIÀY BÓNG ĐÁ WIKA HUNTER 2 CAM', '', '', 'dasdaddasda', 'dasdasdasd', '500000', '350000', 0, 0, 10, 'giay1.jpg'),
(26, 3, 'GIẦY THỂ THAO NAM CHẠY BỘ MÃ S12', '', '', 'dasdas', 'dsadas', '400000', '299000', 0, 0, 10, 'g3.jpg'),
(27, 3, 'GIẦY CASUAL NAM THỜI TRANG MÃ S19', '', '', 'dasdas', 'dsadas', '500000', '390000', 0, 0, 10, 'g1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'banner1.png', 'Slider khuyến mãi ', 1),
(2, 'banner2.png', 'Slider 50%', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
