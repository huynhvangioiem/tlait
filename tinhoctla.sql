-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2019 lúc 09:52 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tinhoctla`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avartar`
--

CREATE TABLE `avartar` (
  `Ar_id` int(11) NOT NULL,
  `Ar_Ten` text NOT NULL,
  `Ar_nickName` text NOT NULL,
  `Ar_Caption` text NOT NULL,
  `Ar_Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `avartar`
--

INSERT INTO `avartar` (`Ar_id`, `Ar_Ten`, `Ar_nickName`, `Ar_Caption`, `Ar_Anh`) VALUES
(0, 'Huá»³nh VÄƒn Giá»i Em', 'TÃ´i LÃ  Ai', 'IT Students At Can Tho University', 'AnhDaiDien2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `Ct_id` int(11) NOT NULL,
  `Ct_Ten` text NOT NULL,
  `Ct_GiaTri` text NOT NULL,
  `Ct_link` text NOT NULL,
  `Ct_TrangThai` int(11) NOT NULL,
  `Ct_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`Ct_id`, `Ct_Ten`, `Ct_GiaTri`, `Ct_link`, `Ct_TrangThai`, `Ct_icon`) VALUES
(9, 'NgÃ y Sinh', '23/11', '#', 1, 'if_Period_end_132159.png'),
(10, 'Giá»›i TÃ­nh', 'Nam', '#', 1, 'if_profle_1055000.png'),
(11, 'Sá»‘ Äiá»‡n Thoáº¡i', '0335687425', 'tel:+84335687425', 1, 'if_phone_1807538.png'),
(12, 'Email', 'huynhvangioiem@gmail.com', 'mailto:huynhvangioiem@gmail.com', 1, 'if_Gmail_3721669.png'),
(14, 'Facebook', 'Facebook.com/huynhvangioiem', 'https://www.facebook.com/huynhvangioiem', 1, 'icon_fb.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `Edu_id` int(11) NOT NULL,
  `Edu_Ten` text NOT NULL,
  `Edu_GiaTri` text NOT NULL,
  `Edu_link` text NOT NULL,
  `Edu_NienKhoa` text NOT NULL,
  `Edu_NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`Edu_id`, `Edu_Ten`, `Edu_GiaTri`, `Edu_link`, `Edu_NienKhoa`, `Edu_NgayThem`) VALUES
(7, 'THCS ', 'THCS HÃ²a BÃ¬nh Tháº¡nh - CT.An Giang', 'http://thcshoabinhthanh.pgdchauthanhag.edu.vn/', '2010-2014', '2019-01-16 11:29:39'),
(8, 'THPT', 'THPT Nguyá»…n Bá»‰nh KhiÃªm', 'https://thpt-nguyenbinhkhiem-angiang.edu.vn', '2014-2017', '2019-01-16 11:32:52'),
(9, 'CUSC', 'TT CÃ´ng Nghá»‡ Pháº§n Má»m - ÄHCT', 'https://aptech.cusc.vn/', '2018-*', '2019-01-16 11:34:04'),
(10, 'DHCT', 'Äáº¡i Há»c Cáº§n ThÆ¡', 'https://ctu.edu.vn', '2017-2021', '2019-01-16 11:35:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodien`
--

CREATE TABLE `giaodien` (
  `gd_id` int(11) NOT NULL,
  `MauNenSocial` text NOT NULL,
  `MauChuSocial` text NOT NULL,
  `MauNenMenu` text NOT NULL,
  `MauChuMenu` text NOT NULL,
  `MauNenMenuHover` text NOT NULL,
  `MauNenChuHover` text NOT NULL,
  `MauNenAvatar` text NOT NULL,
  `MauChuAvatar` text NOT NULL,
  `KieuAvatar` text NOT NULL,
  `MauNenTrai` text NOT NULL,
  `MauChuTrai` text NOT NULL,
  `MauChuTraiHover` text NOT NULL,
  `MauNenTitle` text NOT NULL,
  `MauChuTitle` text NOT NULL,
  `MauNenContent` text NOT NULL,
  `MauChuContent` text NOT NULL,
  `MauChuContentHover` text NOT NULL,
  `MauNenFooter` text NOT NULL,
  `MauChuFooter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaodien`
--

INSERT INTO `giaodien` (`gd_id`, `MauNenSocial`, `MauChuSocial`, `MauNenMenu`, `MauChuMenu`, `MauNenMenuHover`, `MauNenChuHover`, `MauNenAvatar`, `MauChuAvatar`, `KieuAvatar`, `MauNenTrai`, `MauChuTrai`, `MauChuTraiHover`, `MauNenTitle`, `MauChuTitle`, `MauNenContent`, `MauChuContent`, `MauChuContentHover`, `MauNenFooter`, `MauChuFooter`) VALUES
(1, '#999999', '#ffffff', '#990000', '#ffffff', '#ffff00', '#ff0000', '#000099', '#ffffff', 'img-circle', '#0066ff', '#ffffff', '#ff0000', '#ff6600', '#000099', '#ccffff', '#0000fd', '#ff0000', '#f5f5f5', '#000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muctieu`
--

CREATE TABLE `muctieu` (
  `Mt_id` int(11) NOT NULL,
  `Mt_values` text NOT NULL,
  `Mt_ngayUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `muctieu`
--

INSERT INTO `muctieu` (`Mt_id`, `Mt_values`, `Mt_ngayUpdate`) VALUES
(1, 'Táº¥t cáº£ nhá»¯ng gÃ¬ báº¡n há»c pháº£i Ä‘Æ°á»£c á»©ng dá»¥ng vÃ o cuá»™c sá»‘ng.', '2019-01-16 11:24:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `Nd_id` int(11) NOT NULL,
  `Nd_TenDangNhap` varchar(45) NOT NULL,
  `Nd_MatKhau` varchar(45) NOT NULL,
  `Nd_TrangThai` int(1) DEFAULT NULL,
  `Nd_VaiTro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`Nd_id`, `Nd_TenDangNhap`, `Nd_MatKhau`, `Nd_TrangThai`, `Nd_VaiTro`) VALUES
(1, 'admin', '25f9e794323b453885f5181f1b624d0b', 1, 'QTV');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `Pj_id` int(11) NOT NULL,
  `Pj_Ten` text NOT NULL,
  `Pj_Src` text NOT NULL,
  `Pj_Loai` int(11) NOT NULL,
  `Pj_TenFile` text NOT NULL,
  `Pj_NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`Pj_id`, `Pj_Ten`, `Pj_Src`, `Pj_Loai`, `Pj_TenFile`, `Pj_NgayThem`) VALUES
(17, 'Dá»± Ã¡n front-end web bÃ¡n hÃ ng demo', 'https://www.youtube.com/embed/m-0whCH8yaQ', 2, '', '2019-01-13 15:08:57'),
(18, 'Táº¡o Website vá»›i wordpress.com', 'https://tinhoctla.wordpress.com', 1, 'tinhoctla.wp.png', '2019-01-13 15:09:34'),
(19, 'Táº¡o video vá»›i Proshow 8.0', 'https://www.youtube.com/embed/3x1cq_tTf5A', 2, '', '2019-01-16 15:44:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skill`
--

CREATE TABLE `skill` (
  `Sk_id` int(11) NOT NULL,
  `Sk_Ten` text NOT NULL,
  `Sk_Level` int(11) NOT NULL,
  `Sk_NgayUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `skill`
--

INSERT INTO `skill` (`Sk_id`, `Sk_Ten`, `Sk_Level`, `Sk_NgayUpdate`) VALUES
(4, 'Tiáº¿ng Anh', 2, '2019-01-12 15:04:07'),
(6, 'Thuyáº¿t TrÃ¬nh', 4, '2019-01-16 11:24:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socialmenu`
--

CREATE TABLE `socialmenu` (
  `Sc_id` int(11) NOT NULL,
  `Sc_ten` text NOT NULL,
  `Sc_link` text NOT NULL,
  `Sc_target` text NOT NULL,
  `Sc_loai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `socialmenu`
--

INSERT INTO `socialmenu` (`Sc_id`, `Sc_ten`, `Sc_link`, `Sc_target`, `Sc_loai`) VALUES
(1, 'Facebook', 'https://www.facebook.com/huynhvangioiem', '_blank', 'fa-facebook'),
(2, 'YouTube', 'https://www.youtube.com/channel/UCUjya8sBXS40uYW5S1Yi7sA?view_as=subscriber', '_blank', 'fa-youtube');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sothich`
--

CREATE TABLE `sothich` (
  `St_id` int(11) NOT NULL,
  `St_Ten` text NOT NULL,
  `St_ngayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sothich`
--

INSERT INTO `sothich` (`St_id`, `St_Ten`, `St_ngayThem`) VALUES
(6, 'Thá»ƒ Thao', '2019-01-16 11:26:27'),
(8, 'Náº¥u Ä‚n', '2019-01-16 11:27:00'),
(9, 'Nghe Nháº¡c', '2019-01-16 11:27:08'),
(10, 'Cafe Má»™t MÃ¬nh', '2019-01-16 11:27:29'),
(11, 'Coding', '2019-01-16 11:27:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtich`
--

CREATE TABLE `thanhtich` (
  `Tt_id` int(11) NOT NULL,
  `Tt_Ten` text NOT NULL,
  `Tt_GiaTri` text NOT NULL,
  `Tt_Link` text NOT NULL,
  `Tt_Ngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhtich`
--

INSERT INTO `thanhtich` (`Tt_id`, `Tt_Ten`, `Tt_GiaTri`, `Tt_Link`, `Tt_Ngay`) VALUES
(1, 'Khi TÃ´i 18', 'Chá»©ng nháº­n \"Khi tÃ´i 18\" - tá»‰nh ÄoÃ n An Giang nÄƒm 2014', 'img/KhiToi18.jpg', '2019-01-15 19:36:17'),
(2, 'CCA AV', 'Chá»©ng chá»‰ tiáº¿ng Anh - TrÃ¬nh Ä‘á»™ A', '#', '2019-01-16 15:50:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `volunteer`
--

CREATE TABLE `volunteer` (
  `Vl_id` int(11) NOT NULL,
  `Vl_Ten` text NOT NULL,
  `Vl_GiaTri` text NOT NULL,
  `Vl_Link` text NOT NULL,
  `Vl_Ngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `volunteer`
--

INSERT INTO `volunteer` (`Vl_id`, `Vl_Ten`, `Vl_GiaTri`, `Vl_Link`, `Vl_Ngay`) VALUES
(10, 'Trung Thu 2017', 'ÄÃªm há»™i trÄƒng ráº±m 2017 - UBND xÃ£ VÄ©nh BÃ¬nh', 'https://photos.app.goo.gl/CUFrYLYimg5PpYdk9', '2019-01-16 15:46:05'),
(11, 'THPT QG 2018', 'Giao LÆ°u - Chia sáº½ kinh nghiá»‡m trÆ°á»›c ká»³ thi THPT QG 2018 - THPT VÄ©nh BÃ¬nh', 'https://photos.app.goo.gl/CbpbZjkpi4zaHxGq9', '2019-01-16 15:46:47'),
(12, 'Trung Thu 2018', 'ÄÃªm há»™i trÄƒng ráº±m 2018 - VÄ©nh An', 'https://photos.app.goo.gl/VNGYntHP8fxJ21bE7', '2019-01-16 15:47:31'),
(13, 'BCH NBK', 'PhÃ³ BÃ­ thÆ°, UV.BTV ÄoÃ n TrÆ°á»ng THPT Nguyá»…n Bá»‰nh KhiÃªm. Nhiá»‡m ká»³: 2015-2016, 2016-2017', 'https://www.facebook.com/DoanTruongTHPTNguyenBinhKhiemAnGiang', '2019-01-16 15:48:21'),
(14, 'BCH CNTT6', 'BCH CÄ.CNTT6 - ÄoÃ n Khoa CNTT&TT', '#', '2019-01-16 15:48:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `avartar`
--
ALTER TABLE `avartar`
  ADD PRIMARY KEY (`Ar_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Ct_id`);

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`Edu_id`);

--
-- Chỉ mục cho bảng `giaodien`
--
ALTER TABLE `giaodien`
  ADD PRIMARY KEY (`gd_id`);

--
-- Chỉ mục cho bảng `muctieu`
--
ALTER TABLE `muctieu`
  ADD PRIMARY KEY (`Mt_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`Nd_id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pj_id`);

--
-- Chỉ mục cho bảng `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`Sk_id`);

--
-- Chỉ mục cho bảng `socialmenu`
--
ALTER TABLE `socialmenu`
  ADD PRIMARY KEY (`Sc_id`);

--
-- Chỉ mục cho bảng `sothich`
--
ALTER TABLE `sothich`
  ADD PRIMARY KEY (`St_id`);

--
-- Chỉ mục cho bảng `thanhtich`
--
ALTER TABLE `thanhtich`
  ADD PRIMARY KEY (`Tt_id`);

--
-- Chỉ mục cho bảng `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`Vl_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `Ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `education`
--
ALTER TABLE `education`
  MODIFY `Edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `giaodien`
--
ALTER TABLE `giaodien`
  MODIFY `gd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `muctieu`
--
ALTER TABLE `muctieu`
  MODIFY `Mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `Nd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `Pj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `skill`
--
ALTER TABLE `skill`
  MODIFY `Sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `socialmenu`
--
ALTER TABLE `socialmenu`
  MODIFY `Sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sothich`
--
ALTER TABLE `sothich`
  MODIFY `St_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thanhtich`
--
ALTER TABLE `thanhtich`
  MODIFY `Tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `Vl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
