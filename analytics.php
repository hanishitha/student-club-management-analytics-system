<?php
include 'db.php';

$students = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));

$clubs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM clubs"));

$events = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM events"));

$registrations = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM registrations"));

$top_student_query = "
SELECT students.student_name, rankings.points
FROM rankings
JOIN students
ON rankings.student_id = students.student_id
ORDER BY rankings.points DESC
LIMIT 1
";

$top_student_result = mysqli_query($conn, $top_student_query);

$top_student = mysqli_fetch_assoc($top_student_result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analytics Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

<h1>Analytics Dashboard</h1>

<div class="dashboard-boxes">

<div class="dash-card">
    <h2>Total Students</h2>
    <h1><?php echo $students; ?></h1>
</div>

<div class="dash-card">
    <h2>Total Clubs</h2>
    <h1><?php echo $clubs; ?></h1>
</div>

<div class="dash-card">
    <h2>Total Events</h2>
    <h1><?php echo $events; ?></h1>
</div>

<div class="dash-card">
    <h2>Total Registrations</h2>
    <h1><?php echo $registrations; ?></h1>
</div>

<div class="dash-card">
    <h2>Top Student</h2>
    <p><?php echo $top_student['student_name']; ?></p>
    <p>Points: <?php echo $top_student['points']; ?></p>
</div>

</div>

<br><br>

<a href="admin_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>