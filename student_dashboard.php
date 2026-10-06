<?php
session_start();
include 'db.php';

if(!isset($_SESSION['student'])){
    header("Location: student_login.php");
    exit;
}
$student_id = $_SESSION['student'];

$query = "SELECT student_name
          FROM students
          WHERE student_id='$student_id'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

$student_name = $row['student_name'];
?>
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

<h1>
Welcome, <?php echo $student_name; ?> 👋
</h1>

<div class="dashboard-boxes">

<a href="view_clubs.php" style="text-decoration:none;">
<div class="dash-card">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
class="card-img">

<h2>View Clubs</h2>

<p>
Explore student clubs<br>
and communities
</p>

</div>
</a>

<a href="view_events.php" style="text-decoration:none;">
<div class="dash-card">

<img src="https://cdn-icons-png.flaticon.com/512/747/747310.png"
class="card-img">

<h2>View Events</h2>

<p>
Browse upcoming events<br>
and activities
</p>

</div>
</a>

<a href="student_attendance.php" style="text-decoration:none;">
<div class="dash-card">

<img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png"
class="card-img">

<h2>Attendance</h2>

<p>
Track attendance and<br>
participation records
</p>

</div>
</a>

<a href="rankings.php" style="text-decoration:none;">
<div class="dash-card">

<img src="https://cdn-icons-png.flaticon.com/512/2583/2583344.png"
class="card-img">

<h2>Rankings</h2>

<p>
View points and<br>
leaderboard status
</p>

</div>
</a>

</div>

<div style="text-align:center; margin-top:40px;">

<a href="logout.php" class="logout-btn">
Logout
</a>

</div>

</div>

</body>
</html>