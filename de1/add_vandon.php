<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['user_id'])) { header("location: login.php"); exit(); }

if(isset($_POST['submit'])){
    $nhanvien = $_POST['nhanvien'];
    $nguoinhan = $_POST['nguoinhan'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ngaygiao = $_POST['ngaygiao'];
    $ghichu = $_POST['ghichu'];

    $sql = "INSERT INTO vandon (nhanvien, nguoinhan, sdt, diachi, ngaygiao, ghichu) 
            VALUES ('$nhanvien', '$nguoinhan', '$sdt', '$diachi', '$ngaygiao', '$ghichu')";
    $stmt = $conn->prepare($sql);
    
    if($stmt->execute()){
      header("location:index.php");
      exit;
    } else {
      echo "Thêm thất bại!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thêm Vận Đơn</title>
  <style>
    form {max-width:400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;}
    input, textarea, button {width:100%; padding:8px; margin:5px 0;}
  </style>
</head>
<body>
  <h2 style="text-align:center;">Thêm Vận Đơn Mới</h2>
  <form method="POST">
    <label>Nhân viên phụ trách:</label>
    <input type="text" name="nhanvien" required><br>
    
    <label>Người nhận:</label>
    <input type="text" name="nguoinhan" required><br>
    
    <label>Số điện thoại:</label>
    <input type="text" name="sdt" required><br>
    
    <label>Địa chỉ:</label>
    <input type="text" name="diachi" required><br>
    
    <label>Ngày giao:</label>
    <input type="date" name="ngaygiao" required><br>
    
    <label>Ghi chú:</label>
    <textarea name="ghichu"></textarea><br>
    
    <button type="submit" name="submit">Lưu Vận Đơn</button>
    <a href="index.php">Quay lại danh sách</a>
  </form>
</body>
</html>