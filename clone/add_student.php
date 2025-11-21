<?php
include 'connect.php';
if(isset($_POST['submit'])){
  if(isset($_POST['hoten'])&&isset($_POST['masv'])&&isset($_POST['diem'])){
    $hoten = $_POST['hoten'];
    $masv = $_POST['masv'];
    $diem = $_POST['diem'];

    $sql = "INSERT INTO thongtin (hoten, masv, diem) VALUES ('$hoten', '$masv', '$diem')";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();

    if($query){
      header("location:index.php");
      exit;
    } else {
      echo "them that bai, vui long thu lai!";
    }
  }
}

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
    <input type="number" name="masv" required><br>
    <lable>Ho Ten:</lable>
    <input type="text" name="hoten" required><br>
    <lable>Diem:</lable>
    <input type="number" name="diem" required><br>
    <button type="submit" name="submit">Them sv</button>
  </form>
</body>
</html>