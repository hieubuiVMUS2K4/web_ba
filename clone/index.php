<?php

require_once 'connect.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
    exit();
}
try{
  $sql = "SELECT * FROM thongtin";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table { border-collapse: collapse; width: 80%;}
    th, td {padding: 10px; border: 1px solid black; text-align:left}
    .logout {float: right;}
  </style>
</head>
<body>
  <a href="logout.php" class="logout">Dang xuat</a>
  <button><a href="add_student.php">THEM SINH VIEN</a></button>
  <table>
    <tr>
      <th>Mã SV</th>
      <th>Họ Tên</th>
      <th>Điểm</th>
      <th>Hành Động</th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
      <tr>
        <td><?= htmlspecialchars($row['masv']) ?></td>
        <td><?= htmlspecialchars($row['hoten']) ?></td>
        <td><?= htmlspecialchars($row['diem']) ?></td>
        <td>
          <a href='edit_student.php?id=<?= $row['stt'] ?>'>Sua</a> | 
          <a href='delete_student.php?id=<?= $row['stt'] ?>'>Xoa</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>