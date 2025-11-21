<?php
require_once 'connect.php';
session_start();

// Chặn truy cập nếu chưa đăng nhập
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit();
}

try{
  // Xử lý tìm kiếm theo ID
  if(isset($_GET['search']) && !empty($_GET['search'])){
      $id_search = $_GET['search'];
      $sql = "SELECT * FROM tongketnam WHERE id = '$id_search'";
  } else {
      // Mặc định hiển thị tất cả
      $sql = "SELECT * FROM tongketnam";
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
  <title>Quản Lý Học Sinh</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .header, .footer { background: #e3f2fd; padding: 20px; text-align: center; }
    .content { padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px;}
    th, td {padding: 8px; border: 1px solid #333; text-align:left}
    .logout {float: right; color: red; font-weight: bold; text-decoration: none;}
    .search-box { margin-bottom: 20px; }
  </style>
</head>
<body>
  <div class="header">
      <h2>DANH SÁCH TỔNG KẾT NĂM</h2>
      <a href="logout.php" class="logout">Đăng xuất</a>
  </div>

  <div class="content">
      <div class="search-box">
          <form method="GET">
              <input type="number" name="search" placeholder="Nhập ID học sinh..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
              <button type="submit">Tìm kiếm</button>
              <a href="index.php"><button type="button">Xem tất cả</button></a>
          </form>
      </div>

      <button><a href="add_student.php" style="text-decoration:none;">+ THÊM HỌC SINH MỚI</a></button>
      
      <table>
        <tr>
          <th>ID</th>
          <th>Họ Tên HS</th>
          <th>Năm học</th>
          <th>Nhận xét</th>
          <th>Ưu điểm</th>
          <th>Khắc phục</th>
          <th>Lên lớp</th>
          <th>Hành động</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['hoten_hs']) ?></td>
            <td><?= htmlspecialchars($row['namhoc']) ?></td>
            <td><?= htmlspecialchars($row['nhanxet']) ?></td>
            <td><?= htmlspecialchars($row['uudiem']) ?></td>
            <td><?= htmlspecialchars($row['khacphuc']) ?></td>
            <td><?= htmlspecialchars($row['lenlop']) ?></td>
            <td>
              <a href='edit_student.php?id=<?= $row['id'] ?>'>Sửa</a> | 
              <a href='delete_student.php?id=<?= $row['id'] ?>' onclick="return confirm('Xóa học sinh này?');">Xóa</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
  </div>

  <div class="footer">
      <p>SV thực hiện: <b>Nguyễn Văn A</b> - Mã: <b>123456</b> - Lớp: <b>K60</b></p>
      <p>Người dùng: <b><?= htmlspecialchars($_SESSION['user_name']) ?></b></p>
  </div>
</body>
</html>