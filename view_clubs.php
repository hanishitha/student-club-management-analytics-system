<?php
include 'db.php';

$query = "SELECT * FROM clubs";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Clubs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

<h1>College Clubs</h1>

<div class="dashboard-boxes">

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<div class="dash-card">

    <?php

$club_name = strtolower($row['club_name']);

$emoji = "🎯";

if(strpos($club_name, 'ai') !== false){
    $emoji = "🧠";
}
elseif(strpos($club_name, 'robot') !== false){
    $emoji = "🤖";
}
elseif(strpos($club_name, 'music') !== false){
    $emoji = "🎵";
}
elseif(strpos($club_name, 'photo') !== false){
    $emoji = "📸";
}
elseif(strpos($club_name, 'dance') !== false){
    $emoji = "💃";
}
elseif(strpos($club_name, 'literary') !== false){
    $emoji = "📚";
}
elseif(strpos($club_name, 'coding') !== false){
    $emoji = "💻";
}
elseif(strpos($club_name, 'sports') !== false){
    $emoji = "🏆";
}
?>

<div style="font-size:60px; margin-bottom:15px;">
    <?php echo $emoji; ?>
</div>

<h2><?php echo $row['club_name']; ?></h2>

    <p><?php echo $row['description']; ?></p>

</div>

<?php
}
?>

</div>

<br>

<a href="student_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>