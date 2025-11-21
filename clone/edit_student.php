<?php
include 'connect.php';
$result = null;
$stt_id = $_GET['id'];
if(isset($_POST['submit'])){
  if(isset($_POST['hoten'])&&isset($_POST['masv'])&&isset($_POST['diem'])){
    $hoten = $_POST['hoten'];
    $masv = $_POST['masv'];
    $diem = $_POST['diem'];

    $sql = "UPDATE thongtin SET hoten = '$hoten', masv = '$masv', diem = '$diem' WHERE stt = '$stt_id'";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();

    if($query){
      header("location:index.php");
      exit;
    } else {
      echo "Cap nhat that bai!";
    }
  }
}

$sql_select = "SELECT * FROM thongtin WHERE stt = '$stt_id'";
$stmt_select = $conn->prepare($sql_select);
$stmt_select->execute();
$result = $stmt_select->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form {max-width:300px;}
    input, button {width:100%; padding:8px; margin:5px 0;}
  </style>
</head>
<body>
  <form method="POST">
    <lable>Ma SV:</lable>
    <input type="number" name="masv" required value="<?= htmlspecialchars($result['masv']) ?>"><br>
    <lable>Ho Ten:</lable>
    <input type="text" name="hoten" required value="<?= htmlspecialchars($result['hoten']) ?>"><br>
    <lable>Diem:</lable>
    <input type="number" name="diem" required value="<?= htmlspecialchars($result['diem']) ?>"><br>
    <button type="submit" name="submit">Luu thay doi</button>
  </form>
</body>
</html>