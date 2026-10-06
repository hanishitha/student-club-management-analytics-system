<?php
include 'db.php';

$query = "SELECT students.student_name,
                 students.department,
                 rankings.points
          FROM rankings
          JOIN students
          ON rankings.student_id = students.student_id
          ORDER BY rankings.points DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Rankings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

<h1>Top Active Students</h1>

<table class="ranking-table">

<tr>
    <th>Rank</th>
    <th>Student Name</th>
    <th>Department</th>
    <th>Points</th>
</tr>

<?php
$rank = 1;

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $rank; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['points']; ?></td>
</tr>

<?php
$rank++;
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