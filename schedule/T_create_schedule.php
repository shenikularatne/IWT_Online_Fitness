<?php
require 'dbconfig.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $T_ID = $_POST['T_ID'];
    $C_ID = $_POST['C_ID'];
    $C_Name = $_POST['C_Name'];
    $S_Date = $_POST['S_Date'];
    $S_Time = $_POST['S_Time'];

    $sql = "INSERT INTO trainer_schedule (T_ID, C_ID, C_Name, S_Date, S_Time)
            VALUES ('$T_ID', '$C_ID', '$C_Name', '$S_Date', '$S_Time')";

    if ($con->query($sql) === TRUE) {
        echo "New schedule added successfully";
    } else {
        echo "Error: Failed " . $sql . "<br>" 
        . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
</head>
<body>
    <center>
    <h2>Add New Schedule</h2>
    <!--form add schedule -->
    <form action="T_create_schedule.php" method="POST">
        <label for="T_ID">Trainer ID:</label>
        <input type="number" id="T_ID" name="T_ID" required><br><br>

        <label for="C_ID">Client ID:</label>
        <input type="number" id="C_ID" name="C_ID" required><br><br>

        <label for="C_Name">Client Name:</label>
        <input type="text" id="C_Name" name="C_Name" required><br><br>

        <label for="S_Date">Date (YYYY-MM-DD):</label>
        <input type="date" id="S_Date" name="S_Date" required><br><br>

        <label for="S_Time">Time (HH:MM):</label>
        <input type="time" id="S_Time" name="S_Time" required><br><br>

        <input type="submit" value="Add Schedule">
    </form>
    <center>
        <br>
        <br>

        <a href="T_read_schedule.php">View Your Schedules</a>
        <br>
        <a href="Trainer_dashboard.php">Go Back to Dashboard</a>
</body>
</html>
