<?php
include 'db.php';

if(isset($_POST['add_event'])){

    $club_id = $_POST['club_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];

    $query = "INSERT INTO events(club_id, event_name, event_date, description)
              VALUES('$club_id', '$event_name', '$event_date', '$description')";

    mysqli_query($conn, $query);

    echo "<script>alert('Event Added Successfully');</script>";
}

$clubs = mysqli_query($conn, "SELECT * FROM clubs");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Add Event</h2>

<form method="POST">

<select name="club_id" required style="width:100%; padding:12px; margin:10px 0;">

<option value="">Select Club</option>

<?php
while($club = mysqli_fetch_assoc($clubs)){
?>

<option value="<?php echo $club['club_id']; ?>">
    <?php echo $club['club_name']; ?>
</option>

<?php
}
?>

</select>

<input type="text"
       name="event_name"
       placeholder="Enter Event Name"
       required>

<input type="date"
       name="event_date"
       required>

<input type="text"
       name="description"
       placeholder="Enter Description"
       required>

<button type="submit" name="add_event">
Add Event
</button>

</form>

<br>

<a href="admin_dashboard.php" class="logout-btn">
Back
</a>

</div>

</body>
</html>