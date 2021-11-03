-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 04:46 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitaploncnw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdangky`
--

CREATE TABLE `chitietdangky` (
  `ID` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaMon` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdangky`
--

INSERT INTO `chitietdangky` (`ID`, `MaKH`, `MaMon`, `MaSV`) VALUES
(1, 1, 1, 1),
(2, 1, 6, 3),
(3, 2, 2, 1),
(4, 2, 5, 3),
(5, 3, 2, 1),
(6, 3, 3, 2),
(7, 4, 4, 2),
(8, 4, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhoahoc`
--

CREATE TABLE `chitietkhoahoc` (
  `MaKH` int(11) NOT NULL,
  `MaMon` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `phongHoc` varchar(100) NOT NULL,
  `tietBatDau` int(11) NOT NULL,
  `tietKetThuc` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietkhoahoc`
--

INSERT INTO `chitietkhoahoc` (`MaKH`, `MaMon`, `MaGV`, `phongHoc`, `tietBatDau`, `tietKetThuc`, `ID`) VALUES
(1, 1, 1, '201-C5', 1, 3, 1),
(1, 6, 3, '201-C5', 1, 3, 2),
(2, 2, 1, '403-C5', 4, 6, 3),
(2, 5, 3, '403-C5', 4, 6, 4),
(3, 2, 1, '232-A2', 3, 4, 5),
(3, 3, 2, '232-A2', 3, 4, 6),
(4, 4, 2, '201-B5', 7, 9, 7),
(4, 6, 2, '201-B5', 1, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MaGV` int(11) NOT NULL,
  `Ten` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `SDT` varchar(225) NOT NULL,
  `MaKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MaGV`, `Ten`, `Email`, `SDT`, `MaKhoa`) VALUES
(1, 'Đỗ Mạnh Tài', 'daido@gmail.com', '1', 1),
(2, 'Giáo viên 2', 'gv2@gmail.com', '2', 2),
(3, 'Giáo viên 3', 'gc3@gmail.com', '3', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` int(11) NOT NULL,
  `Ten` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `Ten`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Kinh tế'),
(3, 'Thủy lợi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `MaKH` int(11) NOT NULL,
  `Ten` varchar(225) NOT NULL,
  `Ky` int(11) NOT NULL,
  `ThoiGianBatDau` date DEFAULT NULL,
  `ThoiGianKetThuc` date DEFAULT NULL,
  `DuocDangKy` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`MaKH`, `Ten`, `Ky`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `DuocDangKy`) VALUES
(1, '2020-2021', 1, '2020-09-01', '2021-01-01', 1),
(2, '2020-2021', 2, '2020-02-22', '2021-07-22', 0),
(3, '2021-2022', 1, '2020-09-06', '2022-01-06', 1),
(4, '2021-2022', 2, '2022-02-06', '2022-07-06', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMon` int(11) NOT NULL,
  `Ten` varchar(225) NOT NULL,
  `SoTC` int(11) NOT NULL,
  `MaKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMon`, `Ten`, `SoTC`, `MaKhoa`) VALUES
(1, 'Công nghệ web', 3, 1),
(2, 'Cơ sở dữ liệu', 2, 1),
(3, 'Kinh tế vĩ mô', 3, 2),
(4, 'Kinh tế 1', 1, 2),
(5, 'Áp lực nước', 2, 3),
(6, 'Ứng dụng công nghệ', 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `Permission_id` int(11) NOT NULL,
  `Permission_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`Permission_id`, `Permission_name`) VALUES
(1, 'Giáo viên'),
(2, 'Sinh viên'),
(3, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` int(11) NOT NULL,
  `Ten` varchar(225) NOT NULL,
  `GioiTinh` varchar(225) NOT NULL,
  `QueQuan` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `MaKhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `Ten`, `GioiTinh`, `QueQuan`, `Email`, `MaKhoa`) VALUES
(1, 'Đoàn Hùng Dương', 'nam', 'Quảng Ninh', 'duonghentai@gmail.com', 1),
(2, 'Đỗ Mạnh Tài', 'nam', 'Sao Hỏa', 'Taichodien@gmail.com', 2),
(3, 'Hoàng Minh', 'nam', 'Vũ trụ song song', 'Minhmanma@gmail.com', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserName` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Permission_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserName`, `Email`, `Password`, `Permission_ID`) VALUES
('admin', 'admin@gmail.com', 'admin', 3),
('minh', 'Minhmanma@gmail.com', '1', 2),
('taido', 'daido@gmail.com', '1', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaMon` (`MaMon`);

--
-- Chỉ mục cho bảng `chitietkhoahoc`
--
ALTER TABLE `chitietkhoahoc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaGV` (`MaGV`),
  ADD KEY `MaMon` (`MaMon`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMon`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission_id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD KEY `Permission_ID` (`Permission_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chitietkhoahoc`
--
ALTER TABLE `chitietkhoahoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `MaGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `MaMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `Permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `MaSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD CONSTRAINT `chitietdangky_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khoahoc` (`MaKH`),
  ADD CONSTRAINT `chitietdangky_ibfk_2` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `chitietdangky_ibfk_3` FOREIGN KEY (`MaMon`) REFERENCES `monhoc` (`MaMon`);

--
-- Các ràng buộc cho bảng `chitietkhoahoc`
--
ALTER TABLE `chitietkhoahoc`
  ADD CONSTRAINT `chitietkhoahoc_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khoahoc` (`MaKH`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_2` FOREIGN KEY (`MaGV`) REFERENCES `giaovien` (`MaGV`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_3` FOREIGN KEY (`MaMon`) REFERENCES `monhoc` (`MaMon`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Permission_ID`) REFERENCES `permission` (`Permission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
