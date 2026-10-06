<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

    <h1>Admin Dashboard</h1>

    <div class="dashboard-boxes">

<a href="add_club.php" style="text-decoration:none;">
    <div class="dash-card">
        <div class="card-emoji">🎓</div>
        <h2>Add Clubs</h2>
        <p>Create and manage new clubs.</p>
    </div>
</a>

<a href="add_event.php" style="text-decoration:none;">
    <div class="dash-card">
        <div class="card-emoji">📅</div>
        <h2>Add Events</h2>
        <p>Schedule club events and activities.</p>
    </div>
</a>

<a href="attendance.php" style="text-decoration:none;">
    <div class="dash-card">
        <div class="card-emoji">✅</div>
        <h2>Attendance</h2>
        <p>Mark student participation easily.</p>
    </div>
</a>

<a href="analytics.php" style="text-decoration:none;">
    <div class="dash-card">
        <div class="card-emoji">📊</div>
        <h2>Analytics</h2>
        <p>View club and event insights.</p>
    </div>
</a>

<a href="manage_rankings.php" style="text-decoration:none;">
    <div class="dash-card">
        <div class="card-emoji">🏅</div>
        <h2>Rankings</h2>
        <p>Update student activity points.</p>
    </div>
</a>

</div>
    <br><br>

    <a href="logout.php" class="logout-btn">Logout</a>

</div>

</body>
</html>