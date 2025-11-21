<?php

require_once 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}

try {
    $sql = "SELECT * FROM thongtin";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        .logout {float: right;}
    </style>
</head>
<body>

<a href="logout.php" class="logout">Đăng xuất</a>

<button><a href="add_student.php">THÊM SINH VIÊN</a></button>

<h1>Danh sách sinh viên</h1>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Điểm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['stt']) ?></td>
                <td><?= htmlspecialchars($row['masv']) ?></td>
                <td><?= htmlspecialchars($row['hoten']) ?></td>
                <td><?= htmlspecialchars($row['diem']) ?></td>
                <td>
                    <a href='edit_student.php?id=<?= $row['stt'] ?>'>Sửa</a> |
                    <a href='delete_student.php?id=<?= $row['stt'] ?>'>Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>