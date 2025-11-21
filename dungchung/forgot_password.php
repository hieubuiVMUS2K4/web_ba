<!DOCTYPE html>
<body>
    <h2 style="text-align:center">Lấy lại mật khẩu</h2>
    <form method="POST" style="width:300px; margin:auto">
        <label>Nhập Email/Username:</label><br>
        <input type="text" name="info" style="width:100%; padding:8px; margin:10px 0" required><br>
        <button type="submit">Gửi yêu cầu</button>
    </form>
    <?php if($_SERVER['REQUEST_METHOD']=='POST') echo "<p style='text-align:center; color:green'>Mật khẩu đã gửi vào email!</p>"; ?>
    <p style="text-align:center"><a href="login.php">Quay lại</a></p>
</body>