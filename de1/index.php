<?php
require_once 'connect.php';
session_start();

// Yêu cầu 4: Ngăn cấm truy cập nếu chưa đăng nhập
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit();
}

try{
  // Yêu cầu 3: Tìm kiếm vận đơn theo tên nhân viên
  if(isset($_GET['search']) && !empty($_GET['search'])){
      $keyword = $_GET['search'];
      $sql = "SELECT * FROM vandon WHERE nhanvien LIKE '%$keyword%'";
  } else {
      // Yêu cầu 3: Liệt kê tất cả
      $sql = "SELECT * FROM vandon";
  }
  
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}catch (PDOException $e){
  die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quản lý Vận Đơn</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .header, .footer { background: #f1f1f1; padding: 20px; text-align: center; }
    .content { padding: 20px; min-height: 400px; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px;}
    th, td {padding: 10px; border: 1px solid black; text-align:left}
    .logout {float: right; text-decoration: none; color: red; font-weight: bold;}
    .search-box { margin-bottom: 20px; }
  </style>
</head>
<body>
  <div class="header">
      <h2>HỆ THỐNG QUẢN LÝ VẬN ĐƠN</h2>
      <a href="logout.php" class="logout">Đăng xuất</a>
  </div>

  <div class="content">
      <div class="search-box">
          <form method="GET" action="">
              <input type="text" name="search" placeholder="Tìm tên nhân viên..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
              <button type="submit">Tìm kiếm</button>
              <button type="button"><a href="index.php" style="text-decoration:none; color:black;">Tất cả</a></button>
          </form>
      </div>

      <button><a href="add_vandon.php" style="text-decoration:none;">+ TẠO VẬN ĐƠN MỚI</a></button>
      
      <table>
        <tr>
          <th>ID</th>
          <th>Nhân viên</th>
          <th>Người nhận</th>
          <th>SĐT</th>
          <th>Địa chỉ</th>
          <th>Ngày giao</th>
          <th>Ghi chú</th>
          <th>Hành Động</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nhanvien']) ?></td>
            <td><?= htmlspecialchars($row['nguoinhan']) ?></td>
            <td><?= htmlspecialchars($row['sdt']) ?></td>
            <td><?= htmlspecialchars($row['diachi']) ?></td>
            <td><?= htmlspecialchars($row['ngaygiao']) ?></td>
            <td><?= htmlspecialchars($row['ghichu']) ?></td>
            <td>
              <a href='edit_vandon.php?id=<?= $row['id'] ?>'>Sửa</a> | 
              <a href='delete_vandon.php?id=<?= $row['id'] ?>' onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
  </div>

  <div class="footer">
      <p>Sinh viên thực hiện: <b>Nguyễn Văn A</b> - Mã SV: <b>123456</b> - Lớp: <b>CNTT-K60</b></p>
      <p>Người dùng hiện tại: <b><?= htmlspecialchars($_SESSION['user_name']) ?></b></p>
  </div>
</body>
</html>