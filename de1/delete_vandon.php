<?php
include('connect.php');
session_start();
if(!isset($_SESSION['user_id'])) { header("location: login.php"); exit(); }

$id = $_GET['id'];
$sql = "DELETE FROM vandon WHERE id = '$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:index.php");
?>