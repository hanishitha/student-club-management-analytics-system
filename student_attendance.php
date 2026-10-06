<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student'];

$query = "
SELECT events.event_name,
       attendance.status
FROM attendance
JOIN events
ON attendance.event_id = events.event_id
WHERE attendance.student_id = '$student_id'
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

<h1>My Attendance</h1>

<table class="ranking-table">

<tr>
    <th>Event Name</th>
    <th>Status</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['event_name']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>

<?php
}
?>

</table>

<br><br>

<a href="student_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>