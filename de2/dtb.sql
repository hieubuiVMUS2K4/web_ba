-- 1. Tạo Database
CREATE DATABASE IF NOT EXISTS hocsinh;
USE hocsinh;

-- 2. Tạo bảng Tổng kết năm (tongketnam)
CREATE TABLE tongketnam (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    hoten_hs VARCHAR(100) NOT NULL,
    namhoc VARCHAR(20) NOT NULL,
    nhanxet TEXT,
    uudiem TEXT,
    khacphuc TEXT,
    lenlop VARCHAR(50) -- Ví dụ: "Được lên lớp", "Ở lại lớp"
);

-- 3. Tạo bảng User (tbl_user) để đăng nhập
CREATE TABLE tbl_user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- 4. Thêm tài khoản Admin mặc định (Yêu cầu đề: Student / 123)
INSERT INTO tbl_user (user, pass, name) VALUES ('Student', '123', 'Nguyễn Văn A');