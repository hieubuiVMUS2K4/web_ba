<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <style>
        body { font-family: Arial, sans-serif; padding-top: 50px; background-color: #f4f4f4; }
        form { width: 300px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 3px; }
        button { width: 100%; padding: 10px; background: #4caf50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
        .link { text-align: center; display: block; margin-top: 10px; text-decoration: none; color: #333; }
    </style>
</head>
<body>
    <form action="process_login.php" method="post">
        <h2 style="text-align:center">LOGIN</h2>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Đăng nhập</button>
        
        <a href="forgot_password.php" class="link">Quên mật khẩu?</a>
        <a href="de1_index.php" class="link">Về trang Đề 1</a>
        <a href="de2_index.php" class="link">Về trang Đề 2</a>
    </form>
</body>
</html>