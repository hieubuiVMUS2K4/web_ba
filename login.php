<?php
require_once 'connect.php';
session_start();

if (isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $u = $_POST['user'];
    $p = $_POST['pass']; // Mã hóa md5 để so khớp với DB
    $sql = "SELECT * FROM tbl_user WHERE user='$u' AND pass='$p'";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header("location: index.php");
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        body { text-align: center; margin-top: 50px; }
        input { display: block; margin: 10px auto; padding: 5px; }
        button { padding: 5px 15px; }
    </style>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post">
        <input type="text" name="user" placeholder="Tên đăng nhập" required>
        <input type="password" name="pass" placeholder="Mật khẩu" required>
        <button type="submit" name="login">Vào hệ thống</button>
    </form>
</body>
</html>