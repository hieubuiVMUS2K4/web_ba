<?php
session_start();
include 'connect.php';
$_SESSION['redirect_url'] = 'de2_index.php';

// Tìm kiếm
$sql = "SELECT * FROM product_de2";
if(isset($_GET['timkiem']) && !empty($_GET['timkiem'])){
    $tk = $_GET['timkiem'];
    $sql .= " WHERE ten_sp LIKE '%$tk%' OR id = '$tk'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đề 2 - Thời Trang</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="top-bar">
        <form method="GET">
            <input type="text" name="timkiem" placeholder="Tìm sản phẩm..." value="<?= isset($_GET['timkiem'])?$_GET['timkiem']:'' ?>">
            <button type="submit">Tìm</button>
        </form>
        <div class="user-info">
            <?php if(isset($_SESSION['username'])): ?>
                <span>Chào <b><?= $_SESSION['username'] ?></b></span>
                <a href="log-out.php" style="color:red">Thoát</a>
            <?php else: ?>
                <a href="login.php">Đăng nhập Admin</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="header">SẢN PHẨM NỔI BẬT</div>
        <div class="product-grid">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="item">
                    <div class="img-box">
                        <img src="images/<?= $row['anh'] ?>" alt="Anh">
                    </div>
                    <div class="info-box">
                        <a href="#" class="name"><?= $row['ten_sp'] ?></a>
                        <div class="price">Giá: <?= number_format($row['gia']) ?> đ</div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>