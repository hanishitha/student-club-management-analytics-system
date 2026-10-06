<?php
include 'db.php';

if(isset($_POST['add_club'])){

    $club_name = $_POST['club_name'];
    $description = $_POST['description'];

    $query = "INSERT INTO clubs(club_name, description)
              VALUES('$club_name', '$description')";

    mysqli_query($conn, $query);

    echo "<script>alert('Club Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Club</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Add Club</h2>

<form method="POST">

<input type="text" 
       name="club_name" 
       placeholder="Enter Club Name" required>

<input type="text" 
       name="description" 
       placeholder="Enter Description" required>

<button type="submit" name="add_club">
Add Club
</button>

</form>

<br>

<a href="admin_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>