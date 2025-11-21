<?php
include 'connect.php';
session_start();
if (isset($_SESSION['user_id'])){
  header("location: index.php");
  exit();
}
if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM tbl_user WHERE user='$username' AND pass='$password'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0){
    $row = $stmt->fetch();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    header("location: index.php");
    exit();
    
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form {max-width:300px; margin:auto; padding-top:50px;}
    input {width:100%; padding:8px; margin:5px 0;}
    button {width: 80%; text-align:center; padding:8px; margin:5px 0;}
    h1 {text-align:center;}
  </style>
</head>
<body>
  <h1>Login</h1>
  <form method ="POST">
    <label>Username:</label>
    <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit" name="submit">Login</button>
  </from>
</body>
</html>