<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students
              WHERE student_id='$student_id'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['student'] = $student_id;

        header("Location: student_dashboard.php");

    } else {
        echo "<script>alert('Invalid Student Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Student Login</h2>

<form method="POST">

<input type="text" name="student_id" placeholder="Enter Student ID" required>

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