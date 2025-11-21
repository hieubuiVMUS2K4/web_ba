<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['user_id'])) { header("location: login.php"); exit(); }

$id = $_GET['id'];

if(isset($_POST['submit'])){
    $nhanvien = $_POST['nhanvien'];
    $nguoinhan = $_POST['nguoinhan'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ngaygiao = $_POST['ngaygiao'];
    $ghichu = $_POST['ghichu'];

    $sql = "UPDATE vandon SET nhanvien='$nhanvien', nguoinhan='$nguoinhan', sdt='$sdt', 
            diachi='$diachi', ngaygiao='$ngaygiao', ghichu='$ghichu' WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    
    if($stmt->execute()){
      header("location:index.php");
      exit;
    } else {
      echo "Cập nhật thất bại!";
    }
}

// Lấy dữ liệu cũ để điền vào form
$sql_select = "SELECT * FROM vandon WHERE id = '$id'";
$stmt = $conn->prepare($sql_select);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sửa Vận Đơn</title>
  <style>
    form {max-width:400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;}
    input, textarea, button {width:100%; padding:8px; margin:5px 0;}
  </style>
</head>
<body>
  <h2 style="text-align:center;">Cập Nhật Vận Đơn</h2>
  <form method="POST">
    <label>Nhân viên:</label>
    <input type="text" name="nhanvien" value="<?= htmlspecialchars($row['nhanvien']) ?>" required><br>
    
    <label>Người nhận:</label>
    <input type="text" name="nguoinhan" value="<?= htmlspecialchars($row['nguoinhan']) ?>" required><br>
    
    <label>SĐT:</label>
    <input type="text" name="sdt" value="<?= htmlspecialchars($row['sdt']) ?>" required><br>
    
    <label>Địa chỉ:</label>
    <input type="text" name="diachi" value="<?= htmlspecialchars($row['diachi']) ?>" required><br>
    
    <label>Ngày giao:</label>
    <input type="date" name="ngaygiao" value="<?= htmlspecialchars($row['ngaygiao']) ?>" required><br>
    
    <label>Ghi chú:</label>
    <textarea name="ghichu"><?= htmlspecialchars($row['ghichu']) ?></textarea><br>
    
    <button type="submit" name="submit">Lưu Thay Đổi</button>
    <a href="index.php">Quay lại</a>
  </form>
</body>
</html>