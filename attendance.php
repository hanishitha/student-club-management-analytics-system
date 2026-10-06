<?php
include 'db.php';

if(isset($_POST['mark_attendance'])){

    $student_id = $_POST['student_id'];
    $event_id = $_POST['event_id'];
    $status = $_POST['status'];

    $query = "INSERT INTO attendance(student_id, event_id, status)
              VALUES('$student_id', '$event_id', '$status')";

    mysqli_query($conn, $query);

    echo "<script>alert('Attendance Marked Successfully');</script>";
}

$students = mysqli_query($conn, "SELECT * FROM students");

$events = mysqli_query($conn, "SELECT * FROM events");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Mark Attendance</h2>

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

<select name="event_id" required style="width:100%; padding:12px; margin:10px 0;">

<option value="">Select Event</option>

<?php
while($event = mysqli_fetch_assoc($events)){
?>

<option value="<?php echo $event['event_id']; ?>">
    <?php echo $event['event_name']; ?>
</option>

<?php
}
?>

</select>

<select name="status" required style="width:100%; padding:12px; margin:10px 0;">

<option value="">Select Status</option>

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

<button type="submit" name="mark_attendance">
Mark Attendance
</button>

</form>

<br>

<a href="admin_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>