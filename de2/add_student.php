<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['user_id'])) { header("location: login.php"); exit(); }

if(isset($_POST['submit'])){
    $hoten = $_POST['hoten_hs'];
    $namhoc = $_POST['namhoc'];
    $nhanxet = $_POST['nhanxet'];
    $uudiem = $_POST['uudiem'];
    $khacphuc = $_POST['khacphuc'];
    $lenlop = $_POST['lenlop'];

    $sql = "INSERT INTO tongketnam (hoten_hs, namhoc, nhanxet, uudiem, khacphuc, lenlop) 
            VALUES ('$hoten', '$namhoc', '$nhanxet', '$uudiem', '$khacphuc', '$lenlop')";
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
  <title>Thêm Học Sinh</title>
  <style>
    form {max-width:500px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;}
    input, textarea, select, button {width:100%; padding:8px; margin:5px 0;}
  </style>
</head>
<body>
  <h2 style="text-align:center;">Thêm Học Sinh Mới</h2>
  <form method="POST">
    <label>Họ tên học sinh:</label>
    <input type="text" name="hoten_hs" required><br>
    
    <label>Năm học:</label>
    <input type="text" name="namhoc" required><br>
    
    <label>Nhận xét chung:</label>
    <textarea name="nhanxet"></textarea><br>

    <label>Ưu điểm:</label>
    <textarea name="uudiem"></textarea><br>

    <label>Cách khắc phục:</label>
    <textarea name="khacphuc"></textarea><br>
    
    <label>Được lên lớp:</label>
    <select name="lenlop">
        <option value="Được lên lớp">Được lên lớp</option>
        <option value="Ở lại lớp">Ở lại lớp</option>
    </select><br>
    
    <button type="submit" name="submit">Lưu thông tin</button>
    <a href="index.php">Quay lại</a>
  </form>
</body>
</html>