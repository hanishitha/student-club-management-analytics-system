<?php
include 'db.php';

if(isset($_POST['add_points'])){

    $student_id = $_POST['student_id'];
    $points = $_POST['points'];

    $check = mysqli_query($conn,
    "SELECT * FROM rankings WHERE student_id='$student_id'");

    if(mysqli_num_rows($check) > 0){

        mysqli_query($conn,
        "UPDATE rankings
         SET points = points + '$points'
         WHERE student_id='$student_id'");

    } else {

        mysqli_query($conn,
        "INSERT INTO rankings(student_id, points)
         VALUES('$student_id', '$points')");
    }

    echo "<script>alert('Points Updated Successfully');</script>";
}

$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rankings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Manage Rankings</h2>

<form method="POST">

<select name="student_id" required style="width:100%; padding:12px; margin:10px 0;">

<option value="">Select Student</option>

<?php
while($student = mysqli_fetch_assoc($students)){
?>

<option value="<?php echo $student['student_id']; ?>">
    <?php echo $student['student_name']; ?>
</option>

<?php
}
?>

</select>

<input type="number"
       name="points"
       placeholder="Enter Points"
       required>

<button type="submit" name="add_points">
Update Points
</button>

</form>

<br>

<a href="admin_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>