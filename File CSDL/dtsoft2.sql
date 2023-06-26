-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtsoft2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `id_bophan` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `tenbophan` varchar(255) NOT NULL,
  `cvchuyenmon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bophan`
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
-- Table structure for table `chitieu`
--

CREATE TABLE `chitieu` (
  `id_chitieu` varchar(10) NOT NULL,
  `tenchitieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitieu`
--

INSERT INTO `chitieu` (`id_chitieu`, `tenchitieu`) VALUES
('DS', 'Doanh số'),
('HBSP', 'Hiểu biết sản phẩm'),
('HTKH', 'Hỗ trợ khách hàng'),
('PTKH', 'Phát triển khách hàng'),
('THCN', 'Thu hồi công nợ'),
('XHD', 'Xuất hóa đơn');

-- --------------------------------------------------------

--
-- Table structure for table `kehoachgiaoviec`
--

CREATE TABLE `kehoachgiaoviec` (
  `id_kehoachgiaoviec` varchar(10) NOT NULL,
  `id_bophan` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayktdukien` date NOT NULL,
  `ngayktthucte` date NOT NULL,
  `trangthai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehoachgiaoviec`
--

INSERT INTO `kehoachgiaoviec` (`id_kehoachgiaoviec`, `id_bophan`, `id_khuvuc`, `tenkh`, `ngaybatdau`, `ngayktdukien`, `ngayktthucte`, `trangthai`) VALUES
('KH001', 'KD001', 'CT', 'Kế Hoạch 001', '2023-06-19', '2023-06-19', '2023-06-19', 'Đạt'),
('KH002', 'CSKH001', 'CT', 'Kế Hoạch 002', '2023-06-19', '2023-06-19', '2023-06-19', ''),
('KH003', 'TKBT001', 'CT', 'Kế hoạch 003', '2023-06-08', '2023-06-09', '2023-06-30', ''),
('KH004', 'T001', 'CT', 'Kế hoạch 003', '2023-06-05', '2023-06-01', '2023-06-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `ketquadanhgia`
--

CREATE TABLE `ketquadanhgia` (
  `id_nguoidung` varchar(10) NOT NULL,
  `id_chitieu` varchar(10) NOT NULL,
  `ketquadanhgia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ketquadanhgia`
--

INSERT INTO `ketquadanhgia` (`id_nguoidung`, `id_chitieu`, `ketquadanhgia`) VALUES
('ND1', 'CT1', 'Đạt'),
('ND2', 'CT2', 'Chưa Đạt'),
('ND2', 'CT3', 'Chưa Đạt');

-- --------------------------------------------------------

--
-- Table structure for table `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id_khuvuc` varchar(10) NOT NULL,
  `tenkhuvuc` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khuvuc`
--

INSERT INTO `khuvuc` (`id_khuvuc`, `tenkhuvuc`, `diachi`, `sdt`) VALUES
('CT', 'Cần Thơ', 'Địa chỉ cần thơ', 123456789),
('HCM', 'Hồ Chí Minh', 'Địa chỉ hồ chí minh', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` varchar(10) NOT NULL,
  `id_bophan` varchar(10) NOT NULL,
  `id_vaitro` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `tennguoidung` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `gioitinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `id_bophan`, `id_vaitro`, `id_khuvuc`, `tennguoidung`, `sdt`, `diachi`, `email`, `password`, `ngaysinh`, `gioitinh`) VALUES
('NV001', 'KD001', 'NS', 'CT', 'Nguyễn Văn A', '123456789', 'Địa chỉ 1', 'nva@gmail.com', '123456789', '10/01/1990', 'Nam'),
('NV002', 'T001', 'NS', 'CT', 'Nguyễn Văn B', '987654321', 'Địa chỉ 2', 'nvb@gmail.com', '987654321', '09/01/1989', 'Nam'),
('NV003', 'CSKH001', 'NS', 'CT', 'Nguyễn Văn C', '0123456789', 'Địa chỉ 3', 'nvc@gmail.com', '123', '10/01/1990', 'Nữ'),
('NV004', 'PTPM001', 'NS', 'CT', 'Nguyễn Văn D', '0123456789', 'Địa chỉ 4', 'nvc@gmail.com', '123', '10/01/1990', 'Nữ'),
('NV005', 'PTPM001', 'NS', 'CT', 'Nguyễn Văn E', '0123456789', 'Địa chỉ 5', 'nve@gmail.com', '123', '09/01/1989', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `theodoikehoach`
--

CREATE TABLE `theodoikehoach` (
  `id` int(11) NOT NULL,
  `id_nguoidung` varchar(10) NOT NULL,
  `id_chitieu` varchar(10) NOT NULL,
  `id_kehoachgiaoviec` varchar(10) NOT NULL,
  `chitieucandat` int(255) NOT NULL,
  `chitieudatduoc` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theodoikehoach`
--

INSERT INTO `theodoikehoach` (`id`, `id_nguoidung`, `id_chitieu`, `id_kehoachgiaoviec`, `chitieucandat`, `chitieudatduoc`) VALUES
(1, 'NV001', 'DS', 'KH001', 15000000, 9000000),
(2, 'NV002', 'DS', 'KH001', 15000000, 14000000),
(5, 'NV001', 'HBSP', 'KH001', 4, 4),
(6, 'NV002', 'HBSP', 'KH001', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tiendocongviec`
--

CREATE TABLE `tiendocongviec` (
  `id_congviec` varchar(10) NOT NULL,
  `id_nguoidung` varchar(10) NOT NULL,
  `id_khuvuc` varchar(10) NOT NULL,
  `id_bophan` varchar(10) NOT NULL,
  `id_kehoachgiaoviec` varchar(10) NOT NULL,
  `tencongviec` varchar(255) NOT NULL,
  `trangthaicongviec` varchar(255) NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthucdukien` date NOT NULL,
  `thoigianketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiendocongviec`
--

INSERT INTO `tiendocongviec` (`id_congviec`, `id_nguoidung`, `id_khuvuc`, `id_bophan`, `id_kehoachgiaoviec`, `tencongviec`, `trangthaicongviec`, `thoigianbatdau`, `thoigianketthucdukien`, `thoigianketthuc`) VALUES
('CV001', 'NV001', 'CT', 'KD001', 'KH001', 'Hoạt Động Kinh Doanh', 'Hoàn Thành', '2023-06-23', '2023-06-23', '2023-06-25'),
('CV002', 'NV001', 'CT', 'KD001', 'KH002', 'Thu Hồi Công Nợ', 'Hoàn Thành', '2023-06-23', '2023-07-24', '2023-06-23'),
('CV003', 'NV001', 'CT', 'CSKH002', 'KH002', 'Hoạt Động Kinh Doanh', 'Hoàn Thành', '2023-06-23', '2023-06-24', '2023-06-23'),
('CV005', 'NV001', 'CT', 'CSKH001', 'KH001', 'Thu Hồi Công Nợ', '-- Chọn tiến độ --', '2023-06-23', '2023-06-23', '2023-06-23'),
('CV006', 'NV001', 'CT', 'CSKH001', 'KH001', 'Thu Hồi Công Nợ', '-- Chọn tiến độ --', '2023-06-25', '2023-06-30', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vaitro` varchar(10) NOT NULL,
  `tenvaitro` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id_vaitro`, `tenvaitro`, `mota`) VALUES
('NS', 'Nhân Sự', 'là nhân viên trong công ty'),
('QLBP', 'Quản Lý Bộ Phận', 'là người quản lý bộ phận'),
('QLKV', 'Quản Lý Khu Vực', 'là người quản lý khu vực');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`id_bophan`),
  ADD KEY `id_khuvuc` (`id_khuvuc`);

--
-- Indexes for table `chitieu`
--
ALTER TABLE `chitieu`
  ADD PRIMARY KEY (`id_chitieu`);

--
-- Indexes for table `kehoachgiaoviec`
--
ALTER TABLE `kehoachgiaoviec`
  ADD PRIMARY KEY (`id_kehoachgiaoviec`),
  ADD KEY `id_bophan` (`id_bophan`),
  ADD KEY `id_khuvuc` (`id_khuvuc`);

--
-- Indexes for table `ketquadanhgia`
--
ALTER TABLE `ketquadanhgia`
  ADD KEY `id_nguoidung` (`id_nguoidung`,`id_chitieu`),
  ADD KEY `id_chitieu` (`id_chitieu`);

--
-- Indexes for table `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id_khuvuc`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Indexes for table `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiendocongviec`
--
ALTER TABLE `tiendocongviec`
  ADD PRIMARY KEY (`id_congviec`),
  ADD KEY `id_nguoidung` (`id_nguoidung`,`id_kehoachgiaoviec`),
  ADD KEY `id_kehoachgiaoviec` (`id_kehoachgiaoviec`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vaitro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `theodoikehoach`
--
ALTER TABLE `theodoikehoach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

