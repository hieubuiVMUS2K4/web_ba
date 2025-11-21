<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['password'])){
    var_dump($_SESSION['username']);
    header("location: dang_nhap.php");
}
var_dump($_SESSION['username']);
echo "client";
?>
<form action="log-out.php" method="post">
    <input type="submit" value="Đăng xuất">
</form>