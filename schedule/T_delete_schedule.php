<?php
require 'dbconfig.php';  // Include your database connection

// Check if S_ID is provided via GET request
if (isset($_GET['S_ID'])) {
    $S_ID = $_GET['S_ID'];

    // Fetch the record to confirm it's the correct one to delete
    $sql = "SELECT * FROM trainer_schedule WHERE S_ID='$S_ID'";
    $result = $con->query($sql);
    
    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Proceed to delete the record
        $deleteSql = "DELETE FROM trainer_schedule WHERE S_ID=?";
        $stmt = $con->prepare($deleteSql);
        $stmt->bind_param('i', $S_ID);  // Bind the Session ID as an integer
        
        // Execute the delete query
        if ($stmt->execute()) {
            echo "Schedule deleted successfully!";
           
        } else {
            echo "Error deleting schedule: " . $con->error;
        }

        $stmt->close();
    } else {
        echo "Record not found!";
    }
} else {
    echo "No schedule ID provided for deletion.";
}

$con->close();
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