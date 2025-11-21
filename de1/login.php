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
  // Lưu ý: Đề bài yêu cầu user là Student, pass 123.
  $sql = "SELECT * FROM tbl_user WHERE user='$username' AND pass='$password'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0){
    $row = $stmt->fetch();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name']; // Lưu tên để hiển thị ở Footer
    header("location: index.php");
    exit();
  } else {
      $error = "Sai tên đăng nhập hoặc mật khẩu!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập hệ thống</title>
  <style>
    form {max-width:300px; margin:auto; padding-top:50px;}
    input {width:100%; padding:8px; margin:5px 0;}
    button {width: 100%; padding:8px; margin:5px 0;}
    h1 {text-align:center;}
    .error {color: red;}
  </style>
</head>
<body>
  <h1>Đăng Nhập Hệ Thống Vận Đơn</h1>
  <form method ="POST">
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit" name="submit">Đăng nhập</button>
    <div style="text-align: center; margin-top: 10px;">
        <a href="forgot_password.php">Quên mật khẩu?</a>
    </div>
  </form>
</body>
</html>