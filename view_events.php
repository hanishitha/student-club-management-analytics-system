<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student'];

if(isset($_GET['event_id'])){

    $event_id = $_GET['event_id'];

    $check = "SELECT * FROM registrations
              WHERE student_id='$student_id'
              AND event_id='$event_id'";

    $check_result = mysqli_query($conn, $check);

    if(mysqli_num_rows($check_result) == 0){

        $insert = "INSERT INTO registrations(student_id, event_id)
                   VALUES('$student_id', '$event_id')";

        mysqli_query($conn, $insert);

        echo "<script>alert('Event Joined Successfully');</script>";
    }
}

$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Events</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

<h1>College Events</h1>

<div class="dashboard-boxes">

<?php
while($row = mysqli_fetch_assoc($result)){

    $event_id = $row['event_id'];

    $joined_query = "SELECT * FROM registrations
                     WHERE student_id='$student_id'
                     AND event_id='$event_id'";

    $joined_result = mysqli_query($conn, $joined_query);

    $already_joined = mysqli_num_rows($joined_result) > 0;
?>

<div class="dash-card">

    <?php

$event_name = strtolower($row['event_name']);

$emoji = "🎉";

if(strpos($event_name, 'hack') !== false || 
   strpos($event_name, 'coding') !== false){
    $emoji = "💻";
}
elseif(strpos($event_name, 'dance') !== false){
    $emoji = "💃";
}
elseif(strpos($event_name, 'music') !== false){
    $emoji = "🎵";
}
elseif(strpos($event_name, 'photo') !== false){
    $emoji = "📸";
}
elseif(strpos($event_name, 'sport') !== false){
    $emoji = "🏆";
}
elseif(strpos($event_name, 'robot') !== false){
    $emoji = "🤖";
}
elseif(strpos($event_name, 'ai') !== false){
    $emoji = "🧠";
}
elseif(strpos($event_name, 'literary') !== false){
    $emoji = "📚";
}
?>

<div style="font-size:55px; margin-bottom:10px;">
    <?php echo $emoji; ?>
</div>

<h2><?php echo $row['event_name']; ?></h2>

    <p>
📅 <?php echo $row['event_date']; ?>
</p>
<p>
<?php echo $row['description']; ?>
</p>
    <br>

    <?php
    if($already_joined){
        echo "<button disabled style='background:gray;'>
              Already Joined
              </button>";
    } else {
    ?>

    <a href="view_events.php?event_id=<?php echo $event_id; ?>"
       class="logout-btn">
       Join Event
    </a>

    <?php
    }
    ?>

</div>

<?php
}
?>

</div>

<br><br>

<a href="student_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>