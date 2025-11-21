-- Tạo CSDL
CREATE DATABASE hanghoa;
USE hanghoa;

-- Tạo bảng Vận đơn (vandon)
CREATE TABLE vandon (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nhanvien VARCHAR(100) NOT NULL,
    nguoinhan VARCHAR(100) NOT NULL,
    sdt VARCHAR(20) NOT NULL,
    diachi TEXT NOT NULL,
    ngaygiao DATE NOT NULL,
    ghichu TEXT
);

-- Tạo bảng User (tbl_user) cho chức năng đăng nhập
CREATE TABLE tbl_user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Thêm tài khoản mẫu (Yêu cầu đề bài: User: Student, Pass: 123)
INSERT INTO tbl_user (user, pass, name) VALUES ('Student', '123', 'Nguyễn Văn A');