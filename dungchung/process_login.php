<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username'];
    $p = $_POST['password'];

    // Kiểm tra user
    $sql = "SELECT * FROM login WHERE username = '$u' AND password = '$p'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        
        // Đăng nhập xong quay lại trang trước đó hoặc mặc định về Đề 1
        if(isset($_SESSION['redirect_url'])) {
            header("Location: " . $_SESSION['redirect_url']);
        } else {
            header("Location: de1_index.php"); // Mặc định
        }
    } else {
        echo "<script>alert('Sai tài khoản hoặc mật khẩu!'); window.location='login.php';</script>";
    }
}
?>