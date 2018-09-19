-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2018 at 03:19 PM
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
-- Table structure for table `canbo`
--

CREATE TABLE `canbo` (
  `cb_id` int(255) NOT NULL,
  `cb_ten` varchar(255) NOT NULL,
  `cb_gioitinh` int(255) NOT NULL,
  `khoa_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `canbo_duan`
--

CREATE TABLE `canbo_duan` (
  `cb_id` int(255) NOT NULL,
  `duan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `dd_id` int(255) NOT NULL,
  `dd_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doan`
--

CREATE TABLE `doan` (
  `doan_id` int(255) NOT NULL,
  `doan_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doan`
--

INSERT INTO `doan` (`doan_id`, `doan_ten`) VALUES
(1, 'Đoàn khách A');

-- --------------------------------------------------------

--
-- Table structure for table `doan_quocgia`
--

CREATE TABLE `doan_quocgia` (
  `doan_id` int(255) NOT NULL,
  `qg_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doan_thanhvien`
--

CREATE TABLE `doan_thanhvien` (
  `doan_id` int(255) NOT NULL,
  `tv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoa_id` varchar(255) NOT NULL,
  `khoa_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaicongviec`
--

CREATE TABLE `loaicongviec` (
  `loaicv_id` int(255) NOT NULL,
  `loaicv_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `pp_ngayhethan` datetime NOT NULL,
  `tv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('US', 'Hoa Kỳ ');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `tv_id` int(255) NOT NULL,
  `tv_ten` varchar(255) NOT NULL,
  `tv_namsinh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cb_id` int(255) NOT NULL,
  `tv_id` int(255) NOT NULL,
  `doan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tt_id` int(255) NOT NULL,
  `tt_ten` varchar(255) NOT NULL,
  `tt_noidung` varchar(20000) NOT NULL,
  `tt_hinhanh` varchar(255) NOT NULL,
  `cb_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` varchar(255) NOT NULL,
  `visa_ngayhethan` datetime NOT NULL,
  `tv_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
  ADD KEY `tv_id` (`tv_id`),
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
  ADD KEY `tv_id` (`tv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canbo`
--
ALTER TABLE `canbo`
  MODIFY `cb_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `congviec`
--
ALTER TABLE `congviec`
  MODIFY `cv_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `dd_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doan`
--
ALTER TABLE `doan`
  MODIFY `doan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duan`
--
ALTER TABLE `duan`
  MODIFY `duan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaicongviec`
--
ALTER TABLE `loaicongviec`
  MODIFY `loaicv_id` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `tv_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thuchien`
--
ALTER TABLE `thuchien`
  MODIFY `th_id` int(255) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `canbo_duan_ibfk_1` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`),
  ADD CONSTRAINT `canbo_duan_ibfk_2` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`duan_id`);

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
  ADD CONSTRAINT `passport_ibfk_1` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`);

--
-- Constraints for table `thuchien`
--
ALTER TABLE `thuchien`
  ADD CONSTRAINT `thuchien_ibfk_1` FOREIGN KEY (`dd_id`) REFERENCES `diadiem` (`dd_id`),
  ADD CONSTRAINT `thuchien_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `congviec` (`cv_id`),
  ADD CONSTRAINT `thuchien_ibfk_3` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`),
  ADD CONSTRAINT `thuchien_ibfk_4` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`),
  ADD CONSTRAINT `thuchien_ibfk_5` FOREIGN KEY (`doan_id`) REFERENCES `doan` (`doan_id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`cb_id`) REFERENCES `canbo` (`cb_id`);

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `visa_ibfk_1` FOREIGN KEY (`tv_id`) REFERENCES `thanhvien` (`tv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
