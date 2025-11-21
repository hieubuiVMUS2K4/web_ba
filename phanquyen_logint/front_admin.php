<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['password'])){
    var_dump($_SESSION['username']);
    header("location: dang_nhap.php");
} else{ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <style>
            .btn-dx:hover{
                background: black;
                box-shadow: 0 0 10px black;
                color: white;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1 class="title text-danger text-center">Giao diện cho admin</h1>
        <form action="log-out.php" method="post">
            <button type="submit" class="form-control btn-dx">Đăng Xuất</button>
        </form>
    </div>

    </body>
    </html>

<?php } ?>

