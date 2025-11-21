<?php
include('connect.php'); 
if (isset($_POST['submit'])) {
    if (isset($_POST['hoten']) && isset($_POST['masv']) && isset($_POST['diem'])) {
        $hoten = $_POST['hoten'];
        $masv = $_POST['masv'];
        $diem = $_POST['diem'];

        $sql = "INSERT INTO thongtin (hoten,masv,diem) VALUES('$hoten','$masv','$diem')"; 
        $stmt = $conn->prepare($sql); 
        $query = $stmt->execute();
        
        if($query){
            header("location:index.php"); 
            exit;
        } else {
            echo "Thêm thất bại, vui lòng thử lại!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body { margin: 20px; }
        form { max-width: 300px; }
        input, button { width: 100%; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form method="POST">
        <label>Mã SV:</label>
        <input type="number" name="masv" required>
        
        <label>Họ tên:</label>
        <input type="text" name="hoten" required>
        
        <label>Điểm:</label>
        <input type="number" name="diem" required>
        
        <button type="submit" name="submit" value="submit">Lưu lại</button>
    </form>
    <br>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>