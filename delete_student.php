<?php
include('connect.php'); 
$stt_id = $_GET['id'];
$sql = "DELETE FROM thongtin WHERE stt = '$stt_id'";
$stmt = $conn->prepare($sql);
$query = $stmt->execute();
header("location:index.php"); 
?>