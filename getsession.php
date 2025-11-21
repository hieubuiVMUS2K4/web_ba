<?php
session_start();
$fullname = $_SESSION['user_name'] ?? 'Chưa set';
$userid   = $_SESSION['user_id']   ?? 'Chưa set';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Ho Ten: ". $fullname . "<br>"?>
    <?php echo "User ID: ". $userid . "<br>"?>
    <a href="logout.php"><button>Hủy Session</button></a>
</body>
</html>