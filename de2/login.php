<?php
include 'connect.php';
session_start();
if (isset($_SESSION['user_id'])){
  header("location: index.php");
  exit();
}
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM tbl_user WHERE user='$username' AND pass='$password'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0){
    $row = $stmt->fetch();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name']; 
    header("location: index.php");
    exit();
  } else {
      $error = "Sai thông tin đăng nhập!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng Nhập Quản Lý Học Sinh</title>
  <style>
    form {max-width:300px; margin:auto; padding-top:50px;}
    input {width:100%; padding:8px; margin:5px 0;}
    button {width: 100%; padding:8px; margin:5px 0;}
    h2 {text-align:center;}
    .error {color: red;}
  </style>
</head>
<body>
  <h2>Đăng Nhập Hệ Thống</h2>
  <form method ="POST">
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <label>Tài khoản:</label>
    <input type="text" name="username" required><br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required><br>
    <button type="submit" name="submit">Đăng nhập</button>
    <div style="text-align: center; margin-top: 10px;">
        <a href="#">Quên mật khẩu?</a>
    </div>
  </form>
</body>
</html>