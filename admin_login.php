<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins 
              WHERE username='$username' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $username;

        header("Location: admin_dashboard.php");

    } else {
        echo "<script>alert('Invalid Admin Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Admin Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="login">Login</button>
<br>


</form>
<a href="index.php" class="back-btn">
Back 
</a>

</div>

</body>
</html>