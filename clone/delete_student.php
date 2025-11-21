<?php
include('connect.php');
$stt_id = $_GET['id'];
$sq = "DELETE FROM thongtin WHERE stt = '$stt_id'";
$stmt = $conn->prepare($sq);
$query = $stmt->execute();
header("location:index.php");
?>