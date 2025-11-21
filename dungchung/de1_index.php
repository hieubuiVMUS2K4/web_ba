<?php
session_start();
include 'connect.php';
// Lưu link hiện tại để login xong quay lại đúng chỗ
$_SESSION['redirect_url'] = 'de1_index.php';

// Tìm kiếm
$sql = "SELECT * FROM product_de1";
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
    <title>Đề 1 - Sản Phẩm Điện Thoại</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="top-bar">
        <div class="search-box">
            <form method="GET">
                <input type="text" name="timkiem" placeholder="Nhập tên hoặc mã SP..." value="<?= isset($_GET['timkiem'])?$_GET['timkiem']:'' ?>">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div class="user-box">
            <?php if(isset($_SESSION['username'])): ?>
                <span>Xin chào: <b><?= $_SESSION['username'] ?></b> (<?= $_SESSION['role'] ?>)</span>
                <a href="log-out.php" class="btn-logout">Thoát</a>
            <?php else: ?>
                <a href="login.php">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="header">SẢN PHẨM NỔI BẬT</div>
        <div class="product-list">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product-item">
                    <div class="p-img">
                        <img src="images/<?= $row['anh'] ?>" alt="SP">
                    </div>
                    <div class="p-info">
                        <a href="#" class="p-name"><?= $row['ten_sp'] ?></a>
                        <p><span>▪</span> Bảo hành: <?= $row['bao_hanh'] ?></p>
                        <p><span>▪</span> Trạng thái: <?= $row['trang_thai'] ?></p>
                    </div>
                    <div class="p-action">
                        <span class="price-tag">Giá: <?= number_format($row['gia']) ?> đ</span>
                        <a href="#" class="detail-btn">Chi tiết</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>