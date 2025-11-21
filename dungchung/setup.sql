-- Tạo CSDL nếu chưa có
CREATE DATABASE IF NOT EXISTS banhang DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE banhang;

-- 1. Bảng User (Dùng chung)
CREATE TABLE `login` (
  `username` varchar(30) NOT NULL PRIMARY KEY,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client', -- admin hoặc client
  `status` int(11) NOT NULL DEFAULT 1
);

-- Tài khoản mẫu: Admin pass admin123, User pass 123
INSERT INTO `login` (`username`, `password`, `role`, `status`) VALUES
('admin', 'admin123', 'admin', 1),
('student', '123', 'client', 1);

-- 2. Bảng Sản phẩm Đề 1 (Điện thoại)
CREATE TABLE `product_de1` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `ten_sp` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `bao_hanh` varchar(50) DEFAULT '12 Tháng',
  `trang_thai` varchar(50) DEFAULT 'Còn hàng',
  `gia` decimal(15,0) NOT NULL
);

INSERT INTO `product_de1` (`ten_sp`, `anh`, `gia`) VALUES 
('iPad mini 2 Wi-Fi', 'sp1.png', 11790000),
('iPhone 5S 16GB', 'sp2.png', 15290000),
('iPhone 5C 16GB', 'sp3.png', 11690000),
('LG Optimus G2', 'sp4.png', 11290000),
('LG Nexus 5', 'sp5.png', 10290000),
('HTC One Max', 'sp6.png', 14890000);

-- 3. Bảng Sản phẩm Đề 2 (Váy/Ghế)
CREATE TABLE `product_de2` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `ten_sp` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `gia` decimal(15,0) NOT NULL
);

INSERT INTO `product_de2` (`ten_sp`, `anh`, `gia`) VALUES 
('Đầm công sở, xèo 3 mẫu', 'sp1.png', 250000),
('Ghế nhựa cao cấp', 'sp2.png', 250000),
('Đầm công sở hồng', 'sp3.png', 250000),
('Ghế nhựa thấp', 'sp4.png', 250000),
('Đầm dạo phố', 'sp5.png', 250000);