-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 16, 2021 lúc 11:16 AM
-- Phiên bản máy phục vụ: 5.7.36-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.34-26+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangtrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `MAHD` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` int(200) NOT NULL,
  `GIA` int(11) NOT NULL,
  `PHANTRAMGIAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`, `PHANTRAMGIAM`) VALUES
('HD01', 'SP13', 1, 65000, 0),
('HD01', 'SP17', 2, 80000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_phieunhap`
--

CREATE TABLE `ct_phieunhap` (
  `MAPN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` int(200) NOT NULL,
  `GIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_phieunhap`
--

INSERT INTO `ct_phieunhap` (`MAPN`, `MASP`, `SOLUONG`, `GIA`) VALUES
('PN01', 'SP01', 20, 55000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MANV` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYLAP` date NOT NULL,
  `GIOLAP` time NOT NULL,
  `TONG` int(11) NOT NULL,
  `MATRANGTHAI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MAKM` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MANV`, `MAKH`, `NGAYLAP`, `GIOLAP`, `TONG`, `MATRANGTHAI`, `MAKM`) VALUES
('HD01', NULL, 'KH01', '2021-12-16', '11:12:21', 225000, 'TT01', 'KM02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENKH` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `GIOITINH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENDN` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL,
  `DIEMTL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `NGAYSINH`, `GIOITINH`, `TENDN`, `MATKHAU`, `DIACHI`, `SDT`, `TRANGTHAI`, `DIEMTL`) VALUES
('KH01', 'Phạm Nguyễn Minh Thuận', NULL, 'Nam', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 'Bến Tre,Việt Nam', '0123456789', 1, 1),
('KH02', 'lijllmkmlk', NULL, 'Nữ', 'b@gmail.com', '202cb962ac59075b964b07152d234b70', 'sacas', '0123452007', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MAKM` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYBD` date NOT NULL,
  `NGAYKT` date NOT NULL,
  `PHANTRAMGIAM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MAKM`, `NGAYBD`, `NGAYKT`, `PHANTRAMGIAM`) VALUES
('KM00', '1000-12-01', '3021-12-31', 0),
('KM01', '2021-10-03', '2021-10-21', 5),
('KM02', '2021-11-01', '2022-11-30', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MALOAI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAI` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MALOAI`, `TENLOAI`) VALUES
('LSP01', 'Vòng Tay'),
('LSP02', 'Dây Chuyền'),
('LSP03', 'Nhẫn'),
('LSP04', 'Khuyên Tai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MANCC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENNCC` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MANCC`, `TENNCC`, `DIACHI`, `SDT`, `TRANGTHAI`) VALUES
('NCC01', 'Nhà Cung Cấp 1', 'TPHCM', '0843739379', 1),
('NCC02', 'Nhà Cung Cấp 2', 'Tiền Giang ', '0978456123', 1),
('NCC03', 'Nhà Cung Cấp 03', 'Bến Tre', '0843739379', 1),
('NCC04', 'Nhà Cung Cấp 04', 'Kiên Giang ', '0843739379', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENNV` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `MAQUYEN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENDN` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TENNV`, `NGAYSINH`, `GIOITINH`, `DIACHI`, `SDT`, `MAQUYEN`, `TENDN`, `MATKHAU`, `TRANGTHAI`) VALUES
('NV00', 'Quản trị viên', '1000-01-01', 'Nam', 'TP.HCM', '088123456', '1', 'root', '202cb962ac59075b964b07152d234b70', 1),
('NV01', 'nHÂN vIÊN 1', '2021-10-04', 'Nam', 'dsvsdvds', '0974158320', '2', 'sdvsdvs', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MANV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MANCC` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYLAP` date NOT NULL,
  `GIOLAP` time NOT NULL,
  `TONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MAPN`, `MANV`, `MANCC`, `NGAYLAP`, `GIOLAP`, `TONG`) VALUES
('PN01', 'NV00', 'NCC01', '2021-12-16', '11:15:57', 1100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MAQUYEN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENQUYEN` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MOTA` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MAQUYEN`, `TENQUYEN`, `MOTA`) VALUES
('1', 'Admin', 'Nhân viên Admin'),
('2', 'Bán Hàng', 'Nhân viên bán hàng ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangsuc`
--

CREATE TABLE `trangsuc` (
  `MASP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENSP` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GIA` int(11) NOT NULL,
  `SOLUONG` int(200) NOT NULL,
  `HINHANH` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL,
  `PHANTRAMGIAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangsuc`
--

INSERT INTO `trangsuc` (`MASP`, `TENSP`, `MALOAI`, `GIA`, `SOLUONG`, `HINHANH`, `TRANGTHAI`, `PHANTRAMGIAM`) VALUES
('SP01', 'Vòng tay Infinity Handmade Ruby Queen', 'LSP01', 55000, 40, 'vongtayqueen.png', 1, 0),
('SP02', 'Vòng tay Infinity Handmade Ruby Crown', 'LSP01', 35000, 20, 'vongtaycrown.png', 1, 0),
('SP03', 'Vòng tay Infinity Trầm Hương Thạch Anh', 'LSP01', 50000, 20, 'vongtaythachanh.png', 1, 0),
('SP04', 'Vòng tay Infinity Panther Phong Thủy', 'LSP01', 40000, 20, 'vongtaypanther.png', 1, 0),
('SP05', 'Vòng tay Infinity Cz Diamond', 'LSP01', 25000, 20, 'vongtaydiamond.png', 1, 0),
('SP06', 'Vòng tay Infinity Phật Buddha', 'LSP01', 30000, 20, 'vongtayphatbuddha.png', 1, 0),
('SP07', 'Vòng tay Infinity Phật Lục Tự', 'LSP01', 60000, 19, 'vongtayphatluctu.png', 1, 0),
('SP08', 'Dây chuyền Infinity Snake Cross', 'LSP02', 123000, 25, 'daychuyensnake.png', 1, 0),
('SP09', 'Dây chuyền Infinity Ngọc trai chữ Thập', 'LSP02', 157000, 24, 'daychuyenchuthap.png', 1, 0),
('SP10', 'Dây chuyền Infinity Pyramid V', 'LSP02', 175000, 20, 'daychuyenparamidv.png', 1, 0),
('SP11', 'Dây chuyền Infinity Hồ Điệp', 'LSP02', 200000, 20, 'daychuyenhodiep.png', 1, 0),
('SP12', 'Nhẫn Infinity CH khảm đá tím', 'LSP03', 60000, 50, 'nahnkhamdatim.png', 1, 0),
('SP13', 'Nhẫn Infinity CH khảm đá xanh', 'LSP03', 65000, 49, 'nhankhamdaxanh.png', 1, 0),
('SP14', 'Nhẫn Infinity CH King Black', 'LSP03', 66000, 50, 'nhanking.png', 1, 0),
('SP15', 'Nhẫn Infinity CH dọc', 'LSP03', 68000, 52, 'nhandoc.png', 1, 0),
('SP16', 'Khuyên tai Infinity không bấm - 03', 'LSP04', 88000, 15, 'khuyentai03.png', 1, 0),
('SP17', 'Khuyên tai Infinity không bấm -04', 'LSP04', 80000, 13, 'khuyentai04.png', 1, 0),
('SP18', 'Khuyên tai Infinity không bấm Cross', 'LSP04', 86000, 15, 'khuyentaicross.png', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaigiaohang`
--

CREATE TABLE `trangthaigiaohang` (
  `MATRANGTHAI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MOTATRANGTHAI` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaigiaohang`
--

INSERT INTO `trangthaigiaohang` (`MATRANGTHAI`, `MOTATRANGTHAI`) VALUES
('TT01', 'CHỜ XÁC NHẬN'),
('TT03', 'ĐÃ NHẬN'),
('TT02', 'ĐÃ XÁC NHẬN');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`MAHD`,`MASP`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `ct_phieunhap`
--
ALTER TABLE `ct_phieunhap`
  ADD PRIMARY KEY (`MAPN`,`MASP`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MANV` (`MANV`,`MAKH`,`MATRANGTHAI`),
  ADD KEY `MATRANGTHAI` (`MATRANGTHAI`),
  ADD KEY `hoadon_ibfk_6` (`MAKH`),
  ADD KEY `MAKHUYENMAI` (`MAKM`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD UNIQUE KEY `TENDN` (`TENDN`),
  ADD KEY `MATKHAU` (`MATKHAU`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MAKM`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MALOAI`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MANCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD UNIQUE KEY `TENDN` (`TENDN`),
  ADD KEY `MATKHAU` (`MATKHAU`),
  ADD KEY `MAQUYEN` (`MAQUYEN`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MAPN`),
  ADD KEY `MANCC` (`MANCC`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Chỉ mục cho bảng `trangsuc`
--
ALTER TABLE `trangsuc`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MALOAI` (`MALOAI`);

--
-- Chỉ mục cho bảng `trangthaigiaohang`
--
ALTER TABLE `trangthaigiaohang`
  ADD PRIMARY KEY (`MATRANGTHAI`),
  ADD KEY `MOTATRANGTHAI` (`MOTATRANGTHAI`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_2` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `ct_hoadon_ibfk_3` FOREIGN KEY (`MASP`) REFERENCES `trangsuc` (`MASP`);

--
-- Các ràng buộc cho bảng `ct_phieunhap`
--
ALTER TABLE `ct_phieunhap`
  ADD CONSTRAINT `ct_phieunhap_ibfk_1` FOREIGN KEY (`MAPN`) REFERENCES `phieunhap` (`MAPN`),
  ADD CONSTRAINT `ct_phieunhap_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `trangsuc` (`MASP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MATRANGTHAI`) REFERENCES `trangthaigiaohang` (`MATRANGTHAI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_5` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `hoadon_ibfk_6` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `hoadon_ibfk_7` FOREIGN KEY (`MAKM`) REFERENCES `khuyenmai` (`MAKM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MAQUYEN`) REFERENCES `quyen` (`MAQUYEN`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`);

--
-- Các ràng buộc cho bảng `trangsuc`
--
ALTER TABLE `trangsuc`
  ADD CONSTRAINT `trangsuc_ibfk_3` FOREIGN KEY (`MALOAI`) REFERENCES `loaisanpham` (`MALOAI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
