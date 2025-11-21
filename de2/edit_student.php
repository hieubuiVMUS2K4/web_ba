<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['user_id'])) { header("location: login.php"); exit(); }

$id = $_GET['id'];

if(isset($_POST['submit'])){
    $hoten = $_POST['hoten_hs'];
    $namhoc = $_POST['namhoc'];
    $nhanxet = $_POST['nhanxet'];
    $uudiem = $_POST['uudiem'];
    $khacphuc = $_POST['khacphuc'];
    $lenlop = $_POST['lenlop'];

    $sql = "UPDATE tongketnam SET hoten_hs='$hoten', namhoc='$namhoc', nhanxet='$nhanxet', 
            uudiem='$uudiem', khacphuc='$khacphuc', lenlop='$lenlop' WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    
    if($stmt->execute()){
      header("location:index.php");
      exit;
    } else {
      echo "Cập nhật thất bại!";
    }
}

// Lấy dữ liệu cũ
$sql_select = "SELECT * FROM tongketnam WHERE id = '$id'";
$stmt = $conn->prepare($sql_select);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sửa Thông Tin</title>
  <style>
    form {max-width:500px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;}
    input, textarea, select, button {width:100%; padding:8px; margin:5px 0;}
  </style>
</head>
<body>
  <h2 style="text-align:center;">Cập Nhật Thông Tin</h2>
  <form method="POST">
    <label>Họ tên học sinh:</label>
    <input type="text" name="hoten_hs" value="<?= htmlspecialchars($row['hoten_hs']) ?>" required><br>
    
    <label>Năm học:</label>
    <input type="text" name="namhoc" value="<?= htmlspecialchars($row['namhoc']) ?>" required><br>
    
    <label>Nhận xét chung:</label>
    <textarea name="nhanxet"><?= htmlspecialchars($row['nhanxet']) ?></textarea><br>

    <label>Ưu điểm:</label>
    <textarea name="uudiem"><?= htmlspecialchars($row['uudiem']) ?></textarea><br>

    <label>Cách khắc phục:</label>
    <textarea name="khacphuc"><?= htmlspecialchars($row['khacphuc']) ?></textarea><br>
    
    <label>Được lên lớp:</label>
    <select name="lenlop">
        <option value="Được lên lớp" <?= $row['lenlop'] == 'Được lên lớp' ? 'selected' : '' ?>>Được lên lớp</option>
        <option value="Ở lại lớp" <?= $row['lenlop'] == 'Ở lại lớp' ? 'selected' : '' ?>>Ở lại lớp</option>
    </select><br>
    
    <button type="submit" name="submit">Lưu thay đổi</button>
    <a href="index.php">Quay lại</a>
  </form>
</body>
</html>