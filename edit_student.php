<?php

include('connect.php'); 
$result = null;
$stt_id = $_GET['id']; 

if(isset($_POST['submit'])){
    if(isset($_POST['hoten'])&&isset($_POST['masv'])&&isset($_POST['diem'])){
        $hoten = $_POST['hoten'];
        $masv = $_POST['masv'];
        $diem = $_POST['diem'];

        $sql_update = "UPDATE thongtin SET hoten = '$hoten', masv = '$masv', diem = '$diem' WHERE stt = '$stt_id'";
        $stmt_update = $conn->prepare($sql_update);
        $query_update = $stmt_update->execute();
        
        if($query_update){
            header("location:index.php"); 
            exit;
        } else {
            echo "Cập nhật thất bại!";
        }
    }
}

$sql_select = "SELECT * FROM thongtin WHERE stt = '$stt_id'";
$stmt_select = $conn->prepare($sql_select);
$stmt_select->execute();
$result = $stmt_select->fetch(PDO::FETCH_ASSOC); 

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
    <style>
        body { margin: 20px; }
        form { max-width: 300px; }
        input, button { width: 100%; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form method="POST">
        <label>Mã SV:</label>
        <input type="number" name="masv" value="<?= htmlspecialchars($result['masv']) ?>">
        
        <label>Họ tên:</label>
        <input type="text" name="hoten" value="<?= htmlspecialchars($result['hoten']) ?>">
        
        <label>Điểm:</label>
        <input type="number" name="diem" value="<?= htmlspecialchars($result['diem']) ?>">
        
        <button type="submit" name="submit">Lưu thay đổi</button>
    </form>
    <br>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>