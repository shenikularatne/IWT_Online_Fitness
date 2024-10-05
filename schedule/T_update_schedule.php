<?php
require 'dbconfig.php'; 

// Check if S_ID is provided via GET request
if (isset($_GET['S_ID'])) 
{
    $S_ID = $_GET['S_ID'];
    
    // Fetch the record to be updated
    $sql = "SELECT * FROM trainer_schedule WHERE S_ID='$S_ID'";
    $result = $con->query($sql);
    
    // Check if the record exists
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    } 
    else 
    {
        echo "Record not found!";
        exit();
    }
} 


// Handle form submission for updating the schedule
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated values from the form
    $S_ID = $_POST['S_ID']; // S_ID should be part of the form (readonly)
    $S_Date = $_POST['S_Date'];
    $S_Time = $_POST['S_Time'];

    // Update the record in the database for Date and Time only
    $sql = "UPDATE trainer_schedule SET S_Date='$S_Date', S_Time='$S_Time' WHERE S_ID='$S_ID'";

    if ($con->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error: Update Failed! " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
</head>
<body>

    <h2>Edit Your Schedule</h2>

    <!-- Display the form with existing data -->
    <form action="T_update_schedule.php?S_ID=<?php echo $S_ID; ?>" method="POST">
        <!-- Session ID (read-only) -->
        <label for="S_ID">Session ID:</label>
        <input type="number" id="S_ID" name="S_ID" value="<?php echo $row['S_ID']; ?>" readonly><br><br>

        <!-- Trainer ID (read-only) -->
        <label for="T_ID">Trainer ID:</label>
        <input type="text" id="T_ID" name="T_ID" value="<?php echo $row['T_ID']; ?>" readonly><br><br>

        <!-- Client ID (read-only) -->
        <label for="C_ID">Client ID:</label>
        <input type="text" id="C_ID" name="C_ID" value="<?php echo $row['C_ID']; ?>" readonly><br><br>

        <!-- Client Name (read-only) -->
        <label for="C_Name">Client Name:</label>
        <input type="text" id="C_Name" name="C_Name" value="<?php echo $row['C_Name']; ?>" readonly><br><br>

        <!-- Date (editable) -->
        <label for="S_Date">Date (YYYY-MM-DD):</label>
        <input type="date" id="S_Date" name="S_Date" value="<?php echo isset($row['S_Date']) ? $row['S_Date'] : ''; ?>" required><br><br>

        <!-- Time (editable) -->
        <label for="S_Time">Time (HH:MM):</label>
        <input type="time" id="S_Time" name="S_Time" value="<?php echo isset($row['S_Time']) ? $row['S_Time'] : ''; ?>" required><br><br>

        <!-- Submit button to update the schedule -->
        <input type="submit" value="Update Schedule">
    </form>

    <center>
        <br><br>
        <a href="T_read_schedule.php">View Your Schedules</a>
        <br>
        <a href="Trainer_dashboard.php">Go Back to Dashboard</a>
    </center>

</body>
</html>
