-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2023 lúc 05:07 AM
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
-- Cơ sở dữ liệu: `dtsoft2`
--
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id_khuvuc` varchar(10) primary key,
  `tenkhuvuc` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`id_khuvuc`, `tenkhuvuc`, `diachi`, `sdt`) VALUES
('CT', 'Cần Thơ', 'Địa chỉ cần thơ', 123456789),
('DN', 'Đà Nẵng', 'Địa chỉ đà nẵng', 1234567890),
('HCM', 'Hồ Chí Minh', 'Địa chỉ hồ chí minh', 987654321);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `id_bophan` varchar(10) primary key,
  `id_khuvuc` varchar(10) NOT NULL,
  `tenbophan` varchar(255) NOT NULL,
  `cvchuyenmon` varchar(255) NOT NULL,
  foreign key(id_khuvuc) references khuvuc(id_khuvuc)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`id_bophan`, `id_khuvuc`, `tenbophan`, `cvchuyenmon`) VALUES
('CSKH001', 'CT', 'Chăm sóc khách hàng', 'Cung cấp hỗ trợ kỹ thuật và giải đáp các câu hỏi từ khách hàng'),
('CSKH002', 'HCM', 'Chăm sóc khách hàng', 'Cung cấp hỗ trợ kỹ thuật và giải đáp các câu hỏi từ khách hàng'),
('KD001', 'CT', 'Kinh Doanh', 'Hoạt động kinh doanh'),
('KD002', 'HCM', 'Kinh doanh', 'Hoạt động kinh doanh'),
('PTPM001', 'CT', 'Phát triển phần mềm', 'Phát triển và đổi mới trong lĩnh vực công nghệ và phần mềm'),
('PTPM002', 'HCM', 'Phát triển phần mềm', 'Phát triển và đổi mới trong lĩnh vực công nghệ và phần mềm'),
('QLDA001', 'CT', 'Quản lý dự án', 'Quản lý và điều phối các dự án phần mềm'),
('QLDA002', 'HCM', 'Quản lý dự án', 'Quản lý và điều phối các dự án phần mềm'),
('T001', 'HCM', 'Tester', 'Kiểm thử và Đảm bảo chất lượng'),
('T002', 'CT', 'Tester', 'Kiểm thử và Đảm bảo chất lượng'),
('TKBT001', 'CT', 'Thiết kế bố trí', 'Thiết kế và bố trí không gian và môi trường làm việc cho nhân viên'),
('TKBT002', 'HCM', 'Thiết kế và bố trí', 'Thiết kế và bố trí không gian và môi trường làm việc cho nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitieu`
--

CREATE TABLE `chitieu` (
  `id_chitieu` varchar(10) primary key,
  `tenchitieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitieu`
--

INSERT INTO `chitieu` (`id_chitieu`, `tenchitieu`) VALUES
('DS', 'Doanh số'),
('HBSP', 'Hiểu biết sản phẩm'),
('HTKH', 'Hỗ trợ khách hàng'),
('PTKH', 'Phát triển khách hàng'),
('THCN', 'Thu hồi công nợ'),
('XHD', 'Xuất hóa đơn');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vaitro` varchar(10) primary key,
  `tenvaitro` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id_vaitro`, `tenvaitro`, `mota`) VALUES
('NS', 'Nhân Sự', 'là nhân viên trong công ty'),
('QLBP', 'Quản Lý Bộ Phận', 'là người quản lý bộ phận'),
('QLKV', 'Quản Lý Khu Vực', 'là người quản lý khu vực'),
('QTHT', 'Quản Tri Hệ thống', 'là quản trị hệ thống của công ty');

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` varchar(10) primary key,
  `id_bophan` varchar(10) DEFAULT NULL,
  `id_vaitro` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) DEFAULT NULL,
  `tennguoidung` varchar(255) NOT NULL,
  `sdt_nd` varchar(20) NOT NULL,
  `diachi_nd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  foreign key(id_bophan) references bophan(id_bophan),
  foreign key(id_vaitro) references vaitro(id_vaitro),
  foreign key(id_khuvuc) references khuvuc(id_khuvuc)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `id_bophan`, `id_vaitro`, `id_khuvuc`, `tennguoidung`, `sdt_nd`, `diachi_nd`, `email`, `password`, `ngaysinh`, `gioitinh`) VALUES
('NV001', 'KD001', 'NS', 'CT', 'Nguyễn Văn A', '123456789', 'Địa chỉ 1', 'nva@gmail.com', '123', '1993-06-01', 'Nam'),
('NV002', 'KD001', 'NS', 'CT', 'Nguyễn Văn B', '987654321', 'Địa chỉ 2', 'nvb@gmail.com', '123', '1993-06-01', 'Nam'),
('NV003', 'CSKH001', 'NS', 'CT', 'Nguyễn Văn C', '0123456789', 'Địa chỉ 3', 'nvc@gmail.com', '123', '1993-06-01', 'Nữ'),
('NV004', 'PTPM001', 'NS', 'CT', 'Nguyễn Văn D', '0123456789', 'Địa chỉ 4', 'nvc@gmail.com', '123', '1993-06-01', 'Nữ'),
('NV005', 'PTPM001', 'NS', 'CT', 'Nguyễn Văn E', '0123456789', 'Địa chỉ 5', 'nve@gmail.com', '123', '1993-06-01', 'Nam'),
('NV007', NULL, 'QLKV', 'CT', 'Phạm Văn A', '012345678', 'Địa chỉ 7', 'pva@gmail.com', '123', '1993-06-01', 'Nam'),
('NV008', 'KD001', 'NS', 'CT', 'Nguyễn Văn F', '0123456789', 'Địa chỉ 8', 'nvf@gmail.com', '123', '1993-06-01', 'Nam'),
('NV009', NULL, 'QTHT', NULL, 'Quản Trị Viên', '123456789', 'Địa chỉ 8', 'qtv@gmail.com', '123', '1993-06-01', 'Nam'),
('NV006', 'KD001', 'QLBP', 'CT', 'Trần Văn A', '0123456789', 'Địa chỉ 6', 'tva@gmail.com', '123', '2023-07-08', 'Nam'),
('NV10', 'KD001 ', 'NS', 'CT', 'Nguyễn Văn 10', '123456789', 'Địa chỉ 10', 'nv10@gmail.com', '202cb962ac59075b964b07152d234b70', '1999-01-01', ' Nam ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachgiaoviec`
--

CREATE TABLE `kehoachgiaoviec` (
  `id_kehoachgiaoviec` varchar(10) primary key,
  `id_bophan` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayktdukien` date NOT NULL,
  `ngayktthucte` date NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  foreign key(id_khuvuc) references khuvuc(id_khuvuc),
  foreign key(id_bophan) references bophan(id_bophan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoachgiaoviec`
--

INSERT INTO `kehoachgiaoviec` (`id_kehoachgiaoviec`, `id_bophan`, `id_khuvuc`, `tenkh`, `ngaybatdau`, `ngayktdukien`, `ngayktthucte`, `trangthai`) VALUES
('KH001', 'KD001', 'CT', 'Kế Hoạch 001', '2023-06-19', '2023-06-19', '2023-06-19', 'Không Đạt'),
('KH002', 'CSKH001', 'CT', 'Kế Hoạch 002', '2023-06-19', '2023-06-19', '2023-06-19', ''),
('KH003', 'TKBT001', 'CT', 'Kế hoạch 003', '2023-06-08', '2023-06-09', '2023-06-30', ''),
('KH004', 'T001', 'CT', 'Kế hoạch 003', '2023-06-05', '2023-06-01', '2023-06-30', ''),
('KH005', 'KD001', 'CT', 'Kế Hoạch 5', '2023-06-27', '2023-06-28', '2023-06-28', ''),
('KH006', 'KD001', 'CT', 'Kế Hoạch 6', '2023-06-28', '2023-06-28', '2023-06-28', ''),
('KH007', 'KD001', 'CT', 'Kế Hoạch 7', '2023-06-28', '2023-06-30', '2023-06-30', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquadanhgia`
--

CREATE TABLE `ketquadanhgia` (
  `id_nguoidung` varchar(10) NOT NULL,
  `id_chitieu` varchar(10) NOT NULL,
  `ketquadanhgia` varchar(255) NOT NULL,
  foreign key(id_nguoidung) references nguoidung(id_nguoidung),
  foreign key(id_chitieu) references chitieu(id_chitieu),
  primary key(id_nguoidung, id_chitieu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ketquadanhgia`
--

-- INSERT INTO `ketquadanhgia` (`id_nguoidung`, `id_chitieu`, `ketquadanhgia`) VALUES
-- ('ND1', 'CT1', 'Đạt'),
-- ('ND2', 'CT2', 'Chưa Đạt'),
-- ('ND2', 'CT3', 'Chưa Đạt');

-- --------------------------------------------------------



--
-- Cấu trúc bảng cho bảng `theodoikehoach`
--

CREATE TABLE `theodoikehoach` (
  `id` int(11) primary key auto_increment,
  `id_nguoidung` varchar(10) DEFAULT NULL,
  `id_chitieu` varchar(10) NOT NULL,
  `id_kehoachgiaoviec` varchar(10) NOT NULL,
  `chitieucandat` int(255) DEFAULT NULL,
  `chitieudatduoc` int(255) DEFAULT NULL,
  `trangthai` varchar(25) DEFAULT NULL,
  foreign key(id_nguoidung) references nguoidung(id_nguoidung),
  foreign key(id_chitieu) references chitieu(id_chitieu),
  foreign key(id_kehoachgiaoviec) references kehoachgiaoviec(id_kehoachgiaoviec)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theodoikehoach`
--

INSERT INTO `theodoikehoach` (`id`, `id_nguoidung`, `id_chitieu`, `id_kehoachgiaoviec`, `chitieucandat`, `chitieudatduoc`, `trangthai`) VALUES
(1, 'NV001', 'DS', 'KH001', 15000000, 9000000, 'Chưa Đạt'),
(2, 'NV002', 'DS', 'KH001', 15000000, 14000000, 'Đạt'),
(5, 'NV001', 'HBSP', 'KH001', 4, 4, 'Đạt'),
(6, 'NV002', 'HBSP', 'KH001', 4, 4, 'Đạt'),
(7, 'NV006', 'DS', 'KH006', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiendocongviec`
--

CREATE TABLE `tiendocongviec` (
  `id_congviec` varchar(10) primary key,
  `id_nguoidung` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `id_bophan` varchar(10) NOT NULL,
  `id_kehoachgiaoviec` varchar(10) NOT NULL,
  `tencongviec` varchar(255) NOT NULL,
  `trangthaicongviec` varchar(255) DEFAULT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthucdukien` date NOT NULL,
  `thoigianketthuc` date DEFAULT NULL,
  foreign key(id_nguoidung) references nguoidung(id_nguoidung),
  foreign key(id_khuvuc) references khuvuc(id_khuvuc),
  foreign key(id_bophan) references bophan(id_bophan),
  foreign key(id_kehoachgiaoviec) references kehoachgiaoviec(id_kehoachgiaoviec)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tiendocongviec`
--

INSERT INTO `tiendocongviec` (`id_congviec`, `id_nguoidung`, `id_khuvuc`, `id_bophan`, `id_kehoachgiaoviec`, `tencongviec`, `trangthaicongviec`, `thoigianbatdau`, `thoigianketthucdukien`, `thoigianketthuc`) VALUES
('CV001', 'NV001', 'CT', 'KD001', 'KH001', 'Hoạt Động Kinh Doanh', '', '2023-06-23', '2023-06-24', NULL),
('CV003', 'NV002', 'CT', 'KD001', 'KH001', 'Thu Hồi Công Nợ', 'Hoàn Thành', '2023-06-27', '2023-06-28', '2023-06-27'),
('CV004', 'NV008', 'CT', 'KD001', 'KH001', 'Thu Hồi Công Nợ', 'Hoàn Thành', '2023-06-20', '2023-07-01', '2023-06-27');



--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bophan`
--




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
