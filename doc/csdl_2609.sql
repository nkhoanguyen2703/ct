-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2018 at 03:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`, `admin_name`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `canbo`
--

CREATE TABLE `canbo` (
  `cb_id` varchar(255) NOT NULL,
  `cb_password` varchar(255) NOT NULL,
  `cb_ten` varchar(255) NOT NULL,
  `cb_gioitinh` int(255) NOT NULL,
  `khoa_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canbo`
--

INSERT INTO `canbo` (`cb_id`, `cb_password`, `cb_ten`, `cb_gioitinh`, `khoa_id`) VALUES
('CB001', '123456', 'Trương Quốc Định ', 1, 'CNTT&TT'),
('CB002', '123456', 'Phạm Thị Ngọc Diễm', 0, 'CNTT&TT');

-- --------------------------------------------------------

--
-- Table structure for table `canbo_duan`
--

CREATE TABLE `canbo_duan` (
  `cb_id` varchar(255) NOT NULL,
  `duan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canbo_duan`
--

INSERT INTO `canbo_duan` (`cb_id`, `duan_id`) VALUES
('CB001', 3),
('CB002', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chiphinoio`
--

CREATE TABLE `chiphinoio` (
  `doan_id` int(255) NOT NULL,
  `noio_id` int(255) NOT NULL,
  `chiphi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chiphiqua`
--

CREATE TABLE `chiphiqua` (
  `doan_id` int(255) NOT NULL,
  `qua_id` int(255) NOT NULL,
  `soluong` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `cv_id` int(255) NOT NULL,
  `cv_ten` varchar(255) NOT NULL,
  `cv_chitiet` varchar(20000) NOT NULL,
  `loaicv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `congviec`
--

INSERT INTO `congviec` (`cv_id`, `cv_ten`, `cv_chitiet`, `loaicv_id`) VALUES
(1, 'Tham dự hội thảo ABC ', 'sdfsdsdfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `dd_id` int(255) NOT NULL,
  `dd_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`dd_id`, `dd_ten`) VALUES
(1, 'Hotel Ninh Kiều 2 '),
(2, 'Hotel Ninh Kiều 2 ');

-- --------------------------------------------------------

--
-- Table structure for table `doan`
--

CREATE TABLE `doan` (
  `doan_id` int(255) NOT NULL,
  `doan_ten` varchar(255) NOT NULL,
  `doan_chiphidutru` int(255) NOT NULL,
  `doan_thoigianden` datetime NOT NULL,
  `doan_thoigiandi` datetime NOT NULL,
  `doan_ngonngulamviec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doan`
--

INSERT INTO `doan` (`doan_id`, `doan_ten`, `doan_chiphidutru`, `doan_thoigianden`, `doan_thoigiandi`, `doan_ngonngulamviec`) VALUES
(3, 'Đoàn sinh viên kiến tập ABC', 11000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tiếng Anh '),
(4, 'Đoàn Trung Của', 12000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tiếng Trung '),
(5, 'ppp', 123123213, '2018-09-13 00:00:00', '2018-09-22 00:00:00', 'Tiếng Pháp '),
(6, 'Đoàn kiến tập BBB ', 30000000, '2018-09-22 00:00:00', '2018-10-26 00:00:00', 'Tiếng Anh ');

-- --------------------------------------------------------

--
-- Table structure for table `doan_duan`
--

CREATE TABLE `doan_duan` (
  `doan_id` int(255) NOT NULL,
  `duan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doan_duan`
--

INSERT INTO `doan_duan` (`doan_id`, `duan_id`) VALUES
(6, 6),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `doan_quocgia`
--

CREATE TABLE `doan_quocgia` (
  `doan_id` int(255) NOT NULL,
  `qg_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doan_quocgia`
--

INSERT INTO `doan_quocgia` (`doan_id`, `qg_id`) VALUES
(3, 'NZ'),
(3, 'US'),
(4, 'CN'),
(5, 'FR'),
(6, 'NZ'),
(6, 'US');

-- --------------------------------------------------------

--
-- Table structure for table `doan_thanhvien`
--

CREATE TABLE `doan_thanhvien` (
  `doan_id` int(255) NOT NULL,
  `tv_id` int(255) NOT NULL,
  `truongdoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doan_thanhvien`
--

INSERT INTO `doan_thanhvien` (`doan_id`, `tv_id`, `truongdoan`) VALUES
(6, 3, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `duan`
--

CREATE TABLE `duan` (
  `duan_id` int(255) NOT NULL,
  `duan_ten` varchar(255) NOT NULL,
  `duan_hinhthuc` varchar(255) NOT NULL,
  `duan_noidung` varchar(20000) NOT NULL,
  `duan_trangthai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `duan`
--

INSERT INTO `duan` (`duan_id`, `duan_ten`, `duan_hinhthuc`, `duan_noidung`, `duan_trangthai`) VALUES
(1, 'Dự án hợp tác giáo dục vương quốc Anh - Việt Nam', 'ABC', 'Chúng tôi hỗ trợ cho các dự án nhằm thúc đẩy sự hợp tác giữa Vương quốc Anh và Việt Nam. Mục tiêu then chốt của nguồn quỹ nhằm khai thác thế mạnh hàng đầu của Vương quốc Anh về năng lực giảng dạy, học tập, đổi mới và nghiên cứu để đóng góp vào sự phát triển của giáo dục, nghiên cứu và đổi mới trong giáo dục đại học tại Việt Nam.\r\n\r\nCác lĩnh vực ưu tiên của Quỹ hỗ trợ Hợp tác Giáo dục Đại học tương tự như mục tiêu của Chương trình Cải cách Giáo dục Đại học (HERA) về giảng dạy, học tập và đổi mới. ', 1),
(2, 'Dự án A', 'A', 'ABĐsf sdfsd sdf ', 1),
(3, 'Dự án B', 'B', 'sdfdsfds ', 0),
(4, 'Dự án C', 'C', 'sdfas sdafsa ', 0),
(5, 'Dự án D', 'D ', 'ádf sda', 1),
(6, 'Dự án E', 'E', 'sdfds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoa_id` varchar(255) NOT NULL,
  `khoa_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`khoa_id`, `khoa_ten`) VALUES
('CN', 'Công nghệ'),
('CNTT&TT', 'Công nghệ thông tin và truyền thông'),
('KHCT', 'Khoa học chính trị'),
('KHTN', 'Khoa học tự nhiên '),
('KHXHNV', 'Khoa học xã hội nhân văn'),
('KT', 'Kinh Tế'),
('LUAT', 'Luật'),
('MT', 'Môi trường'),
('NN1', 'Nông nghiệp '),
('NN2', 'Ngoại ngữ'),
('PTNT', 'Phát triển nông thôn'),
('SP', 'Sư phạm'),
('TS', 'Thủy sản');

-- --------------------------------------------------------

--
-- Table structure for table `loaicongviec`
--

CREATE TABLE `loaicongviec` (
  `loaicv_id` int(255) NOT NULL,
  `loaicv_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaicongviec`
--

INSERT INTO `loaicongviec` (`loaicv_id`, `loaicv_ten`) VALUES
(1, 'AAA'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `noio`
--

CREATE TABLE `noio` (
  `noio_id` int(11) NOT NULL,
  `noio_ten` varchar(255) NOT NULL,
  `noio_diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `pp_id` varchar(255) NOT NULL,
  `pp_ngaycap` datetime NOT NULL,
  `pp_ngayhethan` datetime NOT NULL,
  `pp_noicap` varchar(255) NOT NULL,
  `tv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passport`
--

INSERT INTO `passport` (`pp_id`, `pp_ngaycap`, `pp_ngayhethan`, `pp_noicap`, `tv_id`) VALUES
('21312321', '2018-09-20 00:00:00', '2018-09-26 00:00:00', 'Cần Thơ', 6),
('HC111', '2018-09-01 00:00:00', '2018-09-23 00:00:00', 'Cần Thơ', 3),
('HC112', '2018-09-07 00:00:00', '2018-09-22 00:00:00', 'Cần Thơ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `qualuuniem`
--

CREATE TABLE `qualuuniem` (
  `qua_id` int(255) NOT NULL,
  `qua_ten` varchar(255) NOT NULL,
  `qua_gia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quocgia`
--

CREATE TABLE `quocgia` (
  `qg_id` varchar(255) NOT NULL,
  `qg_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quocgia`
--

INSERT INTO `quocgia` (`qg_id`, `qg_ten`) VALUES
('CN', 'Trung Quốc '),
('FR', 'Pháp '),
('JA', 'Nhật Bản '),
('KS', 'Hàn Quốc '),
('NZ', 'New Zealand'),
('US', 'Hoa Kỳ '),
('VIE', 'Việt Nam ');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `tv_id` int(255) NOT NULL,
  `tv_ten` varchar(255) NOT NULL,
  `tv_namsinh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`tv_id`, `tv_ten`, `tv_namsinh`) VALUES
(3, 'Cảnh Thịnh', '1996-02-02 00:00:00'),
(5, 'Trần Hoàng ', '1993-03-24 00:00:00'),
(6, 'Duc', '2018-09-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `thuchien`
--

CREATE TABLE `thuchien` (
  `th_id` int(255) NOT NULL,
  `th_thoigianbatdau` datetime NOT NULL,
  `th_thoigianketthuc` datetime NOT NULL,
  `th_chiphithuchien` int(255) NOT NULL,
  `dd_id` int(255) NOT NULL,
  `cv_id` int(255) NOT NULL,
  `cb_id` varchar(255) NOT NULL,
  `doan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuchien`
--

INSERT INTO `thuchien` (`th_id`, `th_thoigianbatdau`, `th_thoigianketthuc`, `th_chiphithuchien`, `dd_id`, `cv_id`, `cb_id`, `doan_id`) VALUES
(3, '2018-09-26 00:00:00', '2018-09-26 00:00:00', 400000, 2, 1, 'CB002', 5),
(4, '2018-09-26 00:00:00', '2018-09-26 00:00:00', 400000, 2, 1, 'CB001', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tt_id` int(255) NOT NULL,
  `tt_ten` varchar(255) NOT NULL,
  `tt_noidung` varchar(20000) NOT NULL,
  `tt_hinhanh` varchar(255) NOT NULL,
  `cb_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` varchar(255) NOT NULL,
  `visa_ngaycap` datetime NOT NULL,
  `visa_ngayhethan` datetime NOT NULL,
  `visa_noicap` varchar(255) NOT NULL,
  `pp_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`visa_id`, `visa_ngaycap`, `visa_ngayhethan`, `visa_noicap`, `pp_id`) VALUES
('VS111', '2018-09-01 00:00:00', '0000-00-00 00:00:00', 'Cần Thơ ', 'HC111'),
('VS112', '2018-09-08 00:00:00', '0000-00-00 00:00:00', 'TPHCM', 'HC112'),
('VS113', '2018-09-07 00:00:00', '0000-00-00 00:00:00', 'Cần Thơ ', '21312321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`cb_id`),
  ADD KEY `khoa_id` (`khoa_id`);

--
-- Indexes for table `canbo_duan`
--
ALTER TABLE `canbo_duan`
  ADD KEY `cb_id` (`cb_id`),
  ADD KEY `duan_id` (`duan_id`);

--
-- Indexes for table `chiphinoio`
--
ALTER TABLE `chiphinoio`
  ADD KEY `doan_id` (`doan_id`),
  ADD KEY `noio_id` (`noio_id`);

--
-- Indexes for table `chiphiqua`
--
ALTER TABLE `chiphiqua`
  ADD KEY `doan_id` (`doan_id`),
  ADD KEY `qua_id` (`qua_id`);

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `loaicv_id` (`loaicv_id`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
  ADD KEY `dd_id` (`dd_id`);

--
-- Indexes for table `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`doan_id`);

--
-- Indexes for table `doan_duan`
--
ALTER TABLE `doan_duan`
  ADD KEY `doan_id` (`doan_id`),
  ADD KEY `doan_duan` (`duan_id`);

--
-- Indexes for table `doan_quocgia`
--
ALTER TABLE `doan_quocgia`
  ADD KEY `doan_id` (`doan_id`),
  ADD KEY `qg_id` (`qg_id`);

--
-- Indexes for table `doan_thanhvien`
--
ALTER TABLE `doan_thanhvien`
  ADD KEY `doan_id` (`doan_id`),
  ADD KEY `tv_id` (`tv_id`);

--
-- Indexes for table `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`duan_id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`khoa_id`);

--
-- Indexes for table `loaicongviec`
--
ALTER TABLE `loaicongviec`
  ADD PRIMARY KEY (`loaicv_id`);

--
-- Indexes for table `noio`
--
ALTER TABLE `noio`
  ADD PRIMARY KEY (`noio_id`);

--
-- Indexes for table `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `tv_id` (`tv_id`);

--
-- Indexes for table `qualuuniem`
--
ALTER TABLE `qualuuniem`
  ADD PRIMARY KEY (`qua_id`);

--
-- Indexes for table `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`qg_id`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`tv_id`,`tv_ten`);

--
-- Indexes for table `thuchien`
--
ALTER TABLE `thuchien`
  ADD PRIMARY KEY (`th_id`),
  ADD KEY `dd_id` (`dd_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `cb_id` (`cb_id`),
  ADD KEY `doan_id` (`doan_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tt_id`),
  ADD KEY `cb_id` (`cb_id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`visa_id`),
  ADD KEY `pp_id` (`pp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congviec`
--
ALTER TABLE `congviec`
  MODIFY `cv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `dd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doan`
--
ALTER TABLE `doan`
  MODIFY `doan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `duan`
--
ALTER TABLE `duan`
  MODIFY `duan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loaicongviec`
--
ALTER TABLE `loaicongviec`
  MODIFY `loaicv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `noio`
--
ALTER TABLE `noio`
  MODIFY `noio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualuuniem`
--
ALTER TABLE `qualuuniem`
  MODIFY `qua_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `tv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thuchien`
--
ALTER TABLE `thuchien`
  MODIFY `th_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tt_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `canbo_ibfk_1` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`khoa_id`);

--
-- Constraints for table `canbo_duan`
--
ALTER TABLE `canbo_duan`
  ADD CONSTRAINT `canbo_duan_ibfk_2` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`duan_id`),
  ADD CONSTRAINT `canbo_duan_ibfk_3` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`);

--
-- Constraints for table `chiphinoio`
--
ALTER TABLE `chiphinoio`
  ADD CONSTRAINT `chiphinoio_ibfk_1` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`),
  ADD CONSTRAINT `chiphinoio_ibfk_2` FOREIGN KEY (`noio_id`) REFERENCES `noio` (`noio_id`);

--
-- Constraints for table `chiphiqua`
--
ALTER TABLE `chiphiqua`
  ADD CONSTRAINT `chiphiqua_ibfk_1` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`),
  ADD CONSTRAINT `chiphiqua_ibfk_2` FOREIGN KEY (`qua_id`) REFERENCES `qualuuniem` (`qua_id`);

--
-- Constraints for table `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `congviec_ibfk_1` FOREIGN KEY (`loaicv_id`) REFERENCES `loaicongviec` (`loaicv_id`);

--
-- Constraints for table `doan_duan`
--
ALTER TABLE `doan_duan`
  ADD CONSTRAINT `doan_duan_ibfk_1` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`),
  ADD CONSTRAINT `doan_duan_ibfk_2` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`duan_id`);

--
-- Constraints for table `doan_quocgia`
--
ALTER TABLE `doan_quocgia`
  ADD CONSTRAINT `doan_quocgia_ibfk_1` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`),
  ADD CONSTRAINT `doan_quocgia_ibfk_2` FOREIGN KEY (`qg_id`) REFERENCES `quocgia` (`qg_id`);

--
-- Constraints for table `doan_thanhvien`
--
ALTER TABLE `doan_thanhvien`
  ADD CONSTRAINT `doan_thanhvien_ibfk_1` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doan_thanhvien_ibfk_2` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passport`
--
ALTER TABLE `passport`
  ADD CONSTRAINT `passport_ibfk_1` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thuchien`
--
ALTER TABLE `thuchien`
  ADD CONSTRAINT `thuchien_ibfk_1` FOREIGN KEY (`dd_id`) REFERENCES `diadiem` (`dd_id`),
  ADD CONSTRAINT `thuchien_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `congviec` (`cv_id`),
  ADD CONSTRAINT `thuchien_ibfk_5` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`),
  ADD CONSTRAINT `thuchien_ibfk_6` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`);

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `visa_ibfk_1` FOREIGN KEY (`pp_id`) REFERENCES `passport` (`pp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
